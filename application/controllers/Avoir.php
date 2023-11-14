<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Avoir extends CI_Controller
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
            "avoirs" => $this->db->query("SELECT a.*, u.full_name AS utilisateur, u.role, cl.full_name AS client FROM avoir a LEFT JOIN `user` u ON u.id_user = a.id_user LEFT JOIN client cl ON cl.id_client = a.id_client WHERE a.date_avoir BETWEEN '".$debut."' AND '".$fin."'")->result_array(),
            "date_debut" => $debut,
            "date_fin"  => $fin,
            /* ----------------------------------- */
            "title"     => "Bons d'Avoir",
            "view"      => "avoir/liste",
            "active"    => "AV"
            /* ----------------------------------- */
        );
        $this->load->view("template", $data);
	}

    public function checkCodeExists($ignore = null)
    {
        $code = $this->input->post("code_avoir");
        if(!empty($code)) {
            echo json_encode(checkCodeExists($code, "avoir", $ignore) ? "EXISTS" : "NOT");
        }
        else { echo json_encode("NOT"); }
    }

    public function details($id)
	{
        $data = array(
            "avoir"             => $this->db->query("SELECT a.*, v.code_vente, u.full_name AS utilisateur, u.role, cl.full_name AS client FROM avoir a LEFT JOIN vente v ON v.id_vente = a.id_vente LEFT JOIN `user` u ON u.id_user = a.id_user LEFT JOIN client cl ON cl.id_client = a.id_client WHERE a.id_avoir = ".$id)->row(),
            "avoir_details_in"  => $this->db->query("SELECT adi.*, p.full_name AS produit, p.type, p.code_produit, p.image, p.id_categorie, p.id_sub_categorie, ct.full_name AS categorie, sc.full_name AS sub_categorie FROM avoir_details_in adi LEFT JOIN produit p ON adi.id_produit = p.id_produit LEFT JOIN categorie ct ON ct.id_categorie = p.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie WHERE adi.id_avoir = ".$id)->result_array(),
            "avoir_details_out" => $this->db->query("SELECT ado.*, p.full_name AS produit, p.type, p.code_produit, p.image, p.id_categorie, p.id_sub_categorie, ct.full_name AS categorie, sc.full_name AS sub_categorie FROM avoir_details_out ado LEFT JOIN produit p ON ado.id_produit = p.id_produit LEFT JOIN categorie ct ON ct.id_categorie = p.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie WHERE ado.id_avoir = ".$id)->result_array(),
            "adresse"           => $this->db->where("id_avoir", $id)->get("adresse")->row(),
            /* ----------------------------------- */
            "title"     => "Bons d'Avoir",
            "view"      => "avoir/details",
            "active"    => "AV"
            /* ----------------------------------- */
        );
        $this->load->view("template", $data);
	}

    public function ajouter()
	{
        $code_avoir = $this->input->post("code_avoir");
        $id_vente = $this->input->post("id_vente");
        if(!empty($code_avoir))
        {
            if(!empty($id_vente)) {
                $id_client = $this->db->where("id_vente", $id_vente)->get("vente")->row()->id_client;
            }
            else {
                $id_client = $this->input->post("id_client");
            }

            $this->db->insert("avoir", array(
                "id_client"         => $id_client,
                "code_avoir"        => getNewCode("BA", "avoir", true),
                "id_user"           => $this->session->userdata("id_user"),
                "id_vente"          => !empty($id_vente) ? $id_vente : null,
                "date_avoir"        => $this->input->post("date_avoir"),
                "remarque"          => $this->input->post("remarque"),
                "tva"               => $this->input->post("tva")
            ));
            $id_avoir = $this->db->insert_id();

            $client = $this->db->where("id_client", $id_client)->get("client")->row();
            $this->db->insert("adresse", array(
                "id_avoir"      => $id_avoir,
                "id_client"     => $id_client,
                "ice"           => $client->ice,
                "full_name"     => $client->full_name,
                "adresse"       => $this->input->post("adresse"),
                "ville"         => ucfirst($this->input->post("ville")),
                "pays"          => $this->input->post("pays")
            ));

            $produits = $this->input->post("id_produit");
            $produits_free = $this->input->post("id_produit_free");
            $produits_back = $this->input->post("id_produit_back");
            $produits_broken = $this->input->post("id_produit_broken");

            if(!empty($produits))
            {
                foreach ($produits as $val)
                {
                    $this->db->insert("avoir_details_out", array(
                        "id_avoir"   => $id_avoir,
                        "id_produit"    => $val,
                        "quantite"      => $this->input->post("quantite_".$val),
                        "prix_vente"    => $this->input->post("prix_vente_".$val),
                        "remise"        => $this->input->post("remise_".$val),
                        "remise_dh"     => $this->input->post("remise_dh_".$val)
                    ));
                }
            }
            if(!empty($produits_free))
            {
                foreach ($produits_free as $val)
                {
                    $this->db->insert("avoir_details_out", array(
                        "id_avoir"      => $id_avoir,
                        "id_produit"    => $val,
                        "quantite"      => $this->input->post("quantite_free_".$val),
                        "prix_vente"    => 0,
                        "remise"        => 0,
                        "remise_dh"     => 0
                    ));
                }
            }
            if(!empty($produits_back))
            {
                foreach ($produits_back as $val)
                {

                    $this->db->insert("avoir_details_in", array(
                        "id_avoir"      => $id_avoir,
                        "id_produit"    => $this->input->post("id_produit_back_".$val),
                        "quantite"      => $this->input->post("quantite_back_".$val),
                        "prix_vente"    => $this->input->post("prix_vente_back_".$val),
                        "remise"        => $this->input->post("remise_back_".$val),
                        "remise_dh"     => $this->input->post("remise_dh_back_".$val),
                        "etat"          => 1
                    ));
                }
            }
            if(!empty($produits_broken))
            {
                foreach ($produits_broken as $val)
                {
                    $this->db->insert("avoir_details_in", array(
                        "id_avoir"      => $id_avoir,
                        "id_produit"    => $val,
                        "quantite"      => $this->input->post("quantite_broken_".$val),
                        "prix_vente"    => $this->input->post("prix_vente_broken_".$val),
                        "remise"        => $this->input->post("remise_broken_".$val),
                        "remise_dh"     => $this->input->post("remise_dh_broken_".$val),
                        "etat"          => 0
                    ));
                }
            }

            $paiement_log = "";
            if($this->input->post("avoir_paiement") > 0)
            {
                $methode = $this->input->post("avoir_methode");

                $this->db->insert("paiement", array(
                    "id_avoir"      => $id_avoir,
                    "id_user"       => $this->session->userdata("id_user"),
                    "montant"       => $this->input->post("avoir_paiement"),
                    "methode"       => $methode,
                    "type"          => $this->input->post("total_retour") >= 0 ? 1 : 3, // 1 = like sale
                    "date_paiement" => $this->input->post("date_avoir"),
                    "type_avance"   => $methode == 5 ? $this->input->post("type_avance") : null
                ));
                $id_paiement = $this->db->insert_id();

                $methode_log = "";
                if($methode == 2 || $methode == 3)
                {
                    $this->db->insert("cheque", array(
                        "id_paiement"   => $id_paiement,
                        "montant"       => $this->input->post("cheque_montant"),
                        "date_cheque"   => $this->input->post("cheque_date"),
                        "reference"     => $this->input->post("cheque_reference"),
                        "remarque"      => $this->input->post("cheque_remarque"),
                        "methode"       => $methode,
                        "type"          => $this->input->post("total_retour") >= 0 ? 1 : 3, // 1 = like sale
                    ));
                    $methode_log = " [ ".$this->input->post("cheque_reference")." - ".date("d/m/Y", strtotime($this->input->post("cheque_date")))." ]";
                }

                $paiement_log = " avec ".($this->input->post("total_retour") > 0 ? "paiement" : "réglement")." ( <b>".number_format($this->input->post("avoir_paiement"),2,"."," ")."</b> DH / 
                                <b>".getMethodePaiement($methode)."</b>".$methode_log." )";
            }

            $this->session->set_flashdata("message", array(
                "title" => "Succès!",
                "message" => "Bon d'Avoir enregistrée avec succès."
            ));

            /* ---------------------- USER LOG ---------------------- */
            saveUserLog("Enregistrement de Bon d'Avoir ( <b>".$code_avoir."</b> )".$paiement_log);
            /* ---------------------- -------- ---------------------- */

            redirect("/avoir/details/".$id_avoir, "refresh");
        }
        else
        {
            $data = array(
                "clients"       => $this->db->where("display", 1)->get("client")->result_array(),
                "code_avoir"    => getNewCode("BA", "avoir"),
                /* ----------------------------------- */
                "title"     => "Bons d'Avoir",
                "view"      => "avoir/ajouter",
                "active"    => "AV-ADD"
                /* ----------------------------------- */
            );
            $this->load->view("template", $data);
        }
	}

    public function modifier($id = null)
    {
        $code_avoir = $this->input->post("code_avoir");
        if(!empty($code_avoir))
        {
            $this->db->where("id_avoir", $this->input->post("id_avoir"));
            $this->db->update("avoir", array(
                "id_client"         => $this->input->post("id_client"),
                "code_avoir"        => $code_avoir,
                "id_user"           => $this->session->userdata("id_user"),
                "date_avoir"        => $this->input->post("date_avoir"),
                "remarque"          => $this->input->post("remarque"),
                "tva"               => $this->input->post("tva")
            ));

            $client = $this->db->where("id_client", $this->input->post("id_client"))->get("client")->row();
            $this->db->where("id_avoir", $this->input->post("id_avoir"));
            $this->db->update("adresse", array(
                "id_client"     => $this->input->post("id_client"),
                "ice"           => $client->ice,
                "full_name"     => $client->full_name,
                "adresse"       => $this->input->post("adresse"),
                "ville"         => ucfirst($this->input->post("ville")),
                "pays"          => $this->input->post("pays")
            ));

            $this->db->where("id_avoir", $this->input->post("id_avoir"));
            $this->db->delete("avoir_details_out");
            $this->db->where("id_avoir", $this->input->post("id_avoir"));
            $this->db->delete("avoir_details_in");

            $produits = $this->input->post("id_produit");
            $produits_free = $this->input->post("id_produit_free");
            $produits_back = $this->input->post("id_produit_back");
            $produits_broken = $this->input->post("id_produit_broken");

            if(!empty($produits))
            {
                foreach ($produits as $val)
                {
                    $this->db->insert("avoir_details_out", array(
                        "id_avoir"      => $this->input->post("id_avoir"),
                        "id_produit"    => $val,
                        "quantite"      => $this->input->post("quantite_".$val),
                        "prix_vente"    => $this->input->post("prix_vente_".$val),
                        "remise"        => $this->input->post("remise_".$val),
                        "remise_dh"     => $this->input->post("remise_dh_".$val)
                    ));
                }
            }
            if(!empty($produits_free))
            {
                foreach ($produits_free as $val)
                {
                    $this->db->insert("avoir_details_out", array(
                        "id_avoir"      => $this->input->post("id_avoir"),
                        "id_produit"    => $val,
                        "quantite"      => $this->input->post("quantite_free_".$val),
                        "prix_vente"    => 0,
                        "remise"        => 0,
                        "remise_dh"     => 0
                    ));
                }
            }
            if(!empty($produits_back))
            {
                foreach ($produits_back as $val)
                {
                    $this->db->insert("avoir_details_in", array(
                        "id_avoir"      => $this->input->post("id_avoir"),
                        "id_produit"    => $val,
                        "quantite"      => $this->input->post("quantite_back_".$val),
                        "prix_vente"    => $this->input->post("prix_vente_back_".$val),
                        "remise"        => $this->input->post("remise_back_".$val),
                        "remise_dh"     => $this->input->post("remise_dh_back_".$val),
                        "etat"          => 1
                    ));
                }
            }
            if(!empty($produits_broken))
            {
                foreach ($produits_broken as $val)
                {
                    $this->db->insert("avoir_details_in", array(
                        "id_avoir"      => $this->input->post("id_avoir"),
                        "id_produit"    => $val,
                        "quantite"      => $this->input->post("quantite_broken_".$val),
                        "prix_vente"    => $this->input->post("prix_vente_broken_".$val),
                        "remise"        => $this->input->post("remise_broken_".$val),
                        "remise_dh"     => $this->input->post("remise_dh_broken_".$val),
                        "etat"          => 0
                    ));
                }
            }

            $this->session->set_flashdata("message", array(
                "title" => "Succès!",
                "message" => "Bon d'Avoir modifié avec succès."
            ));

            /* ---------------------- USER LOG ---------------------- */
            saveUserLog("Modification de Bons d'Avoir ( <b>".$code_avoir."</b> )");
            /* ---------------------- -------- ---------------------- */

            redirect("/avoir/details/".$this->input->post("id_avoir"), "refresh");
        }
        else
        {
            $avoir = $this->db->where("id_avoir", $id)->get("avoir")->row();
            $data = array(
                "clients"       => $this->db->where("display", 1)->get("client")->result_array(),
                "avoir"             => $avoir,
                "avoir_details_in"  => $this->db->query("SELECT adi.*, p.full_name AS produit, p.code_produit, p.image, ct.full_name AS categorie, sc.full_name AS sub_categorie FROM avoir_details_in adi LEFT JOIN produit p ON adi.id_produit = p.id_produit LEFT JOIN categorie ct ON ct.id_categorie = p.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie WHERE adi.id_avoir = ".$id)->result_array(),
                "avoir_details_out" => $this->db->query("SELECT ado.*, p.full_name AS produit, p.code_produit, p.image, p.description, ct.full_name AS categorie, sc.full_name AS sub_categorie FROM avoir_details_out ado LEFT JOIN produit p ON ado.id_produit = p.id_produit LEFT JOIN categorie ct ON ct.id_categorie = p.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie WHERE ado.id_avoir = ".$id)->result_array(),
                "client"       => $this->db->where("id_client", $avoir->id_client)->get("client")->row(),
                /* ----------------------------------- */
                "title"     => "Bons d'Avoir",
                "view"      => "avoir/modifier",
                "active"    => "AV"
                /* ----------------------------------- */
            );
            $this->load->view("template", $data);
        }
    }

    public function paiement($id)
    {
        $id_avoir = $this->input->post("id_avoir");
        if(!empty($id_avoir))
        {
            if($this->input->post("avoir_paiement") > 0)
            {
                $methode = $this->input->post("avoir_methode");

                $this->db->insert("paiement", array(
                    "id_avoir"      => $id_avoir,
                    "id_user"       => $this->session->userdata("id_user"),
                    "montant"       => $this->input->post("avoir_paiement"),
                    "methode"       => $methode,
                    "type"          => $this->input->post("avoir_total") >= 0 ? 1 : 3, // 1 = like sale
                    "date_paiement" => $this->input->post("date_paiement"),
                    "type_avance"   => $methode == 5 ? $this->input->post("type_avance") : null
                ));
                $id_paiement = $this->db->insert_id();

                if($methode == 2 || $methode == 3)
                {
                    $this->db->insert("cheque", array(
                        "id_paiement"   => $id_paiement,
                        "montant"       => $this->input->post("cheque_montant"),
                        "date_cheque"   => $this->input->post("cheque_date"),
                        "reference"     => $this->input->post("cheque_reference"),
                        "remarque"      => $this->input->post("cheque_remarque"),
                        "methode"       => $methode,
                        "type"          => $this->input->post("avoir_total") >= 0 ? 1 : 3, // 1 = like sale
                    ));
                }

                $this->session->set_flashdata("message", array(
                    "title" => "Succès!",
                    "message" => "Paiement enregistré avec succès."
                ));

                /* ---------------------- USER LOG ---------------------- */
                $more_log = ($methode == 2 || $methode == 3) ? " [ ".$this->input->post("cheque_reference")." - ".date("d/m/Y", strtotime($this->input->post("cheque_date")))." ]" : "";
                saveUserLog("Enregistrement de ".($this->input->post("avoir_total") > 0 ? "paiement" : "réglement")." ( <b>".number_format($this->input->post("avoir_paiement"),2,"."," ")."</b> DH / <b>".getMethodePaiement($methode)."</b>".$more_log." ) 
                            de Bon d'Avoir ( <b>".$this->db->where("id_avoir", $id_avoir)->get("avoir")->row()->code_avoir."</b> )");
                /* ---------------------- -------- ---------------------- */

                redirect("/avoir/paiement/".$this->input->post("id_avoir"), "refresh");
            }
            else
            {
                redirect("/avoir/paiement/".$id, "refresh");
            }
        }
        else
        {
            $data = array(
                "avoir"  => $this->db->query("SELECT a.*, u.full_name AS utilisateur, u.role, cl.full_name AS client FROM avoir a LEFT JOIN `user` u ON u.id_user = a.id_user LEFT JOIN client cl ON cl.id_client = a.id_client WHERE a.id_avoir = ".$id)->row(),
                "paiements" => $this->db->query("SELECT p.*, u.full_name AS utilisateur, u.role FROM paiement p LEFT JOIN `user` u ON u.id_user = p.id_user WHERE p.id_avoir = ".$id)->result_array(),
                /* ----------------------------------- */
                "title"     => "Bons d'Avoir - Paiements",
                "view"      => "avoir/paiement",
                "active"    => "AV"
                /* ----------------------------------- */
            );
            $this->load->view("template", $data);
        }
    }

    public function p_supprimer()
    {
        CheckAdmin();

        $id_paiement = $this->input->post("id_paiement");
        if(!empty($id_paiement))
        {
            /* ---------------------- USER LOG ---------------------- */
            $paiement   = $this->db->where("id_paiement", $id_paiement)->get("paiement")->row();
            $cheque     = $this->db->where("id_paiement", $id_paiement)->get("cheque")->row();
            $more_log  = ($paiement->methode == 2 || $paiement->methode == 3) ? " [".$cheque->reference." - ".date("d/m/Y", strtotime($cheque->date_cheque))."]" : "";
            saveUserLog("Suppression de ".(getAvoirTotal($paiement->id_avoir)["total_avoir"] > 0 ? "paiement" : "réglement")." ( <b>".number_format($paiement->montant,2,"."," ")."</b> DH / <b>".getMethodePaiement($paiement->methode)."</b>".$more_log." ) 
                            de Bon d'Avoir ( <b>".$this->db->where("id_avoir", $paiement->id_avoir)->get("avoir")->row()->code_avoir."</b> )");
            /* ---------------------- -------- ---------------------- */

            $this->db->where("id_paiement", $id_paiement);
            $this->db->delete("paiement");

            $this->session->set_flashdata("message", array(
                "title" => "Succès!",
                "message" => "Paiement supprimé avec succès."
            ));

            redirect("/avoir/paiement/".$paiement->id_avoir, "refresh");
        }

        redirect("/avoir", "refresh");
    }

    public function supprimer()
    {
        CheckAdmin();

        $id_avoir = $this->input->post("id_avoir");
        if(!empty($id_avoir))
        {
            /* ---------------------- USER LOG ---------------------- */
            saveUserLog("Suppression de Bon d'Avoir ( <b>".$this->db->where("id_avoir", $id_avoir)->get("avoir")->row()->code_avoir."</b> )");
            /* ---------------------- -------- ---------------------- */
            
            $this->db->where("id_avoir", $id_avoir);
            $this->db->delete("avoir");

            $this->session->set_flashdata("message", array(
                "title" => "Succès!",
                "message" => "Bon d'Avoir supprimé avec succès."
            ));
        }

        redirect("/avoir", "refresh");
    }

    public function bon_avoir($id)
    {
        $avoir = $this->db->query("SELECT a.*, u.full_name AS utilisateur, u.role FROM avoir a LEFT JOIN `user` u ON u.id_user = a.id_user WHERE a.id_avoir = ".$id)->row();
        $data = array(
            "avoir"             => $avoir,
            "avoir_details_in"  => $this->db->query("SELECT adi.*, p.full_name AS produit, p.code_produit, ct.full_name AS categorie, sc.full_name AS sub_categorie FROM avoir_details_in adi LEFT JOIN produit p ON adi.id_produit = p.id_produit LEFT JOIN categorie ct ON ct.id_categorie = p.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie WHERE adi.id_avoir = ".$id)->result_array(),
            "avoir_details_out" => $this->db->query("SELECT ado.*, p.full_name AS produit, p.code_produit, ct.full_name AS categorie, sc.full_name AS sub_categorie FROM avoir_details_out ado LEFT JOIN produit p ON ado.id_produit = p.id_produit LEFT JOIN categorie ct ON ct.id_categorie = p.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie WHERE ado.id_avoir = ".$id)->result_array(),
            "paiements"         => $this->db->query("SELECT p.* FROM paiement p LEFT JOIN cheque c ON c.id_paiement = p.id_paiement WHERE (c.paid IS NULL OR c.paid != 2) AND p.id_avoir = ".$id)->result_array(),
            "adresse"           => $this->db->where("id_avoir", $id)->get("adresse")->row(),
            "info"              => $this->db->get("information")->row()
        );
        $this->load->view("avoir/bon_avoir", $data);

        $html = $this->output->get_output();
        $this->load->library('pdf');
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'portrait');
        $this->dompdf->render();
        $this->dompdf->stream("BON D'AVOIR - ".$avoir->code_avoir.".pdf", array("Attachment"=>0));
    }
}
