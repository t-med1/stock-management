<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client_cmd extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        CheckLogin();
    }

    public function index()
    {
        $debut  = date("Y-m")."-01";
        $fin    = date("Y-m-t"); // t = last day of current month
        $submit_date_debut = $this->input->get("date_debut");
        $submit_date_fin   = $this->input->get("date_fin");
        if(!empty($submit_date_debut) && !empty($submit_date_fin))
        {
            $debut  = date("Y-m-d", strtotime($submit_date_debut));
            $fin    = date("Y-m-d", strtotime($submit_date_fin));
        }

        $data = array(
            "clients_cmds"  => $this->db->query("SELECT cc.*, c.full_name AS client, u.full_name AS utilisateur, u.role, COALESCE(SUM(cd.quantite),0) AS produits, v.id_vente, v.code_vente FROM client_cmd cc LEFT JOIN client_cmd_details cd ON cc.id_client_cmd = cd.id_client_cmd LEFT JOIN `user` u ON u.id_user = cc.id_user LEFT JOIN client c ON c.id_client = cc.id_client LEFT JOIN vente v ON v.id_client_cmd = cc.id_client_cmd WHERE cc.date_client_cmd BETWEEN '".$debut."' AND '".$fin."' GROUP BY cc.id_client_cmd")->result_array(),
            "date_debut"    => $debut,
            "date_fin"      => $fin,
            /* ----------------------------------- */
            "title"     => "Commandes de Clients",
            "view"      => "client_cmd/liste",
            "active"    => "VT-CMD"
            /* ----------------------------------- */
        );
        $this->load->view("template", $data);
    }

    public function checkCodeExists($ignore = null)
    {
        $code = $this->input->post("code_client_cmd");
        if(!empty($code)) {
            echo json_encode(checkCodeExists($code, "client_cmd", $ignore) ? "EXISTS" : "NOT");
        }
        else { echo json_encode("NOT"); }
    }

    public function details($id)
    {
        $data = array(
            "client_cmd"         => $this->db->query("SELECT cc.*, u.full_name AS utilisateur, u.role, c.full_name AS client FROM client_cmd cc LEFT JOIN client c ON c.id_client = cc.id_client LEFT JOIN `user` u ON u.id_user = cc.id_user WHERE cc.id_client_cmd = ".$id)->row(),
            "client_cmd_details" => $this->db->query("SELECT cd.*, p.full_name AS produit, p.type, p.code_produit, p.image, p.id_categorie, p.id_sub_categorie, c.full_name AS categorie, sc.full_name AS sub_categorie FROM client_cmd_details cd LEFT JOIN produit p ON cd.id_produit = p.id_produit LEFT JOIN categorie c ON c.id_categorie = p.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie WHERE cd.id_client_cmd = ".$id)->result_array(),
            "vente"            => $this->db->query("SELECT * FROM vente WHERE id_client_cmd = ".$id)->row(),
            "adresse"          => $this->db->where("id_client_cmd", $id)->get("adresse")->row(),
            /* ----------------------------------- */
            "title"     => "Commandes de Clients",
            "view"      => "client_cmd/details",
            "active"    => "VT-CMD"
            /* ----------------------------------- */
        );
        $this->load->view("template", $data);
    }

    public function ajouter()
    {
        $code_client_cmd = $this->input->post("code_client_cmd");
        if(!empty($code_client_cmd))
        {
            $this->db->insert("client_cmd", array(
                "id_client"         => $this->input->post("id_client"),
                "code_client_cmd"   => getNewCode("CC", "client_cmd", true),
                "id_user"           => $this->session->userdata("id_user"),
                "date_client_cmd"   => $this->input->post("date_client_cmd"),
                "remarque"          => $this->input->post("remarque")
            ));
            $id_client_cmd = $this->db->insert_id();

            $client = $this->db->where("id_client", $this->input->post("id_client"))->get("client")->row();
            $this->db->insert("adresse", array(
                "id_client_cmd" => $id_client_cmd,
                "id_client"     => $this->input->post("id_client"),
                "full_name"     => $client->full_name,
                "adresse"       => $client->adresse,
                "ville"         => $client->ville,
                "pays"          => $client->pays
            ));

            $produits = $this->input->post("id_produit");
            if(!empty($produits))
            {
                foreach ($produits as $val)
                {
                    $pro = $this->db->where('id_produit', $val)->get('produit')->row();

                    $this->db->insert("client_cmd_details", array(
                        "id_client_cmd"   => $id_client_cmd,
                        "id_produit"    => $val,
                        "quantite"      => $this->input->post("quantite_".$val)
                    ));
                }
            }

            $this->session->set_flashdata("message", array(
                "title" => "Succès!",
                "message" => "Commande de Client enregistré avec succès."
            ));

            /* ---------------------- USER LOG ---------------------- */
            saveUserLog("Enregistrement de commande de client ( <b>".$code_client_cmd."</b> )");
            /* ---------------------- -------- ---------------------- */

            redirect("/client_cmd/details/".$id_client_cmd, "refresh");
        }
        else
        {
            $data = array(
                "clients"           => $this->db->where("display", 1)->get("client")->result_array(),
                "code_client_cmd"   => getNewCode("CC", "client_cmd"),
                /* ----------------------------------- */
                "title"     => "Commandes de Clients",
                "view"      => "client_cmd/ajouter",
                "active"    => "VT-CMD"
                /* ----------------------------------- */
            );
            $this->load->view("template", $data);
        }
    }

    public function modifier($id = null)
    {
        $code_client_cmd = $this->input->post("code_client_cmd");
        if(!empty($code_client_cmd))
        {
            $this->db->where("id_client_cmd", $this->input->post("id_client_cmd"));
            $this->db->update("client_cmd", array(
                "id_client"         => $this->input->post("id_client"),
                "code_client_cmd"   => $code_client_cmd,
                "id_user"           => $this->session->userdata("id_user"),
                "date_client_cmd"   => $this->input->post("date_client_cmd"),
                "remarque"          => $this->input->post("remarque")
            ));

            $client = $this->db->where("id_client", $this->input->post("id_client"))->get("client")->row();
            $this->db->where("id_client_cmd", $this->input->post("id_client_cmd"));
            $this->db->update("adresse", array(
                "id_client" => $this->input->post("id_client"),
                "full_name" => $client->full_name,
                "adresse"   => $client->adresse,
                "ville"     => $client->ville,
                "pays"      => $client->pays
            ));

            $this->db->where("id_client_cmd", $this->input->post("id_client_cmd"));
            $this->db->delete("client_cmd_details");

            $produits = $this->input->post("id_produit");
            if(!empty($produits))
            {
                foreach ($produits as $val)
                {
                    $this->db->insert("client_cmd_details", array(
                        "id_client_cmd" => $this->input->post("id_client_cmd"),
                        "id_produit"    => $val,
                        "quantite"      => $this->input->post("quantite_".$val)
                    ));
                }
            }

            $this->session->set_flashdata("message", array(
                "title" => "Succès!",
                "message" => "Commande de client modifié avec succès."
            ));

            /* ---------------------- USER LOG ---------------------- */
            saveUserLog("Modification de commande de client ( <b>".$code_client_cmd."</b> )");
            /* ---------------------- -------- ---------------------- */

            redirect("/client_cmd/details/".$this->input->post("id_client_cmd"), "refresh");
        }
        else
        {
            $client_cmd = $this->db->where("id_client_cmd", $id)->get("client_cmd")->row();
            $data = array(
                "clients"       => $this->db->where("display", 1)->get("client")->result_array(),
                "client_cmd"    => $client_cmd,
                "client_cmd_details" => $this->db->query("SELECT cd.*, p.full_name AS produit, p.code_produit, p.image, c.full_name AS categorie, sc.full_name AS sub_categorie FROM client_cmd_details cd LEFT JOIN produit p ON cd.id_produit = p.id_produit LEFT JOIN categorie c ON c.id_categorie = p.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie WHERE cd.id_client_cmd = ".$id)->result_array(),
                "client"        => $this->db->where("id_client", $client_cmd->id_client)->get("client")->row(),
                /* ----------------------------------- */
                "title"     => "Commandes de Clients",
                "view"      => "client_cmd/modifier",
                "active"    => "VT-CMD"
                /* ----------------------------------- */
            );
            $this->load->view("template", $data);
        }
    }
    

    public function supprimer()
    {
        CheckAdmin();

        $id_client_cmd = $this->input->post("id_client_cmd");
        if(!empty($id_client_cmd))
        {
            $ventes = $this->db->where("id_client_cmd", $id_client_cmd)->get("vente")->num_rows();

            if( $ventes > 0 )
            {
                $this->session->set_flashdata("warning", array(
                    "title" => "Alerte !",
                    "message" => "Vous ne pouvez pas supprimer cette commande. Il est liée avec une Vente."
                ));

                redirect("/client_cmd", "refresh");
            }

            /* ---------------------- USER LOG ---------------------- */
            saveUserLog("Suppression de commande de client ( <b>".$this->db->where("id_client_cmd", $id_client_cmd)->get("client_cmd")->row()->code_client_cmd."</b> )");
            /* ---------------------- -------- ---------------------- */

            $this->db->where("id_client_cmd", $id_client_cmd);
            $this->db->delete("client_cmd");

            $this->session->set_flashdata("message", array(
                "title" => "Succès!",
                "message" => "Commande de client supprimé avec succès."
            ));
        }

        redirect("/client_cmd", "refresh");
    }

    public function bon_commande($id)
    {
        $client_cmd = $this->db->query("SELECT cc.*, u.full_name AS utilisateur, u.role, c.full_name AS client FROM client_cmd cc LEFT JOIN client c ON c.id_client = cc.id_client LEFT JOIN `user` u ON u.id_user = cc.id_user WHERE cc.id_client_cmd = ".$id)->row();
        $data = array(
            "client_cmd"            => $client_cmd,
            "client_cmd_details" => $this->db->query("SELECT cd.*, p.full_name AS produit, p.code_produit, p.image, p.id_categorie, p.id_sub_categorie, c.full_name AS categorie, sc.full_name AS sub_categorie FROM client_cmd_details cd LEFT JOIN produit p ON cd.id_produit = p.id_produit LEFT JOIN categorie c ON c.id_categorie = p.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie WHERE cd.id_client_cmd = ".$id)->result_array(),
            "adresse"          => $this->db->where("id_client_cmd", $id)->get("adresse")->row(),
            "info"             => $this->db->get("information")->row()
        );
        $this->load->view("client_cmd/bon_commande", $data);

        $html = $this->output->get_output();

        $this->load->library('pdf');
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'portrait');
        $this->dompdf->render();
        $this->dompdf->stream("BON DE COMMANDE - CLIENT - ".$client_cmd->code_client_cmd.".pdf", array("Attachment"=>0));
    }
}
