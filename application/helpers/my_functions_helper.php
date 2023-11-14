<?php

defined('BASEPATH') OR exit('No direct script access allowed');



function CheckLogin()

{

    $ci =& get_instance();



    $login = $ci->session->userdata("login");

    if(empty($login) || $login != true)

    { redirect("/user/login", "refresh"); }

    else

    {

        $user = $ci->db->where("id_user", $ci->session->userdata("id_user"))->get("user")->row();

        if(empty($user))

        {

            $ci->session->sess_destroy();

            redirect("/user/login", "refresh");

        }

    }

}



function CheckAdmin()

{

    $ci =& get_instance();



    $admin = $ci->session->userdata("role_user");

    if(empty($admin) || $admin != 1)

    { redirect("/user/block", "refresh"); }

}



function CheckCaisse()

{

    if(!_ENABLE_CAISSE_) // != true

    { redirect("/user/block", "refresh"); }

}



function CheckService()

{

    if(!_ENABLE_SERVICE_) // != true

    { redirect("/user/block", "refresh"); }

}



function CheckAvance()

{

    if(!_ENABLE_AVANCE_) // != true

    { redirect("/user/block", "refresh"); }

}



function CheckSubCategories()

{

    if(!_ENABLE_SUB_CATEGORIE_) // != true

    { redirect("/user/block", "refresh"); }

}



function CheckProduction()

{

    if(!_ENABLE_PRODUCTION_) // != true

    { redirect("/user/block", "refresh"); }

}



function CheckDemontage()

{

    CheckProduction();



    if(!_ENABLE_PRODUCTION_ || !_ENABLE_DEMONTAGE_) // != true

    { redirect("/user/block", "refresh"); }

}



function getQuantiteProduit($id_produit, $id_inventaire = null)

{

    $ci =& get_instance();



    if($id_inventaire != null) { $inventaire = $ci->db->where("id_inventaire", $id_inventaire)->where("valide", 1)->get("inventaire")->row(); }

    else { $inventaire = getLastInventaire(); }



    $inventaire_plus = 0;

    $inventaire_minus = 0;

    if(!empty($inventaire))

    {

        $all_inventaires = $ci->db->where("id_produit", $id_produit)->where("id_inventaire <=", $inventaire->id_inventaire)->get("inventaire_details")->result_array();

        foreach ($all_inventaires as $val)

        {

            $inventaire_plus += $val["type"] == 1 ? $val["quantite"] : 0;

            $inventaire_minus += $val["type"] == 2 ? $val["quantite"] : 0;

        }

    }



    if(_ENABLE_PRODUCTION_)

    {

        $nbr_production_compose = $ci->db->query("SELECT COALESCE(SUM(quantite),0) AS nbr_production_compose FROM production WHERE id_produit = ".$id_produit)->row()->nbr_production_compose; // Produit Composé (+)

        $nbr_production_details = $ci->db->query("SELECT COALESCE(SUM(quantite),0) AS nbr_production_details FROM production_details WHERE id_produit = ".$id_produit)->row()->nbr_production_details; // Production Details (-)



        if(_ENABLE_DEMONTAGE_)

        {

            $nbr_demontage_compose  = $ci->db->query("SELECT COALESCE(SUM(quantite),0) AS nbr_demontage_compose FROM demontage WHERE id_produit = ".$id_produit)->row()->nbr_demontage_compose; // Produit Composé (-)

            $nbr_demontage_details  = $ci->db->query("SELECT COALESCE(SUM(quantite),0) AS nbr_demontage_details FROM demontage_details WHERE id_produit = ".$id_produit)->row()->nbr_demontage_details; // Production Details (+)

        }

        else { $nbr_demontage_compose = $nbr_demontage_details = 0; }

    }

    else { $nbr_production_compose = $nbr_production_details = $nbr_demontage_compose = $nbr_demontage_details = 0; }



    $nbr_achat          = $ci->db->query("SELECT COALESCE(SUM(quantite),0) AS nbr_achat FROM achat_details WHERE id_produit = ".$id_produit)->row()->nbr_achat;

    $nbr_vente          = $ci->db->query("SELECT COALESCE(SUM(quantite),0) AS nbr_vente FROM vente_details WHERE id_produit = ".$id_produit)->row()->nbr_vente;

    $nbr_avoir_in_good  = $ci->db->query("SELECT COALESCE(SUM(quantite),0) AS nbr_avoir_in_good FROM avoir_details_in WHERE etat = 1 AND id_produit = ".$id_produit)->row()->nbr_avoir_in_good;

    $nbr_avoir_in_bad   = $ci->db->query("SELECT COALESCE(SUM(quantite),0) AS nbr_avoir_in_bad FROM avoir_details_in WHERE etat = 0 AND id_produit = ".$id_produit)->row()->nbr_avoir_in_bad;

    $nbr_avoir_out      = $ci->db->query("SELECT COALESCE(SUM(quantite),0) AS nbr_avoir_out FROM avoir_details_out WHERE id_produit = ".$id_produit)->row()->nbr_avoir_out;

    $nbr_end            = $ci->db->query("SELECT COALESCE(SUM(quantite),0) AS nbr_end FROM produit_end WHERE id_produit = ".$id_produit)->row()->nbr_end;



    $nbr_achat += $inventaire_plus;

    $nbr_vente += $inventaire_minus;



    return array(

        "nbr_production_compose"    => $nbr_production_compose,

        "nbr_production_details"    => $nbr_production_details,

        "nbr_demontage_compose"     => $nbr_demontage_compose,

        "nbr_demontage_details"     => $nbr_demontage_details,

        "nbr_achat"         => $nbr_achat,

        "nbr_vente"         => $nbr_vente,

        "nbr_avoir_in_good" => $nbr_avoir_in_good,

        "nbr_avoir_in_bad"  => $nbr_avoir_in_bad,

        "nbr_avoir_in"      => $nbr_avoir_in_good + $nbr_avoir_in_bad,

        "nbr_avoir_out"     => $nbr_avoir_out,

        "nbr_end"           => $nbr_end,

        /* ------------------------ */

        "stock" => ($nbr_production_compose + $nbr_demontage_details + $nbr_achat + $nbr_avoir_in_good) - ($nbr_production_details + $nbr_demontage_compose + $nbr_vente + $nbr_avoir_in_bad + $nbr_avoir_out + $nbr_end)

    );



}



function getFactureTotal($id)

{

    $ci =& get_instance();



    $sum_vente = 0;

    $sum_paiement = 0;

    $sum_achat = 0;

    $sum_tva = 0;

    $sum_exoneration = 0;

    $sum_reste = 0;

    $total_espece = 0;

    $droit_timbre = 0;



    $ventes = $ci->db->where("num_facture", $id)->get("vente")->result_array();

    foreach ($ventes as $vente){



        $all = getVenteTotal($vente['id_vente']);



        $sum_vente += $all["total_vente"];

        $sum_paiement += $all["total_paiement"];

        $sum_exoneration += $all["total_exoneration"];

        $sum_reste += $all["total_reste"];

        $sum_tva += $all["total_tva"];

        $droit_timbre += $all["droit_timbre"];



    }



    return array(

        "total_vente"       => $sum_vente,

        "total_achat"       => $sum_achat * 11/10,

        "total_paiement"    => $sum_paiement,

        "total_exoneration" => $sum_exoneration,

        "total_reste"       => $sum_reste,

        "total_tva"         => $sum_tva,

        "droit_timbre"      => ($total_espece * 0.25 / 100)

    );

}



function getLastInventaire($id_produit = null)

{

    $ci =& get_instance();



    if($id_produit != null) {

        $inventaire = $ci->db->query("SELECT * FROM inventaire WHERE valide = 1 AND id_inventaire = (SELECT MAX(i.id_inventaire) FROM inventaire i LEFT JOIN inventaire_details id ON id.id_inventaire = i.id_inventaire WHERE i.valide = 1 AND id.id_produit = ".$id_produit.")")->row();

    }

    else {

        $inventaire = $ci->db->query("SELECT * FROM inventaire WHERE valide = 1 AND id_inventaire = (SELECT MAX(id_inventaire) FROM inventaire WHERE valide = 1)")->row();

    }



    return $inventaire;

}



function getAchatTotal($id)

{

    $ci =& get_instance();



    $sum_achat = 0;

    $sum_paiement = 0;



    $achat = $ci->db->where("id_achat", $id)->get("achat")->row();

    $achat_details = $ci->db->where("id_achat", $id)->get("achat_details")->result_array();

    foreach ($achat_details as $val) {

        $sum_achat += $val["prix_achat"] * $val["quantite"];

    }

    $sum_tva = $sum_achat - ($sum_achat * 1 / (1 + ($achat->tva / 100)));

    // $sum_achat += $sum_tva;



    $sum_exoneration = $ci->db->query("SELECT COALESCE(SUM(montant),0) AS exoneration FROM exoneration_reste WHERE id_achat = ".$id)->row()->exoneration;

    $achat_paiement = $ci->db->where("id_achat", $id)->get("paiement")->result_array();

    foreach ($achat_paiement as $val) {

        $sum_paiement += $val["montant"];

    }



    return array(

        "total_achat"       => $sum_achat,

        "total_achat_ht"       => $sum_achat * 1 / (1 + ($achat->tva / 100)),

        "total_paiement"    => $sum_paiement,

        "total_exoneration" => $sum_exoneration,

        "total_reste"       => $sum_achat - $sum_paiement - $sum_exoneration,

        "total_tva"         => $sum_tva

    );

}



    function getCoutRevient($id_produit, $id_achat = null)

    {

        $ci =& get_instance();
        $cout_reveint = 0;

        $produit = $ci->db->where("id_produit", $id_produit)->get("produit")->row();

        if(!empty($produit)){

            $cout_reveint = $produit->prix_achat;



        // if param empty

        if($id_achat == null) {

            $achat = $ci->db->query("SELECT MAX(id_achat) AS max_id FROM achat")->row();

            $id_achat = !empty($achat->max_id) ? $achat->max_id : null;

        }

        // if db not empty

        if($id_achat != null) {

            $achat = $ci->db->where("id_achat", $id_achat)->get("achat")->row();

            $achat_details = $ci->db->where("id_achat", $id_achat)->get("achat_details")->result_array();

            $achat_quantite = $ci->db->query("SELECT COALESCE(SUM(quantite),0) AS sum_quantite FROM achat_details WHERE id_achat = ".$id_achat)->row()->sum_quantite;



            foreach ($achat_details as $val) {

                if($id_produit == $val["id_produit"]) {

                    $prix_achat = $val["prix_achat"];

                    $cout_reveint = $prix_achat + ($achat->frais/$achat_quantite);

                    break;

                }

            }

        }

        // if type = 1 (Composé)

        if($produit->type == 1) {

            $last_production = $ci->db->query("SELECT MAX(id_production) AS max_id FROM production WHERE id_produit = ".$id_produit)->row();

            $last_demontage = $ci->db->query("SELECT MAX(id_demontage) AS max_id FROM demontage WHERE id_produit = ".$id_produit)->row();

            $produit_details = $ci->db->where("id_produit_compose", $id_produit)->get("produit_details")->result_array();

            $cout_reveint = 0;



            foreach ($produit_details as $val) {

                $cout_reveint += (!empty($val["id_produit"]) ? getCoutRevient($val["id_produit"]) : 0) * $val["quantite"];

            }



            if(!empty($last_production->max_id)) {

                $cout_reveint += $ci->db->query("SELECT COALESCE(frais/quantite,0) AS cost FROM production WHERE id_production = ".$last_production->max_id)->row()->cost;

            }

            if(!empty($last_demontage->max_id)) {

                $cout_reveint += $ci->db->query("SELECT COALESCE(frais/quantite,0) AS cost FROM demontage WHERE id_demontage = ".$last_demontage->max_id)->row()->cost;

            }

        }

    }



    return $cout_reveint;

}



function getDevisTotal($id)

{

    $ci =& get_instance();



    $sum_devis = 0;

    $devis = $ci->db->where("id_devis", $id)->get("devis")->row();

    $devis_details = $ci->db->where("id_devis", $id)->get("devis_details")->result_array();

    foreach ($devis_details as $val) {

        $sum_devis += (float)getRowDetailsTotal($val)["total"];

    }

    $sum_tva = $sum_devis * $devis->tva / 100;

    $sum_devis += $sum_tva;



    return array(

        "total_devis"       => $sum_devis,

        "total_tva"         => $sum_tva

    );

}



function getVenteTotal($id)

{

    $ci =& get_instance();



    $sum_vente = 0;

    $sum_paiement = 0;



    $vente = $ci->db->where("id_vente", $id)->get("vente")->row();

    $vente_details = $ci->db->where("id_vente", $id)->get("vente_details")->result_array();

    foreach ($vente_details as $val) {

        $sum_vente += (float)getRowDetailsTotal($val)['total'];

    }

    $sum_tva = $sum_vente * $vente->tva / 100;

    $sum_vente += $sum_tva;



    $sum_exoneration = $ci->db->query("SELECT COALESCE(SUM(montant),0) AS exoneration FROM exoneration_reste WHERE id_vente = ".$id)->row()->exoneration;

    $vente_paiement = $ci->db->query("SELECT p.*, c.paid FROM paiement p LEFT JOIN cheque c ON c.id_paiement = p.id_paiement WHERE p.id_vente = ".$id)->result_array();

    $total_espece = 0;

    foreach ($vente_paiement as $val) {

        if($val["paid"] != 2) {

            $sum_paiement += $val["montant"];

        }

        if($val["methode"] == 1 || ($val["methode"] == 5 && $val["type_avance"] == 1)) {

            $total_espece += $val["montant"];

        }

    }



    return array(

        "total_vente"       => $sum_vente,

        "total_paiement"    => $sum_paiement,

        "total_exoneration" => $sum_exoneration,

        "total_reste"       => $sum_vente - $sum_paiement - $sum_exoneration,

        "total_tva"         => $sum_tva,

        "droit_timbre"      => ($total_espece * 0.25 / 100)

    );

}



function getAvoirTotal($id)

{

    $ci =& get_instance();



    $sum_avoir_in = 0;

    $sum_avoir_out = 0;

    $sum_paiement = 0;



    $avoir = $ci->db->where("id_avoir", $id)->get("avoir")->row();

    $avoir_details_in = $ci->db->where("id_avoir", $id)->get("avoir_details_in")->result_array();

    foreach ($avoir_details_in as $val) {

        $sum_avoir_in += (float)getRowDetailsTotal($val)['total'];

    }

    $sum_tva_in = $sum_avoir_in * $avoir->tva / 100;

    $sum_avoir_in += $sum_tva_in;



    $avoir_details_out = $ci->db->where("id_avoir", $id)->get("avoir_details_out")->result_array();

    foreach ($avoir_details_out as $val) {

        $sum_avoir_out += (float)getRowDetailsTotal($val)['total'];

    }

    $sum_tva_out = $sum_avoir_out * $avoir->tva / 100;

    $sum_avoir_out += $sum_tva_out;



    $avoir_paiement = $ci->db->query("SELECT p.*, c.paid FROM paiement p LEFT JOIN cheque c ON c.id_paiement = p.id_paiement WHERE p.id_avoir = ".$id)->result_array();

    $total_espece = 0;

    foreach ($avoir_paiement as $val) {

        if($val["paid"] != 2) {

            $sum_paiement += $val["montant"];

        }

        if($val["methode"] == 1 || ($val["methode"] == 5 && $val["type_avance"] == 1)) {

            $total_espece += $val["montant"];

        }

    }



    return array(

        "total_avoir_in"    => $sum_avoir_in,

        "total_avoir_out"   => $sum_avoir_out,

        "total_avoir"       => $sum_avoir_out - $sum_avoir_in,

        "total_paiement"    => $sum_paiement,

        "total_reste"       => abs($sum_avoir_out - $sum_avoir_in) - $sum_paiement,

        "total_tva"         => $sum_tva_out-$sum_tva_in,

        // Shows only if (total_avoir > 0)

        "droit_timbre"      => ($sum_avoir_out - $sum_avoir_in) > 0 ? $total_espece * 0.25 / 100 : 0

    );

}



function getCaisseTotal()

{

    $ci =& get_instance();



    $sum_espece_entree          = $ci->db->query("SELECT COALESCE(SUM(montant),0) AS total FROM caisse_entree")->row()->total;

    $sum_espece_vente           = $ci->db->query("SELECT COALESCE(SUM(p.montant),0) AS total FROM paiement p LEFT JOIN cheque c ON p.id_paiement = c.id_paiement WHERE (p.methode IN (1, 2, 3) OR (p.methode = 5 AND p.type_avance = 1)) AND (p.type = 1 OR c.type = 1) AND (c.paid IS NULL OR (c.paid = 1 AND c.caisse = 1))")->row()->total;

    $sum_cheque_sortir           = $ci->db->query("SELECT COALESCE(SUM(p.montant),0) AS total FROM paiement p LEFT JOIN cheque c ON p.id_paiement = c.id_paiement WHERE p.methode IN (1, 2, 3) AND (p.type = 2 OR c.type = 2 OR c.type = 3 OR c.type = 4 OR c.type = 6) AND (c.paid IS NULL OR (c.paid = 1 AND c.caisse = 1))")->row()->total;



    $sum_espece_sortie          = $ci->db->query("SELECT COALESCE(SUM(montant),0) AS total FROM caisse_sortie")->row()->total;

    $sum_espece_achat_reglement = $ci->db->query("SELECT COALESCE(SUM(montant),0) AS total FROM paiement WHERE methode = 1 AND (`type` = 2 OR `type` = 3)")->row()->total;

    $sum_espece_charge          = $ci->db->query("SELECT COALESCE(SUM(montant),0) AS total FROM charge WHERE methode = 1")->row()->total;

    $sum_avance_retour_espece   = $ci->db->query("SELECT COALESCE(SUM(montant),0) AS total FROM avance_retour WHERE methode = 1")->row()->total;



    return ($sum_espece_entree + $sum_espece_vente) - ($sum_espece_sortie + $sum_espece_achat_reglement + $sum_espece_charge + $sum_avance_retour_espece + $sum_cheque_sortir);

}



function getAvanceTotal($id_client = null)

{

    $ci =& get_instance();



    if(!empty($id_client))

    {

        $sum_avance_espece   = $ci->db->query("SELECT COALESCE(SUM(av.montant),0) AS total FROM avance av LEFT JOIN cheque c ON av.id_avance = c.id_avance WHERE av.methode IN (1, 2, 3) AND (c.paid IS NULL OR (c.paid = 1 AND c.caisse = 1)) AND av.id_client = ".$id_client)->row()->total;

        $sum_avance_cheque   = $ci->db->query("SELECT COALESCE(SUM(av.montant),0) AS total FROM avance av LEFT JOIN cheque c ON av.id_avance = c.id_avance WHERE av.methode IN (2, 3) AND av.id_client = ".$id_client)->row()->total;

        $sum_avance_virement = $ci->db->query("SELECT COALESCE(SUM(av.montant),0) AS total FROM avance av WHERE av.methode = 4 AND av.id_client = ".$id_client)->row()->total;

        $sum_avance_cheque_paid = $ci->db->query("SELECT COALESCE(SUM(av.montant),0) AS total FROM avance av LEFT JOIN cheque c ON av.id_avance = c.id_avance WHERE av.methode IN (2, 3) AND c.paid = 1 AND c.caisse = 0 AND av.id_client = ".$id_client)->row()->total;



        $sum_avance_retour_espece   = $ci->db->query("SELECT COALESCE(SUM(av.montant),0) AS total FROM avance_retour av WHERE av.methode = 1 AND av.id_client = ".$id_client)->row()->total;

        $sum_avance_retour_cheque   = $ci->db->query("SELECT COALESCE(SUM(av.montant),0) AS total FROM avance_retour av WHERE av.methode IN (2, 3) AND av.id_client = ".$id_client)->row()->total;

        $sum_avance_retour_virement = $ci->db->query("SELECT COALESCE(SUM(av.montant),0) AS total FROM avance_retour av WHERE av.methode = 4 AND av.id_client = ".$id_client)->row()->total;



        $sum_avance_r_5_espece   = $ci->db->query("SELECT COALESCE(SUM(av.montant),0) AS total FROM avance_retour av WHERE av.methode = 5 AND av.type_avance = 1 AND av.id_client = ".$id_client)->row()->total;

        $sum_avance_r_5_cheque   = $ci->db->query("SELECT COALESCE(SUM(av.montant),0) AS total FROM avance_retour av WHERE av.methode = 5 AND av.type_avance = 2 AND av.id_client = ".$id_client)->row()->total;

        $sum_avance_r_5_virement = $ci->db->query("SELECT COALESCE(SUM(av.montant),0) AS total FROM avance_retour av WHERE av.methode = 5 AND av.type_avance = 3 AND av.id_client = ".$id_client)->row()->total;



        $sum_paiement_avance_espece    = $ci->db->query("SELECT COALESCE(SUM(p.montant),0) AS total FROM paiement p LEFT JOIN vente v ON v.id_vente = p.id_vente LEFT JOIN avoir a ON a.id_avoir = p.id_avoir WHERE p.methode = 5 AND p.type = 1 AND p.type_avance = 1 AND (v.id_client = ".$id_client." OR a.id_client = ".$id_client.")")->row()->total;

        $sum_paiement_avance_cheque    = $ci->db->query("SELECT COALESCE(SUM(p.montant),0) AS total FROM paiement p LEFT JOIN vente v ON v.id_vente = p.id_vente LEFT JOIN avoir a ON a.id_avoir = p.id_avoir WHERE p.methode = 5 AND p.type = 1 AND p.type_avance = 2 AND (v.id_client = ".$id_client." OR a.id_client = ".$id_client.")")->row()->total;

        $sum_paiement_avance_virement  = $ci->db->query("SELECT COALESCE(SUM(p.montant),0) AS total FROM paiement p LEFT JOIN vente v ON v.id_vente = p.id_vente LEFT JOIN avoir a ON a.id_avoir = p.id_avoir WHERE p.methode = 5 AND p.type = 1 AND p.type_avance = 3 AND (v.id_client = ".$id_client." OR a.id_client = ".$id_client.")")->row()->total;

    }

    else

    {

        $sum_avance_espece   = $ci->db->query("SELECT COALESCE(SUM(av.montant),0) AS total FROM avance av LEFT JOIN cheque c ON av.id_avance = c.id_avance WHERE av.methode IN (1, 2, 3) AND (c.paid IS NULL OR (c.paid = 1 AND c.caisse = 1))")->row()->total;

        $sum_avance_cheque   = $ci->db->query("SELECT COALESCE(SUM(av.montant),0) AS total FROM avance av LEFT JOIN cheque c ON av.id_avance = c.id_avance WHERE av.methode IN (2, 3)")->row()->total;

        $sum_avance_virement = $ci->db->query("SELECT COALESCE(SUM(av.montant),0) AS total FROM avance av WHERE av.methode = 4")->row()->total;

        $sum_avance_cheque_paid = $ci->db->query("SELECT COALESCE(SUM(av.montant),0) AS total FROM avance av LEFT JOIN cheque c ON av.id_avance = c.id_avance WHERE av.methode IN (2, 3) AND c.paid = 1")->row()->total;



        $sum_avance_retour_espece   = $ci->db->query("SELECT COALESCE(SUM(av.montant),0) AS total FROM avance_retour av WHERE av.methode = 1")->row()->total;

        $sum_avance_retour_cheque   = $ci->db->query("SELECT COALESCE(SUM(av.montant),0) AS total FROM avance_retour av WHERE av.methode IN (2, 3)")->row()->total;

        $sum_avance_retour_virement = $ci->db->query("SELECT COALESCE(SUM(av.montant),0) AS total FROM avance_retour av WHERE av.methode = 4")->row()->total;



        $sum_avance_r_5_espece   = $ci->db->query("SELECT COALESCE(SUM(av.montant),0) AS total FROM avance_retour av WHERE av.methode = 5 AND av.type_avance = 1")->row()->total;

        $sum_avance_r_5_cheque   = $ci->db->query("SELECT COALESCE(SUM(av.montant),0) AS total FROM avance_retour av WHERE av.methode = 5 AND av.type_avance = 2")->row()->total;

        $sum_avance_r_5_virement = $ci->db->query("SELECT COALESCE(SUM(av.montant),0) AS total FROM avance_retour av WHERE av.methode = 5 AND av.type_avance = 3")->row()->total;



        $sum_paiement_avance_espece    = $ci->db->query("SELECT COALESCE(SUM(p.montant),0) AS total FROM paiement p LEFT JOIN vente v ON v.id_vente = p.id_vente LEFT JOIN avoir a ON a.id_avoir = p.id_avoir WHERE p.methode = 5 AND p.type = 1 AND p.type_avance = 1")->row()->total;

        $sum_paiement_avance_cheque    = $ci->db->query("SELECT COALESCE(SUM(p.montant),0) AS total FROM paiement p LEFT JOIN vente v ON v.id_vente = p.id_vente LEFT JOIN avoir a ON a.id_avoir = p.id_avoir WHERE p.methode = 5 AND p.type = 1 AND p.type_avance = 2")->row()->total;

        $sum_paiement_avance_virement  = $ci->db->query("SELECT COALESCE(SUM(p.montant),0) AS total FROM paiement p LEFT JOIN vente v ON v.id_vente = p.id_vente LEFT JOIN avoir a ON a.id_avoir = p.id_avoir WHERE p.methode = 5 AND p.type = 1 AND p.type_avance = 3")->row()->total;

    }



    $total_espece   = $sum_avance_espece - $sum_avance_retour_espece - $sum_avance_r_5_espece - $sum_paiement_avance_espece;

    $total_cheque   = $sum_avance_cheque - $sum_avance_cheque_paid - $sum_avance_retour_cheque - $sum_avance_r_5_cheque - $sum_paiement_avance_cheque;

    $total_virement = $sum_avance_virement - $sum_avance_retour_virement - $sum_avance_r_5_virement - $sum_paiement_avance_virement;



    return array(

        "total_espece"   => $total_espece,

        "total_cheque"   => $total_cheque,

        "total_virement" => $total_virement,

        "total_avance"   => $total_espece + $total_cheque + $total_virement

    );

}



function getRowDetailsTotal($val, $tva = 0)

{



    $quantite = $val["quantite"];

    $prix = $val["prix_vente"] * $quantite;

    $remise = (($val["remise"] * $val["prix_vente"] / 100) + $val["remise_dh"]) * $quantite;

    $nouveau_prix = $prix - $remise;

    $Total_tva = ($nouveau_prix * $tva / 100);

    $total = $nouveau_prix + $Total_tva;



    return array(

        "total" => $total,

        "remise" => $remise,

        "prix"  => $prix,

        "tva"   => $Total_tva

    );

}



function getMethodePaiement($num, $type = null)

{

    $type_avance = "";

    if($num == 5 && !empty($type))

    {

        switch ($type) {

            case 1 : $type_avance = "<br>[ Espèce ]"; break;

            case 2 : $type_avance = "<br>[ Chèque/Effet ]"; break;

            case 3 : $type_avance = "<br>[ Virement bancaire ]"; break;

        }

    }



    switch ($num) {

        case 1  : return "Espèce";

        case 2  : return "Chèque";

        case 3  : return "Effet";

        case 4  : return "Virement bancaire";

        case 5  : return "À partir d'avance".$type_avance;

        default : return "?";

    }

}



function getChequeStatus($status, $caisse = null, $text = false)

{

    if(!$text)

    {

        $not_yet_icon   = ' &nbsp; <i class="fa fa-clock-o text-warning" aria-hidden="true" data-toggle="tooltip" data-placement="top" data-original-title="Pas encore payé"></i>';

        $paid_icon      = ' &nbsp; <i class="fa fa-check-circle text-success" aria-hidden="true" data-toggle="tooltip" data-placement="top" data-original-title="Payé"></i>';

        $unpaid_icon    = ' &nbsp; <i class="fa fa-times-circle text-danger" aria-hidden="true" data-toggle="tooltip" data-placement="top" data-original-title="Non payé"></i>';

    }

    else

    {

        $not_yet_icon   = '<strong class="text-warning">Pas encore payé</strong>';

        $paid_icon      = '<strong class="text-success">Payé</strong><br>[ '.($caisse!=null?($caisse==1?"Caisse":"Banque"):"?").' ]';

        $unpaid_icon    = '<strong class="text-danger">Non payé</strong>';

    }

    

    switch ($status) {

        case 0  : return $not_yet_icon;

        case 1  : return $paid_icon;

        case 2  : return $unpaid_icon;

        default : return $not_yet_icon;

    }

}



function getMonthsFR()

{

    return array("Jan", "Fév", "Mar", "Avr", "Mai", "Jui", "Jul", "Aou", "Sep", "Oct", "Nov", "Déc");

}



function getUserLabel($role, $name, $systeme = null)

{

    if($systeme != null && $systeme == 1) {

        return '<span class="label label-success" data-toggle="tooltip" data-placement="top" title="Système">Système</span>';

    }

    elseif($role == 0) {

        return '<span class="label label-warning" data-toggle="tooltip" data-placement="top" title="Géstionnaire">'.$name.'</span>';

    }

    elseif($role == 1) {

        return '<span class="label label-info" data-toggle="tooltip" data-placement="top" title="Administrateur">'.$name.'</span>';

    }

    else {

        return '<span class="label label-danger" data-toggle="tooltip" data-placement="top" title="Unknown">Unknown</span>';

    }

}



function getPaiementDetails($id, $type = "paiement")

{

    $ci =& get_instance();



    $details = $ci->db->where("id_".$type, $id)->get("cheque")->row();

    return $details;

}



function checkCodeExists($str, $table, $ignore = null)

{

    $ci =& get_instance();



    $ignore_sql = $ignore != null ? " AND id_".$table." != ".$ignore : "";

    $code = $ci->db->query("SELECT id_".$table." FROM ".$table." WHERE code_".$table." = '".$str."' ".$ignore_sql)->row();

    return !empty($code);

}



function getNewProductCode($compose = false)

{

    $ci =& get_instance();



    $code = ($compose ? "PRC" : "PR").rand(1000,9999).substr(date("M"),0,1).substr(date("D"),0,1).rand(1000,9999);

    $temp = $ci->db->where("code_produit", $code)->get("produit")->row();



    if(!empty($temp)) {

        return getNewProductCode($compose);

    }

    else {

        return $code;

    }

}



function getNewCode($str, $table, $update = false, $step = 0, $inventaire = null)
{
    $ci =& get_instance();

    $auto_code = $ci->db->where("reference", $str)->get("auto_code")->row();

    // Check if $auto_code is a valid object before accessing its properties
    if (!$auto_code) {
        // If no auto_code record is found, create a default object
        $auto_code = (object) array('year' => date("Y"), 'next_value' => 1);
    }

    if ($auto_code->year != date("Y")) {
        $ci->db->where("reference", $str);
        $ci->db->update("auto_code", array(
            "year"       => date("Y"),
            "next_value" => 1
        ));
        $auto_code = $ci->db->where("reference", $str)->get("auto_code")->row();
    }

    $next_value = $auto_code->next_value + $step;
    $current_code = $str."/".date("y")."/".sprintf("%04d", $next_value);

    if (checkCodeExists($current_code, $table, $inventaire)) {
        return getNewCode($str, $table, $update, $step + 1);
    } else {
        if ($update) {
            $ci->db->where("reference", $str);
            $ci->db->update("auto_code", array(
                "year"       => date("Y"),
                "next_value" => $auto_code->year == date("Y") ? $next_value + 1 : 1
            ));
        }
        return $current_code;
    }
}




function getNewNumFacture($step = 0)

{

    $ci =& get_instance();



    $auto_code = $ci->db->where("reference", "INVOICE")->get("auto_code")->row();



    if($auto_code->year != date("Y"))

    {

        $ci->db->where("reference", "INVOICE");

        $ci->db->update("auto_code", array(

            "year"       => date("Y"),

            "next_value" => 1

        ));

        $auto_code = $ci->db->where("reference", "INVOICE")->get("auto_code")->row();

    }



    $next_value = $auto_code->next_value + $step;

    $current_code = date("Y").sprintf("%04d", $next_value);



    $exists = $ci->db->query("SELECT id_facture FROM facture WHERE num_facture = ".$current_code)->row();



    if(!empty($exists))

    {

        return getNewNumFacture($step+1);

    }

    else

    {

        $ci->db->where("reference", "INVOICE");

        $ci->db->update("auto_code", array(

            "year"       => date("Y"),

            "next_value" => $auto_code->year == date("Y") ? $next_value + 1 : 1

        ));

        return $current_code;

    }

}



function multi_array_search($array, $search)

{



    // Create the result array

    $result = array();



    // Iterate over each array element

    foreach ($array as $key => $value)

    {



        // Iterate over each search condition

        foreach ($search as $k => $v)

        {



            // If the array element does not meet the search condition then continue to the next element

            if (!isset($value[$k]) || $value[$k] != $v)

            {

                continue 2;

            }



        }



        // Add the array element's key to the result array

        $result[] = $key;



    }



    // Return the result array

    return $result;



}



function createDescriptionPopover($description)

{

    if(!empty($description))

    {

        return '<a href="javascript:;" class="produitPopup" rel="popover" data-description="'.$description.'">

                    <i class="fa fa-info-circle"></i>

                </a>';

    }

    else { return ''; }

}



function getUserIP()

{

    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {

        $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];

        $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];

    }

    $client  = @$_SERVER['HTTP_CLIENT_IP'];

    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];

    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))

    { $ip = $client; }

    else if(filter_var($forward, FILTER_VALIDATE_IP))

    { $ip = $forward; }

    else

    { $ip = $remote; }

    if($ip == "::1")

    { $ip = getHostByName(getHostName()); }

    return $ip;

}



function saveUserLog($logText, $is_systeme = false)

{

    $ci =& get_instance();



    $current_user = $ci->session->userdata("id_user");



    $id_user = !empty($current_user) ? $current_user : null;

    $id_user = !$is_systeme ? $id_user : null;



    $ci->db->insert("user_log", array(

        "id_user"   => $id_user,

        "systeme"   => $is_systeme,

        "ip_address" => getUserIP(),

        "date_log"  => date("Y-m-d H:i:s"),

        "text"      => $logText

    ));

}



function getCountries()

{

    $data = file_get_contents(_BASE_PATH_."assets/countries.json");

    return json_decode($data);

}



function generateBackup($download = false)

{

    $ci =& get_instance();



    cleanUploads();



    $ci->load->dbutil();

    $information = $ci->db->where("id_information", 1)->get("information")->row();



    $prefs = array(

        'format'      => 'zip',

        'filename'    => 'database.sql'

    );



    $backup = $ci->dbutil->backup($prefs);



    $db_name = 'backup-'. date("Y-m-d-H-i-s") .'.zip';

    $db_file = _BACKUP_PATH_.$db_name;



    $ci->load->helper('file');

    write_file($db_file, $backup);



    if(!empty(_EMAIL_BACKUP_))

    {



        $subject = $information->full_name." - DATABASE BACKUP - ".date("d/m/Y H:i:s");

        sendEmail(

            _EMAIL_BACKUP_,

            $subject,

            "<strong>".$subject." (SQL File) :</strong>",

            $db_file

        );

    }



    if($download)

    {

        $ci->load->helper('download');

        force_download($db_name, $backup);

        redirect('/accueil', 'refresh');

    }

}



function sendEmail($email, $subject, $content, $file = null)

{

    $ci =& get_instance();



    $ci->load->library('phpmailer_lib');

    $mail = $ci->phpmailer_lib->load();



    $mail->IsSMTP();

    $mail->Mailer = "smtp";

    $mail->SMTPOptions = array(

        'ssl' => array(

            'verify_peer' => FALSE,

            'verify_peer_name' => FALSE,

            'allow_self_signed' => TRUE

        )

    );

    $mail->SMTPAuth   = TRUE;

    $mail->SMTPSecure = "tls";

    $mail->IsHTML(TRUE);



    $mail->Port       = _EMAIL_PORT_;

    $mail->Host       = _EMAIL_HOST_;

    $mail->Username   = _EMAIL_USERNAME_;

    $mail->Password   = _EMAIL_PASSWORD_;



    $mail->SetFrom("App@Fms.works", "ATLAS GESTION APP.");

    $mail->AddAddress("atlashost@gmail.com");



    $mail->Subject = $subject;

    $mail->MsgHTML($content);



    if(!empty($file)) {

        $mail->AddAttachment($file);

    }



    $mail->Send();

}



function cleanUploads()

{

    $ci =& get_instance();



    $images_db = $ci->db->query("SELECT image FROM produit WHERE image IS NOT NULL AND image != ''")->result_array();

    $images = array_map(function($val) { return $val['image']; } , $images_db);



    foreach ($images_db as $val) {

        if(!file_exists(_UPLOADS_PATH_.$val["image"])) {

            $ci->db->where("image", $val["image"]);

            $ci->db->update("produit", array(

                "image" => null

            ));

        }

    }



    if ($handle = opendir(_BASE_PATH_."app-config/uploads")) {

        while (false !== ($entry = readdir($handle))) {

            if ($entry != "." && $entry != ".." && $entry != "index.html") {

                if($entry !== 'barcodes' && !in_array($entry, $images)) {

                    unlink(_UPLOADS_PATH_.$entry);

                }

            }

        }

        closedir($handle);

    }

}

