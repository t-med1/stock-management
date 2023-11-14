<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Devis extends CI_Controller

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

            "devis" => $this->db->query("SELECT d.*, u.full_name AS utilisateur, u.role, cl.full_name AS client, v.id_vente, v.code_vente, v.num_facture FROM devis d LEFT JOIN `user` u ON u.id_user = d.id_user LEFT JOIN client cl ON cl.id_client = d.id_client LEFT JOIN vente v ON v.id_devis = d.id_devis WHERE d.date_devis BETWEEN '".$debut."' AND '".$fin."'")->result_array(),

            "date_debut" => $debut,

            "date_fin"  => $fin,

            /* ----------------------------------- */

            "title"     => "Devis",

            "view"      => "devis/liste",

            "active"    => "VT-DV"

            /* ----------------------------------- */

        );

        $this->load->view("template", $data);

    }



    public function checkCodeExists($ignore = null)

    {

        $code = $this->input->post("code_devis");

        if(!empty($code)) {

            echo json_encode(checkCodeExists($code, "devis", $ignore) ? "EXISTS" : "NOT");

        }

        else { echo json_encode("NOT"); }

    }



    public function details($id)

    {

        $data = array(

            "devis"         => $this->db->query("SELECT d.*, u.full_name AS utilisateur, u.role, cl.full_name AS client FROM devis d LEFT JOIN `user` u ON u.id_user = d.id_user LEFT JOIN client cl ON cl.id_client = d.id_client WHERE d.id_devis = ".$id)->row(),

            "devis_details" => $this->db->query("SELECT dd.*, p.full_name AS produit, s.full_name AS service, p.type, p.code_produit, p.image, p.id_categorie, p.id_sub_categorie,

                                                        s.id_categorie AS id_categorie_service, s.id_sub_categorie AS id_sub_categorie_service, ct.full_name AS categorie,

                                                        cts.full_name AS categorie_service, sc.full_name AS sub_categorie, scs.full_name AS sub_categorie_service FROM devis_details dd 

                                                LEFT JOIN produit p ON dd.id_produit = p.id_produit 

                                                LEFT JOIN service s ON dd.id_service = s.id_service 

                                                LEFT JOIN categorie ct ON ct.id_categorie = p.id_categorie 

                                                LEFT JOIN categorie cts ON cts.id_categorie = s.id_categorie 

                                                LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie 

                                                LEFT JOIN sub_categorie scs ON scs.id_sub_categorie = s.id_sub_categorie 

                                                WHERE dd.id_devis = ".$id)->result_array(),

            "vente"         => $this->db->query("SELECT * FROM vente WHERE id_devis = ".$id)->row(),

            "adresse"       => $this->db->where("id_devis", $id)->get("adresse")->row(),

            /* ----------------------------------- */

            "title"     => "Devis",

            "view"      => "devis/details",

            "active"    => "VT-DV"

            /* ----------------------------------- */

        );

        $this->load->view("template", $data);

    }



        public function ajouter()

        {

            $code_devis = $this->input->post("code_devis");

        if (!empty($code_devis))
        {
            $this->db->insert("devis", array(
                "id_client"     => $this->input->post("id_client"),
                "code_devis"    => getNewCode("D", "devis", true),
                "id_user"       => $this->session->userdata("id_user"),
                "date_devis"    => $this->input->post("date_devis"),
                "remarque"      => $this->input->post("remarque"),
                "date_debut" => $this->input->post("date_debut"),
                "date_fin" => $this->input->post("date_fin"),                
                "condition"     => $this->input->post("condition"),
                "tva"           => $this->input->post("tva")
            ));
                $id_devis = $this->db->insert_id();



                $client = $this->db->where("id_client", $this->input->post("id_client"))->get("client")->row();

                $this->db->insert("adresse", array(

                    "id_devis"      => $id_devis,

                    "id_client"     => $this->input->post("id_client"),

                    "ice"           => $client->ice,

                    "full_name"     => $client->full_name,

                    "adresse"       => $this->input->post("adresse"),

                    "ville"         => ucfirst($this->input->post("ville")),

                    "pays"          => $this->input->post("pays")

                ));



                $produits = $this->input->post("id_produit");

                $produits_free = $this->input->post("id_produit_free");

                

                if(_ENABLE_SERVICE_): 

                    $services = $this->input->post("id_service");

                    if(!empty($services))

                    {

                        foreach ($services as $val)

                        {

                            $remise = $this->input->post("s_remise_".$val);

                            $remise_dh = $this->input->post("s_remise_dh_".$val);



                            $this->db->insert("devis_details", array(

                                "id_devis"   => $id_devis,

                                "id_service"      => $this->input->post("service_".$val),

                                "quantite"      => 1,

                                "prix_vente"    => $this->input->post("s_prix_vente_".$val),

                                "remise"        => $remise ? $remise : 0,

                                "remise_dh"     => $remise_dh ? $remise_dh : 0

                            ));

                        }

                    }

                endif;



                if(!empty($produits))

                {

                    foreach ($produits as $val)

                    {

                        $remise = $this->input->post("remise_".$val);

                        $remise_dh = $this->input->post("remise_dh_".$val);



                        $this->db->insert("devis_details", array(

                            "id_devis"   => $id_devis,

                            "id_produit"    => $val,

                            "quantite"      => $this->input->post("quantite_".$val),

                            "prix_vente"    => $this->input->post("prix_vente_".$val),

                            "remise"        => $remise ? $remise : 0,

                            "remise_dh"     => $remise_dh ? $remise_dh : 0

                        ));

                    }

                }

                if(!empty($produits_free))

                {

                    foreach ($produits_free as $val)

                    {

                        $this->db->insert("devis_details", array(

                            "id_devis"   => $id_devis,

                            "id_produit"    => $val,

                            "quantite"      => $this->input->post("quantite_free_".$val),

                            "prix_vente"    => 0,

                            "remise"        => 0,

                            "remise_dh"     => 0

                        ));

                    }

                }



                $this->session->set_flashdata("message", array(

                    "title" => "Succès!",

                    "message" => "Devis enregistrée avec succès."

                ));



                /* ---------------------- USER LOG ---------------------- */

                saveUserLog("Enregistrement de devis ( <b>".$code_devis."</b> )");

                /* ---------------------- -------- ---------------------- */



                redirect("/devis/details/".$id_devis, "refresh");

            }

            else
            {
                $data = array(
                    "clients"       => $this->db->where("display", 1)->where("id_client !=", 1)->get("client")->result_array(), // WITHOUT CLIENT COMPTOIR
                    "code_devis"    => getNewCode("D", "devis"),
                    /* ----------------------------------- */
                    "title"     => "Devis",
                    "view"      => "devis/ajouter",
                    "active"    => "VT-DV"
                    /* ----------------------------------- */
                );
                $this->load->view("template", $data);
            }
        }



    public function modifier($id = null)

    {

        $code_devis = $this->input->post("code_devis");

        if(!empty($code_devis))

        {

            $this->db->where("id_devis", $this->input->post("id_devis"));

            $this->db->update("devis", array(

                "id_client"     => $this->input->post("id_client"),

                "code_devis"    => $code_devis,

                "id_user"       => $this->session->userdata("id_user"),

                "date_devis"    => $this->input->post("date_devis"),

                "remarque"      => $this->input->post("remarque"),

                "tva"           => $this->input->post("tva")

            ));



            $client = $this->db->where("id_client", $this->input->post("id_client"))->get("client")->row();

            $this->db->where("id_devis", $this->input->post("id_devis"));

            $this->db->update("adresse", array(

                "id_client"     => $this->input->post("id_client"),

                "ice"           => $client->ice,

                "full_name"     => $client->full_name,

                "adresse"       => $this->input->post("adresse"),

                "ville"         => ucfirst($this->input->post("ville")),

                "pays"          => $this->input->post("pays")

            ));



            $this->db->where("id_devis", $this->input->post("id_devis"));

            $this->db->delete("devis_details");



            $produits = $this->input->post("id_produit");

            $produits_free = $this->input->post("id_produit_free");

            if(_ENABLE_SERVICE_):

                $services = $this->input->post("id_service");

                if(!empty($services))

                {

                    foreach ($services as $val)

                    {

                        $remise = $this->input->post("s_remise_".$val);

                        $remise_dh = $this->input->post("s_remise_dh_".$val);



                        $this->db->insert("devis_details", array(

                            "id_devis"   => $this->input->post("id_devis"),

                            "id_service"      => $this->input->post("service_".$val),

                            "quantite"      => 1,

                            "prix_vente"    => $this->input->post("s_prix_vente_".$val),

                            "remise"        => $remise ? $remise : 0,

                            "remise_dh"     => $remise_dh ? $remise_dh : 0,

                        ));



                        // echo 'id_devis =>'.$this->input->post("id_devis").'<br>';

                        // echo 'service_id =>'.$val.'<br>';

                        // echo 's_prix_vente_ =>'.$this->input->post("s_prix_vente_".$val).'<br>';

                        // echo 'remise_ =>'.$this->input->post("s_remise_".$val).'<br>';

                        // echo 'remise_dh_ =>'.$this->input->post("s_remise_dh_".$val).'<br><br><br><br>';

                    }

                }

            endif;

            if(!empty($produits))

            {

                foreach ($produits as $val)

                {

                    $remise = $this->input->post("remise_".$val);

                    $remise_dh = $this->input->post("remise_dh_".$val);



                    $this->db->insert("devis_details", array(

                        "id_devis"   => $this->input->post("id_devis"),

                        "id_produit"    => $val,

                        "quantite"      => $this->input->post("quantite_".$val),

                        "prix_vente"    => $this->input->post("prix_vente_".$val),

                            "remise"        => $remise ? $remise : 0,

                            "remise_dh"     => $remise_dh ? $remise_dh : 0,

                    ));



                    // echo 'id_devis =>'.$this->input->post("id_devis").'<br>';

                    // echo 'id_produit =>'.$val.'<br>';

                    // echo 'quantite_ =>'.$this->input->post("quantite_".$val).'<br>';

                    // echo 'prix_vente_ =>'.$this->input->post("prix_vente_".$val).'<br>';

                    // echo 'remise_ =>'.$this->input->post("remise_".$val).'<br>';

                    // echo 'remise_dh_ =>'.$this->input->post("remise_dh_".$val).'<br><br><br>';

                }

            }

            if(!empty($produits_free))

            {

                foreach ($produits_free as $val)

                {

                    $this->db->insert("devis_details", array(

                        "id_devis"   => $this->input->post("id_devis"),

                        "id_produit"    => $val,

                        "quantite"      => $this->input->post("quantite_free_".$val),

                        "prix_vente"    => 0,

                        "remise"        => 0,

                        "remise_dh"     => 0

                    ));

                }

            }



            $this->session->set_flashdata("message", array(

                "title" => "Succès!",

                "message" => "Devis modifiée avec succès."

            ));



            /* ---------------------- USER LOG ---------------------- */

            saveUserLog("Modification de devis ( <b>".$code_devis."</b> )");

            /* ---------------------- -------- ---------------------- */



            redirect("/devis/details/".$this->input->post("id_devis"), "refresh");

        }

        else

        {



            $devis = $this->db->where("id_devis", $id)->get("devis")->row();

            

            $devis_details = $this->db->query("SELECT dd.*, p.full_name AS produit, s.full_name AS service, p.code_produit, p.image, p.description,

                                                        ct.full_name AS categorie, cts.full_name AS categorie_service, scs.full_name AS sub_categorie_service,

                                                        sc.full_name AS sub_categorie FROM devis_details dd 

                                                        LEFT JOIN produit p ON dd.id_produit = p.id_produit 

                                                        LEFT JOIN service s ON dd.id_service = s.id_service 

                                                        LEFT JOIN categorie ct ON ct.id_categorie = p.id_categorie 

                                                        LEFT JOIN categorie cts ON cts.id_categorie = s.id_categorie 

                                                        LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie 

                                                        LEFT JOIN sub_categorie scs ON scs.id_sub_categorie = s.id_sub_categorie 

                                                        WHERE dd.id_devis = ".$id)->result_array();

            $data = array(

                "clients"           => $this->db->where("display", 1)->get("client")->result_array(),

                "devis"          => $devis,

                "devis_details"  => $devis_details,

                "client"         => $this->db->where("id_client", $devis->id_client)->get("client")->row(),

                /* ----------------------------------- */

                "title"     => "Devis",

                "view"      => "devis/modifier",

                "active"    => "VT-DV"

                /* ----------------------------------- */

            );



            // print_r(count($devis_details));



            $this->load->view("template", $data);

        }

    }



    public function supprimer()

    {

        CheckAdmin();



        $id_devis = $this->input->post("id_devis");

        if(!empty($id_devis))

        {

            $ventes = $this->db->where("id_devis", $id_devis)->get("vente")->num_rows();



            if( $ventes > 0 )

            {

                $this->session->set_flashdata("warning", array(

                    "title" => "Alerte !",

                    "message" => "Vous ne pouvez pas supprimer cet devis. Il est lié avec une Vente."

                ));



                redirect("/devis", "refresh");

            }



            /* ---------------------- USER LOG ---------------------- */

            saveUserLog("Suppression de devis ( <b>".$this->db->where("id_devis", $id_devis)->get("devis")->row()->code_devis."</b> )");

            /* ---------------------- -------- ---------------------- */



            $this->db->where("id_devis", $id_devis);

            $this->db->delete("devis");



            $this->session->set_flashdata("message", array(

                "title" => "Succès!",

                "message" => "Devis supprimée avec succès."

            ));

        }



        redirect("/devis", "refresh");

    }



    public function imprimer($id)

    {

        $devis = $this->db->query("SELECT d.*, u.full_name AS utilisateur, u.role FROM devis d LEFT JOIN `user` u ON u.id_user = d.id_user WHERE d.id_devis = ".$id)->row();

        $data = array(

            "devis"         => $devis,

            "devis_details" => $this->db->query("SELECT dd.*, p.full_name AS produit, s.full_name AS service, p.code_produit, ct.full_name AS categorie FROM devis_details dd 

                                                LEFT JOIN produit p ON dd.id_produit = p.id_produit 

                                                LEFT JOIN service s ON dd.id_service = s.id_service 

                                                LEFT JOIN categorie ct ON ct.id_categorie = p.id_categorie 

                                                WHERE dd.id_devis = ".$id)->result_array(),

            "adresse"       => $this->db->where("id_devis", $id)->get("adresse")->row(),

            "info"          => $this->db->get("information")->row()

        );

        $this->load->view("devis/imprimer", $data);



        $html = $this->output->get_output();



        $this->load->library('pdf');

        $this->dompdf->loadHtml($html);

        $this->dompdf->setPaper('A4', 'portrait');

        $this->dompdf->render();

        $this->dompdf->stream("DEVIS - ".$devis->code_devis.".pdf", array("Attachment"=>0));

    }

}

