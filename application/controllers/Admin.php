<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Admin extends CI_Controller

{

    public function index()

    {

        $this->settings();

    }

    public function annuler($id_client_cmd) {
        $currentValue = $this->db->get_where('client_cmd', ['id_client_cmd' => $id_client_cmd])->row()->annuler;
        $newValue = $currentValue == 0 ? 1 : 0;
        $this->db->set('annuler', $newValue);
        $this->db->where('id_client_cmd', $id_client_cmd);
        $this->db->update('client_cmd');
    
        // Check if HTTP_REFERER is set
        if (isset($_SERVER['HTTP_REFERER'])) {
            $previousPage = $_SERVER['HTTP_REFERER'];
        } else {
            // Provide a default URL to redirect to
            $previousPage = base_url() . 'index.php/admin/commande';
        }
    
        redirect($previousPage);
    }
    
    
    public function commande() {
        if ($this->session->has_userdata('annuler_data')) {
            $annuler_data = $this->session->userdata('annuler_data');
            $this->session->unset_userdata('annuler_data');
    
            // Use the retrieved data to update 'clients_cmds'
            $id_client_cmd = $annuler_data['id_client_cmd'];
            // Update clients_cmds as needed using $id_client_cmd
            
            $debut  = date("Y-m")."-01";
            $fin    = date("Y-m-t"); // t = last day of current month
            $submit_date_debut = $this->input->get("date_debut");
            $submit_date_fin   = $this->input->get("date_fin");
            if (!empty($submit_date_debut) && !empty($submit_date_fin)) {
                $debut  = date("Y-m-d", strtotime($submit_date_debut));
                $fin    = date("Y-m-d", strtotime($submit_date_fin));
            }
    
            $data = array(
                "clients_cmds" => $this->db->query("SELECT cc.*, c.full_name AS client, u.full_name AS utilisateur, u.role, COALESCE(SUM(cd.quantite),0) AS produits, v.id_vente, v.code_vente FROM client_cmd cc LEFT JOIN client_cmd_details cd ON cc.id_client_cmd = cd.id_client_cmd LEFT JOIN `user` u ON u.id_user = cc.id_user LEFT JOIN client c ON c.id_client = cc.id_client LEFT JOIN vente v ON v.id_client_cmd = cc.id_client_cmd WHERE cc.date_client_cmd BETWEEN '".$debut."' AND '".$fin."' GROUP BY cc.id_client_cmd")->result_array(),
                "dateDebut"    => date("Y-m-d", strtotime($debut)),
                "dateFin"      => date("Y-m-d", strtotime($fin)),
                "title"        => "Commandes de Clients",
                "view"         => "admin/commandes",
                "active"       => "RP-CM"
            );
            $this->load->view("template", $data);
        } else {
            $debut  = date("Y-m")."-01";
            $fin    = date("Y-m-t"); // t = last day of current month
            $submit_date_debut = $this->input->get("date_debut");
            $submit_date_fin   = $this->input->get("date_fin");
            if (!empty($submit_date_debut) && !empty($submit_date_fin)) {
                $debut  = date("Y-m-d", strtotime($submit_date_debut));
                $fin    = date("Y-m-d", strtotime($submit_date_fin));
            }
    
            $data = array(
                "clients_cmds" => $this->db->query("SELECT cc.*, c.full_name AS client, u.full_name AS utilisateur, u.role, COALESCE(SUM(cd.quantite),0) AS produits, v.id_vente, v.code_vente FROM client_cmd cc LEFT JOIN client_cmd_details cd ON cc.id_client_cmd = cd.id_client_cmd LEFT JOIN `user` u ON u.id_user = cc.id_user LEFT JOIN client c ON c.id_client = cc.id_client LEFT JOIN vente v ON v.id_client_cmd = cc.id_client_cmd WHERE cc.date_client_cmd BETWEEN '".$debut."' AND '".$fin."' GROUP BY cc.id_client_cmd")->result_array(),
                "dateDebut"    => date("Y-m-d", strtotime($debut)),
                "dateFin"      => date("Y-m-d", strtotime($fin)),
                "title"        => "Commandes de Clients",
                "view"         => "admin/commandes",
                "active"       => "RP-CM"
            );
            $this->load->view("template", $data);
        }
    }
    

    public function settings()

    {

        CheckLogin();

        CheckAdmin();



        $full_name = $this->input->post("full_name");

        if(!empty($full_name))

        {

            $temp = $this->db->where("id_information", 1)->get("information")->row();

            $full_name = ucfirst($full_name);

            if(empty($temp))

            {

                $this->db->insert("information", array(

                    "id_information"=> 1,

                    "full_name"     => $full_name,

                    "adresse"       => $this->input->post("adresse"),

                    "ville"         => $this->input->post("ville"),

                    "pays"          => $this->input->post("pays"),

                    "telephone"     => $this->input->post("telephone"),

                    "fix"           => $this->input->post("fix"),

                    "email"         => $this->input->post("email"),

                    "web"           => $this->input->post("web"),

                    "num_rc"        => $this->input->post("num_rc"),

                    "num_patente"   => $this->input->post("num_patente"),

                    "num_if"        => $this->input->post("num_if"),

                    "num_cnss"      => $this->input->post("num_cnss"),

                    "num_ice"       => $this->input->post("num_ice"),

                    "num_rib"       => $this->input->post("num_rib"),

                    "bank"          => $this->input->post("bank"),

                    "print_message" => $this->input->post("print_message")

                ));

            }

            else

            {

                $this->db->where("id_information", 1);

                $this->db->update("information", array(

                    "full_name"     => $full_name,

                    "adresse"       => $this->input->post("adresse"),

                    "ville"         => $this->input->post("ville"),

                    "pays"          => $this->input->post("pays"),

                    "telephone"     => $this->input->post("telephone"),

                    "fix"           => $this->input->post("fix"),

                    "email"         => $this->input->post("email"),

                    "web"           => $this->input->post("web"),

                    "num_rc"        => $this->input->post("num_rc"),

                    "num_patente"   => $this->input->post("num_patente"),

                    "num_if"        => $this->input->post("num_if"),

                    "num_cnss"      => $this->input->post("num_cnss"),

                    "num_ice"       => $this->input->post("num_ice"),

                    "num_rib"       => $this->input->post("num_rib"),

                    "bank"          => $this->input->post("bank"),

                    "print_message" => $this->input->post("print_message")

                ));

            }



            $this->session->set_userdata("STE", $full_name);



            $this->session->set_flashdata("message", array(

                "title" => "Succès!",

                "message" => "Enregistré avec succès."

            ));



            /* ---------------------- USER LOG ---------------------- */

            saveUserLog("Modification de données de Paramètres");

            /* ---------------------- -------- ---------------------- */



            redirect("/admin/settings", "refresh");

        }

        else

        {

            $data = array(

                "information" => $this->db->where("id_information", 1)->get("information")->row(),

                /* ----------------------------------- */

                "title"     => "Paramètres",

                "view"      => "admin/settings",

                "active"    => ""

                /* ----------------------------------- */

            );

            $this->load->view("template", $data);

        }

    }



    public function stock_alert($options = null)

    {

        CheckLogin();

        CheckAdmin();



        $data = array(

            "options" => !empty($options) && $options == "limit",

            /* ----------------------------------- */

            "title"     => "Rapport - Stock alert",

            "view"      => "admin/stock_alert",

            "active"    => empty($options) ? "RP-SA" : ""

            /* ----------------------------------- */

        );

        $this->load->view("template", $data);

    }



    public function stock_reel()

    {

        CheckLogin();

        CheckAdmin();



        $produits = $this->db->where("display", 1)->get("produit")->result_array();

        $total_prix_achat = 0;

        $total_prix_vente = 0;

        foreach ($produits as $val)

        {

            $stock = getQuantiteProduit($val["id_produit"])["stock"];

            $total_prix_achat += $val["prix_achat"] * $stock;

            $total_prix_vente += $val["prix_vente"] * $stock;

        }



        $data = array(

            "total_prix_achat" => $total_prix_achat,

            "total_prix_vente" => $total_prix_vente,

            /* ----------------------------------- */

            "title"     => "Rapport - Stock réel",

            "view"      => "admin/stock_reel",

            "active"    => "RP-SR"

            /* ----------------------------------- */

        );

        $this->load->view("template", $data);

    }



    public function produits_vendus()

    {

        CheckLogin();

        CheckAdmin();



        $debut  = date("Y-m")."-01";

        $fin    = date("Y-m-t"); // t = last day of current month

        $submit_date_debut = $this->input->get("date_debut");

        $submit_date_fin   = $this->input->get("date_fin");

        if(!empty($submit_date_debut) && !empty($submit_date_fin))

        {

            $debut  = date("Y-m-d", strtotime($submit_date_debut));

            $fin    = date("Y-m-d", strtotime($submit_date_fin));

        }



        $ventes_details  = $this->db->query("SELECT vd.*, p.code_produit, p.type, p.full_name AS produit, p.image, p.id_categorie, p.id_sub_categorie, c.full_name AS categorie, sc.full_name AS sub_categorie, v.tva FROM vente_details vd LEFT JOIN vente v ON v.id_vente = vd.id_vente LEFT JOIN produit p ON p.id_produit = vd.id_produit LEFT JOIN categorie c ON c.id_categorie = p.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie WHERE v.date_vente BETWEEN '".$debut."' AND '".$fin."'")->result_array();

        $avoirs_details_in = $this->db->query("SELECT ad.*, a.tva FROM avoir_details_in ad LEFT JOIN avoir a ON a.id_avoir = ad.id_avoir WHERE a.date_avoir BETWEEN '".$debut."' AND '".$fin."'")->result_array();

        $avoirs_details_out = $this->db->query("SELECT ad.*, a.tva FROM avoir_details_out ad LEFT JOIN avoir a ON a.id_avoir = ad.id_avoir WHERE a.date_avoir BETWEEN '".$debut."' AND '".$fin."'")->result_array();



        $temp_produits = array();

        $produits = array();



        foreach ($ventes_details as $val)

        {

            if(!in_array($val["id_produit"], $temp_produits))

            {

                array_push($temp_produits, $val["id_produit"]);

                array_push($produits, array(

                    "id_produit"    => $val["id_produit"],

                    "id_categorie"  => $val["id_categorie"],

                    "id_sub_categorie"  => $val["id_sub_categorie"],

                    "code"       => $val["code_produit"],

                    "type"       => $val["type"],

                    "produit"    => $val["produit"],

                    "categorie"  => $val["categorie"],

                    "sub_categorie"  => $val["sub_categorie"],

                    "image"      => $val["image"],

                    "quantite"   => $val["quantite"],

                    "cout"       => getCoutRevient($val["id_produit"]),

                    "total"      => getRowDetailsTotal($val, $val["tva"])['total']

                ));

            }

            else

            {

                for ($i=0 ; $i<=count($produits) ; $i++)

                {

                    if($produits[$i]["id_produit"] == $val["id_produit"])

                    {

                        $produits[$i]["quantite"] += $val["quantite"];

                        $produits[$i]["total"] += getRowDetailsTotal($val, $val["tva"])['total'];

                        break;

                    }

                }

            }

        }

        foreach ($avoirs_details_in as $val)

        {

            foreach ($produits as $produit)

            {

                if($val["id_produit"] == $produit["id_produit"])

                {

                    for ($i=0 ; $i<=count($produits) ; $i++)

                    {

                        if($produits[$i]["id_produit"] == $val["id_produit"])

                        {

                            $produits[$i]["quantite"] -= $val["quantite"];

                            $produits[$i]["total"] -= getRowDetailsTotal($val, $val["tva"])['total'];

                            break;

                        }

                    }

                }

            }

        }

        foreach ($avoirs_details_out as $val)

        {

            foreach ($produits as $produit)

            {

                if($val["id_produit"] == $produit["id_produit"])

                {

                    for ($i=0 ; $i<=count($produits) ; $i++)

                    {

                        if($produits[$i]["id_produit"] == $val["id_produit"])

                        {

                            $produits[$i]["quantite"] += $val["quantite"];

                            $produits[$i]["total"] += getRowDetailsTotal($val, $val["tva"])['total'];

                            break;

                        }

                    }

                }

            }

        }



        $data = array(

            "produits" => $produits,

            "date_debut" => $debut,

            "date_fin"   => $fin,

            /* ----------------------------------- */

            "title"     => "Rapport - Produits vendus",

            "view"      => "admin/produits_vendus",

            "active"    => "RP-PV"

            /* ----------------------------------- */

        );

        $this->load->view("template", $data);

    }



    public function releve_general_clients()

    {

        CheckLogin();

        CheckAdmin();



        $data = array(

            "clients" => $this->db->where("display", 1)->get("client")->result_array(),

            /* ----------------------------------- */

            "title"     => "Rapport - Relevé général de clients",

            "view"      => "admin/releve_general_clients",

            "active"    => "RP-RGC"

            /* ----------------------------------- */

        );

        $this->load->view("template", $data);

    }



    public function releve_general_fournisseurs()

    {

        CheckLogin();

        CheckAdmin();



        $data = array(

            "fournisseurs" => $this->db->where("display", 1)->get("fournisseur")->result_array(),

            /* ----------------------------------- */

            "title"     => "Rapport - Relevé général de fournisseurs",

            "view"      => "admin/releve_general_fournisseurs",

            "active"    => "RP-RGF"

            /* ----------------------------------- */

        );

        $this->load->view("template", $data);

    }



    public function revenu_frais_benefices()

    {

        CheckLogin();

        CheckAdmin();



        $debut  = date("Y")."-01-01";

        $fin    = date("Y")."-12-31";

        $submit_date_debut = $this->input->post("date_debut");

        $submit_date_fin   = $this->input->post("date_fin");

        $id_categorie   = $this->input->post("id_categorie") ? $this->input->post("id_categorie") : 'tous';

        if(!empty($submit_date_debut) && !empty($submit_date_fin))

        {

            $debut  = date("Y-m-d", strtotime($submit_date_debut));

            $fin    = date("Y-m-d", strtotime($submit_date_fin));

        }



        $this->db->where('date_vente >=' , $debut);

        $this->db->where('date_vente <=' , $fin);

        $ventes  = $this->db->get("vente")->result_array();

        $total_ventes = 0;

        foreach ($ventes as $val) {

            // $temp = getVenteTotal($val["id_vente"]);

            // $total_ventes += $temp["total_vente"];

            $sum_vente = 0;



            $vente = $this->db->where("id_vente", $val["id_vente"])->get("vente")->row();

            $vente_details = $this->db->where("id_vente", $val["id_vente"])->get("vente_details")->result_array();

            foreach ($vente_details as $val) {

                $produit = $this->db->where('id_produit', $val['id_produit'])->get('produit')->row();

                if ($id_categorie == 'tous' || ($produit && $produit->id_categorie == $id_categorie)) {

                    $sum_vente += (float)getRowDetailsTotal($val)['total'];

                }

            }

            $sum_tva = $sum_vente * $vente->tva / 100;

            $sum_vente += $sum_tva;

            $total_ventes += $sum_vente;

            

        }



        $this->db->where('date_avoir >=' , $debut);

        $this->db->where('date_avoir <=' , $fin);

        $avoirs  = $this->db->get("avoir")->result_array();

        $total_avoirs = 0;

        foreach ($avoirs as $val) {

            // $temp = getAvoirTotal($val["id_avoir"]);

            // $total_avoirs += $temp["total_avoir"];

            $sum_avoir_in = 0;

            $sum_avoir_out = 0;



            $avoir = $this->db->where("id_avoir", $val["id_avoir"])->get("avoir")->row();

            $avoir_details_in = $this->db->where("id_avoir", $val["id_avoir"])->get("avoir_details_in")->result_array();

            foreach ($avoir_details_in as $val) {

                $produit = $this->db->where('id_produit', $val['id_produit'])->get('produit')->row();

                if ($id_categorie == 'tous' || $produit->id_categorie == $id_categorie) {

                    $sum_avoir_in += (float)getRowDetailsTotal($val)['total'];

                }

            }

            $sum_tva_in = $sum_avoir_in * $avoir->tva / 100;

            $sum_avoir_in += $sum_tva_in;



            $avoir_details_out = $this->db->where("id_avoir", $val["id_avoir"])->get("avoir_details_out")->result_array();

            foreach ($avoir_details_out as $val) {

                $produit = $this->db->where('id_produit', $val['id_produit'])->get('produit')->row();

                if ($id_categorie == 'tous' || $produit->id_categorie == $id_categorie) {

                    $sum_avoir_out += (float)getRowDetailsTotal($val)['total'];

                }

            }

            $sum_tva_out = $sum_avoir_out * $avoir->tva / 100;

            $sum_avoir_out += $sum_tva_out;



            $total_avoirs += $sum_avoir_out - $sum_avoir_in;



        }



        $this->db->where('date_charge >=' , $debut);

        $this->db->where('date_charge <=' , $fin);

        $charges = $this->db->get("charge")->result_array();

        $total_charges = 0;

        foreach ($charges as $val) {

            $total_charges += $val["montant"];

        }



        // GET 'Coût de revient'



        $ventes_details  = $this->db->query("SELECT vd.* FROM vente_details vd LEFT JOIN vente v ON v.id_vente = vd.id_vente WHERE v.date_vente BETWEEN '".$debut."' AND '".$fin."'")->result_array();

        $avoirs_details_in = $this->db->query("SELECT ad.* FROM avoir_details_in ad LEFT JOIN avoir a ON a.id_avoir = ad.id_avoir WHERE a.date_avoir BETWEEN '".$debut."' AND '".$fin."'")->result_array();

        $avoirs_details_out = $this->db->query("SELECT ad.* FROM avoir_details_out ad LEFT JOIN avoir a ON a.id_avoir = ad.id_avoir WHERE a.date_avoir BETWEEN '".$debut."' AND '".$fin."'")->result_array();



        $temp_produits = array();

        $produits = array();



        foreach ($ventes_details as $val) {

            $produit = $this->db->where('id_produit', $val['id_produit'])->get('produit')->row();

            if ($id_categorie == 'tous' || ($produit && $produit->id_categorie == $id_categorie)) {

                if(!in_array($val["id_produit"], $temp_produits)) {

                    array_push($temp_produits, $val["id_produit"]);

                    array_push($produits, array(

                        "id_produit"    => $val["id_produit"],

                        "cout_revient"  => getCoutRevient($val["id_produit"])*$val["quantite"]

                    ));

                }

                else {

                    for ($i=0 ; $i<=count($produits) ; $i++) {

                        if($produits[$i]["id_produit"] == $val["id_produit"]) {

                            $produits[$i]["cout_revient"] += getCoutRevient($val["id_produit"])*$val["quantite"];

                            break;

                        }

                    }

                }

            }

        }

        foreach ($avoirs_details_in as $val) {

            $produit = $this->db->where('id_produit', $val['id_produit'])->get('produit')->row();

                if ($id_categorie == 'tous' || $produit->id_categorie == $id_categorie) {

                    foreach ($produits as $produit) {

                        if($val["id_produit"] == $produit["id_produit"]) {

                            for ($i=0 ; $i<=count($produits) ; $i++) {

                                if($produits[$i]["id_produit"] == $val["id_produit"]) {

                                    $produits[$i]["cout_revient"] -= getCoutRevient($val["id_produit"])*$val["quantite"];

                                    break;

                                }

                            }

                        }

                    }

                }

        }

        foreach ($avoirs_details_out as $val) {

            $produit = $this->db->where('id_produit', $val['id_produit'])->get('produit')->row();

                if ($id_categorie == 'tous' || $produit->id_categorie == $id_categorie) {

                    foreach ($produits as $produit) {

                        if($val["id_produit"] == $produit["id_produit"]) {

                            for ($i=0 ; $i<=count($produits) ; $i++) {

                                if($produits[$i]["id_produit"] == $val["id_produit"]) {

                                    $produits[$i]["cout_revient"] += getCoutRevient($val["id_produit"])*$val["quantite"];

                                    break;

                                }

                            }

                        }

                    }

                }

        }



        $total_cout_revient = 0;

        foreach ($produits as $produit) {

            $total_cout_revient += $produit["cout_revient"];

        }



        $data = array(

            "total_ventes"          => $total_ventes,

            "total_avoirs"          => $total_avoirs,

            "total_charges"         => $total_charges,

            "total_cout_revient"    => $total_cout_revient,

            "categories"            => $this->db->where('display', 1)->get('categorie')->result_array() ,

            "date_debut"            => $debut,

            "date_fin"              => $fin,

            /* ----------------------------------- */

            "title"     => "Rapport - Revenu / Frais / Bénéfices",

            "view"      => "admin/revenu_frais_benefices",

            "active"    => "RP-RFB"

            /* ----------------------------------- */

        );

        $this->load->view("template", $data);

    }



    public function chiffre_affaires()

    {

        CheckLogin();

        CheckAdmin();



        $debut  = date("Y")."-01-01";

        $fin    = date("Y")."-12-31";

        $submit_date_debut = $this->input->get("date_debut");

        $submit_date_fin   = $this->input->get("date_fin");

        if(!empty($submit_date_debut) && !empty($submit_date_fin))

        {

            $debut  = date("Y-m-d", strtotime($submit_date_debut));

            $fin    = date("Y-m-d", strtotime($submit_date_fin));

        }



        $this->db->where('date_vente >=' , $debut);

        $this->db->where('date_vente <=' , $fin);

        $ventes  = $this->db->get("vente")->result_array();

        $total_ventes_ttc = 0;

        $total_tva = 0;

        foreach ($ventes as $val) {

            $temp = getVenteTotal($val["id_vente"]);

            $total_ventes_ttc += $temp["total_vente"];

            $total_tva += $temp["total_tva"];

        }



        $this->db->where('date_avoir >=' , $debut);

        $this->db->where('date_avoir <=' , $fin);

        $avoirs  = $this->db->get("avoir")->result_array();

        $total_avoirs_ttc = 0;

        foreach ($avoirs as $val) {

            $temp = getAvoirTotal($val["id_avoir"]);

            $total_avoirs_ttc += $temp["total_avoir"];

            $total_tva += $temp["total_tva"];

        }



        $sum_paiements_espece = $this->db->query("SELECT COALESCE(SUM(montant), 0) AS total FROM paiement WHERE `type` = 1 AND methode = 1 AND date_paiement BETWEEN '".$debut."' AND '".$fin."'")->row()->total;

        $droit_timbre = $sum_paiements_espece * 0.25 / 100;



        $data = array(

            "nbr_ventes"    => count($ventes),

            "chiffre_ht"    => ($total_ventes_ttc+$total_avoirs_ttc) - $total_tva,

            "chiffre_ttc"   => $total_ventes_ttc+$total_avoirs_ttc,

            "total_tva"     => $total_tva,

            "droit_timbre"  => $droit_timbre,

            "date_debut"    => $debut,

            "date_fin"      => $fin,

            /* ----------------------------------- */

            "title"     => "Rapport - Chiffre d'affaires",

            "view"      => "admin/chiffre_affaires",

            "active"    => "RP-CA"

            /* ----------------------------------- */

        );

        $this->load->view("template", $data);

    }



    public function users_details()

    {

        CheckLogin();

        CheckAdmin();



        $user = $this->input->get("user");

        $debut  = date("Y-m")."-01";

        $fin    = date("Y-m-t"); // t = last day of current month

        $submit_date_debut = $this->input->get("date_debut");

        $submit_date_fin   = $this->input->get("date_fin");

        if(!empty($submit_date_debut) && !empty($submit_date_fin))

        {

            $debut  = date("Y-m-d", strtotime($submit_date_debut));

            $fin    = date("Y-m-d", strtotime($submit_date_fin));

        }



        $paiements_clients = array();

        $paiements_achats_reglements = array();

        $c_entrees     = array();

        $c_sorties     = array();

        $avances       = array();

        $avances_r     = array();

        $charges       = array();

        $achats        = array();

        $ventes        = array();

        $avoirs        = array();

        $demontages    = array();

        $productions   = array();

        $clients_cmds  = array();

        $commandes     = array();

        $produits_end  = array();

        $inventaires   = array();



        if(!empty($user) && $user != 1) // Ignore FMS Access

        {

            $paiements_clients = $this->db->query("SELECT p.*, v.code_vente, a.code_avoir, cv.id_client AS id_client_vente, cv.full_name AS client_vente, ca.id_client AS id_client_avoir, ca.full_name AS client_avoir 

                                                    FROM paiement p 

                                                    LEFT JOIN vente v ON v.id_vente = p.id_vente 

                                                    LEFT JOIN avoir a ON a.id_avoir = p.id_avoir 

                                                    LEFT JOIN client cv ON cv.id_client = v.id_client 

                                                    LEFT JOIN client ca ON ca.id_client = a.id_client 

                                                    WHERE p.id_user = ".$user." 

                                                    AND ( (p.id_vente IS NOT NULL OR p.id_avoir IS NOT NULL) AND p.type = 1 ) 

                                                    AND p.date_paiement BETWEEN '".$debut."' AND '".$fin."'")->result_array();



            $paiements_achats_reglements = $this->db->query("SELECT p.*, ac.code_achat, a.code_avoir, f.id_fournisseur, f.full_name AS fournisseur, ca.id_client AS id_client_avoir, ca.full_name AS client_avoir 

                                                            FROM paiement p   

                                                            LEFT JOIN achat ac ON ac.id_achat = p.id_achat 

                                                            LEFT JOIN avoir a ON a.id_avoir = p.id_avoir 

                                                            LEFT JOIN fournisseur f ON f.id_fournisseur = ac.id_fournisseur 

                                                            LEFT JOIN client ca ON ca.id_client = a.id_client 

                                                            WHERE p.id_user = ".$user." 

                                                            AND ( (p.id_achat IS NOT NULL OR p.id_avoir IS NOT NULL) AND (p.type = 2 OR p.type= 3) ) 

                                                            AND p.date_paiement BETWEEN '".$debut."' AND '".$fin."'")->result_array();



            $c_entrees  = $this->db->query("SELECT c.* FROM caisse_entree c WHERE c.id_user = ".$user." AND c.date_entree BETWEEN '".$debut."' AND '".$fin."'")->result_array();

            $c_sorties  = $this->db->query("SELECT c.* FROM caisse_sortie c WHERE c.id_user = ".$user." AND c.date_sortie BETWEEN '".$debut."' AND '".$fin."'")->result_array();

            $avances    = $this->db->query("SELECT av.*, c.full_name AS client FROM avance av LEFT JOIN client c ON c.id_client = av.id_client WHERE av.id_user = ".$user." AND av.date_avance BETWEEN '".$debut."' AND '".$fin."'")->result_array();

            $avances_r  = $this->db->query("SELECT av.*, c.full_name AS client FROM avance_retour av LEFT JOIN client c ON c.id_client = av.id_client WHERE av.id_user = ".$user." AND av.date_retour BETWEEN '".$debut."' AND '".$fin."'")->result_array();

            $charges    = $this->db->query("SELECT c.* FROM charge c WHERE c.id_user = ".$user." AND c.date_charge BETWEEN '".$debut."' AND '".$fin."'")->result_array();

            $achats     = $this->db->query("SELECT a.*, f.full_name AS fournisseur FROM achat a LEFT JOIN fournisseur f ON f.id_fournisseur = a.id_fournisseur WHERE a.id_user = ".$user." AND a.date_achat BETWEEN '".$debut."' AND '".$fin."'")->result_array();

            $ventes     = $this->db->query("SELECT v.*, cl.full_name AS client FROM vente v LEFT JOIN client cl ON cl.id_client = v.id_client WHERE v.id_user = ".$user." AND v.date_vente BETWEEN '".$debut."' AND '".$fin."'")->result_array();

            $avoirs     = $this->db->query("SELECT a.*, cl.full_name AS client FROM avoir a LEFT JOIN client cl ON cl.id_client = a.id_client WHERE a.id_user = ".$user." AND a.date_avoir BETWEEN '".$debut."' AND '".$fin."'")->result_array();

            $productions    = $this->db->query("SELECT pd.*, p.full_name AS produit, c.full_name AS categorie, sc.full_name AS sub_categorie FROM production pd LEFT JOIN produit p ON p.id_produit = pd.id_produit LEFT JOIN categorie c ON c.id_categorie = p.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie WHERE pd.id_user = ".$user." AND pd.date_production BETWEEN '".$debut."' AND '".$fin."'")->result_array();

            $demontages     = $this->db->query("SELECT dm.*, p.full_name AS produit, c.full_name AS categorie, sc.full_name AS sub_categorie FROM demontage dm LEFT JOIN produit p ON p.id_produit = dm.id_produit LEFT JOIN categorie c ON c.id_categorie = p.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie WHERE dm.id_user = ".$user." AND dm.date_demontage BETWEEN '".$debut."' AND '".$fin."'")->result_array();

            $clients_cmds   = $this->db->query("SELECT cc.*, c.full_name AS client, COALESCE(SUM(cd.quantite),0) AS produits, v.id_vente, v.code_vente FROM client_cmd cc LEFT JOIN client_cmd_details cd ON cc.id_client_cmd = cd.id_client_cmd LEFT JOIN client c ON c.id_client = cc.id_client LEFT JOIN vente v ON v.id_client_cmd = cc.id_client_cmd WHERE cc.id_user = ".$user." AND  cc.date_client_cmd BETWEEN '".$debut."' AND '".$fin."' GROUP BY cc.id_client_cmd")->result_array();

            $commandes      = $this->db->query("SELECT c.*, f.full_name AS fournisseur, COALESCE(SUM(cd.quantite),0) AS produits, a.id_achat, a.code_achat FROM commande c LEFT JOIN commande_details cd ON c.id_commande = cd.id_commande LEFT JOIN fournisseur f ON f.id_fournisseur = c.id_fournisseur LEFT JOIN achat a ON a.id_commande = c.id_commande WHERE c.id_user = ".$user." AND  c.date_commande BETWEEN '".$debut."' AND '".$fin."' GROUP BY c.id_commande")->result_array();

            $produits_end   = $this->db->query("SELECT pe.*, p.full_name AS produit, p.type, p.code_produit, p.image, c.id_categorie, c.full_name AS categorie FROM produit_end pe LEFT JOIN produit p ON p.id_produit = pe.id_produit LEFT JOIN categorie c ON p.id_categorie = c.id_categorie WHERE pe.id_user = ".$user." AND pe.date BETWEEN '".$debut."' AND '".$fin."' ")->result_array();

            $inventaires    = $this->db->query("SELECT i.* FROM inventaire i WHERE i.id_user = ".$user." AND i.date_inventaire BETWEEN '".$debut."' AND '".$fin."'")->result_array();

        }



        $data = array(

            "paiements_clients" => $paiements_clients,

            "paiements_achats_reglements" => $paiements_achats_reglements,

            "c_entrees"     => $c_entrees,

            "c_sorties"     => $c_sorties,

            "avances"       => $avances,

            "avances_r"     => $avances_r,

            "charges"       => $charges,

            "achats"        => $achats,

            "ventes"        => $ventes,

            "avoirs"        => $avoirs,

            "productions"   => $productions,

            "demontages"    => $demontages,

            "clients_cmds"  => $clients_cmds,

            "commandes"     => $commandes,

            "produits_end"  => $produits_end,

            "inventaires"   => $inventaires,

            "date_debut"    => $debut,

            "date_fin"      => $fin,

            "user"          => $user,

            "users"         => $this->db->where("id_user !=", 1)->get("user")->result_array(), // Ignore FMS Access

            /* ----------------------------------- */

            "title"     => "Rapport - Détails d'Utilisateurs",

            "view"      => "admin/users_details",

            "active"    => "RP-UD"

            /* ----------------------------------- */

        );

        $this->load->view("template", $data);

    }



    public function historique()

    {

        CheckLogin();

        CheckAdmin();



        $debut  = date("Y-m-d 00:00:00", strtotime(" -1 day", time()));

        $fin    = date("Y-m-d 23:59:59");

        $submit_date_debut = $this->input->get("date_debut");

        $submit_date_fin   = $this->input->get("date_fin");

        if(!empty($submit_date_debut) && !empty($submit_date_fin))

        {

            $debut  = date("Y-m-d 00:00:00", strtotime($submit_date_debut));

            $fin    = date("Y-m-d 23:59:59", strtotime($submit_date_fin));

        }

        $data = array(

            "logs"  => $this->db->query("SELECT ul.*, u.full_name AS utilisateur, u.role FROM user_log ul LEFT JOIN `user` u ON u.id_user = ul.id_user WHERE ul.date_log BETWEEN '".$debut."' AND '".$fin."'")->result_array(),

            "date_debut" => $debut,

            "date_fin"  => $fin,

            /* ----------------------------------- */

            "title"     => "Journal d'activités",

            "view"      => "admin/historique",

            "active"    => ""

            /* ----------------------------------- */

        );

        $this->load->view("template", $data);

    }



    public function block_archive()

    {

        CheckLogin();



        $data = array(

            /* ----------------------------------- */

            "title"     => "Alerte !",

            "view"      => "admin/block_archive",

            "active"    => ""

            /* ----------------------------------- */

        );

        $this->load->view("template", $data);

    }



    public function backup($option = "download")

    {

        if($option == "save")

        {

            if(_ENABLE_BACKUP_)

            {

                // if(!empty($_SERVER["HTTP_"._BACKUP_KEY_NAME_]) && $_SERVER["HTTP_"._BACKUP_KEY_NAME_] == _BACKUP_KEY_VALUE_)

                // {

                    

                    generateBackup();



                    /* ---------------------- USER LOG ---------------------- */

                    saveUserLog("Backup <b>automatique</b> de la base de données", true);

                    /* ---------------------- -------- ---------------------- */



                    echo json_encode(array("message" => "Saved."));

                // }

                // else { echo json_encode(array("message" => "Wrong or Missing Backup Key.")); }

            }

            else

            {

                echo json_encode(array("message" => "Cette option est disponible uniquement pour nos Clients."));

            }

        }

        elseif ($option == "download")

        {

            CheckLogin();

            CheckAdmin();



            if(_ENABLE_BACKUP_)

            {

                generateBackup(true);



                /* ---------------------- USER LOG ---------------------- */

                saveUserLog("Backup <b>manuel</b> de la base de données");

                /* ---------------------- -------- ---------------------- */

            }

            else

            {

                echo "<h1 style='text-align: center; color: #d73925; margin-top: 50px;'>OOPS !<br><br>Cette option est disponible uniquement pour nos Clients.</h1>";

            }

        }

    }



    public function dompdf()

    {

        CheckLogin();

        CheckAdmin();



        $data = array(

            "info" => $this->db->get("information")->row()

        );



        $this->load->view("admin/dompdf", $data);



        $html = $this->output->get_output();



        $this->load->library('pdf');

        $this->dompdf->loadHtml($html);

        $this->dompdf->setPaper('A4', 'portrait');

        $this->dompdf->render();

        $this->dompdf->stream("TITLE EXAMPLE - XYZ.pdf", array("Attachment"=>0));

    }

}

