<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comptavle extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        CheckLogin();
    }

	public function index()
	{
        $data = array(
            "total_commandes"   => $this->db->query("SELECT COUNT(id_commande) AS total FROM commande ")->row()->total,
            "total_clients_cmds"=> $this->db->query("SELECT COUNT(id_client_cmd) AS total FROM client_cmd ")->row()->total,
            "total_ventes"      => $this->db->query("SELECT COUNT(id_vente) AS total FROM vente ")->row()->total,
            "total_avoires"     => $this->db->query("SELECT COUNT(id_avoir) AS total FROM avoir ")->row()->total,
            "nbr_cheques"       => $this->db->query("SELECT COALESCE(COUNT(id_cheque),0) AS nbr FROM cheque WHERE `type` IN (1,5) AND paid = 0 AND methode = 2 AND date_cheque <= '".date("Y-m-d")."'")->row()->nbr,
            "nbr_effets"        => $this->db->query("SELECT COALESCE(COUNT(id_cheque),0) AS nbr FROM cheque WHERE `type` IN (1,5) AND paid = 0 AND methode = 3 AND date_cheque <= '".date("Y-m-d")."'")->row()->nbr,
            /* ----------------------------------- */
            "title"     => "Accueil",
            "view"      => "accueil",
            "active"    => "ACC"
            /* ----------------------------------- */
        );

        $this->load->view("template1", $data);
	}

}
