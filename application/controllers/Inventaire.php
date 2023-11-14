<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Inventaire extends CI_Controller

{

    public function __construct()

    {

        parent::__construct();



        CheckLogin();

        CheckAdmin();

    }



    public function index()

    {

        $debut  = date("Y")."-01-01";

        $fin    = date("Y")."-12-31"; // t = last day of current month

        $submit_date_debut = $this->input->get("date_debut");

        $submit_date_fin   = $this->input->get("date_fin");

        if(!empty($submit_date_debut) && !empty($submit_date_fin))

        {

            $debut  = date("Y-m-d", strtotime($submit_date_debut));

            $fin    = date("Y-m-d", strtotime($submit_date_fin));

        }



        $data = array(

            "inventaires"  => $this->db->query("SELECT i.*, u.full_name AS utilisateur, u.role FROM inventaire i LEFT JOIN user u ON u.id_user = i.id_user WHERE i.date_inventaire BETWEEN '".$debut."' AND '".$fin."'")->result_array(),

            "date_debut" => $debut,

            "date_fin"  => $fin,

            /* ----------------------------------- */

            "title"     => "Inventaire",

            "view"      => "inventaire/liste",

            "active"    => "IV"

            /* ----------------------------------- */

        );

        $this->load->view("template", $data);

    }



    public function details($id)

    {

        $inventaire_details = $this->db->query("SELECT id.*, p.full_name AS produit, p.type AS produit_type, p.code_produit, p.image, p.alert, p.id_categorie, p.id_sub_categorie, c.full_name AS categorie, sc.full_name AS sub_categorie FROM inventaire_details id LEFT JOIN produit p ON id.id_produit = p.id_produit LEFT JOIN categorie c ON c.id_categorie = p.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie WHERE id.id_inventaire = ".$id)->result_array();

        $total_entree = 0;

        $total_sortie = 0;

        foreach ($inventaire_details as $val)

        {

            $total_entree += $val["type"] == 1 ? $val["quantite"]*$val["prix"] : 0;

            $total_sortie += $val["type"] == 2 ? $val["quantite"]*$val["prix"] : 0;

        }



        $data = array(

            "inventaire"            => $this->db->query("SELECT i.*, u.full_name AS utilisateur, u.role FROM inventaire i LEFT JOIN user u ON u.id_user = i.id_user WHERE i.id_inventaire = ".$id)->row(),

            "total_entree"          => $total_entree,

            "total_sortie"          => $total_sortie,

            /* ----------------------------------- */

            "title"     => "Inventaire",

            "view"      => "inventaire/details",

            "active"    => "IV"

            /* ----------------------------------- */

        );

        $this->load->view("template", $data);

    }



    public function nouveau()

    {

        $id_inventaire = $this->input->post("id_inventaire");

        if(!empty($id_inventaire))

        {

            $code_inventaire = getNewCode("IV", "inventaire", true, 0, $id_inventaire);



            $data = array(

                "id_user"           => $this->session->userdata("id_user"),

                "date_inventaire"   => $this->input->post("date_inventaire"),

                "valide"            => 1,

                "remarque"          => $this->input->post("remarque")

            );



            $this->db->where("id_inventaire", $id_inventaire);

            $this->db->update("inventaire", $data);



            $this->session->set_flashdata("message", array(

                "title" => "Succès!",

                "message" => "Inventaire enregistré avec succès."

            ));



            /* ---------------------- USER LOG ---------------------- */

            saveUserLog("Validation d'inventaire ( <b>".$code_inventaire."</b> )");

            /* ---------------------- -------- ---------------------- */



            redirect("/inventaire/details/".$id_inventaire, "refresh");

        }

        else

        {

            $inventaire = $this->db->where("valide", 0)->get("inventaire")->row();

            $inventaire_details = !empty($inventaire) ? $this->db->where("id_inventaire", $inventaire->id_inventaire)->get("inventaire_details")->result_array() : array();

            $data = array(

                "produits"      => $this->db->query("SELECT p.*, c.full_name AS categorie, sc.full_name AS sub_categorie FROM produit p LEFT JOIN categorie c ON c.id_categorie = p.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie")->result_array(),

                "inventaire"    => $inventaire,

                "inventaire_details" => $inventaire_details,

                /* ----------------------------------- */

                "title"     => "Inventaire de Stock &nbsp;|&nbsp; ".date("d/m/Y"),

                "view"      => "inventaire/nouveau",

                "active"    => "IV-ADD"

                /* ----------------------------------- */

            );

            $this->load->view("template", $data);

        }

    }



    public function supprimer()

    {

        $id_inventaire = $this->input->post("id_inventaire");

        if(!empty($id_inventaire))

        {

            /* ---------------------- USER LOG ---------------------- */

            saveUserLog("Suppression d'inventaire ( <b>".$this->db->where("id_inventaire", $id_inventaire)->get("inventaire")->row()->code_inventaire."</b> )");

            /* ---------------------- -------- ---------------------- */



            $this->db->where("id_inventaire", $id_inventaire);

            $this->db->delete("inventaire");



            $this->session->set_flashdata("message", array(

                "title" => "Succès!",

                "message" => "Inventaire supprimé avec succès."

            ));

        }



        redirect("/inventaire", "refresh");

    }



    public function save()

    {

        header("Access-Control-Allow-Origin: *");

        header("Access-Control-Allow-Methods: *");

        header("Access-Control-Allow-Headers: *");



        $id_produit = $this->input->post("id_produit");

        $code_inventaire = $this->input->post("code_inventaire");

        $id_inventaire = $this->input->post("id_inventaire");

        $id_inventaire_details = $this->input->post("id_inventaire_details");



        if(!empty($id_produit))

        {

            $inventaire_data = array(

                "id_user"           => $this->session->userdata("id_user"),

                "date_inventaire"   => date("Y-m-d")

            );



            if(!empty($id_inventaire))

            {

                $this->db->where("id_inventaire", $id_inventaire);

                $this->db->update("inventaire", $inventaire_data);

            }

            else

            {

                $code_inventaire = getNewCode("IV", "inventaire");

                $inventaire_data["code_inventaire"] = $code_inventaire;



                $this->db->insert("inventaire", $inventaire_data);

                $id_inventaire = $this->db->insert_id();

            }



            $inventaire_details_data = array(

                "id_inventaire" => $id_inventaire,

                "id_produit"    => $id_produit,

                "type"          => $this->input->post("type"), // Entrée || Sortie

                "quantite"      => $this->input->post("quantite"),

                "prix"          => $this->input->post("prix")

            );



            if(!empty($id_inventaire_details))

            {

                $this->db->where("id_inventaire_details", $id_inventaire_details);

                $this->db->update("inventaire_details", $inventaire_details_data);

            }

            else

            {

                $this->db->insert("inventaire_details", $inventaire_details_data);

                $id_inventaire_details = $this->db->insert_id();

            }



            /* ---------------------- USER LOG ---------------------- */

            saveUserLog("Inventaire - Enregistrement d'état de produit <b>".$this->db->where("id_produit", $id_produit)->get("produit")->row()->full_name."</b> 

                        ( Qte : <b>".$this->input->post("quantite")."</b> | <b>".number_format($this->input->post("prix"),2,"."," ")."</b> DH )");

            /* ---------------------- -------- ---------------------- */

        }



        echo json_encode(array(

            "id_produit" => $id_produit,

            "code_inventaire" => $code_inventaire,

            "id_inventaire" => $id_inventaire,

            "id_inventaire_details" => $id_inventaire_details

        ), JSON_FORCE_OBJECT);

    }



    public function getProduits()

    {

        header("Access-Control-Allow-Origin: *");

        header("Access-Control-Allow-Methods: *");

        header("Access-Control-Allow-Headers: *");



        // Read value

        $postData           = $this->input->post();



        $draw               = $postData['draw'];

        $start              = $postData['start'];

        $rowperpage         = $postData['length']; // Rows display per page

        $columnIndex        = $postData['order'][0]['column']; // Column index

        $columnName         = $postData['columns'][$columnIndex]['data']; // Column name

        $columnSortOrder    = $postData['order'][0]['dir']; // asc or desc

        $searchValue        = $postData['search']['value']; // Search value



        // Search

        $searchQuery = "";

        if($searchValue != "") {

            $sub_categorie_sql = _ENABLE_SUB_CATEGORIE_ ? " OR sc.full_name LIKE '%".$searchValue."%' " : "";

            $searchQuery = " AND ( p.code_produit LIKE '%".$searchValue."%' 

                             OR p.full_name LIKE '%".$searchValue."%' 

                             OR c.full_name LIKE '%".$searchValue."%' 

                             ".$sub_categorie_sql." ) ";

        }



        // Total number of records without filtering

        $totalRecords = $this->db->query("SELECT COUNT(id_produit) AS total FROM produit WHERE display = 1")->row()->total;



        // Total number of record with filtering

        $totalRecordwithFilter = $this->db->query("SELECT COUNT(p.id_produit) AS total FROM produit p LEFT JOIN categorie c ON c.id_categorie = p.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie WHERE p.display = 1 " . $searchQuery)->row()->total;



        // Fetch records

        $orderByColumnQuery = "";

        if(!in_array($columnName, array("produit", "categorie", "sub_categorie", "quantite", "new_quantite", "entree", "entree_prix", "sortie", "sortie_prix", "options"))) {

            $orderByColumnQuery = " ORDER BY ".$columnName." ".$columnSortOrder;

        }

        elseif ($columnName == "produit") {

            $orderByColumnQuery = " ORDER BY p.full_name ".$columnSortOrder;

        }

        elseif ($columnName == "categorie") {

            $orderByColumnQuery = " ORDER BY c.full_name ".$columnSortOrder;

        }

        elseif ($columnName == "sub_categorie") {

            $orderByColumnQuery = " ORDER BY sc.full_name ".$columnSortOrder;

        }

        $rowperpage = $rowperpage != -1 ? $rowperpage : $totalRecords;

        $limitQuery = " LIMIT ".$rowperpage." OFFSET ".$start;



        $records = $this->db->query("SELECT p.*, c.full_name AS categorie, sc.full_name AS sub_categorie FROM produit p LEFT JOIN categorie c ON c.id_categorie = p.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie WHERE p.display = 1 " . $searchQuery . $orderByColumnQuery . $limitQuery)->result_array();

        $products = array();



        $inventaire = $this->db->where("valide", 0)->get("inventaire")->row();

        $inventaire_details = !empty($inventaire) ? $this->db->where("id_inventaire", $inventaire->id_inventaire)->get("inventaire_details")->result_array() : array();



        foreach($records as $record)

        {
            // QUANTITY

            $stock_details = getQuantiteProduit($record["id_produit"]);

            $quantite = $stock_details["stock"];

            $color = "";

            if($quantite > 0 && $quantite <= $record["alert"]) { $color = "#F8C471"; }

            elseif($quantite <= 0) { $color = "#F1948A"; }

            $quantite = '<strong id="old_stock_'.$record["id_produit"].'">'.$quantite.'</strong><span style="display: none;" data-color="'.$color.'"></span>';



            // GET SAVED DATA

            $id_inventaire_details = "";

            $temp_quantite = 0;

            $temp_prix = 0;

            $temp_type = "";

            $temp_color = "";

            foreach ($inventaire_details as $temp)

            {

                if($record["id_produit"] == $temp["id_produit"])

                {

                    $id_inventaire_details = $temp["id_inventaire_details"];

                    $temp_quantite = $temp["quantite"];

                    $temp_prix = $temp["prix"];

                    $temp_type = $temp["type"];

                    $temp_color = "success";

                    break;

                }

            }



            // ROWS

            $code_produit   = '<a href="'.base_url().'index.php/produit/details/'.$record["id_produit"].'" rel="popover" data-img="'.$record["image"].'"><strong>'.$record["code_produit"].'</strong></a>';

            $code_produit   .= '<input type="hidden" name="id_produit[]" id value="'.$record["id_produit"].'">';

            $code_produit   .= '<span style="display: none;">'.$temp_color.'</span>';



            $produit        = '<a href="'.base_url().'index.php/produit/details/'.$record["id_produit"].'" rel="popover" data-img="'.$record["image"].'"><strong>'.$record["full_name"].'</strong></a>';

            $produit        .= $record["type"]==1 ? " <br><small class='text-info'><b>[ COMPOSE ]</b></small>" : "";



            $categorie      = '<a href="'.base_url().'index.php/categorie/details/'.$record["id_categorie"].'"><strong>'.$this->db->where("id_categorie", $record["id_categorie"])->get("categorie")->row()->full_name.'</strong></a>';

            $sub_categorie  = _ENABLE_SUB_CATEGORIE_ ? '<a href="'.base_url().'index.php/sub_categorie/details/'.$record["id_sub_categorie"].'"><strong>'.$record["sub_categorie"].'</strong></a>' : null;



            $entree         = '<input type="number" step="any" min="0" value="'.($temp_type==1 ? $temp_quantite : 0).'" name="entree_'.$record["id_produit"].'" id="entree_'.$record["id_produit"].'" class="form-control input-sm" style="width:100px;" oninput="checkQuantiteEntree('.$record["id_produit"].');" '.($temp_type==2 ? 'disabled="disabled"' : "").' required>';

            $entree_prix    = '<input type="number" step="any" min="0" value="'.($temp_type==1 ? $temp_prix : $record["prix_achat"]).'" name="entree_prix_'.$record["id_produit"].'" id="entree_prix_'.$record["id_produit"].'" class="form-control input-sm" style="width:110px;" oninput="checkQuantiteEntree('.$record["id_produit"].');" '.($temp_type==2 ? 'disabled="disabled"' : "").' required>';



            $sortie         = '<input type="number" step="any" min="0" value="'.($temp_type==2 ? $temp_quantite : 0).'" name="sortie_'.$record["id_produit"].'" id="sortie_'.$record["id_produit"].'" class="form-control input-sm" style="width:100px;" oninput="checkQuantiteSortie('.$record["id_produit"].');" '.($temp_type==1 ? 'disabled="disabled"' : "").' required>';

            $sortie_prix    = '<input type="number" step="any" min="0" value="'.($temp_type==2 ? $temp_prix : $record["prix_achat"]).'" name="sortie_prix_'.$record["id_produit"].'" id="sortie_prix_'.$record["id_produit"].'" class="form-control input-sm" style="width:110px;" oninput="checkQuantiteSortie('.$record["id_produit"].');" '.($temp_type==1 ? 'disabled="disabled"' : "").' required>';



            $new_qauantite  = '<strong id="new_stock_'.$record["id_produit"].'">'.($temp_type==1 ? $stock_details["stock"]+$temp_quantite : $stock_details["stock"]-$temp_quantite).'</strong>';



            // OPTIONS

            $options = '<a href="javascript:;" id="btnSave_'.$record["id_produit"].'" class="btn btn-primary btn-sm saveLine '.($temp_color=="" ? "" : "disabled").'" data-toggle="tooltip" data-placement="top" title="Enregistrer" onclick="saveLine(this)"

                           data-type="'.$temp_type.'"

                           data-id_produit="'.$record["id_produit"].'"

                           data-id_inventaire_details="'.$id_inventaire_details.'">

                            <i class="fa fa-save"></i>

                        </a>';



            // DATA

            $data = array(

                "code_produit"  => $code_produit,

                "produit"       => $produit,

                "categorie"     => $categorie,

                "sub_categorie" => $sub_categorie,

                "quantite"      => $quantite,

                "entree"        => $entree,

                "entree_prix"   => $entree_prix,

                "sortie"        => $sortie,

                "sortie_prix"   => $sortie_prix,

                "new_quantite"  => $new_qauantite,



                "options"       => $options

            );



            array_push($products, $data);

        }



        // Response

        $response = array(

            "draw" => intval($draw),

            "iTotalRecords" => $totalRecords,

            "iTotalDisplayRecords" => $totalRecordwithFilter,

            "aaData" => $products

        );



        echo json_encode($response);

    }



    public function checkStatus($id_inventaire)

    {

        header("Access-Control-Allow-Origin: *");

        header("Access-Control-Allow-Methods: *");

        header("Access-Control-Allow-Headers: *");



        $products = $this->db->where("display", 1)->get("produit")->result_array();

        $inventaire_details = $this->db->where("id_inventaire", $id_inventaire)->get("inventaire_details")->result_array();

        $inventaire_details = array_column($inventaire_details, 'id_produit');



        $valide = "valide";

        foreach ($products as $p) {

            if(!in_array($p["id_produit"], $inventaire_details)) {

                $valide = "not";

                break;

            }

        }



        echo json_encode($valide);

    }



    public function getData($id_inventaire)

    {

        header("Access-Control-Allow-Origin: *");

        header("Access-Control-Allow-Methods: *");

        header("Access-Control-Allow-Headers: *");



        // Read value

        $postData           = $this->input->post();



        $draw               = $postData['draw'];

        $start              = $postData['start'];

        $rowperpage         = $postData['length']; // Rows display per page

        $columnIndex        = $postData['order'][0]['column']; // Column index

        $columnName         = $postData['columns'][$columnIndex]['data']; // Column name

        $columnSortOrder    = $postData['order'][0]['dir']; // asc or desc

        $searchValue        = $postData['search']['value']; // Search value



        // Search

        $searchQuery = "";

        if($searchValue != "") {

            $sub_categorie_sql = _ENABLE_SUB_CATEGORIE_ ? " OR sc.full_name LIKE '%".$searchValue."%' " : "";

            $searchQuery = " AND ( p.code_produit LIKE '%".$searchValue."%' 

                             OR p.full_name LIKE '%".$searchValue."%' 

                             OR c.full_name LIKE '%".$searchValue."%' 

                             ".$sub_categorie_sql." ) ";

        }



        // Total number of records without filtering

        $totalRecords = $this->db->query("SELECT COUNT(id_inventaire_details) AS total FROM inventaire_details WHERE id_inventaire = ".$id_inventaire)->row()->total;



        // Total number of record with filtering

        $totalRecordwithFilter = $this->db->query("SELECT COUNT(ivd.id_inventaire_details) AS total FROM inventaire_details ivd LEFT JOIN produit p ON p.id_produit = ivd.id_produit LEFT JOIN categorie c ON c.id_categorie = p.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie WHERE ivd.id_inventaire = " . $id_inventaire . $searchQuery)->row()->total;



        // Fetch records

        $orderByColumnQuery = "";

        if(!in_array($columnName, array("produit", "categorie", "sub_categorie", "details", "quantite", "options"))) {

            $orderByColumnQuery = " ORDER BY ".$columnName." ".$columnSortOrder;

        }

        elseif ($columnName == "produit") {

            $orderByColumnQuery = " ORDER BY p.full_name ".$columnSortOrder;

        }

        elseif ($columnName == "categorie") {

            $orderByColumnQuery = " ORDER BY c.full_name ".$columnSortOrder;

        }

        elseif ($columnName == "sub_categorie") {

            $orderByColumnQuery = " ORDER BY sc.full_name ".$columnSortOrder;

        }

        $rowperpage = $rowperpage != -1 ? $rowperpage : $totalRecords;

        $limitQuery = " LIMIT ".$rowperpage." OFFSET ".$start;



        $records = $this->db->query("SELECT ivd.*, p.id_produit, p.code_produit, p.image, p.alert, p.id_categorie, p.id_sub_categorie, p.type AS type_produit, p.full_name AS produit, c.full_name AS categorie, sc.full_name AS sub_categorie FROM inventaire_details ivd LEFT JOIN produit p ON p.id_produit = ivd.id_produit LEFT JOIN categorie c ON c.id_categorie = p.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie WHERE ivd.id_inventaire = " . $id_inventaire . $searchQuery . $orderByColumnQuery . $limitQuery)->result_array();

        $products = array();



        foreach($records as $record)

        {

            // QUANTITY

            $stock_details = getQuantiteProduit($record["id_produit"], $id_inventaire);

            $quantite = $stock_details["stock"];

            $color = "";

            if($quantite > 0 && $quantite <= $record["alert"]) { $color = "#F8C471"; }

            elseif($quantite <= 0) { $color = "#F1948A"; }

            $quantite = '<strong>'.$quantite.'</strong><span style="display: none;" data-color="'.$color.'"></span>';



            // ROWS

            $code_produit   = '<a href="'.base_url().'index.php/produit/details/'.$record["id_produit"].'" rel="popover" data-img="'.$record["image"].'"><strong>'.$record["code_produit"].'</strong></a>';

            $code_produit   .= '<input type="hidden" name="id_produit[]" id value="'.$record["id_produit"].'">';



            $produit      = '<a href="'.base_url().'index.php/produit/details/'.$record["id_produit"].'" rel="popover" data-img="'.$record["image"].'"><strong>'.$record["produit"].'</strong></a>';

            $produit      .= $record["type_produit"]==1 ? " <br><small class='text-info'><b>[ COMPOSE ]</b></small>" : "";



            $categorie      = '<a href="'.base_url().'index.php/categorie/details/'.$record["id_categorie"].'"><strong>'.$this->db->where("id_categorie", $record["id_categorie"])->get("categorie")->row()->full_name.'</strong></a>';

            $sub_categorie  = _ENABLE_SUB_CATEGORIE_ ? '<a href="'.base_url().'index.php/sub_categorie/details/'.$record["id_sub_categorie"].'"><strong>'.$record["sub_categorie"].'</strong></a>' : null;



            $details        = '<strong>'.($record["type"] == 1 ? "Entrée :" : "Sortie :").'</strong> <br>( '."Qte : <b>".$record["quantite"]."</b> x <b>".number_format($record["prix"],2,"."," ")."</b> DH".' )';



            // DATA

            $data = array(

                "code_produit"  => $code_produit,

                "produit"       => $produit,

                "categorie"     => $categorie,

                "sub_categorie" => $sub_categorie,

                "details"       => $details,

                "quantite"      => $quantite

            );



            array_push($products, $data);

        }



        // Response

        $response = array(

            "draw" => intval($draw),

            "iTotalRecords" => $totalRecords,

            "iTotalDisplayRecords" => $totalRecordwithFilter,

            "aaData" => $products

        );



        echo json_encode($response);

    }

}

