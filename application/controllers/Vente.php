<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vente extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        CheckLogin();
    }

    public function index()
    {
        $debut = date("Y-m")."-01";
        $fin = date("Y-m-t"); // t = last day of current month
        $submit_date_debut = $this->input->get("date_debut");
        $submit_date_fin = $this->input->get("date_fin");
        
        if (!empty($submit_date_debut) && !empty($submit_date_fin)) {
            $debut = date("Y-m-d", strtotime($submit_date_debut));
            $fin = date("Y-m-d", strtotime($submit_date_fin));
        }
    
        // Calculate the remaining variable here
        $remaining = 0; // Replace this with your actual logic to calculate remaining
        $ventes = $this->db->query("SELECT v.*, u.full_name AS utilisateur, u.role, cl.full_name AS client FROM vente v LEFT JOIN `user` u ON u.id_user = v.id_user LEFT JOIN client cl ON cl.id_client = v.id_client WHERE v.date_vente BETWEEN '".$debut."' AND '".$fin."'")->result_array();
        
        $data = array(
            "ventes" => $ventes,
            "date_debut" => $debut,
            "date_fin"  => $fin,
            "remaining" => $remaining, // Include the remaining variable in the data array
            "title"     => "Ventes",
            "view"      => "vente/liste",
            "active"    => "VT"
        );
        
        $this->load->view("template", $data);
    }
    

	public function factures()
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
            "factures"    => $this->db->query("SELECT f.*, cl.full_name AS client FROM facture f Left join client cl ON cl.id_client = f.id_client WHERE f.date BETWEEN '".$debut."' AND '".$fin."'")->result_array(),
            "date_debut" => $debut,
            "date_fin"  => $fin,
            /* ----------------------------------- */
            "title"     => "Factures",
            "view"      => "vente/liste_factures",
            "active"    => "VT-FACT"
            /* ----------------------------------- */
        );
        $this->load->view("template", $data);
    }

    public function checkCodeExists($ignore = null)
    {
        $code = $this->input->post("code_vente");
        if(!empty($code)) {
            echo json_encode(checkCodeExists($code, "vente", $ignore) ? "EXISTS" : "NOT");
        }
        else { echo json_encode("NOT"); }
    }

    public function checkNumFactureExists($ignore = null)
    {
        $num_facture = $this->input->post("num_facture");
        if(!empty($num_facture))
        {
            $ignore_sql = $ignore != null ? " AND id_facture != ".$ignore : "";
            $temp = $this->db->query("SELECT id_facture FROM facture WHERE num_facture = '".$num_facture."' ".$ignore_sql)->row();
            echo json_encode(!empty($temp) ? "EXISTS" : "NOT");
        }
        else { echo json_encode("NOT"); }
    }

    public function details($id)
{
    $vente_details = $this->db->query("SELECT cd.*,s.full_name AS service, s.image AS image_s, s.id_categorie AS id_categorie_s,p.code_produit AS code_produit ,
                                        s.id_sub_categorie AS id_sub_categorie_s, cts.full_name AS categorie_s, scs.full_name AS sub_categorie_s, 
                                        p.full_name AS produit, p.type, p.code_produit, p.image AS image_p, p.id_categorie AS id_categorie_p, p.id_sub_categorie AS id_sub_categorie_p, 
                                        ctp.full_name AS categorie_p, scp.full_name AS sub_categorie_p 
                                        FROM vente_details cd 
                                        LEFT JOIN produit p ON cd.id_produit = p.id_produit 
                                        LEFT JOIN service s ON cd.id_service = s.id_service 
                                        LEFT JOIN categorie ctp ON ctp.id_categorie = p.id_categorie 
                                        LEFT JOIN categorie cts ON cts.id_categorie = s.id_categorie 
                                        LEFT JOIN sub_categorie scp ON scp.id_sub_categorie = p.id_sub_categorie 
                                        LEFT JOIN sub_categorie scs ON scs.id_sub_categorie = s.id_sub_categorie 
                                        WHERE cd.id_vente = ".$id)->result_array();

    $data = array(
        "vente"         => $this->db->query("SELECT v.*,f.num_facture ,tr.code_transport AS transport , u.full_name AS utilisateur, u.role, cl.full_name AS client, cc.code_client_cmd, d.code_devis FROM vente v LEFT JOIN `user` u ON u.id_user = v.id_user LEFT JOIN `facture` f ON f.num_facture = v.num_facture COLLATE utf8_unicode_ci LEFT JOIN client cl ON cl.id_client = v.id_client LEFT JOIN transport tr ON tr.id_transport = v.id_transport LEFT JOIN client_cmd cc ON cc.id_client_cmd = v.id_client_cmd LEFT JOIN devis d ON d.id_devis = v.id_devis WHERE v.id_vente = ".$id)->row(),
        "vente_details" => $vente_details,
        "adresse"       => $this->db->where("id_vente", $id)->get("adresse")->row(),
        //"avoirs"        => $this->db->query("SELECT a.*, u.full_name AS utilisateur, u.role, cl.full_name AS client FROM avoir a LEFT JOIN `user` u ON u.id_user = a.id_user LEFT JOIN client cl ON cl.id_client = a.id_client WHERE a.id_vente = LEFT JOIN categorie ct ON ct.id_categorie = p.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie ".$id)->result_array(),
        /* ----------------------------------- */
        "title"     => "Ventes",
        "view"      => "vente/details",
        "active"    => "VT"
        /* ----------------------------------- */
    );
    $this->load->view("template", $data);
}

	public function rapide($print = null)
    {
        $code_vente = $this->input->post("code_vente");
        if(!empty($code_vente))
        {
            $this->db->insert("vente", array(
                "id_client"     => 1, // CLIENT COMPTOIR
                "code_vente"    => getNewCode("BL", "vente", true),
                "id_user"       => $this->session->userdata("id_user"),
                "date_vente"    => $this->input->post("date_vente"),
                "remarque"      => $this->input->post("remarque"),
                "tva"           => $this->input->post("tva")
            ));
            $id_vente = $this->db->insert_id();

            $client = $this->db->where("id_client", 1)->get("client")->row();
            $this->db->insert("adresse", array(
                "id_vente"      => $id_vente,
                "id_client"     => 1, // CLIENT COMPTOIR
                "full_name"     => $client->full_name,
                "adresse"       => $this->input->post("adresse"),
                "ville"         => ucfirst($this->input->post("ville")),
                "pays"          => $this->input->post("pays")
            ));

            $services = $this->input->post("id_service");
            $produits = $this->input->post("id_produit");
            $produits_free = $this->input->post("id_produit_free");

            if(!empty($services))
            {
                foreach ($services as $val)
                {
                    $remise = $this->input->post("s_remise_".$val);
                    $remise_dh = $this->input->post("s_remise_dh_".$val);
                    $this->db->insert("vente_details", array(
                        "id_vente"   => $id_vente,
                        "quantite"   => 1,
                        "id_service"    => $this->input->post("service_".$val),
                        "prix_vente"    => $this->input->post("s_prix_vente_".$val),
                        "remise"        => $remise ? $remise : 0,
                        "remise_dh"     => $remise_dh ? $remise_dh : 0,
                    ));
                }
            }

            if(!empty($produits))
            {
                foreach ($produits as $val)
                {
                    $remise = $this->input->post("remise_".$val);
                    $remise_dh = $this->input->post("remise_dh_".$val);

                    $this->db->insert("vente_details", array(
                        "id_vente"   => $id_vente,
                        "id_produit"    => $val,
                        "quantite"      => $this->input->post("quantite_".$val),
                        "prix_vente"    => $this->input->post("prix_vente_".$val),
                        "remise"        => $remise ? $remise : 0,
                        "remise_dh"     => $remise_dh ? $remise_dh : 0,
                    ));
                }
            }
            if(!empty($produits_free))
            {
                foreach ($produits_free as $val)
                {
                    $this->db->insert("vente_details", array(
                        "id_vente"   => $id_vente,
                        "id_produit"    => $val,
                        "quantite"      => $this->input->post("quantite_free_".$val),
                        "prix_vente"    => 0,
                        "remise"        => 0,
                        "remise_dh"     => 0
                    ));
                }
            }

            $paiement_log = "";
            if($this->input->post("vente_paiement") > 0)
            {
                $methode = $this->input->post("vente_methode");

                $this->db->insert("paiement", array(
                    "id_vente"      => $id_vente,
                    "id_user"       => $this->session->userdata("id_user"),
                    "montant"       => $this->input->post("vente_paiement"),
                    "methode"       => $methode,
                    "type"          => 1, // 1 = vente
                    "date_paiement" => $this->input->post("date_vente")
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
                        "remarque"      => $this->input->post("cheque_remarque"),
                        "methode"       => $methode,
                        "type"          => 1, // 1 = vente
                    ));
                    $methode_log = " [ ".$this->input->post("cheque_reference")." - ".date("d/m/Y", strtotime($this->input->post("cheque_date")))." ]";
                }

                $paiement_log = " avec paiement ( <b>".number_format($this->input->post("vente_paiement"),2,"."," ")."</b> DH / <b>".getMethodePaiement($methode)."</b>".$methode_log." )";
            }

            $this->session->set_flashdata("message", array(
                "title" => "Succès!",
                "message" => "Vente enregistrée avec succès."
            ));

            /* ---------------------- USER LOG ---------------------- */
            saveUserLog("Enregistrement de vente au comptoir ( <b>".$code_vente."</b> )".$paiement_log);
            /* ---------------------- -------- ---------------------- */

            redirect("/vente/rapide/".$id_vente, "refresh");
        }
        else
        {
            $data = array(
                "client"        => $this->db->where("id_client", 1)->get("client")->row(),
                "code_vente"    => getNewCode("BL", "vente"),
                "print"         => $print,
                "type_vente"    => "rapide",
                /* ----------------------------------- */
                "title"     => "Ventes",
                "view"      => "vente/ajouter",
                "active"    => "VT-RPD"
                /* ----------------------------------- */
            );
            $this->load->view("template", $data);
        }
    }
    public function teste($type = null, $id_type = null){
        $code_vente = $this->input->post("code_vente");
        $id_client_cmd_input = $this->input->post("id_client_cmd");
        $id_devis_input = $this->input->post("id_devis");
        $table_name = '';
        if(!empty($code_vente))
        {
            $this->db->insert("vente", array(
                "id_client"     => $this->input->post("id_client"),
                "id_transport"     => $this->input->post("id_transport"),
                "id_client_cmd" => !empty($id_client_cmd_input) ? $id_client_cmd_input : null,
                "id_devis"      => !empty($id_devis_input) ? $id_devis_input : null,
                "code_vente"    => getNewCode("BL", "vente", true),
                "id_user"       => $this->session->userdata("id_user"),
                "date_vente"    => $this->input->post("date_vente"),
                "remarque"      => $this->input->post("remarque"),
                "normal" => 0
                // "tva"           => $this->input->post("tva")
            ));
            $id_vente = $this->db->insert_id();

            $client = $this->db->where("id_client", $this->input->post("id_client"))->get("client")->row();
            $this->db->insert("adresse", array(
                "id_vente"      => $id_vente,
                "id_client"     => $this->input->post("id_client"),
                "ice"           => $client->ice,
                "full_name"     => $client->full_name,
                "adresse"       => $this->input->post("adresse"),
                "ville"         => ucfirst($this->input->post("ville")),
                "pays"          => $this->input->post("pays")
            ));

            $services = $this->input->post("id_service");
            $produits = $this->input->post("id_produit");
            // $produits_free = $this->input->post("id_produit_free");

            if(!empty($services))
            {
                foreach ($services as $val)
                {
                    $this->db->insert("vente_details", array(
                        "id_vente"   => $id_vente,
                        "id_service"    => $this->input->post("service_".$val),
                        "quantite"   => 1,
                        "prix_vente"    => $this->input->post("s_prix_vente_".$val),
                        "remise"        => $this->input->post("s_remise_".$val),
                        "remise_dh"     => $this->input->post("s_remise_dh_".$val)
                    ));
                }
            }

            if(!empty($produits))
            {
                foreach ($produits as $val)
                {
                    $this->db->insert("vente_details", array(
                        "id_vente"   => $id_vente,
                        "id_produit"    => $val,
                        "quantite"      => $this->input->post("quantite_".$val),
                        // "prix_vente"    => $this->input->post("prix_vente_".$val),
                        // // "remise"        => $this->input->post("remise_".$val),
                        // // "remise_dh"     => $this->input->post("remise_dh_".$val)
                    ));

                }
            }

            // if(!empty($produits_free))
            // {
            //     foreach ($produits_free as $val)
            //     {
            //         $this->db->insert("vente_details", array(
            //             "id_vente"   => $id_vente,
            //             "id_produit"    => $val,
            //             "quantite"      => $this->input->post("quantite_free_".$val),
            //             "prix_vente"    => 0,
            //             "remise"        => 0,
            //             "remise_dh"     => 0
            //         ));
            //     }
            // }

            // $paiement_log = "";
            // if($this->input->post("vente_paiement") > 0)
            // {
            //     $methode = $this->input->post("vente_methode");

            //     // $this->db->insert("paiement", array(
            //     //     "id_vente"      => $id_vente,
            //     //     "id_user"       => $this->session->userdata("id_user"),
            //     //     "montant"       => $this->input->post("vente_paiement"),
            //     //     "methode"       => $methode,
            //     //     "type"          => 1, // 1 = vente
            //     //     "date_paiement" => $this->input->post("date_vente"),
            //     //     "type_avance"   => $methode == 5 ? $this->input->post("type_avance") : null
            //     // ));
            //     // $id_paiement = $this->db->insert_id();

            //     $methode_log = "";
            //     if($methode == 2 || $methode == 3)
            //     {
            //         $this->db->insert("cheque", array(
            //             "id_paiement"   => $id_paiement,
            //             "montant"       => $this->input->post("cheque_montant"),
            //             "date_cheque"   => $this->input->post("cheque_date"),
            //             "reference"     => $this->input->post("cheque_reference"),
            //             "remarque"      => $this->input->post("cheque_remarque"),
            //             "methode"       => $methode,
            //             "type"          => 1, // 1 = vente
            //         ));
            //         $methode_log = " [ ".$this->input->post("cheque_reference")." - ".date("d/m/Y", strtotime($this->input->post("cheque_date")))." ]";
            //     }

            //     $paiement_log = " avec paiement ( <b>".number_format($this->input->post("vente_paiement"),2,"."," ")."</b> DH / <b>".getMethodePaiement($methode)."</b>".$methode_log." )";
            // }

            $this->session->set_flashdata("message", array(
                "title" => "Succès!",
                "message" => "Vente enregistrée avec succès."
            ));

            /* ---------------------- USER LOG ---------------------- */
            // saveUserLog("Enregistrement de vente ( <b>".$code_vente."</b> )".$paiement_log);
            /* ---------------------- -------- ---------------------- */

            redirect("/vente/details/".$id_vente, "refresh");
        }
        else
        {
            $object = array();
            $object_details = array();
            if($type != null && $id_type != null)
            {
                $table_name = $type == "cmd" ? "client_cmd" : "devis";
                $object = $this->db->query("SELECT x.*, u.full_name AS utilisateur, u.role, c.full_name AS client, c.remise FROM ".$table_name." x LEFT JOIN client c ON c.id_client = x.id_client LEFT JOIN `user` u ON u.id_user = x.id_user WHERE x.id_".$table_name." = ".$id_type)->row();
                $object_details = $this->db->query("SELECT cd.*, p.full_name AS produit, s.full_name AS service, p.code_produit, p.image, p.description, c.full_name AS categorie, 
                                                             cs.full_name AS categorie_s, sc.full_name AS sub_categorie, scs.full_name AS sub_categorie_s FROM ".$table_name."_details cd 
                                                            LEFT JOIN produit p ON cd.id_produit = p.id_produit 
                                                            LEFT JOIN service s ON cd.id_service = s.id_service 
                                                            LEFT JOIN categorie c ON c.id_categorie = p.id_categorie 
                                                            LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie 
                                                            LEFT JOIN categorie cs ON cs.id_categorie = s.id_categorie 
                                                            LEFT JOIN sub_categorie scs ON scs.id_sub_categorie = s.id_sub_categorie 
                                                            WHERE cd.id_".$table_name." = ".$id_type)->result_array();
            }

            $data = array(
                "clients"       => $this->db->query("SELECT * FROM client where display = 1 AND id_client != 1 AND role_client = 'cite' ")->result_array(), // WITHOUT CLIENT COMPTOIR
                "transports"       => $this->db->where("display", 1)->get("transport")->result_array(),
                "code_vente"    => getNewCode("BL", "vente"),
                "object"            => $object,
                "object_details"    => $object_details,
                "table_name" => $table_name,
                "type_vente"    => "ajouter",
                /* ----------------------------------- */
                "title"     => "Ventes",
                "view"      => "vente/testeAj",
                "active"    => "VT-TST"
                /* ----------------------------------- */
            );
            $this->load->view("template", $data);
        }
    }

    public function ajouter($type = null, $id_type = null)
	{
        $code_vente = $this->input->post("code_vente");
        $id_client_cmd_input = $this->input->post("id_client_cmd");
        $id_devis_input = $this->input->post("id_devis");
        $table_name = '';
        if(!empty($code_vente))
        {
            $this->db->insert("vente", array(
                "id_client"     => $this->input->post("id_client"),
                "id_transport"     => $this->input->post("id_transport"),
                "id_client_cmd" => !empty($id_client_cmd_input) ? $id_client_cmd_input : null,
                "id_devis"      => !empty($id_devis_input) ? $id_devis_input : null,
                "code_vente"    => getNewCode("BL", "vente", true),
                "id_user"       => $this->session->userdata("id_user"),
                "date_vente"    => $this->input->post("date_vente"),
                "remarque"      => $this->input->post("remarque"),
                "tva"           => $this->input->post("tva"),
                "normal" => 1
            ));
            $id_vente = $this->db->insert_id();

            $client = $this->db->where("id_client", $this->input->post("id_client"))->get("client")->row();
            $this->db->insert("adresse", array(
                "id_vente"      => $id_vente,
                "id_client"     => $this->input->post("id_client"),
                "ice"           => $client->ice,
                "full_name"     => $client->full_name,
                "adresse"       => $this->input->post("adresse"),
                "ville"         => ucfirst($this->input->post("ville")),
                "pays"          => $this->input->post("pays")
            ));

            $services = $this->input->post("id_service");
            $produits = $this->input->post("id_produit");
            $produits_free = $this->input->post("id_produit_free");

            if(!empty($services))
            {
                foreach ($services as $val)
                {
                    $this->db->insert("vente_details", array(
                        "id_vente"   => $id_vente,
                        "id_service"    => $this->input->post("service_".$val),
                        "quantite"   => 1,
                        "prix_vente"    => $this->input->post("s_prix_vente_".$val),
                        "remise"        => $this->input->post("s_remise_".$val),
                        "remise_dh"     => $this->input->post("s_remise_dh_".$val)
                    ));
                }
            }

            if(!empty($produits))
            {
                foreach ($produits as $val)
                {
                    $this->db->insert("vente_details", array(
                        "id_vente"   => $id_vente,
                        "id_produit"    => $val,
                        "quantite"      => $this->input->post("quantite_".$val),
                        "prix_vente"    => $this->input->post("prix_vente_".$val),
                        "remise"        => $this->input->post("remise_".$val),
                        "remise_dh"     => $this->input->post("remise_dh_".$val)
                    ));

                }
            }

            if(!empty($produits_free))
            {
                foreach ($produits_free as $val)
                {
                    $this->db->insert("vente_details", array(
                        "id_vente"   => $id_vente,
                        "id_produit"    => $val,
                        "quantite"      => $this->input->post("quantite_free_".$val),
                        "prix_vente"    => 0,
                        "remise"        => 0,
                        "remise_dh"     => 0
                    ));
                }
            }

            $paiement_log = "";
            if($this->input->post("vente_paiement") > 0)
            {
                $methode = $this->input->post("vente_methode");

                $this->db->insert("paiement", array(
                    "id_vente"      => $id_vente,
                    "id_user"       => $this->session->userdata("id_user"),
                    "montant"       => $this->input->post("vente_paiement"),
                    "methode"       => $methode,
                    "type"          => 1, // 1 = vente
                    "date_paiement" => $this->input->post("date_vente"),
                    "type_avance"   => $methode == 5 ? $this->input->post("type_avance") : null
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
                        "remarque"      => $this->input->post("cheque_remarque"),
                        "methode"       => $methode,
                        "type"          => 1, // 1 = vente
                    ));
                    $methode_log = " [ ".$this->input->post("cheque_reference")." - ".date("d/m/Y", strtotime($this->input->post("cheque_date")))." ]";
                }

                $paiement_log = " avec paiement ( <b>".number_format($this->input->post("vente_paiement"),2,"."," ")."</b> DH / <b>".getMethodePaiement($methode)."</b>".$methode_log." )";
            }

            $this->session->set_flashdata("message", array(
                "title" => "Succès!",
                "message" => "Vente enregistrée avec succès."
            ));

            /* ---------------------- USER LOG ---------------------- */
            saveUserLog("Enregistrement de vente ( <b>".$code_vente."</b> )".$paiement_log);
            /* ---------------------- -------- ---------------------- */

            redirect("/vente/details/".$id_vente, "refresh");
        }
        else
        {
            $object = array();
            $object_details = array();
            if($type != null && $id_type != null)
            {
                $table_name = $type == "cmd" ? "client_cmd" : "devis";
                $object = $this->db->query("SELECT x.*, u.full_name AS utilisateur, u.role, c.full_name AS client, c.remise FROM ".$table_name." x LEFT JOIN client c ON c.id_client = x.id_client LEFT JOIN `user` u ON u.id_user = x.id_user WHERE x.id_".$table_name." = ".$id_type)->row();
                $object_details = $this->db->query("SELECT cd.*, p.full_name AS produit, s.full_name AS service, p.code_produit, p.image, p.description, c.full_name AS categorie, 
                                                             cs.full_name AS categorie_s, sc.full_name AS sub_categorie, scs.full_name AS sub_categorie_s FROM ".$table_name."_details cd 
                                                            LEFT JOIN produit p ON cd.id_produit = p.id_produit 
                                                            LEFT JOIN service s ON cd.id_service = s.id_service 
                                                            LEFT JOIN categorie c ON c.id_categorie = p.id_categorie 
                                                            LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie 
                                                            LEFT JOIN categorie cs ON cs.id_categorie = s.id_categorie 
                                                            LEFT JOIN sub_categorie scs ON scs.id_sub_categorie = s.id_sub_categorie 
                                                            WHERE cd.id_".$table_name." = ".$id_type)->result_array();
            }

            $data = array(
                "clients"       => $this->db->where("display", 1)->where("id_client !=", 1)->get("client")->result_array(), // WITHOUT CLIENT COMPTOIR
                "transports"       => $this->db->where("display", 1)->get("transport")->result_array(),
                "code_vente"    => getNewCode("BL", "vente"),
                "object"            => $object,
                "object_details"    => $object_details,
                "table_name" => $table_name,
                "type_vente"    => "ajouter",
                /* ----------------------------------- */
                "title"     => "Ventes",
                "view"      => "vente/ajouter",
                "active"    => "VT-ADD"
                /* ----------------------------------- */
            );
            $this->load->view("template", $data);
        }
	}

    public function modifier($id = null)
    {
        $code_vente = $this->input->post("code_vente");
        if(!empty($code_vente))
        {

            $this->db->where("id_vente", $this->input->post("id_vente"));
            $this->db->update("vente", array(
                "id_client"     => $this->input->post("id_client"),
                "code_vente"    => $code_vente,
                "id_user"       => $this->session->userdata("id_user"),
                "date_vente"    => $this->input->post("date_vente"),
                "remarque"      => $this->input->post("remarque"),
                "tva"           => $this->input->post("tva")
            ));

            $client = $this->db->where("id_client", $this->input->post("id_client"))->get("client")->row();
            $this->db->where("id_vente", $this->input->post("id_vente"));
            $this->db->update("adresse", array(
                "id_client"     => $this->input->post("id_client"),
                "ice"           => $client->ice,
                "full_name"     => $client->full_name,
                "adresse"       => $this->input->post("adresse"),
                "ville"         => ucfirst($this->input->post("ville")),
                "pays"          => $this->input->post("pays")
            ));

            $this->db->where("id_vente", $this->input->post("id_vente"));
            $this->db->delete("vente_details");

            $services = $this->input->post("id_service");
            $produits = $this->input->post("id_produit");
            $produits_free = $this->input->post("id_produit_free");

            if(!empty($services))
            {
                foreach ($services as $val)
                {
                    $this->db->insert("vente_details", array(
                        "id_vente"      => $this->input->post("id_vente"),
                        "quantite"    => 1,
                        "id_service"    => $this->input->post("service_".$val),
                        "prix_vente"    => $this->input->post("s_prix_vente_".$val),
                        "remise"        => $this->input->post("s_remise_".$val),
                        "remise_dh"     => $this->input->post("s_remise_dh_".$val)
                    ));
                }
            }

            if(!empty($produits))
            {
                foreach ($produits as $val)
                {
                    $this->db->insert("vente_details", array(
                        "id_vente"   => $this->input->post("id_vente"),
                        "id_produit"    => $val,
                        "quantite"      => $this->input->post("quantite_".$val),
                        "prix_vente"    => $this->input->post("prix_vente_".$val),
                        "remise"        => $this->input->post("remise_".$val),
                        "remise_dh"     => $this->input->post("remise_dh_".$val)
                    ));
                }
            }
            if(!empty($produits_free))
            {
                foreach ($produits_free as $val)
                {
                    $this->db->insert("vente_details", array(
                        "id_vente"   => $this->input->post("id_vente"),
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
                "message" => "Vente modifiée avec succès."
            ));

            /* ---------------------- USER LOG ---------------------- */
            saveUserLog("Modification de vente ( <b>".$code_vente."</b> )");
            /* ---------------------- -------- ---------------------- */

            redirect("/vente/details/".$this->input->post("id_vente"), "refresh");
        }
        else
    {
        $vente = $this->db->query("SELECT v.* , f.num_facture AS num_facture FROM vente v LEFT JOIN facture f ON f.id_facture = v.num_facture COLLATE utf8_unicode_ci WHERE v.id_vente = ".$id)->row();
        $data = array(
            "clients" => $this->db->where("display", 1)->get("client")->result_array(),
            "vente" => $vente,
            "vente_details"  => $this->db->query("SELECT cd.*, f.num_facture AS num_facture, p.full_name AS produit, s.full_name AS service, s.description AS description_service,
                                                 p.code_produit, p.image, p.description, ct.full_name AS categorie, cts.full_name AS categorie_service, 
                                                 sc.full_name AS sub_categorie, scs.full_name AS sub_categorie_service FROM vente_details cd 
                                                 LEFT JOIN produit p ON cd.id_produit = p.id_produit COLLATE utf8_unicode_ci
                                                 LEFT JOIN service s ON cd.id_service = s.id_service COLLATE utf8_unicode_ci
                                                 LEFT JOIN categorie ct ON ct.id_categorie = p.id_categorie COLLATE utf8_unicode_ci
                                                 LEFT JOIN categorie cts ON cts.id_categorie = s.id_categorie COLLATE utf8_unicode_ci
                                                 LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie COLLATE utf8_unicode_ci
                                                 LEFT JOIN sub_categorie scs ON scs.id_sub_categorie = s.id_sub_categorie COLLATE utf8_unicode_ci
                                                 LEFT JOIN vente v ON v.id_vente = cd.id_vente COLLATE utf8_unicode_ci
                                                 LEFT JOIN facture f ON f.id_facture = v.num_facture COLLATE utf8_unicode_ci
                                                 WHERE cd.id_vente = ".$id)->result_array(),

            "client"=> $this->db->where("id_client", $vente->id_client)->get("client")->row(),
            /* ----------------------------------- */
            "title"     => "Ventes",
            "view"      => "vente/modifier",
            "active"    => "VT"
            /* ----------------------------------- */
        );

        // print_r($vente_details);
        $this->load->view("template", $data);
    }
}
    public function paiement($id)
    {
        $id_vente = $this->input->post("id_vente");
        if(!empty($id_vente))
        {
            if($this->input->post("vente_paiement") > 0)
            {
                $methode = $this->input->post("vente_methode");

                $this->db->insert("paiement", array(
                    "id_vente"      => $id_vente,
                    "id_user"       => $this->session->userdata("id_user"),
                    "montant"       => $this->input->post("vente_paiement"),
                    "methode"       => $methode,
                    "type"          => 1, // 1 = vente
                    "date_paiement" => $this->input->post("date_paiement"),
                    "type_avance"   => $methode == 5 ? $this->input->post("type_avance") : null
                ));
                $id_paiement = $this->db->insert_id();

                if($methode == 2 || $methode == 3)
                {
                    $this->db->insert("cheque", array(
                        "id_paiement"   => $id_paiement,
                        "montant"       => $this->input->post("cheque_montant"),
                        "date_cheque"   => $this->input->post("cheque_date"),
                        "reference"     => $this->input->post("cheque_reference"),
                        "remarque"      => $this->input->post("cheque_remarque"),
                        "methode"       => $methode,
                        "type"          => 1, // 1 = vente
                    ));
                }

                $this->session->set_flashdata("message", array(
                    "title" => "Succès!",
                    "message" => "Paiement enregistré avec succès."
                ));

                /* ---------------------- USER LOG ---------------------- */
                $more_log = ($methode == 2 || $methode == 3) ? " [ ".$this->input->post("cheque_reference")." - ".date("d/m/Y", strtotime($this->input->post("cheque_date")))." ]" : "";
                saveUserLog("Enregistrement de paiement ( <b>".number_format($this->input->post("vente_paiement"),2,"."," ")."</b> DH / <b>".getMethodePaiement($methode)."</b>".$more_log." ) 
                            de vente ( <b>".$this->db->where("id_vente", $id_vente)->get("vente")->row()->code_vente."</b> )");
                /* ---------------------- -------- ---------------------- */

                redirect("/vente/paiement/".$this->input->post("id_vente"), "refresh");
            }
            else
            {
                redirect("/vente/paiement/".$id, "refresh");
            }
        }
        else
        {
            $data = array(
                "vente"  => $this->db->query("SELECT v.*, u.full_name AS utilisateur, u.role, cl.full_name AS client FROM vente v LEFT JOIN `user` u ON u.id_user = v.id_user LEFT JOIN client cl ON cl.id_client = v.id_client WHERE v.id_vente = ".$id)->row(),
                "paiements" => $this->db->query("SELECT p.*, u.full_name AS utilisateur, u.role FROM paiement p LEFT JOIN `user` u ON u.id_user = p.id_user WHERE p.id_vente = ".$id)->result_array(),
                "exonerations_reste" => $this->db->query("SELECT ex.*, u.full_name AS utilisateur, u.role FROM exoneration_reste ex LEFT JOIN `user` u ON u.id_user = ex.id_user WHERE ex.id_vente = ".$id)->result_array(),
                /* ----------------------------------- */
                "title"     => "Ventes - Paiements",
                "view"      => "vente/paiement",
                "active"    => "VT"
                /* ----------------------------------- */
            );
            $this->load->view("template", $data);
        }
    }

    public function p_supprimer()
    {
        CheckAdmin();

        $id_paiement = $this->input->post("id_paiement");
        if(!empty($id_paiement))
        {
            /* ---------------------- USER LOG ---------------------- */
            $paiement   = $this->db->where("id_paiement", $id_paiement)->get("paiement")->row();
            $cheque     = $this->db->where("id_paiement", $id_paiement)->get("cheque")->row();
            $more_log  = ($paiement->methode == 2 || $paiement->methode == 3) ? " [".$cheque->reference." - ".date("d/m/Y", strtotime($cheque->date_cheque))."]" : "";
            saveUserLog("Suppression de paiement ( <b>".number_format($paiement->montant,2,"."," ")."</b> DH / <b>".getMethodePaiement($paiement->methode)."</b>".$more_log." ) 
                            de vente ( <b>".$this->db->where("id_vente", $paiement->id_vente)->get("vente")->row()->code_vente."</b> )");
            /* ---------------------- -------- ---------------------- */

            $this->db->where("id_paiement", $id_paiement);
            $this->db->delete("paiement");

            $this->session->set_flashdata("message", array(
                "title" => "Succès!",
                "message" => "Paiement supprimé avec succès."
            ));

            redirect("/vente/paiement/".$paiement->id_vente, "refresh");
        }

        redirect("/vente", "refresh");
    }

    public function fix_reste()
    {
        CheckAdmin();

        $id_vente = $this->input->post("id_vente");
        if(!empty($id_vente))
        {
            $reste = getVenteTotal($id_vente)["total_reste"];

            $this->db->insert("exoneration_reste", array(
                "id_vente"      => $id_vente,
                "id_user"       => $this->session->userdata("id_user"),
                "montant"       => number_format($reste,2,'.',''),
                "type"          => 1 // Vente
            ));

            $this->session->set_flashdata("message", array(
                "title" => "Succès!",
                "message" => "Exonération du reste enregistré avec succès."
            ));

            /* ---------------------- USER LOG ---------------------- */
            $vente = $this->db->where("id_vente", $id_vente)->get("vente")->row();
            saveUserLog("Exonération du reste (<b>".number_format($reste,2,'.',' ')."</b>) de vente (<b>".$vente->code_vente."</b>)");
            /* ---------------------- -------- ---------------------- */

            redirect("/vente/paiement/".$id_vente, "refresh");
        }

        redirect("/vente", "refresh");
    }

    public function fix_reste_supprimer()
    {
        CheckAdmin();

        $id_exoneration_reste = $this->input->post("id_exoneration_reste");
        if(!empty($id_exoneration_reste))
        {
            /* ---------------------- USER LOG ---------------------- */
            $exoneration_reste = $this->db->where("id_exoneration_reste", $id_exoneration_reste)->get("exoneration_reste")->row();
            $vente = $this->db->where("id_vente", $exoneration_reste->id_vente)->get("vente")->row();
            saveUserLog("Suppression d'Exonération du reste (<b>".$this->input->post("reste")."</b>) de vente (<b>".$vente->code_vente."</b>)");
            /* ---------------------- -------- ---------------------- */

            $this->db->where("id_exoneration_reste", $id_exoneration_reste);
            $this->db->delete("exoneration_reste");

            $this->session->set_flashdata("message", array(
                "title" => "Succès!",
                "message" => "Exonération du reste supprimé avec succès."
            ));

            redirect("/vente/paiement/".$exoneration_reste->id_vente, "refresh");
        }

        redirect("/vente", "refresh");
    }

    public function supprimer()
    {
        CheckAdmin();

        $id_vente = $this->input->post("id_vente");
        if(!empty($id_vente))
        {
            $avoirs = $this->db->where("id_vente", $id_vente)->get("avoir")->num_rows();

            if( $avoirs > 0 )
            {
                $this->session->set_flashdata("warning", array(
                    "title" => "Alerte !",
                    "message" => "Vous ne pouvez pas supprimer cette vente. Il est liée avec des Bons d'Avoir."
                ));

                redirect("/vente", "refresh");
            }

            /* ---------------------- USER LOG ---------------------- */
            saveUserLog("Suppression de vente ( <b>".$this->db->where("id_vente", $id_vente)->get("vente")->row()->code_vente."</b> )");
            /* ---------------------- -------- ---------------------- */

            $this->db->where("id_vente", $id_vente);
            $this->db->delete("vente");

            $this->session->set_flashdata("message", array(
                "title" => "Succès!",
                "message" => "Vente supprimée avec succès."
            ));
        }

        redirect("/vente", "refresh");
    }

    public function ajax()
    {
        $codes_ventes   = array();
        $vente          = array();
        $adresse        = array();
        $vente_details  = array();
        $avoirs         = array();
        $avoirs_details_in = array();

        $code_vente = $this->input->post("code_vente");
        if(!empty($code_vente))
        {
            $codes_ventes   = $this->db->query("SELECT code_vente FROM vente WHERE code_vente LIKE '%".$code_vente."%' LIMIT 10")->result_array();
            $vente          = $this->db->where("code_vente", $code_vente)->get("vente")->row();
            if(!empty($vente))
            {
                $vente_details  = $this->db->query("SELECT cd.*, p.full_name AS produit, p.code_produit, p.image, ct.full_name AS categorie, sc.full_name AS sub_categorie FROM vente_details cd LEFT JOIN produit p ON cd.id_produit = p.id_produit LEFT JOIN categorie ct ON ct.id_categorie = p.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie WHERE cd.id_vente = ".$vente->id_vente)->result_array();
                $adresse        = $this->db->where("id_vente", $vente->id_vente)->get("adresse")->row();
                $avoirs         = $this->db->where("id_vente", $vente->id_vente)->get("avoir")->result_array();
                $avoirs_details_in = $this->db->query("SELECT ad.* FROM avoir_details_in ad LEFT JOIN avoir a ON a.id_avoir = ad.id_avoir WHERE a.id_vente = ".$vente->id_vente)->result_array();
            }
        }

        echo json_encode(array(
            "codes_ventes"  => $codes_ventes,
            "vente_details" => $vente_details,
            "vente"         => $vente,
            "adresse"       => $adresse,
            "avoirs"        => $avoirs,
            "avoirs_details"=> $avoirs_details_in
        ));
    }

    public function ticket($id)
    {
        $vente = $this->db->query("SELECT cmd.*, u.full_name AS utilisateur, u.role, cl.full_name AS client, cl.adresse AS client_adresse, cl.ville AS client_ville FROM vente cmd LEFT JOIN `user` u ON u.id_user = cmd.id_user LEFT JOIN client cl ON cl.id_client = cmd.id_client WHERE cmd.id_vente = ".$id)->row();
        $data = array(
            "vente"         => $vente,
            "vente_details_produit" => $this->db->query("SELECT cd.*, p.full_name AS produit, p.code_produit FROM vente_details cd RIGHT JOIN produit p ON cd.id_produit = p.id_produit WHERE cd.id_vente = ".$id)->result_array(),
            "vente_details_service" => $this->db->query("SELECT cd.*, s.full_name AS service FROM vente_details cd RIGHT JOIN service s ON cd.id_service = s.id_service WHERE cd.id_vente = ".$id)->result_array(),
            "paiements" => $this->db->query("SELECT p.*, u.full_name AS utilisateur, u.role FROM paiement p LEFT JOIN `user` u ON u.id_user = p.id_user WHERE p.id_vente = ".$id)->result_array(),
            "exonerations_reste" => $this->db->query("SELECT ex.*, u.full_name AS utilisateur, u.role FROM exoneration_reste ex LEFT JOIN `user` u ON u.id_user = ex.id_user WHERE ex.id_vente = ".$id)->result_array(),
            "info"          => $this->db->get("information")->row()
        );
        $this->load->view("vente/ticket", $data);

        $html = $this->output->get_output();

        $this->load->library('pdf');
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'portrait');
        $this->dompdf->render();
        $this->dompdf->stream("VENTE - ".$vente->code_vente.".pdf", array("Attachment"=>0));
    }

    public function bon_livraison($id)
    {
        $vente = $this->db->query("SELECT v.*, u.full_name AS utilisateur, u.role FROM vente v LEFT JOIN `user` u ON u.id_user = v.id_user WHERE v.id_vente = ".$id)->row();
        $data = array(
            "vente"         => $vente,
            "vente_details_produit" => $this->db->query("SELECT cd.*, p.full_name AS produit, p.code_produit FROM vente_details cd 
                                                                RIGHT JOIN produit p ON cd.id_produit = p.id_produit 
                                                                WHERE cd.id_vente = ".$id)->result_array(),
            "vente_details_service" => $this->db->query("SELECT cd.*, s.full_name AS service FROM vente_details cd 
                                                                RIGHT JOIN service s ON cd.id_service = s.id_service 
                                                                WHERE cd.id_vente = ".$id)->result_array(),
            "paiements"         => $this->db->query("SELECT p.* FROM paiement p LEFT JOIN cheque c ON c.id_paiement = p.id_paiement WHERE (c.paid IS NULL OR c.paid != 2) AND p.id_vente = ".$id)->result_array(),
            "adresse"       => $this->db->where("id_vente", $id)->get("adresse")->row(),
            "info"          => $this->db->get("information")->row()
        );

        // $vente_details = $this->db->query("SELECT cd.*, p.full_name AS produit, p.code_produit FROM vente_details cd 
        //                                                         RIGHT JOIN produit p ON cd.id_produit = p.id_produit
        //                                                         WHERE cd.id_vente = ".$id)->result_array();

        // print_r($vente_details);
        $this->load->view("vente/bon_livraison1", $data);

        $html = $this->output->get_output();

        $this->load->library('pdf');
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'portrait');
        $this->dompdf->render();
        $this->dompdf->stream("BON DE LIVRAISON - ".$vente->code_vente.".pdf", array("Attachment"=>0));
    }

        public function creer_facture()
        {
            $id_vente = $this->input->post("id_vente");
            if(!empty($id_vente))
            {
                $client = $this->db->query("SELECT id_client FROM vente WHERE id_vente = ".$id_vente)->row();
                if( !empty($client->id_client) && $client->id_client == 1 )
                {
                    $this->session->set_flashdata("warning", array(
                        "title" => "Alerte !",
                        "message" => "Vous ne pouvez pas créer une facture pour un client comptoir. Créer d'abord un client, puis mettre à jour cette vente à ce client."
                    ));

                    redirect("/vente/details/".$id_vente, "refresh");
                }

                $num_facture = getNewNumFacture(); 

                $this->db->insert('facture', array(
                    "id_client" => $client->id_client,
                    "num_facture" => $num_facture,
                    "date" => date('Y-m-d')
                ));

                $id_facture = $this->db->insert_id();

                $this->db->where("id_vente", $id_vente);
                $this->db->update("vente", array(
                    "num_facture" => $num_facture
                ));
                

                $this->session->set_flashdata("message", array(
                    "title" => "Succès!",
                    "message" => "Facture créée avec succès."
                ));

                /* ---------------------- USER LOG ---------------------- */
                saveUserLog("Création de facture ( <b>".$num_facture."</b> )");
                /* ---------------------- -------- ---------------------- */

                redirect("/vente/details/".$id_vente, "refresh");
            }

            redirect("/vente", "refresh");
        }


        public function facture($id)
        {
            $ventes = $this->db->query("SELECT v.*, u.full_name AS utilisateur, u.role FROM vente v LEFT JOIN `user` u ON u.id_user = v.id_user WHERE v.num_facture = ".$id)->result_array();

            $produits = array();
            $services = array();
            $total_espece = 0;
            $sum_paiement = 0;
            $total_tva = 0;
            $total_ttc = 0;
            $total_exoneration = 0;
            $first_vente = null;
   

            foreach ($ventes as $vente)
            {
                if ($total_ttc == 0)
                {
                    $first_vente = $vente;
                }
                $total_vente = getVenteTotal($vente['id_vente']);

                $total_tva  += $total_vente["total_tva"];
                $total_ttc      += $total_vente["total_vente"];
                $total_exoneration      += $total_vente["total_exoneration"];
                $sum_paiement      += $total_vente["total_paiement"];

                $vente_details = $this->db->where('id_vente', $vente['id_vente'])->get('vente_details')->result_array();
                foreach ($vente_details as $vente_detail) {

                    if($vente_detail['id_produit'])
                    {
                        $result = multi_array_search($produits, array('id_produit' => $vente_detail['id_produit'], 'prix_vente' => $vente_detail['prix_vente']));
                        $total = getRowDetailsTotal($vente_detail);

                        if (!empty($result)){
                            $produits[$result[0]]['quantite'] += $vente_detail['quantite'];
                            $produits[$result[0]]['total'] += $total['total'];
                            $produits[$result[0]]['remise'] += $total['remise'];

                        }else {
                            $produit = $this->db->where('id_produit', $vente_detail['id_produit'])->get('produit')->row();
                            array_push($produits, array(
                                "id_produit" => $vente_detail['id_produit'],
                                "full_name" => $produit->full_name,
                                "quantite" => $vente_detail['quantite'],
                                "prix_vente" => $vente_detail['prix_vente'],
                                "total"     => $total['total'],
                                "remise"     => $total['remise'],
                            ));
                        }
                    } else if($vente_detail['id_service']){
                        $result = multi_array_search($services, array('id_service' => $vente_detail['id_service'], 'prix_vente' => $vente_detail['prix_vente']));
                        $total = getRowDetailsTotal($vente_detail);

                        if (!empty($result)){
                            $services[$result[0]]['quantite'] += 1;
                            $services[$result[0]]['total'] += $total['total'];
                            $services[$result[0]]['remise'] += $total['remise'];

                        }else {
                            $service = $this->db->where('id_service', $vente_detail['id_service'])->get('service')->row();
                            array_push($services, array(
                                "id_service" => $vente_detail['id_service'],
                                "full_name" => $service->full_name ,
                                "quantite" => 1,
                                "prix_vente" => $vente_detail['prix_vente'],
                                "total"     => $total['total'],
                                "remise"     => $total['remise'],
                            ));
                        }
                    }
                }

            }

            $facture = $this->db->where('num_facture', $id)->get('facture')->row();
            //  $add = var_dump($this->db->where("id_vente", $first_vente['id_vente'])->get("adresse")->row());
            //  exit();
        
    
            $data = array(
                "vente"         => $first_vente,
                "vente_details" => $this->db->query("SELECT cd.*, p.full_name AS produit, p.code_produit, ct.full_name AS categorie FROM vente_details cd LEFT JOIN produit p ON cd.id_produit = p.id_produit LEFT JOIN categorie ct ON ct.id_categorie = p.id_categorie WHERE cd.id_vente = ".$id)->result_array(),
                "sum_paiement"   => $sum_paiement,
                "facture"       => $facture,
                "total_vente"       => $total_ttc,
                "total_exoneration"       => $total_exoneration,
                "total_tva"       => $total_tva,
                "adresse"       => $this->db->where("id_vente", $first_vente['id_vente'])->get("adresse")->row(), 
                //"adresse"       => $this->db->where("id_vente", $id)->get("adresse")->row(),
                "info"          => $this->db->get("information")->row(),
                "produits"      => $produits,
                "services"      => $services,
                "droit_timbre"      => ($total_espece * 0.25 / 100)
            );

            $this->load->view("vente/facture", $data);

            $html = $this->output->get_output();

            $this->load->library('pdf');
            $this->dompdf->loadHtml($html);
            $this->dompdf->setPaper('A4', 'portrait');  
            $this->dompdf->render();
            $this->dompdf->stream("FACTURE - ".$facture->num_facture.".pdf", array("Attachment"=>0));
        }

    }
