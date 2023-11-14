<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accueil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        CheckLogin();
    }

	public function index()
	{
        $data = array(
            "total_cmd_cours" => $this->db->query("SELECT COUNT(cc.id_client_cmd) AS total FROM client_cmd cc LEFT JOIN client_cmd_details cd ON cc.id_client_cmd = cd.id_client_cmd LEFT JOIN `user` u ON u.id_user = cc.id_user LEFT JOIN client c ON c.id_client = cc.id_client LEFT JOIN vente v ON v.id_client_cmd = cc.id_client_cmd WHERE v.id_vente IS NULL AND cc.annuler = 1")->row()->total,
            "total_cmd_annuler" => $this->db->query("SELECT COUNT(id_client_cmd) AS total FROM client_cmd WHERE annuler = 0")->row()->total,
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
        $this->load->view("template", $data);
	}

    // public function sendEmail($email, $subject, $content, $file = null)
    public function sendEmail()
    {

        $this->load->library('phpmailer_lib');
        $mail = $this->phpmailer_lib->load();

        $this->load->dbutil();
        $information = $this->db->where("id_information", 1)->get("information")->row();

        $prefs = array(
            'format'      => 'zip',
            'filename'    => 'database.sql'
        );

        $backup = $this->dbutil->backup($prefs);

        $db_name = 'backup-'. date("Y-m-d-H-i-s") .'.zip';
        $db_file = _BACKUP_PATH_.$db_name;

        $this->load->helper('file');
        write_file($db_file, $backup);

        try {
            //Server settings
                                //Enable verbose debug output
            // $mail->isSMTP();                                            //Send using SMTP
            // $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            // $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            // $mail->Username   = 'service.backup.fms@gmail.com';                     //SMTP username
            // $mail->Password   = 'fmsbackup@2020';                               //SMTP password
            // $mail->SMTPSecure = 'tls';
            //             //Enable implicit TLS encryption
            // $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        

            // $mail->AuthType  = "XOAUTH2";
            // $mail->oauthUserEmail = "service.backup.fms@gmail.com";
            // $mail->oauthClientId = "811641972403-jm0u9qb5e7ccf1ch42n77dfsnq24se56.apps.googleusercontent.com";
            // $mail->oauthClientSecret = "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";
            // $mail->oauthRefreshToken = "https://oauth2.googleapis.com/token";


            //Recipients
            $mail->setFrom(_EMAIL_USERNAME_, "ATLAS GESTION APP1. ");
            $mail->addAddress('mohamed.mouafak.20200@gmail.com', 'Joe User');     //Add a recipient
            // $mail->addAddress('ellen@example.com');               //Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');
        
            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
        
            //Content
            $subject = $information->full_name." - DATABASE BACKUP - ".date("d/m/Y H:i:s");

            $mail->isHTML(true);                                  //Set email format to HTML
            // $mail->Subject = 'He s5f6d4gd2fgt1';
            // $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->Subject = $subject;
            $mail->MsgHTML("<strong>".$subject." (SQL File) :</strong>");
            if(!empty($db_file)) {
                $mail->AddAttachment($db_file);
                echo 'salam<br>';
            }
            ;
            if($mail->send()){
                echo 'Message has been sent';
            } else {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

        // $mail->isSMTP();
        // $mail->Host = 'smtp.mailtrap.io';
        // $mail->SMTPAuth = true;
        // $mail->Username = '3677b7f5173e67'; //paste one generated by Mailtrap
        // $mail->Password = 'e22aea281ab699'; //paste one generated by Mailtrap
        // $mail->SMTPSecure = 'tls';
        // $mail->Port = 2525;

        // $mail->setFrom('info@mailtrap.io', 'Mailtrap');
        // $mail->addReplyTo('info@mailtrap.io', 'Mailtrap');
        // $mail->addAddress('mohamed.mouafak.20200@gmail.com', 'Tim');
        // $mail->addCC('cc1@example.com', 'Elena');
        // $mail->addBCC('bcc1@example.com', 'Alex');

        // $mail->Subject = 'Test Email via Mailtrap SMTP using PHPMailer';

        // $mail->isHTML(true);

        // $mailContent = "<h1>Send HTML Email using SMTP in PHP</h1>
        //         <p>This is a test email I’m sending using SMTP mail server with PHPMailer.</p>";
        // $mail->Body = $mailContent;

        // if($mail->send()){
        //     echo 'Message has been sent';
        // }else{
        //     echo 'Message could not be sent.<br>';
        //     echo 'Mailer Error: ' . $mail->ErrorInfo;
        // }

        /*
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

        $mail->SetFrom(_EMAIL_USERNAME_, "ATLAS GESTION APP. ");
        $mail->AddAddress('mohamed.mouafak.20200@gmail.com');

        $mail->Subject = '$subject';
        $mail->MsgHTML('$content');

        if(!empty($file)) {
            $mail->AddAttachment($file);
        }

        if($mail->Send()){
            print_r('mail send');
        } else {
            print_r($mail->ErrorInfo);
        }*/

        // $this->load->library('phpmailer_lib');
        // $mail = $this->phpmailer_lib->load();
        // //$mail->SMTPDebug = 3;                               // Enable verbose debug output

        // $mail->isSMTP();     // Set mailer to use SMTP
        
        // $mail->Host = _EMAIL_HOST_;  // Specify main and backup SMTP servers
        // $mail->SMTPAuth = true;                               // Enable SMTP authentication
        // $mail->Username = _EMAIL_USERNAME_;                 // SMTP username
        // $mail->Password = _EMAIL_PASSWORD_;                           // SMTP password
        // $mail->Port = 587;                                    // TCP port to connect to
        
        // $mail->From = _EMAIL_USERNAME_;
        // $mail->FromName = 'Test phpmailer';
        // $mail->addAddress(_EMAIL_BACKUP_);               // Name is optional

        // $mail->isHTML(true);                                  // Set email format to HTML

        // $mail->Subject = 'Here is the subject';
        // $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        // $mail->send();
        // echo 'Mailer Error: ' . $mail->ErrorInfo;


        // if(!) {
        //     echo 'Message could not be sent.';
        //     echo 'Mailer Error: ' . $mail->ErrorInfo;
        // } else {
        //     echo 'Message has been sent';
        // }
    }

    public function upload_file()
    {
        // if ( $xlsx = SimpleXLSX::parse($_FILES['file']['tmp_name']) ) {
        //     // print_r( $xlsx->rows() );
        //     $n = 0;
        //     foreach ($xlsx->rows() as $row) {
        //         if($n >= 5)
        //         {
        //             $categorie = $this->db->where('full_name', $row[1])->get('categorie')->row();
        //             if ($categorie) {
        //                 echo $categorie->id_categorie.'<br>';
        //             } else {
        //                 // $this->db->insert("categorie", array(
        //                 //     "full_name"     => ucfirst($row[1]),
        //                 // ));

        //                 echo $row[1].'<br>';
        //             }

        //             $form_data = array(
        //                 "id_categorie"  => $categorie->id_categorie,
        //                 "id_sub_categorie"  => _ENABLE_SUB_CATEGORIE_ ? $this->input->post("id_sub_categorie") : null,
        //                 "code_produit"  => $row[7],
        //                 "full_name"     => ucfirst($row[3]),
        //                 "prix_achat"    => $row[10],
        //                 "reference"    => $row[2],
        //                 "prix_vente"    => $row[8],
        //                 "prix_vente_ph" => $row[9],
        //                 "tva"           => $row[6],
        //                 "forme"         => $row[4],
        //                 "alert"         => 2,
        //             );

        //             echo $row[6].'<br>';
        //             $this->db->insert("produit", $form_data);
        //         }
                
        //         $n++;
        //     }

        //     echo $n;
        // } else {
        //     echo SimpleXLSX::parseError();
        // }


        if ( $xlsx = SimpleXLSX::parse($_FILES['file']['tmp_name']) ) {
            // print_r( $xlsx->rows() );
            $n = 0;
            $t = 0;
            $code = "";
            foreach ($xlsx->rows() as $row) {
                $code = "";
                if($n > 0)
                {
                    if (empty(preg_replace( '/\s+/', '', $row[2]))) {
                        $code = getNewProductCode();
                    } else {
                        $code = $row[2];
                    }

                    $categorie = $this->db->where('full_name', $row[0])->get('categorie')->row();
                    if (empty($categorie)) {
                        echo $row[0].' ==> categorie<br>';
                    }

                    $sub_categorie = $this->db->where('full_name', $row[1])->get('sub_categorie')->row();
                    if (empty($sub_categorie)) {
                        echo $row[0].' ===> '. $row[1].' ==> sub_categorie<br>';
                    }

                    $produit = $this->db->where('full_name', $row[3])->get('produit')->row();

                    // if($row[2] !== "20224BL" && $row[2] !== "10212BL" && $row[2] !== "10210BL" && $row[2] !== "20218BL" && $row[2] !== "20219BL" && $row[2] !== "10211BL" && $row[2] !== "10213BL" && $row[2] !== "10215BL" && $row[2] !== "20222BL"){

                        if (empty($produit)) {
    
                            $this->db->insert("produit", array(
                                "id_categorie"     => $categorie->id_categorie,
                                "id_sub_categorie"     => $sub_categorie->id_sub_categorie,
                                "code_produit"     => $code,
                                "full_name"     => ucfirst($row[3]),
                                "prix_achat"     => $row[4],
                                "prix_vente"     => $row[6],
                                "alert"     => 1
                            ));
                            
                            // echo 'created<br>';
    
                        
                            // echo 'done<br>';
                        } else {
                            echo $produit->code_produit.' =========> '.$row[3].' =========> '.$row[0].' =========> '.$row[1].' =========> '.$row[4].' =========> '.$row[6].'<br>';
    
                            //      $data['prix_achat'] = $row[5];
                            //      $data['prix_vente'] = $row[4];
    
                            //     $this->db->where('id_produit', $produit->id_produit);
                                
                            //     $this->db->update('produit', $data);
    
                            //     $t++;
                            
                        }
                    // }
                }
                
                $n++;
            }

            echo $t;
        } else {
            echo SimpleXLSX::parseError();
        }

    }

    public function changePrixAchat()
    {
        $details = $this->db->where('id_achat', 222)->get('achat_details')->result_array();
        foreach ($details as $row) {
            $produit = $this->db->where('id_produit', $row['id_produit'])->get('produit')->row();
            $this->db->where("id_achat_details", $row['id_achat_details'])->update("achat_details", array(
                "prix_achat" => $produit->prix_achat/(1+($produit->tva/100))
            ));

            echo $produit->code_produit.'<br>';
        }

        // echo 'salam';

        // $produit = $this->db->get('produit')->result_array();
        // foreach ($produit as $key) {
        //     $achat_details = $this->db->where('id_produit', $key['id_produit'])->get('achat_details')->last_row();
        //     if ($achat_details && $key['prix_achat'] != $achat_details->prix_achat) {
        //         $this->db->where('id_produit', $key['id_produit'])->update('produit', ['prix_achat' => $achat_details->prix_achat]);
        //         echo $key['code_produit'].'<br>';
        //     }
        // }
    }

}
