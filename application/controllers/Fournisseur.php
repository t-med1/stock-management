<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fournisseur extends CI_Controller
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
            "title"     => "Fournisseurs",
            "view"      => "fournisseur/liste",
            "active"    => "FS"
            /* ----------------------------------- */
        );
        $this->load->view("template", $data);
	}

    public function checkCodeExists($ignore = null)
    {
        $code = $this->input->post("code_fournisseur");
        if(!empty($code)) {
            echo json_encode(checkCodeExists($code, "fournisseur", $ignore) ? "EXISTS" : "NOT");
        }
        else { echo json_encode("NOT"); }
    }

	public function details($id)
	{
        $data = array(
            "fournisseur"   => $this->db->where("id_fournisseur", $id)->get("fournisseur")->row(),
            "commandes"     => $this->db->query("SELECT c.*, COALESCE(SUM(cd.quantite),0) AS produits FROM commande c LEFT JOIN commande_details cd ON cd.id_commande = c.id_commande WHERE c.id_fournisseur = ".$id." GROUP BY c.id_commande")->result_array(),
            "achats"        => $this->db->query("SELECT * FROM achat WHERE id_fournisseur = ".$id)->result_array(),
            /* ----------------------------------- */
            "title"     => "Fournisseurs",
            "view"      => "fournisseur/details",
            "active"    => "FS"
            /* ----------------------------------- */
        );
        $this->load->view("template", $data);
	}

    public function releve($id)
    {
        $achats = $this->db->query("SELECT * FROM achat WHERE id_fournisseur = ".$id)->result_array();
        $paiements_achats = $this->db->query("SELECT p.*, a.code_achat FROM paiement p LEFT JOIN achat a ON a.id_achat = p.id_achat WHERE a.id_fournisseur = ".$id)->result_array();
        $exonerations_reste = $this->db->query("SELECT ex.*, a.code_achat FROM exoneration_reste ex LEFT JOIN achat a ON a.id_achat = ex.id_achat WHERE a.id_fournisseur = ".$id)->result_array();
        $releve = array();

        foreach ($achats as $val)
        {
            $total_vente = getAchatTotal($val["id_achat"]);
            $status = $total_vente["total_paiement"] == 0 ? "&nbsp; <span class='text-danger'>( Non Réglée )</span>" : "";

            array_push($releve, array(
                "date"      => date("d/m/Y", strtotime($val["date_achat"])),
                "type"      => '<span class="label label-info">ACHAT</span>',
                "code"      => '<a href="'.base_url()."index.php/achat/details/".$val["id_achat"].'"><strong>'.$val["code_achat"].'</strong></a>'.$status,
                "debit"     => $total_vente["total_achat"],
                "debit_row" => '<strong>'.number_format($total_vente["total_achat"],2,'.',' ').'</strong> <small>DH</small>',
                "credit"    => 0,
                "credit_row"=> '',
                "solde"     => 0,

                "sort"      => strtotime($val["date_achat"]." 10:00"),
                "color"     => ""
            ));
        }
        foreach ($paiements_achats as $val)
        {
            $code = getMethodePaiement($val["methode"]);
            if($val["methode"] == 2 || $val["methode"] == 3) {
                $cheque = getPaiementDetails($val["id_paiement"]);
                $code   .= '<br> [ '.$cheque->reference." &nbsp-&nbsp ".date("d/m/Y", strtotime($cheque->date_cheque)).' ]';
            }

            array_push($releve, array(
                "date"      => date("d/m/Y", strtotime($val["date_paiement"])),
                "type"      => '<span class="label label-success">PAIEMENT</span><br><small class="text-info">[ '.$val["code_achat"].' ]</small>',
                "code"      => $code,
                "debit"     => 0,
                "debit_row" => '',
                "credit"    => $val["montant"],
                "credit_row"=> '<strong>'.number_format($val["montant"],2,'.',' ').'</strong> <small>DH</small>',
                "solde"     => 0,

                "sort"      => strtotime($val["date_paiement"]." 10:30"),
                "color"     => 'success'
            ));
        }
        foreach ($exonerations_reste as $val)
        {
            array_push($releve, array(
                "date"      => date("d/m/Y", strtotime($val["date_create"])),
                "type"      => '<span class="label label-success">EXONERATION</span><br><small class="text-info">[ '.$val["code_achat"].' ]</small>',
                "code"      => "Exonération du Reste",
                "debit"     => 0,
                "debit_row" => '',
                "credit"    => $val["montant"],
                "credit_row"=> '<strong>'.number_format($val["montant"],2,'.','').'</strong> <small>DH</small>',
                "solde"     => 0,

                "sort"      => strtotime($val["date_create"]),
                "color"     => 'info',
            ));
        }

        usort($releve, function($a, $b) {
            return $a['sort'] - $b['sort'];
        });

        $solde = 0;
        for($i=0 ; $i<count($releve) ; $i++)
        {
            $solde += $releve[$i]["debit"];
            $solde -= $releve[$i]["credit"];
            $releve[$i]["solde"] = $solde;
        }

        $data = array(
            "fournisseur" => $this->db->where("id_fournisseur", $id)->get("fournisseur")->row(),
            "releve" => $releve,
            "solde" => $solde,
            /* ----------------------------------- */
            "title"     => "Relevé de Fournisseur",
            "view"      => "fournisseur/releve",
            "active"    => "FS"
            /* ----------------------------------- */
        );
        $this->load->view("template", $data);
    }

    public function ajouter()
    {
        $code_fournisseur = $this->input->post("code_fournisseur");
        if(!empty($code_fournisseur))
        {
            $this->db->insert("fournisseur", array(
                "code_fournisseur" => getNewCode("F", "fournisseur", true),
                "ice"           => $this->input->post("ice"),
                "full_name"     => ucfirst($this->input->post("full_name")),
                "responsable"   => ucfirst($this->input->post("responsable")),
                "adresse"       => $this->input->post("adresse"),
                "ville"         => ucfirst($this->input->post("ville")),
                "pays"          => $this->input->post("pays"),
                "telephone"     => $this->input->post("telephone"),
                "email"         => $this->input->post("email"),
                "description"   => $this->input->post("description")
            ));
            $id_fournisseur = $this->db->insert_id();

            $this->session->set_flashdata("message", array(
                "title" => "Succès!",
                "message" => "Fournisseur enregistré avec succès."
            ));

            /* ---------------------- USER LOG ---------------------- */
            saveUserLog("Enregistrement de fournisseur ( <b>".ucfirst($this->input->post("full_name"))."</b> )");
            /* ---------------------- -------- ---------------------- */

            redirect("/fournisseur/details/".$id_fournisseur, "refresh");
        }
        else
        {
            $data = array(
                "code_fournisseur" => getNewCode("F", "fournisseur"),
                /* ----------------------------------- */
                "title"     => "Fournisseurs",
                "view"      => "fournisseur/ajouter",
                "active"    => "FS-ADD"
                /* ----------------------------------- */
            );
            $this->load->view("template", $data);
        }
    }

    public function modifier($id = null)
    {
        $code_fournisseur = $this->input->post("code_fournisseur");
        if(!empty($code_fournisseur))
        {
            $id_fournisseur = $this->input->post("id_fournisseur");
            $display = $this->input->post("display");
            $display_hide_updated = $this->input->post("display_hide_updated");

            $this->db->where("id_fournisseur", $id_fournisseur);
            $this->db->update("fournisseur", array(
                "code_fournisseur" => $code_fournisseur,
                "ice"           => $this->input->post("ice"),
                "full_name"     => ucfirst($this->input->post("full_name")),
                "responsable"   => ucfirst($this->input->post("responsable")),
                "adresse"       => $this->input->post("adresse"),
                "ville"         => ucfirst($this->input->post("ville")),
                "pays"          => $this->input->post("pays"),
                "telephone"     => $this->input->post("telephone"),
                "email"         => $this->input->post("email"),
                "description"   => $this->input->post("description"),
                "display"       => !empty($display) && $display == "false" ? 0 : 1
            ));

            $update_all = $this->input->post("update_all");
            if(!empty($update_all) && $update_all == "true")
            {
                $this->db->where("id_fournisseur", $this->input->post("id_fournisseur"));
                $this->db->update("adresse", array(
                    "full_name"     => ucfirst($this->input->post("full_name")),
                    "adresse"       => $this->input->post("adresse"),
                    "ville"         => ucfirst($this->input->post("ville")),
                    "pays"          => $this->input->post("pays")
                ));
            }

            $this->session->set_flashdata("message", array(
                "title" => "Succès!",
                "message" => "Fournisseur modifié avec succès."
            ));

            /* ---------------------- USER LOG ---------------------- */
            if(!empty($display) && $display == "false") {
                $more_text = !empty($display_hide_updated) && $display_hide_updated == "true" ? "/Reprise" : "/Archivage";
            }
            else {
                $more_text = !empty($display_hide_updated) && $display_hide_updated == "true" ? "/Reprise" : "";
            }
            saveUserLog("Modification".$more_text." de fournisseur ( <b>".ucfirst($this->input->post("full_name"))."</b> )");
            /* ---------------------- -------- ---------------------- */

            redirect("/fournisseur/details/".$id_fournisseur, "refresh");
        }
        else
        {
            $data = array(
                "fournisseur"        => $this->db->where("id_fournisseur", $id)->get("fournisseur")->row(),
                /* ----------------------------------- */
                "title"     => "Fournisseurs",
                "view"      => "fournisseur/modifier",
                "active"    => "FS"
                /* ----------------------------------- */
            );
            $this->load->view("template", $data);
        }
    }

    public function supprimer()
    {
        $id_fournisseur = $this->input->post("id_fournisseur");
        if(!empty($id_fournisseur))
        {
            $commandes = $this->db->where("id_fournisseur", $id_fournisseur)->get("commande")->num_rows();
            $achats = $this->db->where("id_fournisseur", $id_fournisseur)->get("achat")->num_rows();

            $fournisseur = $this->db->where("id_fournisseur", $id_fournisseur)->get("fournisseur")->row();

            if( ($commandes+$achats) > 0 )
            {
                $this->session->set_flashdata("warning", array(
                    "title" => "Alerte !",
                    "message" => "Vous ne pouvez pas supprimer ce fournisseur, Il contient des Commandes/Achats."
                ));
            }
            elseif($fournisseur->display == 0)
            {
                $this->session->set_flashdata("warning", array(
                    "title" => "Alerte !",
                    "message" => "Vous ne pouvez pas supprimer un fournisseur dans l'archive."
                ));
            }
            else
            {
                /* ---------------------- USER LOG ---------------------- */
                saveUserLog("Suppression de fournisseur ( <b>".$fournisseur->full_name."</b> )");
                /* ---------------------- -------- ---------------------- */

                $this->db->where("id_fournisseur", $id_fournisseur);
                $this->db->delete("fournisseur");

                $this->session->set_flashdata("message", array(
                    "title" => "Succès!",
                    "message" => "Fournisseur supprimé avec succès."
                ));
            }
        }

        redirect("/fournisseur", "refresh");
    }

    public function getData($type = null)
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: *");
        header("Access-Control-Allow-Headers: *");

        // Read value
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
        $searchQuery = "";
        if($searchValue != "") {
            $searchQuery = " ( code_fournisseur LIKE '%".$searchValue."%' 
                            OR ice LIKE '%".$searchValue."%' 
                            OR full_name LIKE '%".$searchValue."%' 
                            OR responsable LIKE '%".$searchValue."%' 
                            OR adresse LIKE '%".$searchValue."%' 
                            OR ville LIKE '%".$searchValue."%' 
                            OR pays LIKE '%".$searchValue."%' 
                            OR telephone LIKE '%".$searchValue."%' 
                            OR email LIKE '%".$searchValue."%' ) ";
        }

        // Total number of records without filtering
        $this->db->select("count(*) as allcount");
        $records = $this->db->where("display", $display)->get("fournisseur")->result();
        $totalRecords = $records[0]->allcount;

        // Total number of record with filtering
        $this->db->select("count(*) as allcount");
        if($searchQuery != "") {
            $this->db->where($searchQuery);
        }
        $records = $this->db->where("display", $display)->get("fournisseur")->result();
        $totalRecordwithFilter = $records[0]->allcount;

        // Fetch records
        if($columnName != "options")
        {
            $this->db->select('*');
            if($searchQuery != '') {
                $this->db->where($searchQuery);
            }
            $this->db->order_by($columnName, $columnSortOrder);
        }
        $this->db->limit($rowperpage, $start);

        $records = $this->db->where("display", $display)->get("fournisseur")->result_array();

        $data = array();

        foreach($records as $record)
        {
            $options = '<a href="'.base_url().'index.php/fournisseur/details/'.$record["id_fournisseur"].'" class="btn btn-primary rounded btn-sm" data-toggle="tooltip" data-placement="top" title="Détails">
                            <i class="fa fa-list-alt" aria-hidden="true"></i>
                        </a>
                        <a href="'.base_url().'index.php/fournisseur/releve/'.$record["id_fournisseur"].'" class="btn btn-info rounded btn-sm '.($record["display"] == 0 ? "hidden" : "").'" data-toggle="tooltip" data-placement="top" title="Relevé de Fournisseur">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </a>
                        <a href="'.base_url().'index.php/fournisseur/modifier/'.$record["id_fournisseur"].'" class="btn btn-success rounded btn-sm" data-toggle="tooltip" data-placement="top" title="Modifier">
                            <i class="fa fa-wrench" aria-hidden="true"></i>
                        </a>';

            if($this->session->userdata("role_user") == 1)
            {
                $options .= '<form method="post" action="'.base_url().'index.php/fournisseur/supprimer/" id="form_'.$record["id_fournisseur"].'" style="display:none;">
                                <input type="hidden" name="id_fournisseur" value="'.$record["id_fournisseur"].'">
                            </form>
                            <a href="#" onclick="confirmDelete(\'form_'.$record["id_fournisseur"].'\')" class="btn btn-danger btn-sm rounded '.($record["display"] == 0 ? "hidden" : "").'" data-toggle="tooltip" data-placement="top" title="Supprimer">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>';
            }

            array_push($data, array(
                "code_fournisseur"   => $record["code_fournisseur"],
                "full_name"     => $record["full_name"],
                "responsable"   => $record["responsable"],
                "adresse"       => $record["adresse"],
                "ville"         => $record["ville"],
                "pays"          => $record["pays"],
                "telephone"     => $record["telephone"],

                "options"       => $options
            ));
        }

        // Response
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );

        echo json_encode($response);
    }
}
