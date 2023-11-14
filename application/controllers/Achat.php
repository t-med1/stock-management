<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Achat extends CI_Controller
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
            "achats"  => $this->db->query("SELECT a.*, f.full_name AS fournisseur, u.full_name AS utilisateur, u.role FROM achat a LEFT JOIN `user` u ON u.id_user = a.id_user LEFT JOIN fournisseur f ON f.id_fournisseur = a.id_fournisseur WHERE a.date_achat BETWEEN '".$debut."' AND '".$fin."'")->result_array(),
            "date_debut" => $debut,
            "date_fin"  => $fin,
            /* ----------------------------------- */
            "title"     => "Achats",
            "view"      => "achat/liste",
            "active"    => "AC"
            /* ----------------------------------- */
        );
        $this->load->view("template", $data);
	}

    public function checkCodeExists($ignore = null)
    {
        $code = $this->input->post("code_achat");
        if(!empty($code)) {
            echo json_encode(checkCodeExists($code, "achat", $ignore) ? "EXISTS" : "NOT");
        }
        else { echo json_encode("NOT"); }
    }

    public function details($id)
	{
        $data = array(
            "achat"         => $this->db->query("SELECT a.*, u.full_name AS utilisateur, u.role, f.full_name AS fournisseur, c.code_commande FROM achat a LEFT JOIN fournisseur f ON f.id_fournisseur = a.id_fournisseur LEFT JOIN `user` u ON u.id_user = a.id_user LEFT JOIN commande c ON c.id_commande = a.id_commande WHERE a.id_achat = ".$id)->row(),
            "achat_details" => $this->db->query("SELECT ad.*, p.full_name AS produit, p.type, p.code_produit, p.image, p.id_categorie, p.id_sub_categorie, c.full_name AS categorie, sc.full_name AS sub_categorie FROM achat_details ad LEFT JOIN produit p ON ad.id_produit = p.id_produit LEFT JOIN categorie c ON c.id_categorie = p.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie WHERE ad.id_achat = ".$id)->result_array(),
            "adresse"       => $this->db->where("id_achat", $id)->get("adresse")->row(),
            /* ----------------------------------- */
            "title"     => "Achats",
            "view"      => "achat/details",
            "active"    => "AC"
            /* ----------------------------------- */
        );
        $this->load->view("template", $data);
	}

    public function ajouter($id_commande = null)
	{
        $code_achat = $this->input->post("code_achat");
        $id_commande_input = $this->input->post("id_commande");
        if(!empty($code_achat))
        {
            $this->db->insert("achat", array(
                "id_fournisseur"    => $this->input->post("id_fournisseur"),
                "id_transport"    => $this->input->post("id_transport"),
                "num_expedition"    => $this->input->post("num_expedition"),
                "num_bon_avoir"    => $this->input->post("num_bon_avoir"),
                "id_commande"       => !empty($id_commande_input) ? $id_commande_input : null,
                "code_achat"        => getNewCode("A", "achat", true),
                "num_facture"       => $this->input->post("num_facture"),
                "id_user"           => $this->session->userdata("id_user"),
                "date_achat"        => $this->input->post("date_achat"),
                "remarque"          => $this->input->post("remarque"),
                "tva"               => $this->input->post("tva"),
                "frais"             => $this->input->post("frais")
            ));
            $id_achat = $this->db->insert_id();

            $fournisseur = $this->db->where("id_fournisseur", $this->input->post("id_fournisseur"))->get("fournisseur")->row();
            $this->db->insert("adresse", array(
                "id_achat"          => $id_achat,
                "id_fournisseur"    => $this->input->post("id_fournisseur"),
                "full_name"     => $fournisseur->full_name,
                "adresse"       => $fournisseur->adresse,
                "ville"         => $fournisseur->ville,
                "pays"          => $fournisseur->pays
            ));

            $produits = $this->input->post("id_produit");
            $produit_free = $this->input->post("id_produit_free");
            
            if(!empty($produits))
            {
                foreach ($produits as $val)
                {
                    $this->db->insert("achat_details", array(
                        "id_achat"      => $id_achat,
                        "id_produit"    => $val,
                        "quantite"      => $this->input->post("quantite_".$val),
                        "prix_achat"    => $this->input->post("prix_achat_".$val)
                    ));
                }
            }

            if(!empty($produit_free))
            {
                foreach ($produit_free as $val)
                {
                    $this->db->insert("achat_details", array(
                        "id_achat"      => $id_achat,
                        "id_produit"    => $val,
                        "quantite"      => $this->input->post("quantite_free_".$val),
                        "prix_achat"    => 0
                    ));
                }
            }

            $paiement_log = "";
            if($this->input->post("achat_paiement") > 0)
            {
                $methode = $this->input->post("achat_methode");

                $this->db->insert("paiement", array(
                    "id_achat"      => $id_achat,
                    "id_user"       => $this->session->userdata("id_user"),
                    "montant"       => $this->input->post("achat_paiement"),
                    "methode"       => $methode,
                    "type"          => 2, // 2 = achat
                    "date_paiement" => $this->input->post("date_achat")
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
                        "methode"       => $methode,
                        "type"          => 2, // 2 = achat
                    ));
                    $methode_log = " [ ".$this->input->post("cheque_reference")." - ".date("d/m/Y", strtotime($this->input->post("cheque_date")))." ]";
                }

                $paiement_log = " avec paiement ( <b>".number_format($this->input->post("achat_paiement"),2,"."," ")."</b> DH / <b>".getMethodePaiement($methode)."</b>".$methode_log." )";
            }

            $this->session->set_flashdata("message", array(
                "title" => "Succès!",
                "message" => "Achat enregistré avec succès."
            ));

            /* ---------------------- USER LOG ---------------------- */
            saveUserLog("Enregistrement d'achat ( <b>".$code_achat."</b> )".$paiement_log);
            /* ---------------------- -------- ---------------------- */

            redirect("/achat/details/".$id_achat, "refresh");
        }
        else
        {
            $commande = array();
            $commande_details = array();
            if($id_commande != null)
            {
                $commande         = $this->db->query("SELECT c.*, u.full_name AS utilisateur, u.role, f.full_name AS fournisseur FROM commande c LEFT JOIN fournisseur f ON f.id_fournisseur = c.id_fournisseur LEFT JOIN `user` u ON u.id_user = c.id_user WHERE c.id_commande = ".$id_commande)->row();
                $commande_details = $this->db->query("SELECT cd.*, p.full_name AS produit, p.code_produit, p.image, p.prix_achat, c.full_name AS categorie, sc.full_name AS sub_categorie FROM commande_details cd LEFT JOIN produit p ON cd.id_produit = p.id_produit LEFT JOIN categorie c ON c.id_categorie = p.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie WHERE cd.id_commande = ".$id_commande)->result_array();
            }

            $data = array(
                "fournisseurs"  => $this->db->where("display", 1)->get("fournisseur")->result_array(),
                "transports"  => $this->db->where("display", 1)->get("transport")->result_array(),
                "code_achat"    => getNewCode("A", "achat"),
                "commande"      => $commande,
                "commande_details" => $commande_details,
                /* ----------------------------------- */
                "title"     => "Achats",
                "view"      => "achat/ajouter",
                "active"    => "AC-ADD"
                /* ----------------------------------- */
            );
            $this->load->view("template", $data);
        }
	}

    public function modifier($id = null)
    {
        $code_achat = $this->input->post("code_achat");
        if(!empty($code_achat))
        {
            $achat = $this->db->where('code_achat', $code_achat)->get('achat')->row();

            $bon_avoir = $achat->bon_avoir ;
            $facture = $achat->facture;

            if(file_exists($_FILES['facture']['tmp_name']))
            {
                $mimetype = mime_content_type($_FILES['facture']['tmp_name']);
                if(in_array($mimetype, array('image/jpeg', 'image/gif', 'image/png', 'image/bmp', 'application/pdf')))
                {
                    $temp = $this->db->where('code_achat', $code_achat)->get('achat')->row()->facture;
                    $file = _UPLOADS_PATH_.$temp;
                    if(!empty($temp) && file_exists($file)) { unlink($file); }

                    $facture = "ACHAT-F-".str_replace('/', '', $achat->code_achat).'.'. pathinfo(basename($_FILES['facture']['name']), PATHINFO_EXTENSION);
                    move_uploaded_file($_FILES['facture']['tmp_name'], _UPLOADS_PATH_.$facture);
                }
            }

            if(file_exists($_FILES['bon_avoir']['tmp_name']))
            {
                $mimetype = mime_content_type($_FILES['bon_avoir']['tmp_name']);
                if(in_array($mimetype, array('image/jpeg', 'image/gif', 'image/png', 'image/bmp', 'application/pdf')))
                {
                    $temp = $this->db->where('code_achat', $code_achat)->get('achat')->row()->bon_avoir;
                    $file = _UPLOADS_PATH_.$temp;
                    if(!empty($temp) && file_exists($file)) { unlink($file); }

                    $bon_avoir = "ACHAT-AV-".str_replace('/', '', $achat->code_achat).'.'. pathinfo(basename($_FILES['bon_avoir']['name']), PATHINFO_EXTENSION);
                    move_uploaded_file($_FILES['bon_avoir']['tmp_name'], _UPLOADS_PATH_.$bon_avoir);
                }
            }

            $this->db->where("id_achat", $this->input->post("id_achat"));
            $this->db->update("achat", array(
                "id_fournisseur"    => $this->input->post("id_fournisseur"),
                "id_transport"    => $this->input->post("id_transport"),
                "num_expedition"    => $this->input->post("num_expedition"),
                "num_bon_avoir"    => $this->input->post("num_bon_avoir"),
                "bon_avoir"    => $bon_avoir,
                "code_achat"        => $code_achat,
                "num_facture"       => $this->input->post("num_facture"),
                "facture"       => $facture,
                "id_user"           => $this->session->userdata("id_user"),
                "date_achat"        => $this->input->post("date_achat"),
                "remarque"          => $this->input->post("remarque"),
                "tva"               => $this->input->post("tva"),
                "frais"             => $this->input->post("frais")
            ));

            $fournisseur = $this->db->where("id_fournisseur", $this->input->post("id_fournisseur"))->get("fournisseur")->row();
            $this->db->where("id_achat", $this->input->post("id_achat"));
            $this->db->update("adresse", array(
                "id_fournisseur"    => $this->input->post("id_fournisseur"),
                "full_name" => $fournisseur->full_name,
                "adresse"   => $fournisseur->adresse,
                "ville"     => $fournisseur->ville,
                "pays"      => $fournisseur->pays
            ));

            $this->db->where("id_achat", $this->input->post("id_achat"));
            $this->db->delete("achat_details");

            $produits = $this->input->post("id_produit");
            if(!empty($produits))
            {
                foreach ($produits as $val)
                {
                    $this->db->insert("achat_details", array(
                        "id_achat"      => $this->input->post("id_achat"),
                        "id_produit"    => $val,
                        "quantite"      => $this->input->post("quantite_".$val),
                        "prix_achat"    => $this->input->post("prix_achat_".$val)
                    ));
                }
            }

            $this->session->set_flashdata("message", array(
                "title" => "Succès!",
                "message" => "Achat modifié avec succès."
            ));

            /* ---------------------- USER LOG ---------------------- */
            saveUserLog("Modification d'achat ( <b>".$code_achat."</b> )");
            /* ---------------------- -------- ---------------------- */

            redirect("/achat/details/".$this->input->post("id_achat"), "refresh");
        }
        else
        {
            $achat = $this->db->where("id_achat", $id)->get("achat")->row();
            $data = array(
                "fournisseurs"  => $this->db->where("display", 1)->get("fournisseur")->result_array(),
                "transports"  => $this->db->where("display", 1)->get("transport")->result_array(),
                "achat"         => $achat,
                "achat_details" => $this->db->query("SELECT ad.*, p.full_name AS produit, p.code_produit, p.image, c.full_name AS categorie, sc.full_name AS sub_categorie FROM achat_details ad LEFT JOIN produit p ON ad.id_produit = p.id_produit LEFT JOIN categorie c ON c.id_categorie = p.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie WHERE ad.id_achat = ".$id)->result_array(),
                "fournisseur"  => $this->db->where("id_fournisseur", $achat->id_fournisseur)->get("fournisseur")->row(),
                /* ----------------------------------- */
                "title"     => "Achats",
                "view"      => "achat/modifier",
                "active"    => "AC"
                /* ----------------------------------- */
            );
            $this->load->view("template", $data);
        }
    }

    public function paiement($id)
    {
        $id_achat = $this->input->post("id_achat");
        if(!empty($id_achat))
        {
            if($this->input->post("achat_paiement") > 0)
            {
                $methode = $this->input->post("achat_methode");

                $this->db->insert("paiement", array(
                    "id_achat"      => $id_achat,
                    "id_user"       => $this->session->userdata("id_user"),
                    "montant"       => $this->input->post("achat_paiement"),
                    "methode"       => $methode,
                    "type"          => 2, // 2 = achat
                    "date_paiement" => $this->input->post("date_paiement")
                ));
                $id_paiement = $this->db->insert_id();

                if($methode == 2 || $methode == 3)
                {
                    $this->db->insert("cheque", array(
                        "id_paiement"   => $id_paiement,
                        "montant"       => $this->input->post("cheque_montant"),
                        "date_cheque"   => $this->input->post("cheque_date"),
                        "reference"     => $this->input->post("cheque_reference"),
                        "methode"       => $methode,
                        "type"          => 2, // 2 = achat
                    ));
                }

                $this->session->set_flashdata("message", array(
                    "title" => "Succès!",
                    "message" => "Paiement enregistré avec succès."
                ));

                /* ---------------------- USER LOG ---------------------- */
                $more_log = ($methode == 2 || $methode == 3) ? " [ ".$this->input->post("cheque_reference")." - ".date("d/m/Y", strtotime($this->input->post("cheque_date")))." ]" : "";
                saveUserLog("Enregistrement de paiement ( <b>".number_format($this->input->post("achat_paiement"),2,"."," ")."</b> DH / <b>".getMethodePaiement($methode)."</b>".$more_log." ) 
                            d'achat ( <b>".$this->db->where("id_achat", $id_achat)->get("achat")->row()->code_achat."</b> )");
                /* ---------------------- -------- ---------------------- */

                redirect("/achat/paiement/".$this->input->post("id_achat"), "refresh");
            }
            else
            {
                redirect("/achat/paiement/".$id, "refresh");
            }
        }
        else
        {
            $data = array(
                "achat"  => $this->db->query("SELECT a.*, u.full_name AS utilisateur, u.role, f.full_name AS fournisseur FROM achat a LEFT JOIN `user` u ON u.id_user = a.id_user LEFT JOIN fournisseur f ON f.id_fournisseur = a.id_fournisseur WHERE a.id_achat = ".$id)->row(),
                "paiements" => $this->db->query("SELECT p.*, u.full_name AS utilisateur, u.role FROM paiement p LEFT JOIN `user` u ON u.id_user = p.id_user WHERE p.id_achat = ".$id)->result_array(),
                "exonerations_reste" => $this->db->query("SELECT ex.*, u.full_name AS utilisateur, u.role FROM exoneration_reste ex LEFT JOIN `user` u ON u.id_user = ex.id_user WHERE ex.id_achat = ".$id)->result_array(),
                /* ----------------------------------- */
                "title"     => "Achats - Paiements",
                "view"      => "achat/paiement",
                "active"    => "AC"
                /* ----------------------------------- */
            );
            $this->load->view("template", $data);
        }
    }

    public function p_supprimer()
    {
        $id_paiement = $this->input->post("id_paiement");
        if(!empty($id_paiement))
        {
            /* ---------------------- USER LOG ---------------------- */
            $paiement   = $this->db->where("id_paiement", $id_paiement)->get("paiement")->row();
            $cheque     = $this->db->where("id_paiement", $id_paiement)->get("cheque")->row();
            $more_log  = ($paiement->methode == 2 || $paiement->methode == 3) ? " [".$cheque->reference." - ".date("d/m/Y", strtotime($cheque->date_cheque))."]" : "";
            saveUserLog("Suppression de paiement ( <b>".number_format($paiement->montant,2,"."," ")."</b> DH / <b>".getMethodePaiement($paiement->methode)."</b>".$more_log." ) 
                            d'achat ( <b>".$this->db->where("id_achat", $paiement->id_achat)->get("achat")->row()->code_achat."</b> )");
            /* ---------------------- -------- ---------------------- */

            $this->db->where("id_paiement", $id_paiement);
            $this->db->delete("paiement");

            $this->session->set_flashdata("message", array(
                "title" => "Succès!",
                "message" => "Paiement supprimé avec succès."
            ));

            redirect("/achat/paiement/".$paiement->id_achat, "refresh");
        }

        redirect("/achat", "refresh");
    }

    public function fix_reste()
    {
        $id_achat = $this->input->post("id_achat");
        if(!empty($id_achat))
        {
            $reste = number_format(getAchatTotal($id_achat)["total_reste"],2,'.','');

            $this->db->insert("exoneration_reste", array(
                "id_achat"      => $id_achat,
                "id_user"       => $this->session->userdata("id_user"),
                "montant"       => $reste,
                "type"          => 2 // Achat
            ));

            $this->session->set_flashdata("message", array(
                "title" => "Succès!",
                "message" => "Exonération du reste enregistré avec succès."
            ));

            /* ---------------------- USER LOG ---------------------- */
            $achat = $this->db->where("id_achat", $id_achat)->get("achat")->row();
            saveUserLog("Exonération du reste (<b>".$reste."</b>) d'achat (<b>".$achat->code_achat."</b>)");
            /* ---------------------- -------- ---------------------- */

            redirect("/achat/paiement/".$id_achat, "refresh");
        }

        redirect("/achat", "refresh");
    }

    public function fix_reste_supprimer()
    {
        $id_exoneration_reste = $this->input->post("id_exoneration_reste");
        if(!empty($id_exoneration_reste))
        {
            /* ---------------------- USER LOG ---------------------- */
            $exoneration_reste = $this->db->where("id_exoneration_reste", $id_exoneration_reste)->get("exoneration_reste")->row();
            $achat = $this->db->where("id_achat", $exoneration_reste->id_achat)->get("achat")->row();
            saveUserLog("Suppression d'Exonération du reste (<b>".$this->input->post("reste")."</b>) d'achat (<b>".$achat->code_achat."</b>)");
            /* ---------------------- -------- ---------------------- */

            $this->db->where("id_exoneration_reste", $id_exoneration_reste);
            $this->db->delete("exoneration_reste");

            $this->session->set_flashdata("message", array(
                "title" => "Succès!",
                "message" => "Exonération du reste supprimé avec succès."
            ));

            redirect("/achat/paiement/".$exoneration_reste->id_achat, "refresh");
        }

        redirect("/achat", "refresh");
    }

    public function supprimer()
    {
        $id_achat = $this->input->post("id_achat");
        if(!empty($id_achat))
        {
            /* ---------------------- USER LOG ---------------------- */
            saveUserLog("Suppression d'achat ( <b>".$this->db->where("id_achat", $id_achat)->get("achat")->row()->code_achat."</b> )");
            /* ---------------------- -------- ---------------------- */

            $this->db->where("id_achat", $id_achat);
            $this->db->delete("achat");

            $this->session->set_flashdata("message", array(
                "title" => "Succès!",
                "message" => "Achat supprimé avec succès."
            ));
        }

        redirect("/achat", "refresh");
    }

    public function bon_achat($id)
    {
        $achat = $this->db->query("SELECT ac.*, u.full_name AS utilisateur, u.role FROM achat ac LEFT JOIN `user` u ON u.id_user = ac.id_user WHERE ac.id_achat = ".$id)->row();
        $data = array(
            "achat"         => $achat,
            "achat_details" => $this->db->query("SELECT cd.*, p.full_name AS produit, p.code_produit, ct.full_name AS categorie FROM achat_details cd LEFT JOIN produit p ON cd.id_produit = p.id_produit LEFT JOIN categorie ct ON ct.id_categorie = p.id_categorie WHERE cd.id_achat = ".$id)->result_array(),
            "adresse"       => $this->db->where("id_achat", $id)->get("adresse")->row(),
            "info"          => $this->db->get("information")->row()
        );
        $this->load->view("achat/bon_achat", $data);

        $html = $this->output->get_output();

        $this->load->library('pdf');
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'portrait');
        $this->dompdf->render();
        $this->dompdf->stream("BON D'ACHAT - ".$achat->code_achat.".pdf", array("Attachment"=>0));
    }
}
