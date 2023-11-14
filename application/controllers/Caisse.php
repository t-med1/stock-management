<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Caisse extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        CheckLogin();
        CheckCaisse();
        CheckAdmin();
    }

    public function index()
    {
        $this->accueil();
    }

    public function accueil()
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
            "paiements_clients"         => $this->db->query("SELECT p.*, u.role, u.full_name AS utilisateur, v.code_vente, a.code_avoir, cv.id_client AS id_client_vente, cv.full_name AS client_vente, ca.id_client AS id_client_avoir, ca.full_name AS client_avoir 
                                            FROM paiement p 
                                            LEFT JOIN `user` u ON u.id_user = p.id_user    
                                            LEFT JOIN vente v ON v.id_vente = p.id_vente 
                                            LEFT JOIN avoir a ON a.id_avoir = p.id_avoir 
                                            LEFT JOIN client cv ON cv.id_client = v.id_client 
                                            LEFT JOIN client ca ON ca.id_client = a.id_client 
                                            WHERE (p.methode IN (1, 2, 3) OR (p.methode = 5 AND p.type_avance = 1))
                                            AND ( (p.id_vente IS NOT NULL OR p.id_avoir IS NOT NULL) AND p.type = 1 ) 
                                            AND p.date_paiement BETWEEN '".$debut."' AND '".$fin."'")->result_array(),
            "paiements_achats_reglements" => $this->db->query("SELECT p.*, u.role, u.full_name AS utilisateur, ac.code_achat, a.code_avoir, f.id_fournisseur, f.full_name AS fournisseur, ca.id_client AS id_client_avoir, ca.full_name AS client_avoir 
                                            FROM paiement p 
                                            LEFT JOIN `user` u ON u.id_user = p.id_user    
                                            LEFT JOIN achat ac ON ac.id_achat = p.id_achat 
                                            LEFT JOIN avoir a ON a.id_avoir = p.id_avoir 
                                            LEFT JOIN fournisseur f ON f.id_fournisseur = ac.id_fournisseur 
                                            LEFT JOIN client ca ON ca.id_client = a.id_client 
                                            WHERE p.methode = 1 
                                            AND ( (p.id_achat IS NOT NULL OR p.id_avoir IS NOT NULL) AND (p.type = 2 OR p.type= 3) ) 
                                            AND p.date_paiement BETWEEN '".$debut."' AND '".$fin."'")->result_array(),
            "charges"           => $this->db->query("SELECT c.*, u.role, u.full_name AS utilisateur FROM charge c LEFT JOIN `user` u ON u.id_user = c.id_user WHERE c.methode = 1 AND c.date_charge BETWEEN '".$debut."' AND '".$fin."'")->result_array(),
            "caisse_entrees"    => $this->db->query("SELECT c.*, u.role, u.full_name AS utilisateur FROM caisse_entree c LEFT JOIN `user` u ON u.id_user = c.id_user WHERE c.date_entree BETWEEN '".$debut."' AND '".$fin."'")->result_array(),
            "caisse_sorties"    => $this->db->query("SELECT c.*, u.role, u.full_name AS utilisateur FROM caisse_sortie c LEFT JOIN `user` u ON u.id_user = c.id_user WHERE c.date_sortie BETWEEN '".$debut."' AND '".$fin."'")->result_array(),
            "date_debut" => $debut,
            "date_fin"  => $fin,
            /* ----------------------------------- */
            "title"     => "Caisse",
            "view"      => "caisse/accueil",
            "active"    => "CSE"
            /* ----------------------------------- */
        );

        $this->load->view("template", $data);
    }

    public function cheques()
    {
        $action = $this->input->post("action");
        if(!empty($action))
        {
            $id_cheque = $this->input->post("id_cheque");

            if($action == "paid")
            {
                $this->db->where("id_cheque", $id_cheque);
                $this->db->update("cheque", array(
                    "paid" => 1,
                    "caisse" => $this->input->post("caisse") // 0: Bank, 1: Caisse
                ));

                $this->session->set_flashdata("message", array(
                    "title" => "Succès!",
                    "message" => "Chèque/Effet payé avec succès."
                ));
                $log_text = "Validation de Paiement";
                $log_caisse = $this->input->post("caisse") == 0 ? " vers la <b>Banque</b>" : " vers la <b>Caisse</b>";;
            }
            elseif($action == "unpaid")
            {
                $this->db->where("id_cheque", $id_cheque);
                $this->db->update("cheque", array(
                    "paid" => 2
                ));

                $this->session->set_flashdata("message", array(
                    "title" => "Succès!",
                    "message" => "Chèque/Effet annulé avec succès."
                ));
                $log_text = "Annulation de Paiement";
                $log_caisse = ""; // none
            }
            else
            {
                $this->db->where("id_cheque", $id_cheque);
                $this->db->update("cheque", array(
                    "paid" => 0,
                    "caisse" => null,
                ));

                $this->session->set_flashdata("message", array(
                    "title" => "Succès!",
                    "message" => "Chèque/Effet initialisé avec succès."
                ));
                $log_text = "Initialisation de Paiement";
                $log_caisse = ""; // none
            }

            /* ---------------------- USER LOG ---------------------- */
            $cheque = $this->db->where("id_cheque", $id_cheque)->get("cheque")->row();
            $code_vente = $this->input->post("code_vente");
            $code_avoir = $this->input->post("code_avoir");
            if(!empty($code_vente)) { $more_log = " de Vente ( <b>".$code_vente."</b> )"; }
            elseif(!empty($code_avoir)) { $more_log = " de Bon d'Avoir ( <b>".$code_avoir."</b> )"; }
            else { $more_log = " d'Avance"; }
            saveUserLog($log_text . " de <b>".getMethodePaiement($cheque->methode)."</b> 
                        ( <b>".number_format($cheque->montant,2,"."," ")."</b> DH [ ".$cheque->reference." - ".date("d/m/Y", strtotime($cheque->date_cheque))." ] )
                        ".$more_log.$log_caisse);
            /* ---------------------- -------- ---------------------- */

            redirect("/caisse/cheques/", "refresh");
        }
        else
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
                "cheques"   => $this->db->query("SELECT ch.*, up.full_name AS utilisateur_p, up.role AS role_p, ua.full_name AS utilisateur_a, ua.role AS role_a, 
                                                v.id_vente, v.code_vente, cv.id_client AS id_client_v, cv.full_name AS `client_v`, 
                                                a.id_avoir, a.code_avoir, ca.id_client AS id_client_a, ca.full_name AS `client_a`, 
                                                av.id_client AS id_client_av, cav.full_name AS `client_av` 
                                                FROM cheque ch 
                                                LEFT JOIN paiement p ON p.id_paiement = ch.id_paiement 
                                                LEFT JOIN avance av ON av.id_avance = ch.id_avance 
                                                LEFT JOIN `user` up ON up.id_user = p.id_user 
                                                LEFT JOIN `user` ua ON ua.id_user = av.id_user 
                                                LEFT JOIN vente v ON v.id_vente = p.id_vente 
                                                LEFT JOIN avoir a ON a.id_avoir = p.id_avoir 
                                                LEFT JOIN `client` cv ON cv.id_client = v.id_client 
                                                LEFT JOIN `client` ca ON ca.id_client = a.id_client 
                                                LEFT JOIN `client` cav ON cav.id_client = av.id_client 
                                                WHERE ch.paid = 0 AND (ch.`type` = 1 OR ch.`type` = 5)")->result_array(), // 1 = vente or paiement from avoir, 5 = from avance
                "historique"   => $this->db->query("SELECT ch.*, up.full_name AS utilisateur_p, up.role AS role_p, ua.full_name AS utilisateur_a, ua.role AS role_a, 
                                                v.id_vente, v.code_vente, cv.id_client AS id_client_v, cv.full_name AS `client_v`, 
                                                a.id_avoir, a.code_avoir, ca.id_client AS id_client_a, ca.full_name AS `client_a`, 
                                                av.id_client AS id_client_av, cav.full_name AS `client_av` 
                                                FROM cheque ch 
                                                LEFT JOIN paiement p ON p.id_paiement = ch.id_paiement 
                                                LEFT JOIN avance av ON av.id_avance = ch.id_avance 
                                                LEFT JOIN `user` up ON up.id_user = p.id_user 
                                                LEFT JOIN `user` ua ON ua.id_user = av.id_user 
                                                LEFT JOIN vente v ON v.id_vente = p.id_vente 
                                                LEFT JOIN avoir a ON a.id_avoir = p.id_avoir 
                                                LEFT JOIN `client` cv ON cv.id_client = v.id_client 
                                                LEFT JOIN `client` ca ON ca.id_client = a.id_client 
                                                LEFT JOIN `client` cav ON cav.id_client = av.id_client 
                                                WHERE ch.paid != 0 AND (ch.`type` = 1 OR ch.`type` = 5)
                                                AND ch.date_cheque BETWEEN '".$debut."' AND '".$fin."'")->result_array(), // 1 = vente or paiement from avoir, 5 = from avance
                "date_debut" => $debut,
                "date_fin"  => $fin,
                /* ----------------------------------- */
                "title"     => "Caisse - Chèques",
                "view"      => "caisse/cheques",
                "active"    => "CSE"
                /* ----------------------------------- */
            );
            $this->load->view("template", $data);
        }
    }

    public function cheques_fournisseur()
    {
        $action = $this->input->post("action");
        if(!empty($action))
        {
            $id_cheque = $this->input->post("id_cheque");

            if($action == "paid")
            {
                $this->db->where("id_cheque", $id_cheque);
                $this->db->update("cheque", array(
                    "paid" => 1,
                ));

                $this->session->set_flashdata("message", array(
                    "title" => "Succès!",
                    "message" => "Chèque/Effet payé avec succès."
                ));
                $log_text = "Validation de Paiement";
                $log_caisse = $this->input->post("caisse") == 0 ? " vers la <b>Banque</b>" : " vers la <b>Caisse</b>";;
            }
            elseif($action == "unpaid")
            {
                $this->db->where("id_cheque", $id_cheque);
                $this->db->update("cheque", array(
                    "paid" => 2
                ));

                $this->session->set_flashdata("message", array(
                    "title" => "Succès!",
                    "message" => "Chèque/Effet annulé avec succès."
                ));
                $log_text = "Annulation de Paiement";
                $log_caisse = ""; // none
            }

            /* ---------------------- USER LOG ---------------------- */
            $cheque = $this->db->where("id_cheque", $id_cheque)->get("cheque")->row();
            $code_vente = $this->input->post("code_vente");
            $code_avoir = $this->input->post("code_avoir");
            if(!empty($code_vente)) { $more_log = " de Vente ( <b>".$code_vente."</b> )"; }
            elseif(!empty($code_avoir)) { $more_log = " de Bon d'Avoir ( <b>".$code_avoir."</b> )"; }
            else { $more_log = " d'Avance"; }
            saveUserLog($log_text . " de <b>".getMethodePaiement($cheque->methode)."</b> 
                        ( <b>".number_format($cheque->montant,2,"."," ")."</b> DH [ ".$cheque->reference." - ".date("d/m/Y", strtotime($cheque->date_cheque))." ] )
                        ".$more_log.$log_caisse);
            /* ---------------------- -------- ---------------------- */

            redirect("/caisse/cheques_fournisseur/", "refresh");
        }
        else
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
                "cheques"   => $this->db->query("SELECT ch.*, up.full_name AS utilisateur_p, 
                                                up.role AS role_p, ua.full_name AS utilisateur_a, ua.role AS role_a, 
                                                a.id_achat, a.code_achat, f.id_fournisseur, f.full_name AS `fournisseur`
                                                FROM cheque ch 
                                                LEFT JOIN paiement p ON p.id_paiement = ch.id_paiement 
                                                LEFT JOIN avance av ON av.id_avance = ch.id_avance 
                                                LEFT JOIN `user` up ON up.id_user = p.id_user 
                                                LEFT JOIN `user` ua ON ua.id_user = av.id_user 
                                                LEFT JOIN achat a ON a.id_achat = p.id_achat 
                                                LEFT JOIN `fournisseur` f ON f.id_fournisseur = a.id_fournisseur 
                                                WHERE ch.paid = 0 AND (ch.`type` = 2 OR ch.`type` = 3)")->result_array(), // 2 = achat, 3 = retourn d'avoir, 4 = charge, 6 = retour avoir
                "historique"   => $this->db->query("SELECT ch.*, up.full_name AS utilisateur_p, 
                                                up.role AS role_p, ua.full_name AS utilisateur_a, ua.role AS role_a, 
                                                a.id_achat, a.code_achat, f.id_fournisseur, f.full_name AS `fournisseur`
                                                FROM cheque ch 
                                                LEFT JOIN paiement p ON p.id_paiement = ch.id_paiement 
                                                LEFT JOIN avance av ON av.id_avance = ch.id_avance 
                                                LEFT JOIN `user` up ON up.id_user = p.id_user 
                                                LEFT JOIN `user` ua ON ua.id_user = av.id_user 
                                                LEFT JOIN achat a ON a.id_achat = p.id_achat 
                                                LEFT JOIN `fournisseur` f ON f.id_fournisseur = a.id_fournisseur 
                                                WHERE ch.paid != 0 AND (ch.`type` = 2 OR ch.`type` = 3)
                                                AND ch.date_cheque BETWEEN '".$debut."' AND '".$fin."'")->result_array(), // 2 = achat, 3 = retourn d'avoir, 4 = charge, 6 = retour avoir
                "date_debut" => $debut,
                "date_fin"  => $fin,
                /* ----------------------------------- */
                "title"     => "Caisse - Chèques",
                "view"      => "caisse/cheques_fournisseur",
                "active"    => "CSE"
                /* ----------------------------------- */
            );
            $this->load->view("template", $data);
        }
    }

    public function entree()
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
            "entrees"  => $this->db->query("SELECT c.*, u.full_name AS utilisateur, u.role FROM caisse_entree c LEFT JOIN `user` u ON c.id_user = u.id_user WHERE c.date_entree BETWEEN '".$debut."' AND '".$fin."'")->result_array(),
            "date_debut" => $debut,
            "date_fin"  => $fin,
            /* ----------------------------------- */
            "title"     => "Caisse - Entrées",
            "view"      => "caisse/entree/liste",
            "active"    => "CSE"
            /* ----------------------------------- */
        );
        $this->load->view("template", $data);
    }

    public function entree_ajouter()
    {
        $date_entree = $this->input->post("date_entree");
        if(!empty($date_entree))
        {
            $this->db->insert("caisse_entree", array(
                "date_entree"    => $date_entree,
                "montant"           => $this->input->post("montant"),
                "description"       => $this->input->post("description"),
                "id_user"           => $this->session->userdata("id_user")
            ));

            $this->session->set_flashdata("message", array(
                "title" => "Succès!",
                "message" => "Entrée de caisse enregistrée avec succès."
            ));

            /* ---------------------- USER LOG ---------------------- */
            saveUserLog("Enregistrement d'entrée de caisse ( <b>".number_format($this->input->post("montant"),2,"."," ")."</b> DH )");
            /* ---------------------- -------- ---------------------- */

            redirect("/caisse/entree", "refresh");
        }
        else
        {
            $data = array(
                /* ----------------------------------- */
                "title"     => "Caisse - Entrées",
                "view"      => "caisse/entree/ajouter",
                "active"    => "CSE"
                /* ----------------------------------- */
            );
            $this->load->view("template", $data);
        }
    }

    public function entree_modifier($id = null)
    {
        $date_entree = $this->input->post("date_entree");
        if(!empty($date_entree))
        {
            $this->db->where("id_caisse_entree", $this->input->post("id_caisse_entree"));
            $this->db->update("caisse_entree", array(
                "date_entree"       => $date_entree,
                "montant"           => $this->input->post("montant"),
                "description"       => $this->input->post("description"),
                "id_user"           => $this->session->userdata("id_user")
            ));

            $this->session->set_flashdata("message", array(
                "title" => "Succès!",
                "message" => "Entrée de caisse modifiée avec succès."
            ));

            /* ---------------------- USER LOG ---------------------- */
            saveUserLog("Modification d'entrée de caisse ( <b>".number_format($this->input->post("montant"),2,"."," ")."</b> DH )");
            /* ---------------------- -------- ---------------------- */

            redirect("/caisse/entree", "refresh");
        }
        else
        {
            $data = array(
                "entree"    => $this->db->where("id_caisse_entree", $id)->get("caisse_entree")->row(),
                /* ----------------------------------- */
                "title"     => "Caisse - Entrées",
                "view"      => "caisse/entree/modifier",
                "active"    => "CSE"
                /* ----------------------------------- */
            );
            $this->load->view("template", $data);
        }
    }

    public function entree_supprimer()
    {
        $id_caisse_entree = $this->input->post("id_caisse_entree");
        if(!empty($id_caisse_entree))
        {
            /* ---------------------- USER LOG ---------------------- */
            $caisse_entree = $this->db->where("id_caisse_entree", $id_caisse_entree)->get("caisse_entree")->row();
            saveUserLog("Suppression de Sortie de caisse ( <b>".number_format($caisse_entree->montant,2,"."," ")."</b> DH )");
            /* ---------------------- -------- ---------------------- */

            $this->db->where("id_caisse_entree", $id_caisse_entree);
            $this->db->delete("caisse_entree");

            $this->session->set_flashdata("message", array(
                "title" => "Succès!",
                "message" => "Sortie de caisse supprimée avec succès."
            ));
        }

        redirect("/caisse/entree", "refresh");
    }

    public function sortie()
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
            "sorties"  => $this->db->query("SELECT c.*, u.full_name AS utilisateur, u.role FROM caisse_sortie c LEFT JOIN `user` u ON c.id_user = u.id_user WHERE c.date_sortie BETWEEN '".$debut."' AND '".$fin."'")->result_array(),
            "date_debut" => $debut,
            "date_fin"  => $fin,
            /* ----------------------------------- */
            "title"     => "Caisse - Sorties",
            "view"      => "caisse/sortie/liste",
            "active"    => "CSE"
            /* ----------------------------------- */
        );
        $this->load->view("template", $data);
    }

    public function sortie_ajouter()
    {
        $date_sortie = $this->input->post("date_sortie");
        if(!empty($date_sortie))
        {
            $this->db->insert("caisse_sortie", array(
                "date_sortie"    => $date_sortie,
                "montant"           => $this->input->post("montant"),
                "description"       => $this->input->post("description"),
                "id_user"           => $this->session->userdata("id_user")
            ));

            $this->session->set_flashdata("message", array(
                "title" => "Succès!",
                "message" => "Sortie de caisse enregistrée avec succès."
            ));

            /* ---------------------- USER LOG ---------------------- */
            saveUserLog("Enregistrement de Sortie de caisse ( <b>".number_format($this->input->post("montant"),2,"."," ")."</b> DH )");
            /* ---------------------- -------- ---------------------- */

            redirect("/caisse/sortie", "refresh");
        }
        else
        {
            $data = array(
                /* ----------------------------------- */
                "title"     => "Caisse - Sorties",
                "view"      => "caisse/sortie/ajouter",
                "active"    => "CSE"
                /* ----------------------------------- */
            );
            $this->load->view("template", $data);
        }
    }

    public function sortie_modifier($id = null)
    {
        $date_sortie = $this->input->post("date_sortie");
        if(!empty($date_sortie))
        {
            $this->db->where("id_caisse_sortie", $this->input->post("id_caisse_sortie"));
            $this->db->update("caisse_sortie", array(
                "date_sortie"       => $date_sortie,
                "montant"           => $this->input->post("montant"),
                "description"       => $this->input->post("description"),
                "id_user"           => $this->session->userdata("id_user")
            ));

            $this->session->set_flashdata("message", array(
                "title" => "Succès!",
                "message" => "Sortie de caisse modifiée avec succès."
            ));

            /* ---------------------- USER LOG ---------------------- */
            saveUserLog("Modification de Sortie de caisse ( <b>".number_format($this->input->post("montant"),2,"."," ")."</b> DH )");
            /* ---------------------- -------- ---------------------- */

            redirect("/caisse/sortie", "refresh");
        }
        else
        {
            $data = array(
                "sortie"    => $this->db->where("id_caisse_sortie", $id)->get("caisse_sortie")->row(),
                /* ----------------------------------- */
                "title"     => "Caisse - Sorties",
                "view"      => "caisse/sortie/modifier",
                "active"    => "CSE"
                /* ----------------------------------- */
            );
            $this->load->view("template", $data);
        }
    }

    public function sortie_supprimer()
    {
        $id_caisse_sortie = $this->input->post("id_caisse_sortie");
        if(!empty($id_caisse_sortie))
        {
            /* ---------------------- USER LOG ---------------------- */
            $caisse_sortie = $this->db->where("id_caisse_sortie", $id_caisse_sortie)->get("caisse_sortie")->row();
            saveUserLog("Suppression de Sortie de caisse ( <b>".number_format($caisse_sortie->montant,2,"."," ")."</b> DH )");
            /* ---------------------- -------- ---------------------- */

            $this->db->where("id_caisse_sortie", $id_caisse_sortie);
            $this->db->delete("caisse_sortie");

            $this->session->set_flashdata("message", array(
                "title" => "Succès!",
                "message" => "Sortie de caisse supprimée avec succès."
            ));
        }

        redirect("/caisse/sortie", "refresh");
    }
}
