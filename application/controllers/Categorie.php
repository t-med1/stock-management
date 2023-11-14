<?php
// Set error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
defined('BASEPATH') OR exit('No direct script access allowed');



class Categorie extends CI_Controller

{

    public function __construct()

    {

        parent::__construct();



        CheckLogin();

    }



    public function index()

    {

        $data = array(

            "categories" => $this->db->where("display", 1)->get("categorie")->result_array(),

            /* ----------------------------------- */

            "title"     => "Catégories",

            "view"      => "categorie/liste",

            "active"    => "CT"

            /* ----------------------------------- */

        );

        $this->load->view("template", $data);

    }



    public function details($id)

    {

        $data = array(

            "categorie" => $this->db->where("id_categorie", $id)->get("categorie")->row(),

            "sub_categories" => $this->db->where("id_categorie", $id)->where("display", 1)->get("sub_categorie")->result_array(),

            /* ----------------------------------- */

            "title"     => "Catégories",

            "view"      => "categorie/details",

            "active"    => "CT"

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

            $this->db->insert("categorie", array(

                "full_name"     => ucfirst($full_name),

                "description"   => $this->input->post("description")

            ));

            $id_categorie = $this->db->insert_id();



            $this->session->set_flashdata("message", array(

                "title" => "Succès!",

                "message" => "Catégorie enregistré avec succès."

            ));



            /* ---------------------- USER LOG ---------------------- */

            saveUserLog("Enregistrement de catégorie ( <b>".ucfirst($full_name)."</b> )");

            /* ---------------------- -------- ---------------------- */



            redirect("/categorie/details/".$id_categorie, "refresh");

        }

        else

        {

            $data = array(

                /* ----------------------------------- */

                "title"     => "Catégories",

                "view"      => "categorie/ajouter",

                "active"    => "CT-ADD"

                /* ----------------------------------- */

            );

            $this->load->view("template", $data);

        }

    }



    public function modifier($id = null)

    {

        CheckAdmin();



        $id_categorie = $this->input->post("id_categorie");

        if(!empty($id_categorie))

        {

            $display = $this->input->post("display");

            $display_hide_updated = $this->input->post("display_hide_updated");



            $this->db->where("id_categorie", $id_categorie);

            $this->db->update("categorie", array(

                "full_name"     => ucfirst($this->input->post("full_name")),

                "description"   => $this->input->post("description"),

                "display"       => !empty($display) && $display == "false" ? 0 : 1

            ));



            $this->db->query("UPDATE sub_categorie SET display = ".(!empty($display) && $display == "false" ? 0 : 1)." WHERE id_categorie = ".$id_categorie);

            $this->db->query("UPDATE produit SET display = ".(!empty($display) && $display == "false" ? 0 : 1)." WHERE id_categorie = ".$id_categorie);



            $this->session->set_flashdata("message", array(

                "title" => "Succès!",

                "message" => "Catégorie modifié avec succès."

            ));



            /* ---------------------- USER LOG ---------------------- */

            if(!empty($display) && $display == "false") {

                $more_text = !empty($display_hide_updated) && $display_hide_updated == "true" ? "/Reprise" : "/Archivage";

            }

            else {

                $more_text = !empty($display_hide_updated) && $display_hide_updated == "true" ? "/Reprise" : "";

            }

            saveUserLog("Modification".$more_text." de catégorie ( <b>".ucfirst($this->input->post("full_name"))."</b> )");

            /* ---------------------- -------- ---------------------- */



            redirect("/categorie/details/".$id_categorie, "refresh");

        }

        else

        {

            $data = array(

                "categorie" => $this->db->where("id_categorie", $id)->get("categorie")->row(),

                /* ----------------------------------- */

                "title"     => "Catégories",

                "view"      => "categorie/modifier",

                "active"    => "CT"

                /* ----------------------------------- */

            );

            $this->load->view("template", $data);

        }

    }



    public function supprimer()

    {

        CheckAdmin();



        $id_categorie = $this->input->post("id_categorie");

        if(!empty($id_categorie))

        {

            $produits = $this->db->where("id_categorie", $id_categorie)->get("produit")->num_rows();

            $sub_categories = $this->db->where("id_categorie", $id_categorie)->get("sub_categorie")->num_rows();

            $categorie = $this->db->where("id_categorie", $id_categorie)->get("categorie")->row();



            if($produits+$sub_categories > 0)

            {

                $this->session->set_flashdata("warning", array(

                    "title" => "Alerte !",

                    "message" => "Vous ne pouvez pas supprimer cette catégorie, Elle contient des Produits/Sous-Catégories"

                ));

            }

            elseif($categorie->display == 0)

            {

                $this->session->set_flashdata("warning", array(

                    "title" => "Alerte !",

                    "message" => "Vous ne pouvez pas supprimer une catégorie dans l'archive."

                ));

            }

            else

            {

                /* ---------------------- USER LOG ---------------------- */

                saveUserLog("Suppression de catégorie ( <b>".$categorie->full_name."</b> )");

                /* ---------------------- -------- ---------------------- */



                $this->db->where("id_categorie", $id_categorie);

                $this->db->delete("categorie");



                $this->session->set_flashdata("message", array(

                    "title" => "Succès!",

                    "message" => "Catégorie supprimé avec succès."

                ));

            }

        }



        redirect("/categorie", "refresh");

    }

}

