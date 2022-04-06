<?php

// error_reporting(E_ALL);
// include("action.php");
     
include_once("db_config.php");
include("db_connect.php");
session_start();

if(isset($_POST['checking_acceptbtn'])){
    $id = $_POST['id'];
    $email = $_POST['email'];
    $conn = new Mysqli(HOST,USER,PASS,DB);
    $query = "UPDATE `donor` SET `status`='0' WHERE donor_id = '$id' ";
    $result = mysqli_query($conn,$query);

    if($result > 0){
        require_once 'phpmailer/Exception.php';
        require_once 'phpmailer/PHPMailer.php';
        require_once 'phpmailer/SMTP.php';  

        $mail = new PHPMailer(true);        
       
        $alert = '';
        
          try{
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'paishweta9619@gmail.com'; // Gmail address which you want to use as SMTP server
            $mail->Password = 'shweta2201'; // Gmail address Password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = '587';
        
            $mail->setFrom('paishweta9619@gmail.com'); // Gmail address which you used as SMTP server
            $mail->addAddress($email); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)
        
            $mail->isHTML(true);
            $mail->Subject = 'Message Received (Contact Page)';
            $mail->Body = "<h3>Name : $name <br>Email: $email <br>Message : $message</h3>";
        
            $mail->send();
            $alert = '<div class="alert-success">
                         <span>Message Sent! Thank you for contacting us.</span>
                        </div>';
          } catch (Exception $e){
            $alert = '<div class="alert-error">
                        <span>'.$e->getMessage().'</span>
                      </div>';
          }
    }
}

if(isset($_POST['checking_rejectbtn'])){
    $id = $_POST['id'];

    $conn = new Mysqli(HOST,USER,PASS,DB);
    $query = "UPDATE `donor` SET `status`='1' WHERE donor_id = '$id' ";
    $result = mysqli_query($conn,$query);

    if($result > 0){
        
        $mail = new PHPMailer(true);
        
        $alert = '';
        
        if(isset($_POST['submit'])){
          $name = $_POST['name'];
          $email = $_POST['email'];
          $message = $_POST['message'];
        
          try{
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'vaishnavimantri01@gmail.com'; // Gmail address which you want to use as SMTP server
            $mail->Password = 'Vaishnavi30thMarch'; // Gmail address Password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = '587';
        
            $mail->setFrom('vaishnavimantri01@gmail.com'); // Gmail address which you used as SMTP server
            $mail->addAddress('vaishnavimantri01@gmail.com'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)
        
            $mail->isHTML(true);
            $mail->Subject = 'Message Received (Contact Page)';
            $mail->Body = "<h3>Name : $name <br>Email: $email <br>Message : $message</h3>";
        
            $mail->send();
            $alert = '<div class="alert-success">
                         <span>Message Sent! Thank you for contacting us.</span>
                        </div>';
          } catch (Exception $e){
            $alert = '<div class="alert-error">
                        <span>'.$e->getMessage().'</span>
                      </div>';
          }
        }
    }
    
}
  
?>