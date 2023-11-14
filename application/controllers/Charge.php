<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Charge extends CI_Controller
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
            "charges"  => $this->db->query("SELECT c.*, u.full_name AS utilisateur, u.role FROM charge c LEFT JOIN `user` u ON c.id_user = u.id_user WHERE c.date_charge BETWEEN '".$debut."' AND '".$fin."'")->result_array(),
            "date_debut" => $debut,
            "date_fin"  => $fin,
            /* ----------------------------------- */
            "title"     => "Caisse - Charges",
            "view"      => "caisse/charge/liste",
            "active"    => "CSE"
            /* ----------------------------------- */
        );
        $this->load->view("template", $data);
    }

    public function ajouter()
    {
        $date_charge = $this->input->post("date_charge");
        if(!empty($date_charge))
        {
            $methode = $this->input->post("charge_methode");

            $this->db->insert("charge", array(
                "date_charge"   => $date_charge,
                "montant"       => $this->input->post("montant"),
                "methode"       => $methode,
                "description"   => $this->input->post("description"),
                "id_user"       => $this->session->userdata("id_user")
            ));
            $id_charge = $this->db->insert_id();

            $methode_log = "";
            if($methode == 2 || $methode == 3)
            {
                $this->db->insert("cheque", array(
                    "id_charge"     => $id_charge,
                    "montant"       => $this->input->post("cheque_montant"),
                    "date_cheque"   => $this->input->post("cheque_date"),
                    "reference"     => $this->input->post("cheque_reference"),
                    "methode"       => $methode,
                    "type"          => 4, // 4 = charge
                ));
                $methode_log = " [ ".$this->input->post("cheque_reference")." - ".date("d/m/Y", strtotime($this->input->post("cheque_date")))." ]";
            }

            $this->session->set_flashdata("message", array(
                "title" => "Succès!",
                "message" => "Charge enregistré avec succès."
            ));

            /* ---------------------- USER LOG ---------------------- */
            saveUserLog("Enregistrement de charge ( <b>".number_format($this->input->post("montant"),2,"."," ")."</b> DH / <b>".getMethodePaiement($methode)."</b>".$methode_log." ) : <b>".$this->input->post("description")."</b>");
            /* ---------------------- -------- ---------------------- */

            redirect("/charge", "refresh");
        }
        else
        {
            $data = array(
                /* ----------------------------------- */
                "title"     => "Caisse - Charges",
                "view"      => "caisse/charge/ajouter",
                "active"    => "CSE"
                /* ----------------------------------- */
            );
            $this->load->view("template", $data);
        }
    }

    public function modifier($id = null)
    {
        $date_charge = $this->input->post("date_charge");
        if(!empty($date_charge))
        {
            $methode = $this->input->post("charge_methode");
            $id_charge = $this->input->post("id_charge");

            $this->db->where("id_charge", $id_charge);
            $this->db->update("charge", array(
                "date_charge"   => $date_charge,
                "montant"       => $this->input->post("montant"),
                "methode"       => $methode,
                "description"   => $this->input->post("description"),
                "id_user"       => $this->session->userdata("id_user")
            ));

            $this->db->where("id_charge", $id_charge);
            $this->db->delete("cheque");

            $methode_log = "";
            if($methode == 2 || $methode == 3)
            {
                $this->db->insert("cheque", array(
                    "id_charge"     => $id_charge,
                    "montant"       => $this->input->post("cheque_montant"),
                    "date_cheque"   => $this->input->post("cheque_date"),
                    "reference"     => $this->input->post("cheque_reference"),
                    "methode"       => $methode,
                    "type"          => 4, // 4 = charge
                ));
                $methode_log = " [ ".$this->input->post("cheque_reference")." - ".date("d/m/Y", strtotime($this->input->post("cheque_date")))." ]";
            }

            $this->session->set_flashdata("message", array(
                "title" => "Succès!",
                "message" => "Charge modifié avec succès."
            ));

            /* ---------------------- USER LOG ---------------------- */
            saveUserLog("Modification de charge ( <b>".number_format($this->input->post("montant"),2,"."," ")."</b> DH / <b>".getMethodePaiement($methode)."</b>".$methode_log." ) : <b>".$this->input->post("description")."</b>");
            /* ---------------------- -------- ---------------------- */

            redirect("/charge", "refresh");
        }
        else
        {
            $data = array(
                "charge"    => $this->db->where("id_charge", $id)->get("charge")->row(),
                /* ----------------------------------- */
                "title"     => "Caisse - Charges",
                "view"      => "caisse/charge/modifier",
                "active"    => "CSE"
                /* ----------------------------------- */
            );
            $this->load->view("template", $data);
        }
    }

    public function supprimer()
    {
        $id_charge = $this->input->post("id_charge");
        if(!empty($id_charge))
        {
            /* ---------------------- USER LOG ---------------------- */
            $charge = $this->db->where("id_charge", $id_charge)->get("charge")->row();
            $cheque = $this->db->where("id_charge", $id_charge)->get("cheque")->row();
            $more_log  = ($charge->methode == 2 || $charge->methode == 3) ? " [".$cheque->reference." - ".date("d/m/Y", strtotime($cheque->date_cheque))."]" : "";
            saveUserLog("Suppression de charge ( <b>".number_format($charge->montant,2,"."," ")."</b> DH / <b>".getMethodePaiement($charge->methode)."</b>".$more_log." ) : <b>".$charge->description."</b>");
            /* ---------------------- -------- ---------------------- */

            $this->db->where("id_charge", $id_charge);
            $this->db->delete("charge");

            $this->session->set_flashdata("message", array(
                "title" => "Succès!",
                "message" => "Charge supprimé avec succès."
            ));
        }

        redirect("/charge", "refresh");
    }
}
