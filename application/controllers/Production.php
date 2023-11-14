<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Production extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        CheckLogin();
        CheckProduction();
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
            "productions" => $this->db->query("SELECT pd.*, u.full_name AS utilisateur, u.role, p.full_name AS produit, c.full_name AS categorie, sc.full_name AS sub_categorie FROM production pd LEFT JOIN `user` u ON u.id_user = pd.id_user LEFT JOIN produit p ON p.id_produit = pd.id_produit LEFT JOIN categorie c ON c.id_categorie = p.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie WHERE pd.date_production BETWEEN '".$debut."' AND '".$fin."'")->result_array(),
            "date_debut" => $debut,
            "date_fin"  => $fin,
            /* ----------------------------------- */
            "title"     => "Production",
            "view"      => "production/liste",
            "active"    => "PRD"
            /* ----------------------------------- */
        );

        $this->load->view("template", $data);
    }

    public function checkCodeExists($ignore = null)
    {
        $code = $this->input->post("code_production");
        if(!empty($code)) {
            echo json_encode(checkCodeExists($code, "production", $ignore) ? "EXISTS" : "NOT");
        }
        else { echo json_encode("NOT"); }
    }

    public function details($id)
    {
        $data = array(
            "production" => $this->db->query("SELECT pd.*, u.full_name AS utilisateur, u.role, p.full_name AS produit, c.full_name AS categorie, sc.full_name AS sub_categorie FROM production pd LEFT JOIN `user` u ON u.id_user = pd.id_user LEFT JOIN produit p ON p.id_produit = pd.id_produit LEFT JOIN categorie c ON c.id_categorie = p.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie WHERE pd.id_production = ".$id)->row(),
            "production_details" => $this->db->query("SELECT pdd.*, p.code_produit, p.full_name AS produit, p.image, c.id_categorie, c.full_name AS categorie, sc.id_sub_categorie, sc.full_name AS sub_categorie FROM production_details pdd LEFT JOIN produit p ON p.id_produit = pdd.id_produit LEFT JOIN categorie c ON c.id_categorie = p.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie WHERE pdd.id_production = ".$id)->result_array(),
            /* ----------------------------------- */
            "title"     => "Production",
            "view"      => "production/details",
            "active"    => "PRD"
            /* ----------------------------------- */
        );

        $this->load->view("template", $data);
    }

    public function nouvelle()
    {
        $code_production = $this->input->post("code_production");
        if(!empty($code_production))
        {
            $id_produit = $this->input->post("id_produit");
            $quantite = $this->input->post("quantite");

            $this->db->insert("production", array(
                "code_production"   => getNewCode("PD", "production", true),
                "id_produit"        => $id_produit,
                "id_user"           => $this->session->userdata("id_user"),
                "quantite"          => $quantite,
                "frais"             => $this->input->post("frais"),
                "date_production"   => $this->input->post("date_production"),
                "remarque"          => $this->input->post("remarque")
            ));
            $id_production = $this->db->insert_id();

            $produit_details = $this->db->where("id_produit_compose", $id_produit)->get("produit_details")->result_array();
            foreach ($produit_details as $val)
            {
                $this->db->insert("production_details", array(
                    "id_production" => $id_production,
                    "id_produit"    => $val["id_produit"],
                    "quantite"      => $val["quantite"] * $quantite,
                ));
            }

            $this->session->set_flashdata("message", array(
                "title" => "Succès!",
                "message" => "Production enregistrée avec succès."
            ));

            /* ---------------------- USER LOG ---------------------- */
            saveUserLog("Production de produit ( <b>".$this->input->post("full_name")."</b> | N° : <b>".$code_production."</b> )");
            /* ---------------------- -------- ---------------------- */

            redirect("/production/details/".$id_production, "refresh");
        }
        else
        {
            $data = array(
                "produits" => $this->db->query("SELECT p.*, c.full_name AS categorie, sc.full_name AS sub_categorie FROM produit p LEFT JOIN categorie c ON c.id_categorie = p.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie WHERE p.type = 1 AND p.display = 1")->result_array(),
                "code_production" => getNewCode("PD", "production"),
                /* ----------------------------------- */
                "title"     => "Production",
                "view"      => "production/nouvelle",
                "active"    => "PRD-ADD"
                /* ----------------------------------- */
            );

            $this->load->view("template", $data);
        }
    }

    public function modifier($id = null)
    {
        $code_production = $this->input->post("code_production");
        if(!empty($code_production))
        {
            $id_production = $this->input->post("id_production");
            $id_produit = $this->input->post("id_produit");
            $quantite   = $this->input->post("quantite");

            $this->db->where("id_production", $id_production);
            $this->db->update("production", array(
                "code_production"   => $code_production,
                "id_produit"        => $id_produit,
                "id_user"           => $this->session->userdata("id_user"),
                "quantite"          => $quantite,
                "frais"             => $this->input->post("frais"),
                "date_production"   => $this->input->post("date_production"),
                "remarque"          => $this->input->post("remarque")
            ));

            $this->db->where("id_production", $id_production);
            $this->db->delete("production_details");

            $produit_details = $this->db->where("id_produit_compose", $id_produit)->get("produit_details")->result_array();
            foreach ($produit_details as $val)
            {
                $this->db->insert("production_details", array(
                    "id_production" => $id_production,
                    "id_produit"    => $val["id_produit"],
                    "quantite"      => $val["quantite"] * $quantite,
                ));
            }

            $this->session->set_flashdata("message", array(
                "title" => "Succès!",
                "message" => "Production enregistrée avec succès."
            ));

            /* ---------------------- USER LOG ---------------------- */
            saveUserLog("Production de produit ( <b>".$this->input->post("full_name")."</b> | N° : <b>".$code_production."</b> )");
            /* ---------------------- -------- ---------------------- */

            redirect("/production/details/".$id_production, "refresh");
        }
        else
        {
            $data = array(
                "produits"      => $this->db->query("SELECT p.*, c.full_name AS categorie, sc.full_name AS sub_categorie FROM produit p LEFT JOIN categorie c ON c.id_categorie = p.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie WHERE p.type = 1 AND p.display = 1")->result_array(),
                "production"    => $this->db->query("SELECT pd.*, p.full_name AS produit, c.full_name AS categorie, sc.full_name AS sub_categorie FROM production pd LEFT JOIN produit p ON p.id_produit = pd.id_produit LEFT JOIN categorie c ON c.id_categorie = p.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie WHERE pd.id_production = ".$id)->row(),
                /* ----------------------------------- */
                "title"     => "Production",
                "view"      => "production/modifier",
                "active"    => "PRD"
                /* ----------------------------------- */
            );

            $this->load->view("template", $data);
        }
    }

    public function supprimer()
    {
        CheckAdmin();

        $id_production = $this->input->post("id_production");
        if(!empty($id_production))
        {
            /* ---------------------- USER LOG ---------------------- */
            saveUserLog("Suppression de production ( <b>".$this->db->where("id_production", $id_production)->get("production")->row()->code_production."</b> )");
            /* ---------------------- -------- ---------------------- */

            $this->db->where("id_production", $id_production);
            $this->db->delete("production");

            $this->session->set_flashdata("message", array(
                "title" => "Succès!",
                "message" => "Production supprimée avec succès."
            ));
        }

        redirect("/production", "refresh");
    }

    public function ajax()
    {
        $id_produit = $this->input->post("id_produit");
        $quantite   = $this->input->post("quantite");
        $quantite   = !empty($quantite) ? $quantite : 0;

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
                    "quantite"          => $val["quantite"],
                    "stock"             => getQuantiteProduit($val["id_produit"])["stock"] + ($val["quantite"] * $quantite)
                ));
            }

            echo json_encode($data);
        }
    }
}
