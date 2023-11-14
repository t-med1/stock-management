<?php
// Set error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
defined('BASEPATH') or exit('No direct script access allowed');

defined('BASEPATH') or exit('No direct script access allowed');



class Transport extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();



        CheckLogin();

        CheckAdmin();

    }



    public function index()
    {

        $data = array(

            /* ----------------------------------- */

            "title" => "Transports",

            "view" => "transport/liste",

            "active" => "TR"

            /* ----------------------------------- */

        );

        $this->load->view("template", $data);

    }



    public function checkCodeExists($ignore = null)
    {

        $code = $this->input->post("code_transport");

        if (!empty($code)) {

            echo json_encode(checkCodeExists($code, "transport", $ignore) ? "EXISTS" : "NOT");

        } else {
            echo json_encode("NOT");
        }

    }



    public function details($id)
    {

        $data = array(

            "transport" => $this->db->where("id_transport", $id)->get("transport")->row(),

             "ventes" => $this->db->query("SELECT * FROM vente WHERE id_transport = " . $id)->result_array(),

            "achats" => $this->db->query("SELECT * FROM achat WHERE id_transport = " . $id)->result_array(),

            /* ----------------------------------- */

            "title" => "Transports",

            "view" => "transport/details",

            "active" => "FS"

            /* ----------------------------------- */

        );

        $this->load->view("template", $data);

    }





    public function ajouter()
    {

        $code_transport = $this->input->post("code_transport");

        if (!empty($code_transport)) {

            $this->db->insert("transport", array(

                "code_transport" => getNewCode("TR", "transport", true),

                "livreur" => ucfirst($this->input->post("livreur")),

                "matricule" => ucfirst($this->input->post("matricule")),

                "telephone" => $this->input->post("telephone"),

                "description" => ucfirst($this->input->post("description")),

            )
            );

            $id_transport = $this->db->insert_id();



            $this->session->set_flashdata("message", array(

                "title" => "Succès!",

                "message" => "Transport enregistré avec succès."

            )
            );



            /* ---------------------- USER LOG ---------------------- */

            saveUserLog("Enregistrement de transport ( <b>" . ucfirst($this->input->post("code_transport")) . "</b> )");

            /* ---------------------- -------- ---------------------- */



            redirect("/transport/details/" . $id_transport, "refresh");

        } else {

            $data = array(

                "code_transport" => getNewCode("TR", "transport"),

                /* ----------------------------------- */

                "title" => "Transports",

                "view" => "transport/ajouter",

                "active" => "TR-ADD"

                /* ----------------------------------- */

            );

            $this->load->view("template", $data);

        }

    }
    



    public function modifier($id = null)
    {

        $code_transport = $this->input->post("code_transport");

        if (!empty($code_transport)) {

            $id_transport = $this->input->post("id_transport");

            $display = $this->input->post("display");

            $display_hide_updated = $this->input->post("display_hide_updated");



            $this->db->where("id_transport", $id_transport);

            $this->db->update("transport", array(

                "code_transport" => $code_transport,

                "livreur" => ucfirst($this->input->post("livreur")),

                "matricule" => ucfirst($this->input->post("matricule")),

                "telephone" => $this->input->post("telephone"),

                "description" => ucfirst($this->input->post("description")),

                "display" => !empty($display) && $display == "false" ? 0 : 1

            )
            );





            $this->session->set_flashdata("message", array(

                "title" => "Succès!",

                "message" => "Transport modifié avec succès."

            )
            );



            /* ---------------------- USER LOG ---------------------- */

            if (!empty($display) && $display == "false") {

                $more_text = !empty($display_hide_updated) && $display_hide_updated == "true" ? "/Reprise" : "/Archivage";

            } else {

                $more_text = !empty($display_hide_updated) && $display_hide_updated == "true" ? "/Reprise" : "";

            }

            saveUserLog("Modification" . $more_text . " de transport ( <b>" . ucfirst($this->input->post("matricule")) . "</b> )");

            /* ---------------------- -------- ---------------------- */



            redirect("/transport/details/" . $id_transport, "refresh");

        } else {

            $data = array(

                "transport" => $this->db->where("id_transport", $id)->get("transport")->row(),

                /* ----------------------------------- */

                "title" => "Transports",

                "view" => "transport/modifier",

                "active" => "TR"

                /* ----------------------------------- */

            );

            $this->load->view("template", $data);

        }

    }



    public function supprimer()
    {

        $id_transport = $this->input->post("id_transport");

        if (!empty($id_transport)) {



            $transport = $this->db->where("id_transport", $id_transport)->get("transport")->row();

            if ($transport->display == 0) {

                $this->session->set_flashdata("warning", array(

                    "title" => "Alerte !",

                    "message" => "Vous ne pouvez pas supprimer un transport dans l'archive."

                )
                );

            } else {

                /* ---------------------- USER LOG ---------------------- */

                saveUserLog("Suppression de transport ( <b>" . $transport->code_transport . "</b> )");

                /* ---------------------- -------- ---------------------- */



                $this->db->where("id_transport", $id_transport);

                $this->db->delete("transport");



                $this->session->set_flashdata("message", array(

                    "title" => "Succès!",

                    "message" => "Transport supprimé avec succès."

                )
                );

            }

        }



        redirect("/transport", "refresh");

    }



    public function getData($type = null) {
        try {
            // Read value
            $display = $type == "archive" ? 0 : 1;
    
            // Get POST data
            $postData = $this->input->post();
    
            // Extract necessary data
            $draw = isset($postData['draw']) ? intval($postData['draw']) : 1;
            $start = isset($postData['start']) ? intval($postData['start']) : 0;
            $rowperpage = isset($postData['length']) ? intval($postData['length']) : 10;
            $columnIndex = isset($postData['order'][0]['column']) ? intval($postData['order'][0]['column']) : 0;
            $columnName = isset($postData['columns'][$columnIndex]['data']) ? $postData['columns'][$columnIndex]['data'] : 'code_transport';
            $columnSortOrder = isset($postData['order'][0]['dir']) ? $postData['order'][0]['dir'] : 'asc';
            $searchValue = isset($postData['search']['value']) ? $postData['search']['value'] : '';
    
            // Search query
            $searchQuery = "";
    
            if ($searchValue != "") {
                $searchQuery = " ( code_transport LIKE '%" . $searchValue . "%'
                                OR livreur LIKE '%" . $searchValue . "%' 
                                OR matricule LIKE '%" . $searchValue . "%' 
                                OR telephone LIKE '%" . $searchValue . "%' ) ";
            }
    
            // Total number of records without filtering
            $this->db->where("display", $display);
            $totalRecords = $this->db->count_all_results("transport");
    
            // Fetch records
            $this->db->select('*');
            if (!empty($searchQuery)) {
                $this->db->where($searchQuery);
            }
            $this->db->where("display", $display);
            $this->db->order_by($columnName, $columnSortOrder);
            $this->db->limit($rowperpage, $start);
            $records = $this->db->get("transport")->result_array();
    
            $data = array();
    
            foreach ($records as $record) {
                // Options and data population logic
                $options = '<a href="'.base_url().'index.php/transport/details/'.$record["id_transport"].'" class="btn btn-primary rounded btn-sm" data-toggle="tooltip" data-placement="top" title="Détails">
                <i class="fa fa-list-alt" aria-hidden="true"></i>
            </a>';

if ($this->session->userdata("role_user") == 1) {
    $update_link = base_url().'index.php/transport/modifier/'.$record["id_transport"];
    $options .= '<a href="'.$update_link.'" class="btn btn-success rounded btn-sm" style="margin-left: 3px;" data-toggle="tooltip" data-placement="top" title="Modifier">
                    <i class="fa fa-wrench" aria-hidden="true"></i>
                </a>';
    $options .= '<form method="post" action="'.base_url().'index.php/transport/supprimer/" id="form_'.$record["id_transport"].'" style="display:none;">
                     <input type="hidden" name="id_transport" value="'.$record["id_transport"].'">
                 </form>
                 <a href="#" onclick="confirmDelete(\'form_'.$record["id_transport"].'\')" class="btn btn-danger btn-sm rounded '.($record["display"] == 0 ? "hidden" : "").'" data-toggle="tooltip" data-placement="top" title="Supprimer">
                     <i class="fa fa-trash" aria-hidden="true"></i>
                 </a>';
}
                
                array_push($data, array(
                    "code_transport" => $record["code_transport"],
                    "livreur" => $record["livreur"],
                    "matricule" => $record["matricule"],
                    "telephone" => $record["telephone"],
                    "options" => $options
                ));
            }
    
            // Prepare the response
            $response = array(
                "draw" => $draw,
                "iTotalRecords" => $totalRecords,
                "iTotalDisplayRecords" => count($records),
                "aaData" => $data
            );
    
            // Output JSON response
            header('Content-Type: application/json');
            echo json_encode($response);
        } catch (Exception $e) {
            // Handle exceptions here
            http_response_code(500); // Internal Server Error
            echo json_encode(array("error" => $e->getMessage()));
        }
    }
    
}