<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Archive extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        CheckLogin();
        CheckAdmin();
    }

    public function index()
    {
        $nbr_clients = $this->db->query("SELECT COALESCE(COUNT(id_client),0) AS nbr FROM client WHERE display = 0")->row()->nbr;

        $nbr_fourniseurs = $this->db->query("SELECT COALESCE(COUNT(id_fournisseur),0) AS nbr FROM fournisseur WHERE display = 0")->row()->nbr;

        $nbr_produits = $this->db->query("SELECT COALESCE(COUNT(id_produit),0) AS nbr FROM produit WHERE display = 0")->row()->nbr;

        $nbr_categories = $this->db->query("SELECT COALESCE(COUNT(id_categorie),0) AS nbr FROM categorie WHERE display = 0")->row()->nbr;

        $nbr_sub_categories = $this->db->query("SELECT COALESCE(COUNT(id_sub_categorie),0) AS nbr FROM sub_categorie WHERE display = 0")->row()->nbr;

        $nbr_services = $this->db->query("SELECT COALESCE(COUNT(id_service),0) AS nbr FROM service WHERE display = 0")->row()->nbr;

        $data = array(
            "nbr_clients"           => $nbr_clients,
            "nbr_fourniseurs"       => $nbr_fourniseurs,
            "nbr_produits"          => $nbr_produits,
            "nbr_categories"        => $nbr_categories,
            "nbr_sub_categories"    => $nbr_sub_categories,
            "nbr_services"    => $nbr_services,
            /* ----------------------------------- */
            "title"     => "Archives",
            "view"      => "admin/archive",
            "active"    => ""
            /* ----------------------------------- */
        );

        $this->load->view("template", $data);
    }

    public function clients()
    {
        $data = array(
            "clients" => $this->db->where("display", 0)->get("client")->result_array(),
            "is_archive" => true,
            /* ----------------------------------- */
            "title"     => "Archive - Clients",
            "view"      => "client/liste",
            "active"    => ""
            /* ----------------------------------- */
        );
        $this->load->view("template", $data);
    }

    public function fournisseurs()
    {
        $data = array(
            "fournisseurs" => $this->db->where("display", 0)->get("fournisseur")->result_array(),
            "is_archive" => true,
            /* ----------------------------------- */
            "title"     => "Archive - Fournisseurs",
            "view"      => "fournisseur/liste",
            "active"    => ""
            /* ----------------------------------- */
        );
        $this->load->view("template", $data);
    }

    public function produits()
    {
        $data = array(
            "produits"  => $this->db->query("SELECT p.*, c.full_name AS categorie, sc.full_name AS sub_categorie FROM produit p LEFT JOIN categorie c ON c.id_categorie = p.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie WHERE p.display = 0")->result_array(),
            "is_archive" => true,
            /* ----------------------------------- */
            "title"     => "Archive - Produits",
            "view"      => "produit/liste",
            "active"    => ""
            /* ----------------------------------- */
        );
        $this->load->view("template", $data);
    }

    public function categories()
    {
        $data = array(
            "categories" => $this->db->where("display", 0)->get("categorie")->result_array(),
            "is_archive" => true,
            /* ----------------------------------- */
            "title"     => "Archive - Catégories",
            "view"      => "categorie/liste",
            "active"    => ""
            /* ----------------------------------- */
        );
        $this->load->view("template", $data);
    }

    public function sub_categories()
    {
        CheckSubCategories();

        $data = array(
            "sub_categories" => $this->db->query("SELECT sc.*, c.full_name AS categorie FROM sub_categorie sc LEFT JOIN categorie c ON c.id_categorie = sc.id_categorie WHERE sc.display = 0")->result_array(),
            "is_archive" => true,
            /* ----------------------------------- */
            "title"     => "Archive - Sous-Catégories",
            "view"      => "categorie/sub_categorie/liste",
            "active"    => ""
            /* ----------------------------------- */
        );
        $this->load->view("template", $data);
    }

    public function services()
    {
        CheckService();

        $data = array(
            "services"  => $this->db->query("SELECT p.*, c.full_name AS categorie, sc.full_name AS sub_categorie FROM service p LEFT JOIN categorie c ON c.id_categorie = p.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie WHERE p.display = 0")->result_array(),
            "is_archive" => true,
            /* ----------------------------------- */
            "title"     => "Archive - SERVICES",
            "view"      => "service/liste",
            "active"    => ""
            /* ----------------------------------- */
        );
        $this->load->view("template", $data);
    }
}
