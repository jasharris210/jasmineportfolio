<?php
use PHPMailer\PHPMailer\PHPMailer;

//$message_sent=false;

if (isset($_POST['submit']) && $_POST['email'] != '' && $_POST['name'] != '' && $_POST['message'] != ''){
    
    if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        
        $name =$_POST['name'];
        $email =$_POST['email'];
        $subject =$_POST['subject'];
        $message =$_POST['message']; 

        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php" ;
        require_once "PHPMailer/Exception.php";

        $mail = new PHPMailer(); // create a new object
        $mail->IsSMTP(); // enable SMTP
        $mail->SMTPAuth = true; // authentication enabled
        $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465; // or 587
        $mail->IsHTML(true);
        $mail->Username = "jas.harris210@gmail.com";
        $mail->Password = "iloveMiMi210";


        $mail->setFrom($email, $name);
        $mail->addAddress("jas.harris210@gmail.com");
        $mail->Subject = ("$email($subject)");
        $mail->Body = $message;

        if($mail->send()){
            $status = "success";
            $response = "Email is sent!";
        }
        
        else{
             $status = "failed";
             $response = "Something is Wrong: <br>" . $mail->ErrorInfo;
        }

        exit(json_encode(array("status" => $status, "response" => $response)));


        /*$body = "";

        $body .= "You have recieved an e-mail from: ".$name. "\r\n";
        $body .= "Email: ".$email. "\r\n";
        $body .= "Message: ".$message. "\r\n"; 
        

        mail($mailTo, $subject, $body);
        $message_sent = true;*/
    }
    
}