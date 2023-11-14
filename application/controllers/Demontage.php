<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Demontage extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        CheckLogin();
        CheckDemontage();
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
            "demontages" => $this->db->query("SELECT dm.*, u.full_name AS utilisateur, u.role, p.full_name AS produit, c.full_name AS categorie, sc.full_name AS sub_categorie FROM demontage dm LEFT JOIN `user` u ON u.id_user = dm.id_user LEFT JOIN produit p ON p.id_produit = dm.id_produit LEFT JOIN categorie c ON c.id_categorie = p.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie WHERE dm.date_demontage BETWEEN '".$debut."' AND '".$fin."'")->result_array(),
            "date_debut" => $debut,
            "date_fin"  => $fin,
            /* ----------------------------------- */
            "title"     => "Démontage",
            "view"      => "demontage/liste",
            "active"    => "DEM"
            /* ----------------------------------- */
        );

        $this->load->view("template", $data);
    }

    public function checkCodeExists($ignore = null)
    {
        $code = $this->input->post("code_demontage");
        if(!empty($code)) {
            echo json_encode(checkCodeExists($code, "demontage", $ignore) ? "EXISTS" : "NOT");
        }
        else { echo json_encode("NOT"); }
    }

    public function details($id)
    {
        $data = array(
            "demontage" => $this->db->query("SELECT dm.*, u.full_name AS utilisateur, u.role, p.full_name AS produit, c.full_name AS categorie, sc.full_name AS sub_categorie FROM demontage dm LEFT JOIN `user` u ON u.id_user = dm.id_user LEFT JOIN produit p ON p.id_produit = dm.id_produit LEFT JOIN categorie c ON c.id_categorie = p.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie WHERE dm.id_demontage = ".$id)->row(),
            "demontage_details" => $this->db->query("SELECT dmd.*, p.code_produit, p.full_name AS produit, p.image, c.id_categorie, c.full_name AS categorie, sc.id_sub_categorie, sc.full_name AS sub_categorie FROM demontage_details dmd LEFT JOIN produit p ON p.id_produit = dmd.id_produit LEFT JOIN categorie c ON c.id_categorie = p.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie WHERE dmd.id_demontage = ".$id)->result_array(),
            /* ----------------------------------- */
            "title"     => "Démontage",
            "view"      => "demontage/details",
            "active"    => "DEM"
            /* ----------------------------------- */
        );

        $this->load->view("template", $data);
    }

    public function demonter()
    {
        $code_demontage = $this->input->post("code_demontage");
        if(!empty($code_demontage))
        {
            $id_produit = $this->input->post("id_produit");
            $quantite = $this->input->post("quantite");

            $this->db->insert("demontage", array(
                "code_demontage"    => getNewCode("DM", "demontage", true),
                "id_produit"        => $id_produit,
                "id_user"           => $this->session->userdata("id_user"),
                "quantite"          => $quantite,
                "frais"             => $this->input->post("frais"),
                "date_demontage"    => $this->input->post("date_demontage"),
                "remarque"          => $this->input->post("remarque")
            ));
            $id_demontage = $this->db->insert_id();

            $produit_details = $this->db->where("id_produit_compose", $id_produit)->get("produit_details")->result_array();
            foreach ($produit_details as $val)
            {
                $this->db->insert("demontage_details", array(
                    "id_demontage"  => $id_demontage,
                    "id_produit"    => $val["id_produit"],
                    "quantite"      => $val["quantite"] * $quantite,
                ));
            }

            $this->session->set_flashdata("message", array(
                "title" => "Succès!",
                "message" => "Démontage enregistré avec succès."
            ));

            /* ---------------------- USER LOG ---------------------- */
            saveUserLog("Démontage de produit ( <b>".$this->input->post("full_name")."</b> | N° : <b>".$code_demontage."</b> )");
            /* ---------------------- -------- ---------------------- */

            redirect("/demontage/details/".$id_demontage, "refresh");
        }
        else
        {
            $data = array(
                "produits" => $this->db->query("SELECT p.*, c.full_name AS categorie, sc.full_name AS sub_categorie FROM produit p LEFT JOIN categorie c ON c.id_categorie = p.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie WHERE p.type = 1 AND p.display = 1")->result_array(),
                "code_demontage" => getNewCode("DM", "demontage"),
                /* ----------------------------------- */
                "title"     => "Démontage",
                "view"      => "demontage/demonter",
                "active"    => "DEM-NEW"
                /* ----------------------------------- */
            );

            $this->load->view("template", $data);
        }
    }

    public function modifier($id = null)
    {
        $code_demontage = $this->input->post("code_demontage");
        if(!empty($code_demontage))
        {
            $id_demontage = $this->input->post("id_demontage");
            $id_produit = $this->input->post("id_produit");
            $quantite   = $this->input->post("quantite");

            $this->db->where("id_demontage", $id_demontage);
            $this->db->update("demontage", array(
                "code_demontage"    => $code_demontage,
                "id_produit"        => $id_produit,
                "id_user"           => $this->session->userdata("id_user"),
                "quantite"          => $quantite,
                "frais"             => $this->input->post("frais"),
                "date_demontage"    => $this->input->post("date_demontage"),
                "remarque"          => $this->input->post("remarque")
            ));

            $this->db->where("id_demontage", $id_demontage);
            $this->db->delete("demontage_details");

            $produit_details = $this->db->where("id_produit_compose", $id_produit)->get("produit_details")->result_array();
            foreach ($produit_details as $val)
            {
                $this->db->insert("demontage_details", array(
                    "id_demontage"  => $id_demontage,
                    "id_produit"    => $val["id_produit"],
                    "quantite"      => $val["quantite"] * $quantite,
                ));
            }

            $this->session->set_flashdata("message", array(
                "title" => "Succès!",
                "message" => "Démontage enregistré avec succès."
            ));

            /* ---------------------- USER LOG ---------------------- */
            saveUserLog("Démontage de produit ( <b>".$this->input->post("full_name")."</b> | N° : <b>".$code_demontage."</b> )");
            /* ---------------------- -------- ---------------------- */

            redirect("/demontage/details/".$id_demontage, "refresh");
        }
        else
        {
            $data = array(
                "produits"      => $this->db->query("SELECT p.*, c.full_name AS categorie, sc.full_name AS sub_categorie FROM produit p LEFT JOIN categorie c ON c.id_categorie = p.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie WHERE p.type = 1 AND p.display = 1")->result_array(),
                "demontage"     => $this->db->query("SELECT dm.*, p.full_name AS produit, c.full_name AS categorie, sc.full_name AS sub_categorie FROM demontage dm LEFT JOIN produit p ON p.id_produit = dm.id_produit LEFT JOIN categorie c ON c.id_categorie = p.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie WHERE dm.id_demontage = ".$id)->row(),
                /* ----------------------------------- */
                "title"     => "Démontage",
                "view"      => "demontage/modifier",
                "active"    => "DEM"
                /* ----------------------------------- */
            );

            $this->load->view("template", $data);
        }
    }

    public function supprimer()
    {
        CheckAdmin();

        $id_demontage = $this->input->post("id_demontage");
        if(!empty($id_demontage))
        {
            /* ---------------------- USER LOG ---------------------- */
            saveUserLog("Suppression de démontage ( <b>".$this->db->where("id_demontage", $id_demontage)->get("demontage")->row()->code_demontage."</b> )");
            /* ---------------------- -------- ---------------------- */

            $this->db->where("id_demontage", $id_demontage);
            $this->db->delete("demontage");

            $this->session->set_flashdata("message", array(
                "title" => "Succès!",
                "message" => "Démontage supprimée avec succès."
            ));
        }

        redirect("/demontage", "refresh");
    }

    public function ajax()
    {
        $id_produit = $this->input->post("id_produit");

        if(!empty($id_produit))
        {
            $produit_details = $this->db->query("SELECT pd.*, p.full_name AS produit, c.full_name AS categorie, sc.full_name AS sub_categorie FROM produit_details pd JOIN produit p ON p.id_produit = pd.id_produit LEFT JOIN categorie c ON c.id_categorie = p.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie WHERE pd.id_produit_compose = ".$id_produit)->result_array();
            $data = array();
            foreach ($produit_details as $val)
            {
                array_push($data, array(
                    "produit"           => $val["produit"],
                    "categorie"         => $val["categorie"],
                    "sub_categorie"     => $val["sub_categorie"],
                    "quantite"          => $val["quantite"]
                ));
            }

            echo json_encode($data);
        }
    }
}