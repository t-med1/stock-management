<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sub_categorie extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        CheckLogin();
        CheckSubCategories();
    }

    public function index()
    {
        $data = array(
            "sub_categories" => $this->db->query("SELECT sc.*, c.full_name AS categorie FROM sub_categorie sc LEFT JOIN categorie c ON c.id_categorie = sc.id_categorie WHERE sc.display = 1")->result_array(),
            /* ----------------------------------- */
            "title"     => "Sous-Catégories",
            "view"      => "categorie/sub_categorie/liste",
            "active"    => "SCT"
            /* ----------------------------------- */
        );
        $this->load->view("template", $data);
    }

    public function details($id)
    {
        $data = array(
            "sub_categorie" => $this->db->query("SELECT sc.*, c.full_name AS categorie FROM sub_categorie sc LEFT JOIN categorie c ON sc.id_categorie = c.id_categorie WHERE sc.id_sub_categorie = ".$id)->row(),
            /* ----------------------------------- */
            "title"     => "Sous-Catégories",
            "view"      => "categorie/sub_categorie/details",
            "active"    => "SCT"
            /* ----------------------------------- */
        );
        $this->load->view("template", $data);
    }

    public function ajouter()
    {
        CheckAdmin();
        
        $full_name = $this->input->post("full_name");
        if(!empty($full_name))
        {
            $this->db->insert("sub_categorie", array(
                "id_categorie"  => $this->input->post("id_categorie"),
                "full_name"     => ucfirst($full_name),
                "description"   => $this->input->post("description")
            ));
            $id_sub_categorie = $this->db->insert_id();

            $this->session->set_flashdata("message", array(
                "title" => "Succès!",
                "message" => "Sous-Catégorie enregistré avec succès."
            ));

            /* ---------------------- USER LOG ---------------------- */
            saveUserLog("Enregistrement de sous-catégorie ( <b>".ucfirst($full_name)."</b> )");
            /* ---------------------- -------- ---------------------- */

            redirect("/sub_categorie/details/".$id_sub_categorie, "refresh");
        }
        else
        {
            $data = array(
                "categories" => $this->db->get("categorie")->result_array(),
                /* ----------------------------------- */
                "title"     => "Sous-Catégories",
                "view"      => "categorie/sub_categorie/ajouter",
                "active"    => "SCT-ADD"
                /* ----------------------------------- */
            );
            $this->load->view("template", $data);
        }
    }

    public function modifier($id = null)
    {
        CheckAdmin();

        $id_sub_categorie = $this->input->post("id_sub_categorie");
        if(!empty($id_sub_categorie))
        {
            $display = $this->input->post("display");
            $display_hide_updated = $this->input->post("display_hide_updated");

            $this->db->where("id_sub_categorie", $id_sub_categorie);
            $this->db->update("sub_categorie", array(
                "id_categorie"  => $this->input->post("id_categorie"),
                "full_name"     => ucfirst($this->input->post("full_name")),
                "description"   => $this->input->post("description"),
                "display"       => !empty($display) && $display == "false" ? 0 : 1
            ));

            $this->db->query("UPDATE produit SET display = ".(!empty($display) && $display == "false" ? 0 : 1)." WHERE id_sub_categorie = ".$id_sub_categorie);

            $this->session->set_flashdata("message", array(
                "title" => "Succès!",
                "message" => "Sous-Catégorie modifié avec succès."
            ));

            /* ---------------------- USER LOG ---------------------- */
            if(!empty($display) && $display == "false") {
                $more_text = !empty($display_hide_updated) && $display_hide_updated == "true" ? "/Reprise" : "/Archivage";
            }
            else {
                $more_text = !empty($display_hide_updated) && $display_hide_updated == "true" ? "/Reprise" : "";
            }
            saveUserLog("Modification".$more_text." de sous-catégorie ( <b>".ucfirst($this->input->post("full_name"))."</b> )");
            /* ---------------------- -------- ---------------------- */

            redirect("/sub_categorie/details/".$id_sub_categorie, "refresh");
        }
        else
        {
            $data = array(
                "categories" => $this->db->get("categorie")->result_array(),
                "sub_categorie" => $this->db->where("id_sub_categorie", $id)->get("sub_categorie")->row(),
                /* ----------------------------------- */
                "title"     => "Sous-Catégories",
                "view"      => "categorie/sub_categorie/modifier",
                "active"    => "SCT"
                /* ----------------------------------- */
            );
            $this->load->view("template", $data);
        }
    }

    public function supprimer()
    {
        CheckAdmin();

        $id_sub_categorie = $this->input->post("id_sub_categorie");
        if(!empty($id_sub_categorie))
        {
            $produits = $this->db->where("id_sub_categorie", $id_sub_categorie)->get("produit")->num_rows();
            $sub_categorie = $this->db->where("id_sub_categorie", $id_sub_categorie)->get("sub_categorie")->row();

            if( $produits > 0)
            {
                $this->session->set_flashdata("warning", array(
                    "title" => "Alerte !",
                    "message" => "Vous ne pouvez pas supprimer cette sous-catégorie, Elle contient des Produits."
                ));
            }
            elseif($sub_categorie->display == 0)
            {
                $this->session->set_flashdata("warning", array(
                    "title" => "Alerte !",
                    "message" => "Vous ne pouvez pas supprimer une sous-catégorie dans l'archive."
                ));
            }
            else
            {
                /* ---------------------- USER LOG ---------------------- */
                saveUserLog("Suppression de sous-catégorie ( <b>".$sub_categorie->full_name."</b> )");
                /* ---------------------- -------- ---------------------- */

                $this->db->where("id_sub_categorie", $id_sub_categorie);
                $this->db->delete("sub_categorie");

                $this->session->set_flashdata("message", array(
                    "title" => "Succès!",
                    "message" => "Sous-Catégorie supprimé avec succès."
                ));
            }
        }

        redirect("/sub_categorie", "refresh");
    }
}
