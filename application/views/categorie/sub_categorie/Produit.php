<?php
// Set error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
defined('BASEPATH') or exit('No direct script access allowed');

class Produit extends CI_Controller
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
            "title" => "Produits",
            "view" => "produit/liste",
            "active" => "PR"
            /* ----------------------------------- */
        );
        $this->load->view("template", $data);
    }

    public function checkCodeExists($ignore = null)
    {
        $code = $this->input->post("code_produit");
        if (!empty($code)) {
            echo json_encode(checkCodeExists($code, "produit", $ignore) ? "EXISTS" : "NOT");
        } else {
            echo json_encode("NOT");
        }
    }

    public function details($id)
    {
        $data = array(
            "produit" => $this->db->query("SELECT p.*, c.full_name AS categorie, sc.full_name AS sub_categorie FROM produit p LEFT JOIN categorie c ON c.id_categorie = p.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie WHERE p.id_produit = " . $id)->row(),
            "produit_details" => _ENABLE_PRODUCTION_ ? $this->db->query("SELECT pd.*, p.full_name AS produit, c.full_name AS categorie, sc.full_name AS sub_categorie FROM produit_details pd JOIN produit p ON p.id_produit = pd.id_produit LEFT JOIN categorie c ON c.id_categorie = p.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie WHERE pd.id_produit_compose = " . $id)->result_array() : array(),
            "qantite" => getQuantiteProduit($id),

            "productions" => $this->db->query("SELECT * FROM production WHERE id_produit = " . $id)->result_array(),
            "demontages" => $this->db->query("SELECT * FROM demontage WHERE id_produit = " . $id)->result_array(),

            "production_details" => $this->db->query("SELECT pd.code_production, pd.date_production, pdd.* FROM production_details pdd JOIN production pd ON pd.id_production = pdd.id_production WHERE pdd.id_produit = " . $id)->result_array(),
            "demontage_details" => $this->db->query("SELECT dm.code_demontage, dm.date_demontage, dmd.* FROM demontage_details dmd JOIN demontage dm ON dm.id_demontage = dmd.id_demontage WHERE dmd.id_produit = " . $id)->result_array(),

            "achats" => $this->db->query("SELECT ad.*, a.code_achat, a.date_achat, a.id_fournisseur, f.full_name AS fournisseur FROM achat_details ad LEFT JOIN achat a ON a.id_achat = ad.id_achat LEFT JOIN fournisseur f ON f.id_fournisseur = a.id_fournisseur WHERE ad.id_produit = " . $id)->result_array(),
            "ventes" => $this->db->query("SELECT vd.*, v.code_vente, v.num_facture, v.date_vente, v.id_client, cl.full_name AS client FROM vente_details vd LEFT JOIN vente v ON v.id_vente = vd.id_vente LEFT JOIN `client` cl ON cl.id_client = v.id_client WHERE vd.id_produit = " . $id)->result_array(),
            "avoirs_in" => $this->db->query("SELECT ad.*, a.code_avoir, a.date_avoir, a.id_client, c.full_name AS client FROM avoir_details_in ad LEFT JOIN avoir a ON a.id_avoir = ad.id_avoir LEFT JOIN `client` c ON c.id_client = a.id_client WHERE ad.id_produit = " . $id)->result_array(),
            "avoirs_out" => $this->db->query("SELECT ad.*, a.code_avoir, a.date_avoir, a.id_client, c.full_name AS client FROM avoir_details_out ad LEFT JOIN avoir a ON a.id_avoir = ad.id_avoir LEFT JOIN `client` c ON c.id_client = a.id_client WHERE ad.id_produit = " . $id)->result_array(),
            "produits_end" => $this->db->query("SELECT * FROM produit_end WHERE id_produit = " . $id)->result_array(),
            "inventaire" => getLastInventaire($id),
            /* ----------------------------------- */
            "title" => "Produits",
            "view" => "produit/details",
            "active" => "PR"
            /* ----------------------------------- */
        );
        $this->load->view("template", $data);
    }

    public function ajouter()
    {
        CheckAdmin();

        $code_produit = $this->input->post("code_produit");
        $form_data = array();
        if (!empty($code_produit)) {
            $form_data = array(
                "id_categorie" => $this->input->post("id_categorie"),
                "id_sub_categorie" => _ENABLE_SUB_CATEGORIE_ ? $this->input->post("id_sub_categorie") : null,
                "code_produit" => $code_produit,
                "full_name" => ucfirst($this->input->post("full_name")),
                "prix_achat" => $this->input->post("prix_achat"),
                "prix_vente" => $this->input->post("prix_vente"),
                "alert" => $this->input->post("alert"),
                "description" => $this->input->post("description")
            );

            $temp = $this->db->where("code_produit", $code_produit)->get("produit")->row();
            if (empty($temp)) {
                $image = null;
                $more_log = "";
                if (file_exists($_FILES['image']['tmp_name'])) {
                    $info = getimagesize($_FILES['image']['tmp_name']);
                    if ($info) {
                        if ($info[2] === IMAGETYPE_GIF || $info[2] === IMAGETYPE_JPEG || $info[2] === IMAGETYPE_PNG || $info[2] === IMAGETYPE_BMP) {
                            $image = $code_produit . '.' . pathinfo(basename($_FILES['image']['name']), PATHINFO_EXTENSION);
                            move_uploaded_file($_FILES['image']['tmp_name'], _UPLOADS_PATH_ . $image);
                            $more_log = " avec image";
                        }
                    }
                }

                $form_data["image"] = $image;
                $this->db->insert("produit", $form_data);
                $id_produit = $this->db->insert_id();

                $this->session->set_flashdata("message", array(
                    "title" => "Succès!",
                    "message" => "Produit enregistré avec succès."
                )
                );

                /* ---------------------- USER LOG ---------------------- */
                saveUserLog("Enregistrement de produit ( <b>" . ucfirst($this->input->post("full_name")) . "</b> )" . $more_log);
                /* ---------------------- -------- ---------------------- */

                redirect("/produit/details/" . $id_produit, "refresh");
            } else {
                $this->session->set_flashdata("warning", array(
                    "title" => "Attention !",
                    "message" => "Code Produit <b>'" . $code_produit . "'</b> existe déja."
                )
                );

                $this->session->set_flashdata("form_data", $form_data);

                redirect("/produit/ajouter", "refresh");
            }
        } else {
            $this->session->set_flashdata("form_data", $form_data);

            $data = array(
                "categories" => $this->db->where("display", 1)->get("categorie")->result_array(),
                "sub_categories" => $this->db->where("display", 1)->get("sub_categorie")->result_array(),
                "code_produit" => getNewProductCode(),
                /* ----------------------------------- */
                "title" => "Produits",
                "view" => "produit/ajouter",
                "active" => "PR-ADD"
                /* ----------------------------------- */
            );
            $this->load->view("template", $data);
        }
    }

    public function modifier($id = null)
    {
        CheckAdmin();

        $code_produit = $this->input->post("code_produit");
        $form_data = array();
        if (!empty($code_produit)) {
            $id_produit = $this->input->post("id_produit");
            $display = $this->input->post("display");
            $display_hide_updated = $this->input->post("display_hide_updated");

            $form_data = array(
                "id_categorie" => $this->input->post("id_categorie"),
                "id_sub_categorie" => _ENABLE_SUB_CATEGORIE_ ? $this->input->post("id_sub_categorie") : null,
                "code_produit" => $code_produit,
                "full_name" => ucfirst($this->input->post("full_name")),
                "prix_achat" => $this->input->post("prix_achat"),
                "prix_vente" => $this->input->post("prix_vente"),
                "alert" => $this->input->post("alert"),
                "description" => $this->input->post("description"),
                "display" => !empty($display) && $display == "false" ? 0 : 1
            );

            $temp = $this->db->where("code_produit", $code_produit)->where("id_produit !=", $id_produit)->get("produit")->row();
            if (empty($temp)) {
                $more_log = "";
                if (file_exists($_FILES['image']['tmp_name'])) {
                    $image = $this->db->query("SELECT image FROM produit WHERE id_produit = " . $id_produit)->row()->image;
                    $file = _UPLOADS_PATH_ . $image;
                    if (!empty($image) && file_exists($file)) {
                        unlink($file);
                    }

                    $info = getimagesize($_FILES['image']['tmp_name']);
                    if ($info) {
                        if ($info[2] === IMAGETYPE_GIF || $info[2] === IMAGETYPE_JPEG || $info[2] === IMAGETYPE_PNG || $info[2] === IMAGETYPE_BMP) {
                            $image = $code_produit . '.' . pathinfo(basename($_FILES['image']['name']), PATHINFO_EXTENSION);
                            move_uploaded_file($_FILES['image']['tmp_name'], _UPLOADS_PATH_ . $image);

                            $form_data["image"] = $image;
                            $more_log = " avec image";
                        }
                    }
                }

                $this->db->where("id_produit", $id_produit);
                $this->db->update("produit", $form_data);

                /* ---------------------- USER LOG ---------------------- */
                if (!empty($display) && $display == "false") {
                    $more_text = !empty($display_hide_updated) && $display_hide_updated == "true" ? "/Reprise" : "/Archivage";
                } else {
                    $more_text = !empty($display_hide_updated) && $display_hide_updated == "true" ? "/Reprise" : "";
                }
                saveUserLog("Modification" . $more_text . " de produit ( <b>" . ucfirst($this->input->post("full_name")) . "</b> )" . $more_log);
                /* ---------------------- -------- ---------------------- */

                $this->session->set_flashdata("message", array(
                    "title" => "Succès!",
                    "message" => "Produit modifié avec succès."
                )
                );
            } else {
                $this->session->set_flashdata("warning", array(
                    "title" => "Attention !",
                    "message" => "Code Produit <b>'" . $code_produit . "'</b> existe déja."
                )
                );

                $this->session->set_flashdata("form_data", $form_data);
            }

            redirect("/produit/details/" . $id_produit, "refresh");
        } else {
            $this->session->set_flashdata("form_data", $form_data);

            $produit = $this->db->query("SELECT * FROM produit WHERE id_produit = " . $id)->row();
            $data = array(
                "categories" => $this->db->where("display", 1)->get("categorie")->result_array(),
                "sub_categories" => $this->db->where("display", 1)->get("sub_categorie")->result_array(),
                "produit" => $produit,
                "produit_categorie" => $this->db->query("SELECT * FROM categorie WHERE id_categorie = " . $produit->id_categorie)->row(),
                "produit_sub_categorie" => _ENABLE_SUB_CATEGORIE_ ? $this->db->query("SELECT * FROM sub_categorie WHERE id_sub_categorie = " . $produit->id_sub_categorie)->row() : array(),
                /* ----------------------------------- */
                "title" => "Produits",
                "view" => "produit/modifier",
                "active" => "PR"
                /* ----------------------------------- */
            );
//            redirect("/produit/details/" . $id_produit, "refresh");
            $this->load->view("template", $data);
        }
    }

    public function codeBare($id)
    {
        $this->load->library('zend');
        $this->zend->load('Zend/Barcode');

        $produit = $this->db->query("SELECT p.*, c.full_name AS categorie, sc.full_name AS sub_categorie FROM produit p LEFT JOIN categorie c ON c.id_categorie = p.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie WHERE p.id_produit = " . $id)->row();

        $rendererOptions = array('imageType' => 'png');
        $file = Zend_Barcode::draw('code128', 'image', array('text' => $produit->code_produit), $rendererOptions);
        imagepng($file, APPPATH . "../app-config/uploads/{$produit->code_produit}.png");

        $data = array(
            "produit" => $produit,
            "vente_details" => $this->db->query("SELECT cd.*, s.full_name AS service, p.full_name AS produit, p.code_produit FROM vente_details cd LEFT JOIN produit p ON cd.id_produit = p.id_produit LEFT JOIN service s ON cd.id_service = s.id_service WHERE cd.id_vente = " . $id)->result_array(),
            "paiements" => $this->db->query("SELECT p.*, u.full_name AS utilisateur, u.role FROM paiement p LEFT JOIN `user` u ON u.id_user = p.id_user WHERE p.id_vente = " . $id)->result_array(),
            "exonerations_reste" => $this->db->query("SELECT ex.*, u.full_name AS utilisateur, u.role FROM exoneration_reste ex LEFT JOIN `user` u ON u.id_user = ex.id_user WHERE ex.id_vente = " . $id)->result_array(),
            "info" => $this->db->get("information")->row(),
            "barcode" => "app-config/uploads/{$produit->code_produit}.png",
        );

        $this->load->view("produit/codeBare", $data);

        $html = $this->output->get_output();
        $this->load->library('pdf');
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'portrait');
        $this->dompdf->render();
        $this->dompdf->stream("PRODUIT - " . $produit->code_produit . ".pdf", array("Attachment" => 0));
    }

    private function set_barcode($code)
    {
        //load library
        $this->load->library('zend');
        //load in folder Zend
        $this->zend->load('Zend/Barcode');
        //generate barcode
        $file = Zend_Barcode::draw('code128', 'image', array('text' => $code), array());
        $code = time() . $code;
        $barcodeRealPath = APPPATH . '/cache/' . $code . '.png';
        $barcodePath = APPPATH . '/cache/';

        header('Content-Type: image/png');
        $store_image = imagepng($file, $barcodeRealPath);
        return $barcodePath . $code . '.png';
        //        return $barcodeRealPath;
    }
    public function prc_ajouter()
    {
        CheckProduction();
        CheckAdmin();

        $code_produit = $this->input->post("code_produit");
        if (!empty($code_produit)) {
            $temp = $this->db->where("code_produit", $code_produit)->get("produit")->row();
            if (empty($temp)) {
                $image = null;
                $more_log = "";
                if (file_exists($_FILES['image']['tmp_name'])) {
                    $info = getimagesize($_FILES['image']['tmp_name']);
                    if ($info) {
                        if ($info[2] === IMAGETYPE_GIF || $info[2] === IMAGETYPE_JPEG || $info[2] === IMAGETYPE_PNG || $info[2] === IMAGETYPE_BMP) {
                            $image = $code_produit . '.' . pathinfo(basename($_FILES['image']['name']), PATHINFO_EXTENSION);
                            move_uploaded_file($_FILES['image']['tmp_name'], _UPLOADS_PATH_ . $image);
                            $more_log = " avec image";
                        }
                    }
                }

                $this->db->insert("produit", array(
                    "id_categorie" => $this->input->post("id_categorie"),
                    "id_sub_categorie" => _ENABLE_SUB_CATEGORIE_ ? $this->input->post("id_sub_categorie") : null,
                    "code_produit" => $code_produit,
                    "full_name" => ucfirst($this->input->post("full_name")),
                    "prix_achat" => $this->input->post("prix_achat"),
                    "prix_vente" => $this->input->post("prix_vente"),
                    "alert" => $this->input->post("alert"),
                    "image" => $image,
                    "type" => 1 // Composé
                )
                );
                $id_produit = $this->db->insert_id();

                $ids_products = $this->input->post("id_produit");
                if (!empty($ids_products)) {
                    foreach ($ids_products as $id) {
                        $this->db->insert("produit_details", array(
                            "id_produit_compose" => $id_produit,
                            "id_produit" => $id,
                            "quantite" => $this->input->post("quantite_" . $id),
                        )
                        );
                    }
                }

                $this->session->set_flashdata("message", array(
                    "title" => "Succès!",
                    "message" => "Produit enregistré avec succès."
                )
                );

                /* ---------------------- USER LOG ---------------------- */
                saveUserLog("Création de produit composé ( <b>" . ucfirst($this->input->post("full_name")) . "</b> )" . $more_log);
                /* ---------------------- -------- ---------------------- */

                redirect("/produit/details/" . $id_produit, "refresh");
            } else {
                $this->session->set_flashdata("warning", array(
                    "title" => "Attention !",
                    "message" => "Code Produit <b>'" . $code_produit . "'</b> existe déja."
                )
                );

                redirect("/produit/prc_ajouter", "refresh");
            }
        } else {
            $data = array(
                "produits" => $this->db->query("SELECT p.*, c.full_name AS categorie, sc.full_name AS sub_categorie FROM produit p LEFT JOIN categorie c ON c.id_categorie = p.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie WHERE p.display = 1")->result_array(),
                "categories" => $this->db->where("display", 1)->get("categorie")->result_array(),
                "sub_categories" => $this->db->where("display", 1)->get("sub_categorie")->result_array(),
                "code_produit_compose" => getNewProductCode(true),
                /* ----------------------------------- */
                "title" => "Produits Composés",
                "view" => "produit/prc_ajouter",
                "active" => "PRD-NEW"
                /* ----------------------------------- */
            );

            $this->load->view("template", $data);
        }
    }

    public function prc_modifier($id = null)
    {
        CheckProduction();
        CheckAdmin();

        $code_produit = $this->input->post("code_produit");
        if (!empty($code_produit)) {
            $id_produit = $this->input->post("update_id_produit");
            $display = $this->input->post("display");
            $display_hide_updated = $this->input->post("display_hide_updated");

            $temp = $this->db->where("code_produit", $code_produit)->where("id_produit !=", $id_produit)->get("produit")->row();
            if (empty($temp)) {
                $data = array(
                    "id_categorie" => $this->input->post("id_categorie"),
                    "id_sub_categorie" => _ENABLE_SUB_CATEGORIE_ ? $this->input->post("id_sub_categorie") : null,
                    "code_produit" => $code_produit,
                    "full_name" => ucfirst($this->input->post("full_name")),
                    "prix_achat" => $this->input->post("prix_achat"),
                    "prix_vente" => $this->input->post("prix_vente"),
                    "alert" => $this->input->post("alert"),
                    "display" => !empty($display) && $display == "false" ? 0 : 1
                );

                $more_log = "";
                if (file_exists($_FILES['image']['tmp_name'])) {
                    $image = $this->db->query("SELECT image FROM produit WHERE id_produit = " . $id_produit)->row()->image;
                    $file = _UPLOADS_PATH_ . $image;
                    if (!empty($image) && file_exists($file)) {
                        unlink($file);
                    }

                    $info = getimagesize($_FILES['image']['tmp_name']);
                    if ($info) {
                        if ($info[2] === IMAGETYPE_GIF || $info[2] === IMAGETYPE_JPEG || $info[2] === IMAGETYPE_PNG || $info[2] === IMAGETYPE_BMP) {
                            $image = $code_produit . '.' . pathinfo(basename($_FILES['image']['name']), PATHINFO_EXTENSION);
                            move_uploaded_file($_FILES['image']['tmp_name'], _UPLOADS_PATH_ . $image);
                            $more_log = " avec image";
                        }
                    }
                    $data["image"] = $image;
                }

                $this->db->where("id_produit", $id_produit);
                $this->db->update("produit", $data);

                $this->db->where("id_produit_compose", $id_produit);
                $this->db->delete("produit_details");

                $ids_products = $this->input->post("id_produit");
                if (!empty($ids_products)) {
                    foreach ($ids_products as $id) {
                        $this->db->insert("produit_details", array(
                            "id_produit_compose" => $id_produit,
                            "id_produit" => $id,
                            "quantite" => $this->input->post("quantite_" . $id),
                        )
                        );
                    }
                }

                /* ---------------------- USER LOG ---------------------- */
                if (!empty($display) && $display == "false") {
                    $more_text = !empty($display_hide_updated) && $display_hide_updated == "true" ? "/Reprise" : "/Archivage";
                } else {
                    $more_text = !empty($display_hide_updated) && $display_hide_updated == "true" ? "/Reprise" : "";
                }
                saveUserLog("Modification" . $more_text . " de produit ( <b>" . ucfirst($this->input->post("full_name")) . "</b> )" . $more_log);
                /* ---------------------- -------- ---------------------- */

                $this->session->set_flashdata("message", array(
                    "title" => "Succès!",
                    "message" => "Produit modifié avec succès."
                )
                );
            } else {
                $this->session->set_flashdata("warning", array(
                    "title" => "Attention !",
                    "message" => "Code Produit <b>'" . $code_produit . "'</b> existe déja."
                )
                );

                redirect("/produit/prc_modifier/" . $id_produit, "refresh");
            }

            redirect("/produit/details/" . $id_produit, "refresh");
        } else {
            $production = $this->db->where("id_produit", $id)->get("production")->num_rows();
            $demontage = $this->db->where("id_produit", $id)->get("demontage")->num_rows();

            if (($production + $demontage) > 0) {
                $this->session->set_flashdata("warning", array(
                    "title" => "Alerte !",
                    "message" => "Vous ne pouvez pas modifier les composants de ce produit. Il est utilisé dans des Productions/Démontages."
                )
                );

                redirect("/produit/modifier/" . $id, "refresh");
            }

            $produit = $this->db->query("SELECT * FROM produit WHERE id_produit = " . $id)->row();
            $data = array(
                "produits" => $this->db->query("SELECT p.*, c.full_name AS categorie, sc.full_name AS sub_categorie FROM produit p LEFT JOIN categorie c ON c.id_categorie = p.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie WHERE p.display = 1")->result_array(),
                "categories" => $this->db->where("display", 1)->get("categorie")->result_array(),
                "sub_categories" => $this->db->where("display", 1)->get("sub_categorie")->result_array(),
                "produit" => $produit,
                "produit_details" => $this->db->query("SELECT pd.*, p.full_name AS produit, p.image, p.code_produit, p.prix_achat, p.prix_vente, c.full_name AS categorie, sc.full_name AS sub_categorie FROM produit_details pd JOIN produit p ON pd.id_produit = p.id_produit LEFT JOIN categorie c ON c.id_categorie = p.id_categorie LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie WHERE pd.id_produit_compose = " . $produit->id_produit)->result_array(),
                "produit_categorie" => $this->db->query("SELECT * FROM categorie WHERE id_categorie = " . $produit->id_categorie)->row(),
                "produit_sub_categorie" => _ENABLE_SUB_CATEGORIE_ ? $this->db->query("SELECT * FROM sub_categorie WHERE id_sub_categorie = " . $produit->id_sub_categorie)->row() : array(),
                /* ----------------------------------- */
                "title" => "Produits Composés",
                "view" => "produit/prc_modifier",
                "active" => "PR"
                /* ----------------------------------- */
            );

            $this->load->view("template", $data);
        }
    }

    public function supprimer()
    {
        CheckAdmin();

        $id_produit = $this->input->post("id_produit");
        if (!empty($id_produit)) {
            $produit_details = $this->db->where("id_produit", $id_produit)->get("produit_details")->num_rows();
            $production = $this->db->where("id_produit", $id_produit)->get("production")->num_rows();
            $production_details = $this->db->where("id_produit", $id_produit)->get("production_details")->num_rows();
            $demontage = $this->db->where("id_produit", $id_produit)->get("demontage")->num_rows();
            $demontage_details = $this->db->where("id_produit", $id_produit)->get("demontage_details")->num_rows();
            $client_cmd_details = $this->db->where("id_produit", $id_produit)->get("client_cmd_details")->num_rows();
            $commande_details = $this->db->where("id_produit", $id_produit)->get("commande_details")->num_rows();
            $achat_details = $this->db->where("id_produit", $id_produit)->get("achat_details")->num_rows();
            $vente_details = $this->db->where("id_produit", $id_produit)->get("vente_details")->num_rows();
            $avoir_details_in = $this->db->where("id_produit", $id_produit)->get("avoir_details_in")->num_rows();
            $avoir_details_out = $this->db->where("id_produit", $id_produit)->get("avoir_details_out")->num_rows();
            $inventaire = $this->db->where("id_produit", $id_produit)->get("inventaire_details")->num_rows();

            $produit = $this->db->where("id_produit", $id_produit)->get("produit")->row();

            // 

            if (($produit_details + $production + $production_details + $demontage + $demontage_details + $client_cmd_details + $commande_details + $achat_details + $vente_details + $avoir_details_in + $avoir_details_out + $inventaire) > 0) {
                $this->session->set_flashdata("warning", array(
                    "title" => "Alerte !",
                    "message" => "Vous ne pouvez pas supprimer ce produit. Il est utilisé dans des " . (_ENABLE_PRODUCTION_ ? "Productions/" : "") . (_ENABLE_DEMONTAGE_ ? "Démontages/" : "") . "Commandes/Achats/Ventes/Bons d'Avoir/Inventaires."
                )
                );

                redirect("/produit/details/" . $id_produit, "refresh");
            } elseif ($produit->display == 0) {
                $this->session->set_flashdata("warning", array(
                    "title" => "Alerte !",
                    "message" => "Vous ne pouvez pas supprimer un produit dans l'archive."
                )
                );
            } else {
                $image = $this->db->query("SELECT image FROM produit WHERE id_produit = " . $id_produit)->row()->image;
                $file = _UPLOADS_PATH_ . $image;
                if (!empty($image) && file_exists($file)) {
                    unlink($file);
                }

                /* ---------------------- USER LOG ---------------------- */
                saveUserLog("Suppression de produit ( <b>" . $produit->full_name . "</b> )");
                /* ---------------------- -------- ---------------------- */

                $this->db->where("id_produit", $id_produit);
                $this->db->delete("produit");

                $this->session->set_flashdata("message", array(
                    "title" => "Succès!",
                    "message" => "Produit supprimé avec succès."
                )
                );
            }
        }

        redirect("/produit", "refresh");
    }

    public function supprimer_image()
    {
        CheckAdmin();

        $id_produit = $this->input->post("image_id_produit");
        if (!empty($id_produit)) {
            $image = $this->db->query("SELECT image FROM produit WHERE id_produit = " . $id_produit)->row()->image;
            $file = _UPLOADS_PATH_ . $image;
            if (!empty($image) && file_exists($file)) {
                unlink($file);
            }

            $this->db->where("id_produit", $id_produit);
            $this->db->update("produit", array(
                "image" => null
            )
            );

            $this->session->set_flashdata("message", array(
                "title" => "Succès!",
                "message" => "Image de produit supprimé avec succès."
            )
            );

            /* ---------------------- USER LOG ---------------------- */
            saveUserLog("Suppression d'image de produit ( <b>" . $this->db->where("id_produit", $id_produit)->get("produit")->row()->full_name . "</b> )");
            /* ---------------------- -------- ---------------------- */
        }

        redirect("/produit/modifier/" . $id_produit, "refresh");
    }

    public function e_liste()
    {
        $debut = date("Y-m") . "-01";
        $fin = date("Y-m-t"); // t = last day of current month
        $submit_date_debut = $this->input->get("date_debut");
        $submit_date_fin = $this->input->get("date_fin");
        if (!empty($submit_date_debut) && !empty($submit_date_fin)) {
            $debut = date("Y-m-d", strtotime($submit_date_debut));
            $fin = date("Y-m-d", strtotime($submit_date_fin));
        }

        $data = array(
            "produits_end" => $this->db->query("SELECT pe.*, u.full_name AS utilisateur, u.role, p.full_name AS produit, p.type, p.code_produit, p.image, c.id_categorie, c.full_name AS categorie, sc.id_sub_categorie, sc.full_name AS sub_categorie FROM produit_end pe LEFT JOIN `user` u ON u.id_user = pe.id_user LEFT JOIN produit p ON p.id_produit = pe.id_produit LEFT JOIN categorie c ON p.id_categorie = c.id_categorie LEFT JOIN sub_categorie sc ON p.id_sub_categorie = sc.id_sub_categorie WHERE pe.date BETWEEN '" . $debut . "' AND '" . $fin . "'")->result_array(),
            "date_debut" => $debut,
            "date_fin" => $fin,
            /* ----------------------------------- */
            "title" => "Produits Endommagés",
            "view" => "produit/e_liste",
            "active" => "PR-END"
            /* ----------------------------------- */
        );
        $this->load->view("template", $data);
    }

    public function e_ajouter()
    {
        $id_produit = $this->input->post("id_produit");
        if (!empty($id_produit)) {
            $this->db->insert("produit_end", array(
                "id_produit" => $id_produit,
                "id_user" => $this->session->userdata("id_user"),
                "date" => $this->input->post("date"),
                "quantite" => $this->input->post("quantite"),
                "description" => $this->input->post("description")
            )
            );

            $this->session->set_flashdata("message", array(
                "title" => "Succès!",
                "message" => "Produit endommagé enregistré avec succès."
            )
            );

            /* ---------------------- USER LOG ---------------------- */
            saveUserLog("Enregistrement de produit endommagé ( <b>" . $this->db->where("id_produit", $id_produit)->get("produit")->row()->full_name . "</b> | Qte : <b>" . $this->input->post("quantite") . "</b> )");
            /* ---------------------- -------- ---------------------- */

            redirect("/produit/e_ajouter", "refresh");
        } else {
            $data = array(
                /* ----------------------------------- */
                "title" => "Produits Endommagés",
                "view" => "produit/e_ajouter",
                "active" => "PR-END"
                /* ----------------------------------- */
            );
            $this->load->view("template", $data);
        }
    }

    public function e_modifier($id = null)
    {
        $id_produit_end = $this->input->post("id_produit_end");
        if (!empty($id_produit_end)) {
            $this->db->where("id_produit_end", $id_produit_end);
            $this->db->update("produit_end", array(
                "id_user" => $this->session->userdata("id_user"),
                "date" => $this->input->post("date"),
                "quantite" => $this->input->post("quantite"),
                "description" => $this->input->post("description")
            )
        );

            $this->session->set_flashdata("message", array(
                "title" => "Succès!",
                "message" => "Produit endommagé modifié avec succès."
            )
            );

            /* ---------------------- USER LOG ---------------------- */
            $produit = $this->db->where("id_produit", $this->input->post("id_produit"))->get("produit")->row();
            saveUserLog("Modification de produit endommagé ( <b>" . $produit->full_name . "</b> | Qte : <b>" . $this->input->post("quantite") . "</b> )");
            /* ---------------------------------------------------- */

            redirect("/produit/e_modifier/" . $this->input->post("id_produit_end"), "refresh");
        } else {
            $data = array(
                "produit_end" => $this->db->query("SELECT pe.*, p.full_name AS produit, p.code_produit FROM produit_end pe LEFT JOIN produit p ON p.id_produit = pe.id_produit WHERE pe.id_produit_end = " . $id)->row(),
                /* ----------------------------------- */
                "title" => "Produits Endommagés",
                "view" => "produit/e_modifier",
                "active" => "PR-END"
                /* ----------------------------------- */
            );
            $this->load->view("template", $data);
        }
    }

    public function e_supprimer()
    {
        CheckAdmin();

        $id_produit_end = $this->input->post("id_produit_end");
        if (!empty($id_produit_end)) {
            /* ---------------------- USER LOG ---------------------- */
            $p_e = $this->db->where("id_produit_end", $id_produit_end)->get("produit_end")->row();
            saveUserLog("Suppression de produit endommagé ( <b>" . $this->db->where("id_produit", $p_e->id_produit)->get("produit")->row()->full_name . "</b> | Qte : <b>" . $p_e->quantite . "</b> )");
            /* ---------------------- -------- ---------------------- */

            $this->db->where("id_produit_end", $id_produit_end);
            $this->db->delete("produit_end");

            $this->session->set_flashdata("message", array(
                "title" => "Succès!",
                "message" => "Produit endommagé supprimé avec succès."
            )
            );
        }

        redirect("/produit/e_liste", "refresh");
    }

    public function getProduits($search = "name", $quantite = null, $cout = null, $type = "ALL")
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: *");
        header("Access-Control-Allow-Headers: *");

        $search_text = $this->input->post("recherche");
        $search_query = " AND (p.full_name LIKE '%" . $search_text . "%' OR p.description LIKE '%" . $search_text . "%') ";
        if ($search == "code") {
            $search_query = " AND p.code_produit = '" . $search_text . "'";
        }

        $type_query = "";
        if ($type != "ALL") {
            $type_query = " AND p.type = " . $type;
        }

        $produits = $this->db->query("SELECT p.*, c.full_name AS categorie, sc.full_name AS sub_categorie 
                                     FROM produit p 
                                     LEFT JOIN categorie c ON c.id_categorie = p.id_categorie 
                                     LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie 
                                     WHERE p.display = 1 
                                     " . $search_query . " 
                                     " . $type_query . " 
                                     LIMIT 10 ")->result_array();
        $stock = array();
        $cout_revient = array();

        if (!empty($quantite) && $quantite == "OK") {
            foreach ($produits as $val) {
                $stock[$val["id_produit"]] = getQuantiteProduit($val["id_produit"])["stock"];
            }
        }

        // if(!empty($cout) && $cout == "OK") {
        //     foreach ($produits as $val) {
        //         $cout_revient[$val["id_produit"]] = getCoutRevient($val["id_produit"]);
        //     }
        //}

        echo json_encode(
            array(
                "produits" => $produits,
                "stock" => $stock,
                //"cout_revient" => $cout_revient
            )
        );
    }
    public function getData($type = null, $table = null, $id_table = null, $details = null)
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: *");
        header("Access-Control-Allow-Headers: *");

        $details = !empty($details) ? explode("-", $details) : null;
        $display = $type == "archive" ? 0 : 1;
        $postData = $this->input->post();

        $draw = isset($postData['draw']) ? intval($postData['draw']) : 0;
        $start = isset($postData['start']) ? intval($postData['start']) : 0;
        $rowperpage = isset($postData['length']) ? intval($postData['length']) : 10;
        $columnIndex = isset($postData['order'][0]['column']) ? intval($postData['order'][0]['column']) : 0;
        $columnSortOrder = isset($postData['order'][0]['dir']) ? $postData['order'][0]['dir'] : 'asc';
        $searchValue = isset($postData['search']['value']) ? $postData['search']['value'] : '';

        // Search
        $table_sql = "";
        if (!empty($table) && !empty($id_table) && $table != "NO" && $id_table != "NO") {
            $table_sql = " AND p.id_" . $table . " = " . $id_table . " ";
        }
        $searchQuery = "";
        if ($searchValue != "") {
            $sub_categorie_sql = _ENABLE_SUB_CATEGORIE_ ? " OR sc.full_name LIKE '%" . $searchValue . "%' " : "";
            $searchQuery = " AND ( p.full_name LIKE '%" . $searchValue . "%'
                         OR c.full_name LIKE '%" . $searchValue . "%'
                         " . $sub_categorie_sql . "
                         OR p.prix_vente LIKE '%" . $searchValue . "%' ) ";
        }

        // Total number of records without filtering
        $totalRecords = $this->db->query("SELECT COUNT(id_produit) AS total FROM produit WHERE display = " . $display)->row()->total;

        // Fetch records
        $orderByColumnQuery = "";
        $columns = array(
            "image",
            "code_produit",
            "full_name",
            "categorie",
            "sub_categorie",
            "prix_achat",
            "prix_vente",
            "stock",
            "options"
        );
        if (in_array($columnIndex, array_keys($columns))) {
            $columnName = $columns[$columnIndex]; // Get the column name from the array
            if (!in_array($columnName, array("image", "code_produit", "full_name", "categorie", "sub_categorie", "prix_achat", "prix_vente", "stock", "options"))) {
                $orderByColumnQuery = " ORDER BY " . $columnName . " " . $columnSortOrder;
            } elseif ($columnName == "code_produit") {
                $orderByColumnQuery = " ORDER BY p.code_produit " . $columnSortOrder;
            } elseif ($columnName == "full_name") {
                $orderByColumnQuery = " ORDER BY p.full_name " . $columnSortOrder;
            } elseif ($columnName == "categorie") {
                $orderByColumnQuery = " ORDER BY c.full_name " . $columnSortOrder;
            } elseif ($columnName == "sub_categorie") {
                $orderByColumnQuery = " ORDER BY sc.full_name " . $columnSortOrder;
            }
        }
        $limitQuery = " LIMIT " . $rowperpage . " OFFSET " . $start;

        $query = "SELECT p.*, c.full_name AS categorie, sc.full_name AS sub_categorie
              FROM produit p 
              LEFT JOIN categorie c ON c.id_categorie = p.id_categorie
              LEFT JOIN sub_categorie sc ON sc.id_sub_categorie = p.id_sub_categorie
              WHERE p.display = " . $display . $table_sql . $searchQuery . $orderByColumnQuery . $limitQuery;

        $records = $this->db->query($query)->result_array();
        $produits = array();

        foreach ($records as $record) {
            // IMAGE
            $image = '';
            if (!empty($record["image"]) && file_exists(_UPLOADS_PATH_ . $record["image"])) {
                $image = '<a href="javascript:;" onclick="showImage(\'' . $record["full_name"] . '\', \'' . $record["image"] . '\')">
                            <i class="fa fa-picture-o" aria-hidden="true"></i>
                        </a>';
            }

            // NAMES
            $full_name = !empty($details) && in_array("link", $details)
                ? '<a href="' . base_url() . 'index.php/produit/details/' . $record["id_produit"] . '" rel="popover" data-img="' . $record["image"] . '"><strong>' . $record["full_name"] . '</strong></a>'
                : $record["full_name"];

            $categorie = $this->db->where("id_categorie", $record["id_categorie"])->get("categorie")->row();
            $categorie = !empty($categorie) ? '<a href="' . base_url() . 'index.php/categorie/details/' . $record["id_categorie"] . '"><strong>' . $categorie->full_name . '</strong></a>' : null;

            $sub_categorie = _ENABLE_SUB_CATEGORIE_ ? $this->db->where("id_sub_categorie", $record["id_sub_categorie"])->get("sub_categorie")->row() : array();
            $sub_categorie = !empty($sub_categorie) ? '<a href="' . base_url() . 'index.php/sub_categorie/details/' . $record["id_sub_categorie"] . '"><strong>' . $sub_categorie->full_name . '</strong></a>' : null;

            // OPTIONS
            $update_link = base_url() . 'index.php/produit/modifier/' . $record["id_produit"];
            $options = '<a href="' . base_url() . 'index.php/produit/details/' . $record["id_produit"] . '" class="btn btn-primary rounded btn-sm" data-toggle="tooltip" data-placement="top" title="Détails">
                        <i class="fa fa-list-alt" aria-hidden="true"></i>
                    </a>
                    <a href="' . $update_link . '" class="btn btn-success rounded btn-sm" data-toggle="tooltip" data-placement="top" title="Modifier">
                        <i class="fa fa-wrench" aria-hidden="true"></i>
                    </a>';

            if ($this->session->userdata("id_user") == 1 || $this->session->userdata("id_user") == 2) {
                $options .= '<form method="post" action="' . base_url() . 'index.php/produit/supprimer/" id="form_' . $record["id_produit"] . '" style="display:none;">
                            <input type="hidden" name="id_produit" value="' . $record["id_produit"] . '">
                        </form>
                        <a href="#" onclick="confirmDelete(\'form_' . $record["id_produit"] . '\')" class="btn btn-danger btn-sm rounded ' . ($record["display"] == 0 ? "hidden" : "") . '" data-toggle="tooltip" data-placement="top" title="Supprimer">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>';
            }

            // Build the data object for this record
            $recordData = array(
                "image" => $image,
                "code_produit" => $record["code_produit"],
                "full_name" => $full_name,
                "nom_categorie" => $categorie,
                "nom_sub_categorie" => $sub_categorie,
                "prix_achat" => number_format($record["prix_achat"], 2, '.', '') . ' DH',
                "prix_vente" => number_format($record["prix_vente"], 2, '.', '') . ' DH',
                "stock" => $record["stock"],
                "options" => $options
            );

            $produits[] = $recordData;
        }

        // Response
        $response = array(
            "draw" => $draw,
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => count($records),
            "data" => $produits
        );

        echo json_encode($response);
    }
}