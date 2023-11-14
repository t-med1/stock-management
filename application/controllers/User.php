<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    public function index()
	{
        $this->login();
	}

    public function login()
    {
        /* -------------------------------------- */
        $login = $this->session->userdata("login");

        if(!empty($login) && $login == true)
        { redirect("/accueil", "refresh"); }
        /* -------------------------------------- */

        $information = $this->db->where("id_information", 1)->get("information")->row();
        $this->session->set_userdata("STE", $information->full_name);

        $username = $this->input->post("username");
        $password = $this->input->post("password");
        $code = $this->input->post('code');

        if(!empty($username) && !empty($password))
        {
            $user = $this->db->where("username", $username)->get("user")->row();
            
            if(!empty($user) && password_verify($password, $user->password))
            {
                if ($user->authenticator){

                    $this->load->library('GoogleAuthenticator');
                    $ga = new GoogleAuthenticator();

                    $checkResult = $ga->verifyCode($user->secret, $code, 2);

                    if (!$checkResult) {

                        $this->session->set_flashdata("error", array(
                            "title" => "Alerte !",
                            "message" => "<u>Identifiant</u> ou <u>Mot de passe</u> et incorrect !"
                        ));
                        redirect("/user/login", "refresh");

                    }
                }

                $this->db->where("id_user", $user->id_user);
                $this->db->update("user", array(
                    "last_login" => date("Y-m-d H:i")
                ));

                $this->session->set_userdata("login", true);
                $this->session->set_userdata("id_user", $user->id_user);
                $this->session->set_userdata("name_user", $user->full_name);
                $this->session->set_userdata("role_user", $user->role);
                $this->session->set_userdata("last_login", date("d/m/Y H:i"));

                /* ---------------------- USER LOG ---------------------- */
                saveUserLog("Connexion");
                /* ---------------------- -------- ---------------------- */

                if ($user->role == 2) {
                    redirect("/comptable", "refresh");
                } else {
                    redirect("/accueil", "refresh");
                }
            }
            else
            {
                $this->session->set_flashdata("error", array(
                    "title" => "Alerte !",
                    "message" => "<u>Identifiant</u> ou <u>Mot de passe</u> et incorrect !"
                ));
                redirect("/user/login", "refresh");
            }
        }
        else
        {
            $this->load->view("user/login");
        }
    }

    public function profile()
    {
        CheckLogin();

        $username = $this->input->post("username");
        $password = $this->input->post("password");
        if(!empty($username))
        {
            $data["username"] = $username;
            if(!empty($password)) {
                $data["password"] = password_hash($password, PASSWORD_DEFAULT);
            }

            $this->db->where("id_user", $this->session->userdata("id_user"));
            $this->db->update("user", $data);

            $this->session->set_flashdata("message", array(
                "title" => "Succès!",
                "message" => "Commercial modifié avec succès."
            ));

            /* ---------------------- USER LOG ---------------------- */
            saveUserLog("Modification de profile");
            /* ---------------------- -------- ---------------------- */

            redirect("/user/profile", "refresh");
        }
        else
        {
            $this->load->library('GoogleAuthenticator');

            $ga = new GoogleAuthenticator();

            $secret = $ga->createSecret();


            $data = array(
                "qrCodeUrl" => $ga->getQRCodeGoogleUrl(_APP_NAME_, $secret),
                "secret" => $secret,
                "oneCode" => $ga->getCode($secret),
                "user"      => $this->db->where("id_user", $this->session->userdata("id_user"))->get("user")->row(),
                /* ----------------------------------- */
                "title"     => "Profile",
                "view"      => "user/profile",
                "active"    => ""
                /* ----------------------------------- */
            );
            $this->load->view("template", $data);
        }
    }

    public function logout()
    {
        /* ---------------------- USER LOG ---------------------- */
        saveUserLog("Déconnexion");
        /* ---------------------- -------- ---------------------- */
        
        $id_user = $this->session->userdata("id_user");
        if(!empty($id_user))
        {
            $this->db->where("id_user", $id_user);
            $this->db->update("user", array(
                "last_logout" => date("Y-m-d H:i")
            ));
        }
        $user_data = $this->session->all_userdata();
        if(!empty($user_data))
        {
            foreach ($user_data as $key => $value) {
                if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
                    $this->session->unset_userdata($key);
                }
            }
        }
        $this->session->sess_destroy();

        $information = $this->db->where("id_information", 1)->get("information")->row();
        $this->session->set_userdata("STE", $information->full_name);

        redirect("/user/login", "refresh");
    }

    public function liste()
    {
        CheckLogin();
        CheckAdmin();

        $data = array(
            "users"     => $this->db->get("user")->result_array(),
            /* ----------------------------------- */
            "title"     => "Commerciaux",
            "view"      => "user/liste",
            "active"    => "US"
            /* ----------------------------------- */
        );
        $this->load->view("template", $data);
    }

    public function ajouter()
    {
        CheckLogin();
        CheckAdmin();

        $username = $this->input->post("username");
        if(!empty($username))
        {
            $this->db->insert("user", array(
                "full_name"     => ucfirst($this->input->post("full_name")),
                "username"      => $username,
                "role"          => $this->input->post("role"),
                "password"      => password_hash($this->input->post("password"), PASSWORD_DEFAULT)
            ));

            $this->session->set_flashdata("message", array(
                "title" => "Succès!",
                "message" => "Commercial enregistré avec succès."
            ));

            /* ---------------------- USER LOG ---------------------- */
            saveUserLog("Enregistrement de Commercial ( <b>".ucfirst($this->input->post("full_name"))."</b> / <b>".$username."</b> )");
            /* ---------------------- -------- ---------------------- */

            redirect("/user/liste", "refresh");
        }
        else
        {
            $data = array(
                /* ----------------------------------- */
                "title"     => "Commerciaux",
                "view"      => "user/ajouter",
                "active"    => "US-ADD"
                /* ----------------------------------- */
            );
            $this->load->view("template", $data);
        }
    }

    public function modifier($id = null)
    {
        CheckLogin();
        CheckAdmin();

        // Secure FMS User
        if($id == 1 && $this->session->userdata("id_user") != 1) {
            redirect("/user/liste", "refresh");
        }

        $username = $this->input->post("username");
        $password = $this->input->post("password");
        if(!empty($username))
        {
            $data["full_name"]  = ucfirst($this->input->post("full_name"));
            $data["username"]   = $username;
            $data["role"]       = $this->input->post("role");

            if(!empty($password)) {
                $data["password"] = password_hash($password, PASSWORD_DEFAULT);
            }

            $this->db->where("id_user", $this->input->post("id_user"));
            $this->db->update("user", $data);

            $this->session->set_flashdata("message", array(
                "title" => "Succès!",
                "message" => "Commercial modifié avec succès."
            ));

            /* ---------------------- USER LOG ---------------------- */
            saveUserLog("Modification de Commercial ( <b>".ucfirst($this->input->post("full_name"))."</b> / <b>".$username."</b> )");
            /* ---------------------- -------- ---------------------- */

            redirect("/user/liste", "refresh");
        }
        else
        {
            $data = array(
                "user"      => $this->db->where("id_user", $id)->get("user")->row(),
                /* ----------------------------------- */
                "title"     => "Commerciaux",
                "view"      => "user/modifier",
                "active"    => "US"
                /* ----------------------------------- */
            );
            $this->load->view("template", $data);
        }
    }

    public function authenticator_register(){

        CheckLogin();

        $this->load->library('GoogleAuthenticator');

        $ga = new GoogleAuthenticator();


        $secret = $this->input->post('secret');
        $code = $this->input->post('code');

        $checkResult = $ga->verifyCode($secret, $code, 4);    // 2 = 2*30sec clock tolerance
        if ($checkResult) {
            $query = $this->db->where('id_user', $this->session->userdata("id_user"))->update('user', array(
                'authenticator' => true,
                'secret' => $secret
                )
            );
            if ($query){
                $this->session->set_flashdata('message', array(
                    "title" => "Succès!",
                    "message" => "Authentificateur google a été activer avec succès"
                ) );
            } else {
                $this->session->set_flashdata('message', array(
                    "title" => "Alerte !",
                    "message" => "Authentificateur google n'est pas activé."
                ) );
            }
        } else {
            $this->session->set_flashdata('message', array(
                "title" => "Alerte !",
                "message" => "Authentificateur google n'est pas activé."
            ) );
        }

        redirect(base_url().'index.php/user/profile', 'refresh');
    }
    public function auth_desactive(){

        $query = $this->db->where('id_user', $this->session->userdata("id_user"))->update('user', [
                'authenticator' => false,
                'secret' => null]
        );
//        if ($query){
//            echo true;
//        } else {
//            echo false;
//        }

        redirect(base_url().'index.php/user/profile', 'refresh');

    }


    public function supprimer()
    {
        CheckLogin();
        CheckAdmin();

        $id_user = $this->input->post("id_user");
        if  (
                !empty($id_user)
                && $id_user != 1 // Fms Access      // CAN NOT BE DELETED
                && $id_user != 2 // Default Access  // CAN NOT BE DELETED
                && $id_user != $this->session->userdata("id_user") // Current Access // CAN NOT DELETE HIM SELF
            )
        {
            $current_id_user = $this->session->userdata("id_user");

            $this->db->query("UPDATE `client` SET id_user = ".$current_id_user." WHERE id_user = ".$id_user);
            $this->db->query("UPDATE `production` SET id_user = ".$current_id_user." WHERE id_user = ".$id_user);
            $this->db->query("UPDATE `demontage` SET id_user = ".$current_id_user." WHERE id_user = ".$id_user);
            $this->db->query("UPDATE `client_cmd` SET id_user = ".$current_id_user." WHERE id_user = ".$id_user);
            $this->db->query("UPDATE `commande` SET id_user = ".$current_id_user." WHERE id_user = ".$id_user);
            $this->db->query("UPDATE `achat` SET id_user = ".$current_id_user." WHERE id_user = ".$id_user);
            $this->db->query("UPDATE `devis` SET id_user = ".$current_id_user." WHERE id_user = ".$id_user);
            $this->db->query("UPDATE `vente` SET id_user = ".$current_id_user." WHERE id_user = ".$id_user);
            $this->db->query("UPDATE `avoir` SET id_user = ".$current_id_user." WHERE id_user = ".$id_user);
            $this->db->query("UPDATE `paiement` SET id_user = ".$current_id_user." WHERE id_user = ".$id_user);
            $this->db->query("UPDATE `exoneration_reste` SET id_user = ".$current_id_user." WHERE id_user = ".$id_user);
            $this->db->query("UPDATE `produit_end` SET id_user = ".$current_id_user." WHERE id_user = ".$id_user);
            $this->db->query("UPDATE `charge` SET id_user = ".$current_id_user." WHERE id_user = ".$id_user);
            $this->db->query("UPDATE `avance` SET id_user = ".$current_id_user." WHERE id_user = ".$id_user);
            $this->db->query("UPDATE `avance_retour` SET id_user = ".$current_id_user." WHERE id_user = ".$id_user);
            $this->db->query("UPDATE `caisse_entree` SET id_user = ".$current_id_user." WHERE id_user = ".$id_user);
            $this->db->query("UPDATE `caisse_sortie` SET id_user = ".$current_id_user." WHERE id_user = ".$id_user);
            $this->db->query("UPDATE `inventaire` SET id_user = ".$current_id_user." WHERE id_user = ".$id_user);
            $this->db->query("UPDATE `user_log` SET id_user = ".$current_id_user." WHERE id_user = ".$id_user);

            /* ---------------------- USER LOG ---------------------- */
            $user = $this->db->where("id_user", $id_user)->get("user")->row();
            saveUserLog("Suppression de Commercial ( <b>".$user->full_name."</b> / <b>".$user->username."</b> )");
            /* ---------------------- -------- ---------------------- */

            $this->db->where("id_user", $id_user);
            $this->db->delete("user");

            $this->session->set_flashdata("message", array(
                "title" => "Succès!",
                "message" => "Commercial supprimé avec succès."
            ));
        }

        redirect("/user/liste", "refresh");
    }

    public function block()
    {
        CheckLogin();

        $data = array(
            /* ----------------------------------- */
            "title"     => "Alerte !",
            "view"      => "user/block",
            "active"    => ""
            /* ----------------------------------- */
        );
        $this->load->view("template", $data);
    }
}
