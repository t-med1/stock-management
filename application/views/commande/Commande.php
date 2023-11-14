<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Commande extends CI_Controller

{

    public function __construct()

    {

        parent::__construct();



        CheckLogin();

        CheckAdmin();

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

            "commandes"  => $this->db->query("SELECT c.*, f.full_name AS fournisseur, u.full_name AS utilisateur, u.role, COALESCE(SUM(cd.quantite),0) AS produits, a.id_achat, a.code_achat FROM commande c LEFT JOIN commande_details cd ON c.id_commande = cd.id_commande LEFT JOIN `user` u ON u.id_user = c.id_user LEFT JOIN fournisseur f ON f.id_fournisseur = c.id_fournisseur LEFT JOIN achat a ON a.id_commande = c.id_commande WHERE c.date_commande BETWEEN '".$debut."' AND '".$fin."' GROUP BY c.id_commande")->result_array(),

            "date_debut" => $debut,

            "date_fin"  => $fin,

            /* ----------------------------------- */

            "title"     => "Commandes de Fournisseurs",

            "view"      => "commande/liste",

            "active"    => "AC-CMD"

            /* ----------------------------------- */

        );

        $this->load->view("template", $data);

    }



    public function checkCodeExists($ignore = null)

    {

        $code = $this->input->post("code_commande");

        if(!empty($code)) {

            echo json_encode(checkCodeExists($code, "commande", $ignore) ? "EXISTS" : "NOT");

        }

        else { echo json_encode("NOT"); }

    }



    public function details($id)

    {

        $data = array(

            "commande"         => $this->db->query("SELECT c.*, u.full_name AS utilisateur, u.role, f.full_name AS fournisseur FROM commande c LEFT JOIN fournisseur f ON f.id_fournisseur = c.id_fournisseur LEFT JOIN `user` u ON u.id_user = c.id_user WHERE c.id_commande = ".$id)->row(),

            "commande_details" => $this->db->query("SELECT cd.*, p.full_name AS produit, p.type, p.code_produit, p.image, p.id_categorie, p.id_sub_categorie, c.full_name AS categorie, sc.full_name AS sub_categorie FROM commande_details cd LEFT JOIN produit p ON cd.id_produit = p.id_produit LEFT JOIN categorie c ON c.id_categorie = p.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie WHERE cd.id_commande = ".$id)->result_array(),

            "achat"            => $this->db->query("SELECT * FROM achat WHERE id_commande = ".$id)->row(),

            "adresse"          => $this->db->where("id_commande", $id)->get("adresse")->row(),

            /* ----------------------------------- */

            "title"     => "Commandes de Fournisseurs",

            "view"      => "commande/details",

            "active"    => "AC-CMD"

            /* ----------------------------------- */

        );

        $this->load->view("template", $data);

    }



    public function ajouter()

    {

        $code_commande = $this->input->post("code_commande");

        if(!empty($code_commande))

        {

            $this->db->insert("commande", array(

                "id_fournisseur"    => $this->input->post("id_fournisseur"),

                "code_commande"     => getNewCode("CF", "commande", true),

                "id_user"           => $this->session->userdata("id_user"),

                "date_commande"     => $this->input->post("date_commande"),

                "remarque"          => $this->input->post("remarque")

            ));

            $id_commande = $this->db->insert_id();



            $fournisseur = $this->db->where("id_fournisseur", $this->input->post("id_fournisseur"))->get("fournisseur")->row();

            $this->db->insert("adresse", array(

                "id_commande"       => $id_commande,

                "id_fournisseur"    => $this->input->post("id_fournisseur"),

                "full_name"     => $fournisseur->full_name,

                "adresse"       => $fournisseur->adresse,

                "ville"         => $fournisseur->ville,

                "pays"          => $fournisseur->pays

            ));



            $produits = $this->input->post("id_produit");

            if(!empty($produits))

            {

                foreach ($produits as $val)

                {



                    $this->db->insert("commande_details", array(

                        "id_commande"   => $id_commande,

                        "id_produit"    => $val,

                        "quantite"      => $this->input->post("quantite_".$val),

                    ));

                }

            }



            $this->session->set_flashdata("message", array(

                "title" => "Succès!",

                "message" => "Commande de fournisseur enregistré avec succès."

            ));



            /* ---------------------- USER LOG ---------------------- */

            saveUserLog("Enregistrement de commande de fournisseur ( <b>".$code_commande."</b> )");

            /* ---------------------- -------- ---------------------- */



            redirect("/commande/details/".$id_commande, "refresh");

        }

        else

        {

            $data = array(

                "fournisseurs"  => $this->db->where("display", 1)->get("fournisseur")->result_array(),

                "code_commande" => getNewCode("CF", "commande"),

                /* ----------------------------------- */

                "title"     => "Commandes de Fournisseurs",

                "view"      => "commande/ajouter",

                "active"    => "AC-CMD"

                /* ----------------------------------- */

            );

            $this->load->view("template", $data);

        }

    }



    public function modifier($id = null)

    {

        $code_commande = $this->input->post("code_commande");

        if(!empty($code_commande))

        {

            $this->db->where("id_commande", $this->input->post("id_commande"));

            $this->db->update("commande", array(

                "id_fournisseur"    => $this->input->post("id_fournisseur"),

                "code_commande"        => $code_commande,

                "id_user"           => $this->session->userdata("id_user"),

                "date_commande"        => $this->input->post("date_commande"),

                "remarque"          => $this->input->post("remarque")

            ));



            $fournisseur = $this->db->where("id_fournisseur", $this->input->post("id_fournisseur"))->get("fournisseur")->row();

            $this->db->where("id_commande", $this->input->post("id_commande"));

            $this->db->update("adresse", array(

                "id_fournisseur"    => $this->input->post("id_fournisseur"),

                "full_name" => $fournisseur->full_name,

                "adresse"   => $fournisseur->adresse,

                "ville"     => $fournisseur->ville,

                "pays"      => $fournisseur->pays

            ));



            $this->db->where("id_commande", $this->input->post("id_commande"));

            $this->db->delete("commande_details");



            $produits = $this->input->post("id_produit");

            if(!empty($produits))

            {

                foreach ($produits as $val)

                {

                    $this->db->insert("commande_details", array(

                        "id_commande"      => $this->input->post("id_commande"),

                        "id_produit"    => $val,

                        "quantite"      => $this->input->post("quantite_".$val)

                    ));

                }

            }



            $this->session->set_flashdata("message", array(

                "title" => "Succès!",

                "message" => "Commande de fournisseur modifié avec succès."

            ));



            /* ---------------------- USER LOG ---------------------- */

            saveUserLog("Modification de commande de fournisseur ( <b>".$code_commande."</b> )");

            /* ---------------------- -------- ---------------------- */



            redirect("/commande/details/".$this->input->post("id_commande"), "refresh");

        }

        else

        {

            $commande = $this->db->where("id_commande", $id)->get("commande")->row();

            $data = array(

                "fournisseurs"  => $this->db->where("display", 1)->get("fournisseur")->result_array(),

                "commande"         => $commande,

                "commande_details" => $this->db->query("SELECT cd.*, p.full_name AS produit, p.code_produit, p.image, c.full_name AS categorie, sc.full_name AS sub_categorie FROM commande_details cd LEFT JOIN produit p ON cd.id_produit = p.id_produit LEFT JOIN categorie c ON c.id_categorie = p.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie WHERE cd.id_commande = ".$id)->result_array(),

                "fournisseur"      => $this->db->where("id_fournisseur", $commande->id_fournisseur)->get("fournisseur")->row(),

                /* ----------------------------------- */

                "title"     => "Commandes de Fournisseurs",

                "view"      => "commande/modifier",

                "active"    => "AC-CMD"

                /* ----------------------------------- */

            );

            $this->load->view("template", $data);

        }

    }



    public function supprimer()

    {

        CheckAdmin();



        $id_commande = $this->input->post("id_commande");

        if(!empty($id_commande))

        {

            $achats = $this->db->where("id_commande", $id_commande)->get("achat")->num_rows();



            if( $achats > 0 )

            {

                $this->session->set_flashdata("warning", array(

                    "title" => "Alerte !",

                    "message" => "Vous ne pouvez pas supprimer cette commande. Il est liée avec une Achat."

                ));



                redirect("/commande", "refresh");

            }



            /* ---------------------- USER LOG ---------------------- */

            saveUserLog("Suppression de commande de fournisseur ( <b>".$this->db->where("id_commande", $id_commande)->get("commande")->row()->code_commande."</b> )");

            /* ---------------------- -------- ---------------------- */



            $this->db->where("id_commande", $id_commande);

            $this->db->delete("commande");



            $this->session->set_flashdata("message", array(

                "title" => "Succès!",

                "message" => "Commande de fournisseur supprimé avec succès."

            ));

        }



        redirect("/commande", "refresh");

    }



    public function bon_commande($id)

    {

        $commande = $this->db->query("SELECT c.*, u.full_name AS utilisateur, u.role FROM commande c LEFT JOIN `user` u ON u.id_user = c.id_user WHERE c.id_commande = ".$id)->row();

        $data = array(

            "commande"         => $commande,

            "commande_details" => $this->db->query("SELECT cd.*, p.full_name AS produit, p.code_produit, p.image, p.id_categorie, p.id_sub_categorie, c.full_name AS categorie, sc.full_name AS sub_categorie FROM commande_details cd LEFT JOIN produit p ON cd.id_produit = p.id_produit LEFT JOIN categorie c ON c.id_categorie = p.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie WHERE cd.id_commande = ".$id)->result_array(),

            "adresse"          => $this->db->where("id_commande", $id)->get("adresse")->row(),

            "info"             => $this->db->get("information")->row()

        );

        $this->load->view("commande/bon_commande", $data);



        $html = $this->output->get_output();



        $this->load->library('pdf');

        $this->dompdf->loadHtml($html);

        $this->dompdf->setPaper('A4', 'portrait');

        $this->dompdf->render();

        $this->dompdf->stream("BON DE COMMANDE - FOURNISSEUR - ".$commande->code_commande.".pdf", array("Attachment"=>0));

    }

}

