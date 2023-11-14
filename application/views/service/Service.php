<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Service extends CI_Controller

{

    public function __construct()

    {

        parent::__construct();



        CheckLogin();

        CheckService();

    }





    public function index()

    {

        $data = array(

            /* ----------------------------------- */

            "title"     => "Services",

            "view"      => "service/liste",

            "active"    => "SR"

            /* ----------------------------------- */

        );

        $this->load->view("template", $data);

    }



    public function details($id)
{
    $serviceQuery = $this->db->query("SELECT s.*, c.full_name AS categorie, sc.full_name AS sub_categorie FROM service s LEFT JOIN categorie c ON c.id_categorie = s.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = s.id_sub_categorie WHERE s.id_service = " . $id);
    $service = $serviceQuery->row();

    if ($service !== null && is_object($service)) {
        $data = array(
            "service" => $service,
            "ventes" => $this->db->query("SELECT vd.*, v.code_vente, v.num_facture, v.date_vente, v.id_client, cl.full_name AS client FROM vente_details vd LEFT JOIN vente v ON v.id_vente = vd.id_vente LEFT JOIN `client` cl ON cl.id_client = v.id_client WHERE vd.id_service = " . $id)->result_array(),
            "title" => "Services",
            "view" => "service/details",
            "active" => "SR"
        );
    } else {
        $data = array(
            "service" => null,
            "ventes" => array(),
            "title" => "Services",
            "view" => "service/details",
            "active" => "SR"
        );
    }

    $this->load->view("template", $data);
}




    public function ajouter()

    {

        $full_name = $this->input->post("full_name");

        if(!empty($full_name))

        {

            $form_data = array(

                "id_categorie"  => $this->input->post("id_categorie"),

                "id_sub_categorie"  => _ENABLE_SUB_CATEGORIE_ ? $this->input->post("id_sub_categorie") : null,

                "full_name"     => ucfirst($full_name),

                "prix_vente"    => $this->input->post("prix_vente"),

                "description"   => $this->input->post("description")

            );



            $image = null;

            $more_log = "";

            if(file_exists($_FILES['image']['tmp_name']))

            {

                $info = getimagesize($_FILES['image']['tmp_name']);

                if($info)

                {

                    if ($info[2] === IMAGETYPE_GIF || $info[2] === IMAGETYPE_JPEG || $info[2] === IMAGETYPE_PNG || $info[2] === IMAGETYPE_BMP)

                    {

                        $unique_id = strtoupper(md5(uniqid($this->session->userdata("id_user")+time(), true)));

                        $image = 'SR'.$unique_id.'.'. pathinfo(basename($_FILES['image']['name']), PATHINFO_EXTENSION);

                        move_uploaded_file($_FILES['image']['tmp_name'], _UPLOADS_PATH_.$image);

                        $more_log = " avec image";

                    }

                }

            }



            $form_data["image"] = $image;

            $this->db->insert("service", $form_data);

            $id_service = $this->db->insert_id();



            $this->session->set_flashdata("message", array(

                "title" => "Succès!",

                "message" => "Service enregistré avec succès."

            ));



            /* ---------------------- USER LOG ---------------------- */

            saveUserLog("Enregistrement de service ( <b>".ucfirst($full_name)."</b> )".$more_log);

            /* ---------------------- -------- ---------------------- */



            redirect("/service/details/".$id_service, "refresh");

        }

        else

        {

            $data = array(

                "categories"=> $this->db->where("display", 1)->get("categorie")->result_array(),

                "sub_categories"=> $this->db->where("display", 1)->get("sub_categorie")->result_array(),

                /* ----------------------------------- */

                "title"     => "Services",

                "view"      => "service/ajouter",

                "active"    => "SR-ADD"

                /* ----------------------------------- */

            );

            $this->load->view("template", $data);

        }

    }



    public function modifier($id = null)
{
    if ($this->input->post()) {
        $full_name = $this->input->post("full_name");
        $id_service = $this->input->post("id_service");
        $display = $this->input->post("display");
        $display_hide_updated = $this->input->post("display_hide_updated");

        $form_data = array(
            "id_categorie" => $this->input->post("id_categorie"),
            "full_name" => ucfirst($full_name),
            "prix_vente" => $this->input->post("prix_vente"),
            "description" => $this->input->post("description"),
            "display" => !empty($display) && $display == "false" ? 0 : 1,
        );

        // Update form_data with image if uploaded
        if (isset($_FILES['image']) && file_exists($_FILES['image']['tmp_name'])) {
            // Handle image upload and update form_data["image"]
            // ...
        }

        $this->db->where("id_service", $id_service);
        $this->db->update("service", $form_data);

        // Log the modification
        // ...

        $this->session->set_flashdata("message", array(
            "title" => "Succès!",
            "message" => "Service modifié avec succès."
        ));

        redirect("/service/details/" . $id_service, "refresh");
    } else {
        $service = $this->db->query("SELECT * FROM service WHERE id_service = " . $id)->row();

        $categories = $this->db->where("display", 1)->get("categorie")->result_array();
        $sub_categories = $this->db->where("display", 1)->get("sub_categorie")->result_array();

        $data = array(
            "categories" => $categories,
            "sub_categories" => $sub_categories,
            "service" => $service,
            "title" => "Modifier Service",
            "view" => "service/modifier",
            "active" => "SR"
        );

        $this->load->view("template", $data);
    }
}




    public function supprimer()

    {

        CheckAdmin();



        $id_service = $this->input->post("id_service");

        if(!empty($id_service))

        {

            $client_cmd_details = $this->db->where("id_service", $id_service)->get("client_cmd_details")->num_rows();

            $vente_details      = $this->db->where("id_service", $id_service)->get("vente_details")->num_rows();



            $service = $this->db->where("id_service", $id_service)->get("service")->row();



            if( ($client_cmd_details+$vente_details) > 0 )

            {

                $this->session->set_flashdata("warning", array(

                    "title" => "Alerte !",

                    "message" => "Vous ne pouvez pas supprimer ce service. Il est utilisé dans des Commandes/Ventes."

                ));



                redirect("/service/details/".$id_service, "refresh");

            }

            elseif($service->display == 0)

            {

                $this->session->set_flashdata("warning", array(

                    "title" => "Alerte !",

                    "message" => "Vous ne pouvez pas supprimer un service dans l'archive."

                ));

            }

            else

            {

                $image = $this->db->query("SELECT image FROM service WHERE id_service = " . $id_service)->row()->image;

                $file = _UPLOADS_PATH_.$image;

                if(!empty($image) && file_exists($file)) { unlink($file); }



                /* ---------------------- USER LOG ---------------------- */

                saveUserLog("Suppression de service ( <b>".$service->full_name."</b> )");

                /* ---------------------- -------- ---------------------- */



                $this->db->where("id_service", $id_service);

                $this->db->delete("service");



                $this->session->set_flashdata("message", array(

                    "title" => "Succès!",

                    "message" => "Service supprimé avec succès."

                ));

            }

        }



        redirect("/service", "refresh");

    }



    public function supprimer_image()

    {

        CheckAdmin();



        $id_service = $this->input->post("image_id_service");

        if(!empty($id_service))

        {

            $image = $this->db->query("SELECT image FROM service WHERE id_service = " . $id_service)->row()->image;

            $file = _UPLOADS_PATH_.$image;

            if(!empty($image) && file_exists($file)) { unlink($file); }



            $this->db->where("id_service", $id_service);

            $this->db->update("service", array(

                "image" => null

            ));



            $this->session->set_flashdata("message", array(

                "title" => "Succès!",

                "message" => "Image de service supprimé avec succès."

            ));



            /* ---------------------- USER LOG ---------------------- */

            saveUserLog("Suppression d'image de service ( <b>".$this->db->where("id_service", $id_service)->get("service")->row()->full_name."</b> )");

            /* ---------------------- -------- ---------------------- */

        }



        redirect("/service/modifier/".$id_service, "refresh");

    }



    public function getServices($search = "name")

    {

        header("Access-Control-Allow-Origin: *");

        header("Access-Control-Allow-Methods: *");

        header("Access-Control-Allow-Headers: *");



        $search_query = " AND s.full_name LIKE '%".$this->input->post("recherche")."%'";



        $services = $this->db->query("SELECT s.*, c.full_name AS categorie, sc.full_name AS sub_categorie 

                                     FROM service s 

                                     LEFT JOIN categorie c ON c.id_categorie = s.id_categorie 

                                     LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = s.id_sub_categorie 

                                     WHERE s.display = 1 

                                     ".$search_query." 

                                     LIMIT 10 ")->result_array();



        echo json_encode(array(

            "services" => $services

        ));

    }



    public function getData($type = null, $table = null, $id_table = null, $details = null)

    {

        header("Access-Control-Allow-Origin: *");

        header("Access-Control-Allow-Methods: *");

        header("Access-Control-Allow-Headers: *");



        // Read value

        $details            = !empty($details) ? explode("-", $details) : null;

        $display            = $type == "archive" ? 0 : 1;

        $postData           = $this->input->post();



        $draw               = $postData['draw'];

        $start              = $postData['start'];

        $rowperpage         = $postData['length']; // Rows display per page

        $columnIndex        = $postData['order'][0]['column']; // Column index

        $columnName         = $postData['columns'][$columnIndex]['data']; // Column name

        $columnSortOrder    = $postData['order'][0]['dir']; // asc or desc

        $searchValue        = $postData['search']['value']; // Search value



        // Search

        $table_sql = "";

        if(!empty($table) && !empty($id_table) && $table != "NO" && $id_table != "NO") {

            $table_sql = " AND s.id_".$table." = ".$id_table." ";

        }

        $searchQuery = "";

        if($searchValue != "") {

            $sub_categorie_sql = _ENABLE_SUB_CATEGORIE_ ? " OR sc.full_name LIKE '%".$searchValue."%' " : "";

            $searchQuery = " AND ( s.full_name LIKE '%".$searchValue."%' 

                             OR c.full_name LIKE '%".$searchValue."%' 

                             ".$sub_categorie_sql."

                             OR s.prix_vente LIKE '%".$searchValue."%' ) ";

        }



        // Total number of records without filtering

        $totalRecords = $this->db->query("SELECT COUNT(id_service) AS total FROM service WHERE display = " . $display)->row()->total;



        // Total number of record with filtering

        $totalRecordwithFilter = $this->db->query("SELECT COUNT(s.id_service) AS total FROM service s LEFT JOIN categorie c ON c.id_categorie = s.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = s.id_sub_categorie WHERE s.display = " . $display . $table_sql . $searchQuery)->row()->total;



        // Fetch records

        $orderByColumnQuery = "";

        if(!in_array($columnName, array("image", "service", "categorie", "sub_categorie", "options"))) {

            $orderByColumnQuery = " ORDER BY ".$columnName." ".$columnSortOrder;

        }

        elseif ($columnName == "service") {

            $orderByColumnQuery = " ORDER BY s.full_name ".$columnSortOrder;

        }

        elseif ($columnName == "categorie") {

            $orderByColumnQuery = " ORDER BY c.full_name ".$columnSortOrder;

        }

        elseif ($columnName == "sub_categorie") {

            $orderByColumnQuery = " ORDER BY sc.full_name ".$columnSortOrder;

        }

        $limitQuery = " LIMIT ".$rowperpage." OFFSET ".$start;



        $records = $this->db->query("SELECT s.*, c.full_name AS categorie, sc.full_name AS sub_categorie FROM service s LEFT JOIN categorie c ON c.id_categorie = s.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = s.id_sub_categorie WHERE s.display = " . $display . $table_sql . $searchQuery . $orderByColumnQuery . $limitQuery)->result_array();

        $services = array();



        foreach($records as $record)

        {

            // IMAGE

            $image = '';

            if(!empty($record["image"]) && file_exists(_UPLOADS_PATH_.$record["image"]))

            {

                $image = '<a href="javascript:;" onclick="showImage(\''.$record["full_name"].'\', \''.$record["image"].'\')">

                            <i class="fa fa-picture-o" aria-hidden="true"></i>

                          </a>';

            }



            // NAMES

            $service = !empty($details) && in_array("link", $details)

                ? '<a href="'.base_url().'index.php/service/details/'.$record["id_service"].'" rel="popover" data-img="'.$record["image"].'"><strong>'.$record["full_name"].'</strong></a>'

                : $record["full_name"];



            $categorie      = $this->db->where("id_categorie", $record["id_categorie"])->get("categorie")->row();

            $categorie      = !empty($categorie) ? '<a href="'.base_url().'index.php/categorie/details/'.$record["id_categorie"].'"><strong>'.$categorie->full_name.'</strong></a>' : null;



            $sub_categorie  = _ENABLE_SUB_CATEGORIE_ ? $this->db->where("id_sub_categorie", $record["id_sub_categorie"])->get("sub_categorie")->row() : array();

            $sub_categorie  = !empty($sub_categorie) ? '<a href="'.base_url().'index.php/sub_categorie/details/'.$record["id_sub_categorie"].'"><strong>'.$sub_categorie->full_name.'</strong></a>' : null;



            // OPTIONS

            $update_link = base_url().'index.php/service/modifier/'.$record["id_service"];

            $options = '<a href="'.base_url().'index.php/service/details/'.$record["id_service"].'" class="btn btn-primary rounded btn-sm" data-toggle="tooltip" data-placement="top" title="Détails">

                            <i class="fa fa-list-alt" aria-hidden="true"></i>

                        </a>

                        <a href="'.$update_link.'" class="btn btn-success rounded btn-sm" data-toggle="tooltip" data-placement="top" title="Modifier">

                            <i class="fa fa-wrench" aria-hidden="true"></i>

                        </a>';



            if($this->session->userdata("id_user") == 1 || $this->session->userdata("id_user") == 2)

            {

                $options .= '<form method="post" action="'.base_url().'index.php/service/supprimer/" id="form_'.$record["id_service"].'" style="display:none;">

                                 <input type="hidden" name="id_service" value="'.$record["id_service"].'">

                             </form>

                             <a href="#" onclick="confirmDelete(\'form_'.$record["id_service"].'\')" class="btn btn-danger btn-sm rounded '.($record["display"] == 0 ? "hidden" : "").'" data-toggle="tooltip" data-placement="top" title="Supprimer">

                                 <i class="fa fa-trash" aria-hidden="true"></i>

                             </a>';

            }



            // DATA

            $data = array(

                "image"         => $image,

                "service"       => $service,

                "categorie"     => $categorie,

                "sub_categorie" => $sub_categorie,

                "description"   => $record["description"],

                "prix_vente"    => '<strong>'.number_format($record["prix_vente"],2,'.','').'</strong>' . ' <small>DH</small>',



                "options"       => $options

            );



            array_push($services, $data);

        }



        // Response

        $response = array(

            "draw" => intval($draw),

            "iTotalRecords" => $totalRecords,

            "iTotalDisplayRecords" => $totalRecordwithFilter,

            "aaData" => $services

        );



        echo json_encode($response);

    }

}

