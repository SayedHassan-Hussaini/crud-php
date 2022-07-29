<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

if(isset($_GET['email']) && isset($_GET['message']) && isset($_GET['name'])){
    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = "malestani21@gmail.com";                     //SMTP username
        $mail->Password   = "yufekloocaoyynit";                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('malestani21@gmail.com', 'Zahedi');
        $mail->addAddress($_GET['email'], $_GET['name']);     //Add a recipient


        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        $mail->addAttachment('image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Here is the subject';
        $mail->Body    = $_GET['message'];
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
<?php require 'header.php'; ?>

<div class="row p-0 m-0">
    <div class="col-3 m-0 p-0">
        <?php require 'sidebar.php' ?>
    </div>
    <div class="col-9">
        <div class="container">
            <div class="card mt-5">
                <div class="card-header">
                    <h2>Send Email</h2>
                </div>
                <form method="GET"  class="email m-3">    
                    <div class="form-group mb-1">
                    <label for="name">receiver name</label>
                    <input type="name" name="name"  class="form-control">
                    </div>
                    <div class="form-group">
                    <label for="email">receiver email</label>
                    <input type="email" name="email"  class="form-control">
                    </div>
                    <div class="form-group">
                    <label for="message">your message</label>
                    <input type="text" name="message"  class="form-control">
                    </div>
                    <div class="form-group mt-3">
                    <button type="submit" class="btn btn-info">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require 'footer.php'; ?>
