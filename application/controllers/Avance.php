<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Avance extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        CheckLogin();
        CheckAvance();
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
            "avances"  => $this->db->query("SELECT av.*, c.full_name AS client, u.full_name AS utilisateur, u.role FROM avance av LEFT JOIN client c ON c.id_client = av.id_client LEFT JOIN `user` u ON av.id_user = u.id_user WHERE av.date_avance BETWEEN '".$debut."' AND '".$fin."'")->result_array(),
            "avances_retours"  => $this->db->query("SELECT av.*, c.full_name AS client, u.full_name AS utilisateur, u.role FROM avance_retour av LEFT JOIN client c ON c.id_client = av.id_client LEFT JOIN `user` u ON av.id_user = u.id_user WHERE av.date_retour BETWEEN '".$debut."' AND '".$fin."'")->result_array(),
            "date_debut" => $debut,
            "date_fin"  => $fin,
            /* ----------------------------------- */
            "title"     => "Caisse - Avances",
            "view"      => "caisse/avance/liste",
            "active"    => "CSE"
            /* ----------------------------------- */
        );
        $this->load->view("template", $data);
    }

    public function ajouter()
    {
        $date_avance = $this->input->post("date_avance");
        if(!empty($date_avance))
        {
            $methode = $this->input->post("avance_methode");

            $this->db->insert("avance", array(
                "date_avance"   => $date_avance,
                "id_client"     => $this->input->post("id_client"),
                "montant"       => $this->input->post("montant"),
                "methode"       => $methode,
                "description"   => $this->input->post("description"),
                "id_user"       => $this->session->userdata("id_user")
            ));
            $id_avance = $this->db->insert_id();

            $methode_log = "";
            if($methode == 2 || $methode == 3)
            {
                $this->db->insert("cheque", array(
                    "id_avance"     => $id_avance,
                    "montant"       => $this->input->post("cheque_montant"),
                    "date_cheque"   => $this->input->post("cheque_date"),
                    "reference"     => $this->input->post("cheque_reference"),
                    "methode"       => $methode,
                    "type"          => 5, // 5 = Avance
                ));
                $methode_log = " [ ".$this->input->post("cheque_reference")." - ".date("d/m/Y", strtotime($this->input->post("cheque_date")))." ]";
            }

            $this->session->set_flashdata("message", array(
                "title" => "Succès!",
                "message" => "Avance enregistré avec succès."
            ));
            
            /* ---------------------- USER LOG ---------------------- */
            $client = $this->db->where("id_client", $this->input->post("id_client"))->get("client")->row();
            saveUserLog("Enregistrement d'avance ( <b>".number_format($this->input->post("montant"),2,"."," ")."</b> DH / <b>".getMethodePaiement($methode)."</b>".$methode_log." ) de client ( <b>".$client->full_name."</b> )");
            /* ---------------------- -------- ---------------------- */

            redirect("/avance", "refresh");
        }
        else
        {
            $data = array(
                "clients"   => $this->db->where("display", 1)->where("id_client !=", 1)->get("client")->result_array(),
                /* ----------------------------------- */
                "title"     => "Caisse - Avances",
                "view"      => "caisse/avance/ajouter",
                "active"    => "CSE"
                /* ----------------------------------- */
            );
            $this->load->view("template", $data);
        }
    }

    public function modifier($id = null)
    {
        $date_avance = $this->input->post("date_avance");
        if(!empty($date_avance))
        {
            $methode = $this->input->post("avance_methode");
            $id_avance = $this->input->post("id_avance");

            $this->db->where("id_avance", $id_avance);
            $this->db->update("avance", array(
                "date_avance"   => $date_avance,
                "id_client"     => $this->input->post("id_client"),
                "montant"       => $this->input->post("montant"),
                "methode"       => $methode,
                "description"   => $this->input->post("description"),
                "id_user"       => $this->session->userdata("id_user")
            ));

            $this->db->where("id_avance", $id_avance);
            $this->db->delete("cheque");

            $methode_log = "";
            if($methode == 2 || $methode == 3)
            {
                $this->db->insert("cheque", array(
                    "id_avance"     => $id_avance,
                    "montant"       => $this->input->post("cheque_montant"),
                    "date_cheque"   => $this->input->post("cheque_date"),
                    "reference"     => $this->input->post("cheque_reference"),
                    "methode"       => $methode,
                    "type"          => 5, // 5 = Avance
                ));
                $methode_log = " [ ".$this->input->post("cheque_reference")." - ".date("d/m/Y", strtotime($this->input->post("cheque_date")))." ]";
            }

            $this->session->set_flashdata("message", array(
                "title" => "Succès!",
                "message" => "Avance modifié avec succès."
            ));

            /* ---------------------- USER LOG ---------------------- */
            $client = $this->db->where("id_client", $this->input->post("id_client"))->get("client")->row();
            saveUserLog("Modification d'avance ( <b>".number_format($this->input->post("montant"),2,"."," ")."</b> DH / <b>".getMethodePaiement($methode)."</b>".$methode_log." ) de client ( <b>".$client->full_name."</b> )");
            /* ---------------------- -------- ---------------------- */

            redirect("/avance", "refresh");
        }
        else
        {
            $avance = $this->db->where("id_avance", $id)->get("avance")->row();

            $data = array(
                "clients"   => $this->db->where("display", 1)->where("id_client !=", 1)->get("client")->result_array(),
                "avance"    => $avance,
                "client"    => $this->db->where("id_client", $avance->id_client)->get("client")->row(),
                /* ----------------------------------- */
                "title"     => "Caisse - Avances",
                "view"      => "caisse/avance/modifier",
                "active"    => "CSE"
                /* ----------------------------------- */
            );
            $this->load->view("template", $data);
        }
    }

    public function supprimer()
    {
        $id_avance = $this->input->post("id_avance");
        if(!empty($id_avance))
        {
            /* ---------------------- USER LOG ---------------------- */
            $avance = $this->db->where("id_avance", $id_avance)->get("avance")->row();
            $client = $this->db->where("id_client", $avance->id_client)->get("client")->row();
            $cheque = $this->db->where("id_avance", $id_avance)->get("cheque")->row();
            $more_log  = ($avance->methode == 2 || $avance->methode == 3) ? " [".$cheque->reference." - ".date("d/m/Y", strtotime($cheque->date_cheque))."]" : "";
            saveUserLog("Suppression d'avance ( <b>".number_format($avance->montant,2,"."," ")."</b> DH / <b>".getMethodePaiement($avance->methode)."</b>".$more_log." ) de client ( <b>".$client->full_name."</b> )");
            /* ---------------------- -------- ---------------------- */

            $this->db->where("id_avance", $id_avance);
            $this->db->delete("avance");

            $this->session->set_flashdata("message", array(
                "title" => "Succès!",
                "message" => "Avance supprimé avec succès."
            ));
        }

        redirect("/avance", "refresh");
    }

    public function r_ajouter()
    {
        $date_retour = $this->input->post("date_retour");
        if(!empty($date_retour))
        {
            $methode = $this->input->post("retour_methode");

            $this->db->insert("avance_retour", array(
                "date_retour"   => $date_retour,
                "id_client"     => $this->input->post("id_client"),
                "montant"       => $this->input->post("montant"),
                "methode"       => $methode,
                "description"   => $this->input->post("description"),
                "id_user"       => $this->session->userdata("id_user"),
                "type_avance"   => $methode == 5 ? $this->input->post("type_avance") : null
            ));
            $id_avance_retour = $this->db->insert_id();

            $methode_log = "";
            if($methode == 2 || $methode == 3)
            {
                $this->db->insert("cheque", array(
                    "id_avance_retour" => $id_avance_retour,
                    "montant"       => $this->input->post("cheque_montant"),
                    "date_cheque"   => $this->input->post("cheque_date"),
                    "reference"     => $this->input->post("cheque_reference"),
                    "methode"       => $methode,
                    "type"          => 6, // 6 = Avance Retour
                ));
                $methode_log = " [ ".$this->input->post("cheque_reference")." - ".date("d/m/Y", strtotime($this->input->post("cheque_date")))." ]";
            }

            $this->session->set_flashdata("message", array(
                "title" => "Succès!",
                "message" => "Retour d'Avance enregistré avec succès."
            ));

            /* ---------------------- USER LOG ---------------------- */
            $client = $this->db->where("id_client", $this->input->post("id_client"))->get("client")->row();
            saveUserLog("Enregistrement de retour d'avance ( <b>".number_format($this->input->post("montant"),2,"."," ")."</b> DH / <b>".getMethodePaiement($methode)."</b>".$methode_log." ) de client ( <b>".$client->full_name."</b> )");
            /* ---------------------- -------- ---------------------- */

            redirect("/avance", "refresh");
        }
        else
        {
            $data = array(
                "clients"   => $this->db->where("display", 1)->where("id_client !=", 1)->get("client")->result_array(),
                /* ----------------------------------- */
                "title"     => "Caisse - Retour d'Avances",
                "view"      => "caisse/avance/r_ajouter",
                "active"    => "CSE"
                /* ----------------------------------- */
            );
            $this->load->view("template", $data);
        }
    }

    public function r_modifier($id = null)
    {
        $date_retour = $this->input->post("date_retour");
        if(!empty($date_retour))
        {
            $methode = $this->input->post("retour_methode");
            $id_avance_retour = $this->input->post("id_avance_retour");

            $this->db->where("id_avance_retour", $id_avance_retour);
            $this->db->update("avance_retour", array(
                "date_retour"   => $date_retour,
                "id_client"     => $this->input->post("id_client"),
                "montant"       => $this->input->post("montant"),
                "methode"       => $methode,
                "description"   => $this->input->post("description"),
                "id_user"       => $this->session->userdata("id_user"),
                "type_avance"   => $methode == 5 ? $this->input->post("type_avance") : null
            ));

            $this->db->where("id_avance_retour", $id_avance_retour);
            $this->db->delete("cheque");

            $methode_log = "";
            if($methode == 2 || $methode == 3)
            {
                $this->db->insert("cheque", array(
                    "id_avance_retour" => $id_avance_retour,
                    "montant"       => $this->input->post("cheque_montant"),
                    "date_cheque"   => $this->input->post("cheque_date"),
                    "reference"     => $this->input->post("cheque_reference"),
                    "methode"       => $methode,
                    "type"          => 6, // 6 = Retour d'Avance
                ));
                $methode_log = " [ ".$this->input->post("cheque_reference")." - ".date("d/m/Y", strtotime($this->input->post("cheque_date")))." ]";
            }

            $this->session->set_flashdata("message", array(
                "title" => "Succès!",
                "message" => "Retour d'Avance modifié avec succès."
            ));

            /* ---------------------- USER LOG ---------------------- */
            $client = $this->db->where("id_client", $this->input->post("id_client"))->get("client")->row();
            saveUserLog("Modification de retour d'avance ( <b>".number_format($this->input->post("montant"),2,"."," ")."</b> DH / <b>".getMethodePaiement($methode)."</b>".$methode_log." ) de client ( <b>".$client->full_name."</b> )");
            /* ---------------------- -------- ---------------------- */

            redirect("/avance", "refresh");
        }
        else
        {
            $avance_retour = $this->db->where("id_avance_retour", $id)->get("avance_retour")->row();

            $data = array(
                "avance_retour" => $avance_retour,
                "clients"   => $this->db->where("display", 1)->where("id_client !=", 1)->get("client")->result_array(),
                "client"    => $this->db->where("id_client", $avance_retour->id_client)->get("client")->row(),
                /* ----------------------------------- */
                "title"     => "Caisse - Retour d'Avances",
                "view"      => "caisse/avance/r_modifier",
                "active"    => "CSE"
                /* ----------------------------------- */
            );
            $this->load->view("template", $data);
        }
    }

    public function r_supprimer()
    {
        CheckAdmin();

        $id_avance_retour = $this->input->post("id_avance_retour");
        if(!empty($id_avance_retour))
        {
            /* ---------------------- USER LOG ---------------------- */
            $avance_retour = $this->db->where("id_avance_retour", $id_avance_retour)->get("avance_retour")->row();
            $client = $this->db->where("id_client", $avance_retour->id_client)->get("client")->row();
            $cheque = $this->db->where("id_avance_retour", $id_avance_retour)->get("cheque")->row();
            $more_log  = ($avance_retour->methode == 2 || $avance_retour->methode == 3) ? " [".$cheque->reference." - ".date("d/m/Y", strtotime($cheque->date_cheque))."]" : "";
            saveUserLog("Suppression de retour d'avance ( <b>".number_format($avance_retour->montant,2,"."," ")."</b> DH / <b>".getMethodePaiement($avance_retour->methode)."</b>".$more_log." ) de client ( <b>".$client->full_name."</b> )");
            /* ---------------------- -------- ---------------------- */

            $this->db->where("id_avance_retour", $id_avance_retour);
            $this->db->delete("avance_retour");

            $this->session->set_flashdata("message", array(
                "title" => "Succès!",
                "message" => "Retour d'Avance supprimé avec succès."
            ));
        }

        redirect("/avance", "refresh");
    }
}
