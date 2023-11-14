<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        CheckLogin();
    }
    
	public function index()
	{
        $data = array(
            /* ----------------------------------- */
            "title"     => "Clients",
            "view"      => "client/liste",
            "active"    => "CL"
            /* ----------------------------------- */
        );
        $this->load->view("template", $data);
	}

    public function cite()
    {
        $data = array(
            /* ----------------------------------- */
            "title"     => "Cites",
            "view"      => "client/cite",
            "active"    => "CTL"
            /* ----------------------------------- */
        );
        $this->load->view("template", $data);
    }

    public function checkCodeExists($ignore = null)
    {
        $code = $this->input->post("code_client");
        if(!empty($code)) {
            echo json_encode(checkCodeExists($code, "client", $ignore) ? "EXISTS" : "NOT");
        }
        else { echo json_encode("NOT"); }
    }

	public function details($id)
	{
        $data = array(
            "client"    => $this->db->query("SELECT c.*, u.full_name AS utilisateur, u.role FROM `client` c LEFT JOIN `user` u ON u.id_user = c.id_user WHERE c.id_client = ".$id)->row(),
            "clients_cmds" =>  $this->db->query("SELECT cc.*, c.full_name AS client, COALESCE(SUM(cd.quantite),0) AS produits, v.id_vente, v.code_vente FROM client_cmd cc LEFT JOIN client_cmd_details cd ON cc.id_client_cmd = cd.id_client_cmd LEFT JOIN client c ON c.id_client = cc.id_client LEFT JOIN vente v ON v.id_client_cmd = cc.id_client_cmd WHERE cc.id_client = ".$id." GROUP BY cc.id_client_cmd")->result_array(),
            "devis"     =>  $this->db->query("SELECT d.*, c.full_name AS client, COALESCE(SUM(dd.quantite),0) AS produits, v.id_vente, v.code_vente FROM devis d LEFT JOIN devis_details dd ON d.id_devis = dd.id_devis LEFT JOIN client c ON c.id_client = d.id_client LEFT JOIN vente v ON v.id_devis = d.id_devis WHERE d.id_client = ".$id." GROUP BY dd.id_devis")->result_array(),
            "ventes"    => $this->db->query("SELECT * FROM vente WHERE id_client = ".$id)->result_array(),
            // "factures"    => $this->db->query("SELECT * FROM facture WHERE id_client = ".$id)->result_array(),
            "avoirs"    => $this->db->query("SELECT * FROM avoir WHERE id_client = ".$id)->result_array(),
            /* ----------------------------------- */
            "title"     => "Clients",
            "view"      => "client/details",
            "active"    => "CL"
            /* ----------------------------------- */
        );
        $this->load->view("template", $data);
	}



    public function facture($id_client, $value = null)
{
    // check_permission('CLIENT_UPDATE'); // Make sure this permission check is necessary and properly implemented

    if ($value == 'ajouter')
    {
        $ventes = explode("~~", $this->input->post('ventes'));

        // Insert the new facture
        $this->db->insert('facture', [
            "id_client" => $id_client,
            "num_facture" => getNewNumFacture(),
            "date" => $this->input->post('date'),
        ]);

        // Uncomment the following lines if you intend to update vente records
        // foreach ($ventes as $vente) {
        //     $this->db->where('id_vente', $vente);
        //     $this->db->update('vente', array('num_facture' => $num_facture));
        // }

        redirect("/client/details/".$id_client, "refresh");
    }
    elseif ($value == null)
    {
        $data = array(
            "client" => $this->db->query("SELECT c.*, u.full_name AS utilisateur, u.role AS client_segment FROM `client` c LEFT JOIN `user` u ON u.id_user = c.id_user WHERE c.id_client = ".$id_client)->row(),
            "ventes" => $this->db->query("SELECT * FROM vente WHERE id_client = ".$id_client)->result_array(),
            /* ----------------------------------- */
            "title" => "Clients",
            "view" => "client/ajoute_facture",
            "active" => "CL"
            /* ----------------------------------- */
        );
        $this->load->view("template", $data);
    }
}


	public function releve($id)
    {
        if($id == 1) {
            redirect("/client/details/".$id, "refresh");
        }

        $ventes     = $this->db->query("SELECT * FROM vente WHERE id_client = ".$id)->result_array();
        $avoirs     = $this->db->query("SELECT * FROM avoir WHERE id_client = ".$id)->result_array();
        $avances    = _ENABLE_AVANCE_ ? $this->db->query("SELECT * FROM avance WHERE id_client = ".$id)->result_array() : array();
        $avances_retour   = _ENABLE_AVANCE_ ? $this->db->query("SELECT * FROM avance_retour WHERE id_client = ".$id)->result_array() : array();
        $paiements_ventes = $this->db->query("SELECT p.*, v.code_vente FROM paiement p LEFT JOIN vente v ON v.id_vente = p.id_vente WHERE v.id_client = ".$id)->result_array();
        $paiements_avoirs = $this->db->query("SELECT p.*, a.code_avoir FROM paiement p LEFT JOIN avoir a ON a.id_avoir = p.id_avoir WHERE a.id_client = ".$id)->result_array();
        $paiements_ventes_unpaid = $this->db->query("SELECT p.*, v.code_vente FROM paiement p LEFT JOIN cheque c ON c.id_paiement = p.id_paiement LEFT JOIN vente v ON v.id_vente = p.id_vente WHERE c.paid = 2 AND v.id_client = ".$id)->result_array();
        $paiements_avoirs_unpaid = $this->db->query("SELECT p.*, a.code_avoir FROM paiement p LEFT JOIN cheque c ON c.id_paiement = p.id_paiement LEFT JOIN avoir a ON a.id_avoir = p.id_avoir WHERE c.paid = 2 AND a.id_client = ".$id)->result_array();
        $exonerations_reste      = $this->db->query("SELECT ex.*, v.code_vente FROM exoneration_reste ex LEFT JOIN vente v ON v.id_vente = ex.id_vente WHERE v.id_client = ".$id)->result_array();
        $releve = array();

        foreach ($ventes as $val)
        {
            $total_vente = getVenteTotal($val["id_vente"]);
            $status = $total_vente["total_paiement"] == 0 ? "&nbsp; <span class='text-danger'>( Non Réglée )</span>" : "";

            array_push($releve, array(
                "date"      => date("d/m/Y", strtotime($val["date_vente"])),
                "type"      => '<span class="label label-info">VENTE</span>',
                "code"      => '<a href="'.base_url()."index.php/vente/details/".$val["id_vente"].'"><strong>'.$val["code_vente"].'</strong></a>'.$status,
                "debit"     => $total_vente["total_vente"],
                "debit_row" => '<strong>'.number_format($total_vente["total_vente"],2,'.',' ').'</strong> <small>DH</small>',
                "credit"    => 0,
                "credit_row"=> '',
                "solde"     => 0,

                "sort"      => strtotime($val["date_vente"]." 10:00"),
                "color"     => ""
            ));
        }
        foreach ($paiements_ventes as $val)
        {
            $code = getMethodePaiement($val["methode"], $val["type_avance"]);
            if($val["methode"] == 2 || $val["methode"] == 3) {
                $cheque = getPaiementDetails($val["id_paiement"]);
                $code   .= '<br> [ '.$cheque->reference." &nbsp-&nbsp ".date("d/m/Y", strtotime($cheque->date_cheque)).' ]';
                $code   .= getChequeStatus($cheque->paid);
            }

            array_push($releve, array(
                "date"      => date("d/m/Y", strtotime($val["date_paiement"])),
                "type"      => '<span class="label label-success">PAIEMENT</span><br><small class="text-info">[ '.$val["code_vente"].' ]</small>',
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
        foreach ($paiements_ventes_unpaid as $val)
        {
            $code = getMethodePaiement($val["methode"]);
            $date = $val["date_paiement"];
            if($val["methode"] == 2 || $val["methode"] == 3) {
                $cheque = getPaiementDetails($val["id_paiement"]);
                $code   .= '<br> [ '.$cheque->reference." &nbsp-&nbsp ".date("d/m/Y", strtotime($cheque->date_cheque)).' ]';
                $date = $cheque->date_update;
            }

            array_push($releve, array(
                "date"      => date("d/m/Y", strtotime($date)),
                "type"      => '<span class="label label-default text-danger">PAIEMENT ANNULE</span><br><small class="text-danger">[ '.$val["code_vente"].' ]</small>',
                "code"      => $code,
                "debit"     => $val["montant"],
                "debit_row" => '<strong>'.number_format($val["montant"],2,'.',' ').'</strong> <small>DH</small>',
                "credit"    => 0,
                "credit_row"=> '',
                "solde"     => 0,

                "sort"      => strtotime($date),
                "color"     => 'text-danger'
            ));
        }
        foreach ($avoirs as $val)
        {
            $total_avoir = getAvoirTotal($val["id_avoir"])["total_avoir"];

            array_push($releve, array(
                "date"      => date("d/m/Y", strtotime($val["date_avoir"])),
                "type"      => '<span class="label label-danger">BON D\'AVOIR</span>',
                "code"      => '<a href="'.base_url()."index.php/avoir/details/".$val["id_avoir"].'"><strong>'.$val["code_avoir"].'</strong></a>',
                "debit"     => $total_avoir >= 0 ? $total_avoir : 0,
                "debit_row" => $total_avoir >= 0 ?'<strong>'.number_format($total_avoir,2,'.',' ').'</strong> <small>DH</small>' : '',
                "credit"    => $total_avoir < 0 ? abs($total_avoir) : 0,
                "credit_row"=> $total_avoir < 0 ?'<strong>'.number_format(abs($total_avoir),2,'.',' ').'</strong> <small>DH</small>' : '',
                "solde"     => 0,

                "sort"      => strtotime($val["date_avoir"]." 12:00"),
                "color"     => ''
            ));
        }
        foreach ($paiements_avoirs as $val)
        {
            $total_avoir = getAvoirTotal($val["id_avoir"])["total_avoir"];
            $color = $total_avoir > 0 ? "success" : "info";
            $code = getMethodePaiement($val["methode"], $val["type_avance"]);
            if($val["methode"] == 2 || $val["methode"] == 3) {
                $cheque = getPaiementDetails($val["id_paiement"]);
                $code   .= '<br> [ '.$cheque->reference." &nbsp-&nbsp ".date("d/m/Y", strtotime($cheque->date_cheque)).' ]';
                $code   .= $cheque->type == 1 ? getChequeStatus($cheque->paid) : "";
            }

            array_push($releve, array(
                "date"      => date("d/m/Y", strtotime($val["date_paiement"])),
                "type"      => '<span class="label label-'.($total_avoir >= 0 ? "success" : "warning").'">'.($total_avoir > 0 ? "PAIEMENT" : "REGLEMENT").'</span><br><small class="text-warning">[ '.$val["code_avoir"].' ]</small>',
                "code"      => $code,
                "debit"     => $total_avoir < 0 ? $val["montant"] : 0,
                "debit_row" => $total_avoir < 0 ? '<strong>'.number_format($val["montant"],2,'.',' ').'</strong> <small>DH</small>' : '',
                "credit"    => $total_avoir >= 0 ? $val["montant"] : 0,
                "credit_row"=> $total_avoir >= 0 ? '<strong>'.number_format($val["montant"],2,'.',' ').'</strong> <small>DH</small>' : '',
                "solde"     => 0,

                "sort"      => strtotime($val["date_paiement"]." 12:30"),
                "color"     => $color
            ));
        }
        foreach ($paiements_avoirs_unpaid as $val)
        {
            $code = getMethodePaiement($val["methode"]);
            $date = $val["date_paiement"];
            if($val["methode"] == 2 || $val["methode"] == 3) {
                $cheque = getPaiementDetails($val["id_paiement"]);
                $code   .= '<br> [ '.$cheque->reference." &nbsp-&nbsp ".date("d/m/Y", strtotime($cheque->date_cheque)).' ]';
                $date = $cheque->date_update;
            }

            array_push($releve, array(
                "date"      => date("d/m/Y", strtotime($date)),
                "type"      => '<span class="label label-default text-danger">PAIEMENT ANNULE</span><br><small class="text-danger">[ '.$val["code_avoir"].' ]</small>',
                "code"      => $code,
                "debit"     => $val["montant"],
                "debit_row" => '<strong>'.number_format($val["montant"],2,'.','').'</strong> <small>DH</small>',
                "credit"    => 0,
                "credit_row"=> '',
                "solde"     => 0,

                "sort"      => strtotime($date),
                "color"     => 'text-danger'
            ));
        }
        foreach ($exonerations_reste as $val)
        {
            array_push($releve, array(
                "date"      => date("d/m/Y", strtotime($val["date_create"])),
                "type"      => '<span class="label label-success">EXONERATION</span><br><small class="text-info">[ '.$val["code_vente"].' ]</small>',
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

        if(_ENABLE_AVANCE_)
        {
            foreach ($avances as $val)
            {
                $code = "<strong>".number_format($val["montant"],2,'.',' ')."</strong> <small>DH</small> / ".getMethodePaiement($val["methode"]);
                if($val["methode"] == 2 || $val["methode"] == 3) {
                    $cheque = getPaiementDetails($val["id_avance"], "avance");
                    $code   .= '<br> [ '.$cheque->reference." &nbsp-&nbsp ".date("d/m/Y", strtotime($cheque->date_cheque)).' ]';
                    $code   .= getChequeStatus($cheque->paid);
                }

                array_push($releve, array(
                    "date"      => date("d/m/Y", strtotime($val["date_avance"])),
                    "type"      => '<span class="label label-warning text-danger">AVANCE</span>',
                    "code"      => $code,
                    "debit"     => 0,
                    "debit_row" => '',
                    "credit"    => 0,
                    "credit_row"=> '',
                    "solde"     => 0,

                    "sort"      => strtotime($val["date_avance"]." 08:00"),
                    "color"     => 'warning text-warning',
                ));
            }
            foreach ($avances_retour as $val)
            {
                $code = "<strong>".number_format($val["montant"],2,'.',' ')."</strong> <small>DH</small> / ".getMethodePaiement($val["methode"], $val["type_avance"]);
                if($val["methode"] == 2 || $val["methode"] == 3) {
                    $cheque = getPaiementDetails($val["id_avance_retour"], "avance_retour");
                    $code   .= '<br> [ '.$cheque->reference." &nbsp-&nbsp ".date("d/m/Y", strtotime($cheque->date_cheque)).' ]';
                }

                array_push($releve, array(
                    "date"      => date("d/m/Y", strtotime($val["date_retour"])),
                    "type"      => '<span class="label label-warning text-danger"> RETOUR D\'AVANCE</span>',
                    "code"      => $code,
                    "debit"     => 0,
                    "debit_row" => '',
                    "credit"    => 0,
                    "credit_row"=> '',
                    "solde"     => 0,

                    "sort"      => strtotime($val["date_retour"]." 15:00"),
                    "color"     => 'warning text-info',
                ));
            }
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
            "client" => $this->db->where("id_client", $id)->get("client")->row(),
            "releve" => $releve,
            "solde"  => $solde,
            /* ----------------------------------- */
            "title"     => "Relevé de Client",
            "view"      => "client/releve",
            "active"    => "CL"
            /* ----------------------------------- */
        );
        $this->load->view("template", $data);
    }

    public function ajouter()
    {
        $code_client = $this->input->post("code_client");
        if(!empty($code_client))
        {
            $this->db->insert("client", array(
                "code_client"   => getNewCode("C", "client", true),
                "id_user"       => $this->session->userdata("id_user"),
                "ice"           => $this->input->post("ice"),
                "full_name"     => ucfirst($this->input->post("full_name")),
                "responsable"   => ucfirst($this->input->post("responsable")),
                "remise"        => $this->session->userdata("role_user")==1 ? $this->input->post("remise") : 0,
                "adresse"       => $this->input->post("adresse"),
                "ville"         => ucfirst($this->input->post("ville")),
                "pays"          => $this->input->post("pays"),
                "telephone"     => $this->input->post("telephone"),
                "email"         => $this->input->post("email"),
                "description"   => $this->input->post("description"),
                "role_client" => $this->input->post("role")
            ));
            $id_client = $this->db->insert_id();

            $this->session->set_flashdata("message", array(
                "title" => "Succès!",
                "message" => "Client enregistré avec succès."
            ));

            /* ---------------------- USER LOG ---------------------- */
            saveUserLog("Enregistrement de client ( <b>".ucfirst($this->input->post("full_name"))."</b> )");
            /* ---------------------- -------- ---------------------- */

            redirect("/client/details/".$id_client, "refresh");
        }
        else
        {
            $data = array(
                "code_client" => getNewCode("C", "client"),
                /* ----------------------------------- */
                "title"     => "Clients",
                "view"      => "client/ajouter",
                "active"    => "CL-ADD"
                /* ----------------------------------- */
            );
            $this->load->view("template", $data);
        }
    }

    public function modifier($id = null)
    {
        // SECURE CLIENT COMPTOIRE
        if($id == 1 && $this->session->userdata("role_user") != 1) {
            redirect("/client", "refresh");
        }

        $code_client = $this->input->post("code_client");
        if(!empty($code_client))
        {
            $id_client = $this->input->post("id_client");
            $display = $this->input->post("display");
            $display_hide_updated = $this->input->post("display_hide_updated");

            $data = array(
                "code_client"   => $code_client,
                "id_user"       => $this->session->userdata("id_user"),
                "ice"           => $this->input->post("ice"),
                "full_name"     => ucfirst($this->input->post("full_name")),
                "responsable"   => ucfirst($this->input->post("responsable")),
                "remise"        => $id!=1 && $this->session->userdata("role_user")==1 ? $this->input->post("remise"):0,
                "adresse"       => $this->input->post("adresse"),
                "ville"         => ucfirst($this->input->post("ville")),
                "pays"          => $this->input->post("pays"),
                "telephone"     => $this->input->post("telephone"),
                "email"         => $this->input->post("email"),
                "description"   => $this->input->post("description"),
                "role_client"   => $this->input->post('role')
            );
            if($this->session->userdata("role_user") == 1) {
                $data["display"] = !empty($display) && $display == "false" ? 0 : 1;
            }

            $this->db->where("id_client", $id_client);
            $this->db->update("client", $data);

            $update_all = $this->input->post("update_all");
            if(!empty($update_all) && $update_all == "true")
            {
                $this->db->where("id_client", $id_client);
                $this->db->update("adresse", array(
                    "full_name"     => ucfirst($this->input->post("full_name")),
                    "adresse"       => $this->input->post("adresse"),
                    "ville"         => ucfirst($this->input->post("ville")),
                    "pays"          => $this->input->post("pays")
                ));
            }

            $this->session->set_flashdata("message", array(
                "title" => "Succès!",
                "message" => "Client modifié avec succès."
            ));

            /* ---------------------- USER LOG ---------------------- */
            if(!empty($display) && $display == "false") {
                $more_text = !empty($display_hide_updated) && $display_hide_updated == "true" ? "/Reprise" : "/Archivage";
            }
            else {
                $more_text = !empty($display_hide_updated) && $display_hide_updated == "true" ? "/Reprise" : "";
            }
            saveUserLog("Modification".$more_text." de client ( <b>".ucfirst($this->input->post("full_name"))."</b> )");
            /* ---------------------- -------- ---------------------- */

            redirect("/client/details/".$id_client, "refresh");
        }
        else
        {
            $data = array(
                "client"        => $this->db->where("id_client", $id)->get("client")->row(),
                /* ----------------------------------- */
                "title"     => "Clients",
                "view"      => "client/modifier",
                "active"    => "CL"
                /* ----------------------------------- */
            );
            $this->load->view("template", $data);
        }
    }

    public function supprimer()
    {
        CheckAdmin();

        $id_client = $this->input->post("id_client");
        if(!empty($id_client))
        {

            $clients_cmds = $this->db->where("id_client", $id_client)->get("client_cmd")->num_rows();
            $devis = $this->db->where("id_client", $id_client)->get("devis")->num_rows();
            $ventes = $this->db->where("id_client", $id_client)->get("vente")->num_rows();
            $avoirs = $this->db->where("id_client", $id_client)->get("avoir")->num_rows();
            $avances = $this->db->where("id_client", $id_client)->get("avance")->num_rows();
            $avances_retour = $this->db->where("id_client", $id_client)->get("avance_retour")->num_rows();

            $client = $this->db->where("id_client", $id_client)->get("client")->row();

            if( ($clients_cmds+$devis+$ventes+$avoirs+$avances+$avances_retour) > 0 )
            {
                $this->session->set_flashdata("warning", array(
                    "title" => "Alerte !",
                    "message" => "Vous ne pouvez pas supprimer ce client, Il contient des Commandes/Devis/Ventes/Bons d'Avoir/Avances."
                ));
            }
            elseif($client->display == 0)
            {
                $this->session->set_flashdata("warning", array(
                    "title" => "Alerte !",
                    "message" => "Vous ne pouvez pas supprimer un client dans l'archive."
                ));
            }
            elseif($client->id_client == 1)
            {
                $this->session->set_flashdata("warning", array(
                    "title" => "Alerte !",
                    "message" => "Vous ne pouvez pas supprimer un client de système (CLIENT COMPTOIRE)."
                ));
            }
            else
            {
                /* ---------------------- USER LOG ---------------------- */
                saveUserLog("Suppression de client ( <b>".$client->full_name."</b> )");
                /* ---------------------- -------- ---------------------- */

                $this->db->where("id_client", $id_client);
                $this->db->delete("client");

                $this->session->set_flashdata("message", array(
                    "title" => "Succès!",
                    "message" => "Client supprimé avec succès."
                ));
            }
        }

        redirect("/client", "refresh");
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
            $searchQuery = " AND ( c.code_client LIKE '%".$searchValue."%' 
                            OR c.ice LIKE '%".$searchValue."%' 
                            OR c.full_name LIKE '%".$searchValue."%' 
                            OR u.full_name LIKE '%".$searchValue."%' 
                            OR c.responsable LIKE '%".$searchValue."%' 
                            OR c.adresse LIKE '%".$searchValue."%' 
                            OR c.ville LIKE '%".$searchValue."%' 
                            OR c.pays LIKE '%".$searchValue."%' 
                            OR c.telephone LIKE '%".$searchValue."%' 
                            OR c.email LIKE '%".$searchValue."%' ) ";
        }

        // Total number of records without filtering
        $totalRecords = $this->db->query("SELECT COUNT(id_client) AS total FROM `client` WHERE display = ".$display)->row()->total;

        // Total number of record with filtering
        $totalRecordwithFilter = $this->db->query("SELECT COUNT(c.id_client) AS total FROM `client` c LEFT JOIN `user` u ON u.id_user = c.id_user WHERE c.display = " . $display . $searchQuery)->row()->total;

        // Fetch records
        $orderByColumnQuery = "";
        if(!in_array($columnName, array("utilisateur", "options"))) {
            $orderByColumnQuery = " ORDER BY c.".$columnName." ".$columnSortOrder;
        }
        elseif ($columnName == "utilisateur") {
            $orderByColumnQuery = " ORDER BY u.full_name ".$columnSortOrder;
        }
        $rowperpage = $rowperpage != -1 ? $rowperpage : $totalRecords;
        $limitQuery = " LIMIT ".$rowperpage." OFFSET ".$start;

        $records = $this->db->query("SELECT c.*, u.full_name AS utilisateur, u.role FROM `client` c LEFT JOIN `user` u ON u.id_user = c.id_user WHERE c.display = ".$display . $searchQuery . $orderByColumnQuery . $limitQuery)->result_array();
        $data = array();

        foreach($records as $record)
        {
            $options = '<a href="'.base_url().'index.php/client/details/'.$record["id_client"].'" class="btn btn-primary rounded btn-sm" data-toggle="tooltip" data-placement="top" title="Détails">
                            <i class="fa fa-list-alt" aria-hidden="true"></i>
                        </a>';

            $releve_option = '<a href="'.base_url().'index.php/client/releve/'.$record["id_client"].'" class="btn btn-info rounded btn-sm '.($record["display"] == 0 ? "hidden" : "").'" style="margin-left: 3px;" data-toggle="tooltip" data-placement="top" title="Relevé de Client">
                                  <i class="fa fa-eye" aria-hidden="true"></i>
                              </a>';

            $update_option = '<a href="'.base_url().'index.php/client/modifier/'.$record["id_client"].'" class="btn btn-success rounded btn-sm" style="margin-left: 3px;" data-toggle="tooltip" data-placement="top" title="Modifier">
                                  <i class="fa fa-wrench" aria-hidden="true"></i>
                             </a>';

            $delete_option = '<form method="post" action="'.base_url().'index.php/client/supprimer/" id="form_'.$record["id_client"].'" style="display:none;">
                                    <input type="hidden" name="id_client" value="'.$record["id_client"].'">
                              </form>
                              <a href="#" onclick="confirmDelete(\'form_'.$record["id_client"].'\')" class="btn btn-danger btn-sm rounded '.($record["display"] == 0 ? "hidden" : "").'" data-toggle="tooltip" data-placement="top" title="Supprimer">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                              </a>';

            if($record["id_client"] != 1) { // CLIENT COMPTOIRE
                $options .= $releve_option.$update_option;
                if($this->session->userdata("role_user") == 1) {
                    $options .= $delete_option;
                }
            }
            else {
                if($this->session->userdata("role_user") == 1) {
                    $options .= $update_option;
                }
            }

            array_push($data, array(
                "code_client"   => $record["code_client"],
                "utilisateur"   => _ENABLE_CLIENT_USER_ ? getUserLabel($record["role"], $record["utilisateur"]) : "",
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

    public function getDataForCite($type = null)
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
            $searchQuery = " AND ( c.code_client LIKE '%".$searchValue."%' 
                            OR c.ice LIKE '%".$searchValue."%' 
                            OR c.full_name LIKE '%".$searchValue."%' 
                            OR u.full_name LIKE '%".$searchValue."%' 
                            OR c.responsable LIKE '%".$searchValue."%' 
                            OR c.adresse LIKE '%".$searchValue."%' 
                            OR c.ville LIKE '%".$searchValue."%' 
                            OR c.pays LIKE '%".$searchValue."%' 
                            OR c.telephone LIKE '%".$searchValue."%' 
                            OR c.email LIKE '%".$searchValue."%' ) ";
        }

        // Total number of records without filtering
        $totalRecords = $this->db->query("SELECT COUNT(id_client) AS total FROM `client` WHERE role_client = 'cite' AND display = ".$display)->row()->total;

        // Total number of record with filtering
        $totalRecordwithFilter = $this->db->query("SELECT COUNT(c.id_client) AS total FROM `client` c LEFT JOIN `user` u ON u.id_user = c.id_user WHERE c.role_client = 'cite' AND  c.display = " . $display . $searchQuery)->row()->total;

        // Fetch records
        $orderByColumnQuery = "";
        if(!in_array($columnName, array("utilisateur", "options"))) {
            $orderByColumnQuery = " ORDER BY c.".$columnName." ".$columnSortOrder;
        }
        elseif ($columnName == "utilisateur") {
            $orderByColumnQuery = " ORDER BY u.full_name ".$columnSortOrder;
        }
        $rowperpage = $rowperpage != -1 ? $rowperpage : $totalRecords;
        $limitQuery = " LIMIT ".$rowperpage." OFFSET ".$start;

        $records = $this->db->query("SELECT c.*, u.full_name AS utilisateur, u.role FROM `client` c LEFT JOIN `user` u ON u.id_user = c.id_user WHERE c.role_client = 'cite' AND  c.display = ".$display . $searchQuery . $orderByColumnQuery . $limitQuery)->result_array();
        $data = array();

        foreach($records as $record)
        {
            $options = '<a href="'.base_url().'index.php/client/details/'.$record["id_client"].'" class="btn btn-primary rounded btn-sm" data-toggle="tooltip" data-placement="top" title="Détails">
                            <i class="fa fa-list-alt" aria-hidden="true"></i>
                        </a>';

            $releve_option = '<a href="'.base_url().'index.php/client/releve/'.$record["id_client"].'" class="btn btn-info rounded btn-sm '.($record["display"] == 0 ? "hidden" : "").'" style="margin-left: 3px;" data-toggle="tooltip" data-placement="top" title="Relevé de Client">
                                  <i class="fa fa-eye" aria-hidden="true"></i>
                              </a>';

            $update_option = '<a href="'.base_url().'index.php/client/modifier/'.$record["id_client"].'" class="btn btn-success rounded btn-sm" style="margin-left: 3px;" data-toggle="tooltip" data-placement="top" title="Modifier">
                                  <i class="fa fa-wrench" aria-hidden="true"></i>
                             </a>';

            $delete_option = '<form method="post" action="'.base_url().'index.php/client/supprimer/" id="form_'.$record["id_client"].'" style="display:none;">
                                    <input type="hidden" name="id_client" value="'.$record["id_client"].'">
                              </form>
                              <a href="#" onclick="confirmDelete(\'form_'.$record["id_client"].'\')" class="btn btn-danger btn-sm rounded '.($record["display"] == 0 ? "hidden" : "").'" data-toggle="tooltip" data-placement="top" title="Supprimer">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                              </a>';

            if($record["id_client"] != 1) { // CLIENT COMPTOIRE
                $options .= $releve_option.$update_option;
                if($this->session->userdata("role_user") == 1) {
                    $options .= $delete_option;
                }
            }
            else {
                if($this->session->userdata("role_user") == 1) {
                    $options .= $update_option;
                }
            }

            array_push($data, array(
                "code_client"   => $record["code_client"],
                "utilisateur"   => _ENABLE_CLIENT_USER_ ? getUserLabel($record["role"], $record["utilisateur"]) : "",
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


    public function getAvance()
    {
        echo json_encode(getAvanceTotal($this->input->post("id")));
        // echo json_encode('salam');
    }
}
