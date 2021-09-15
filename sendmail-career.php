<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);

$alert = '';

if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $licensenum = $_POST['licensenum'];
  // $resume = $_POST['resume'];
  // $coverletter = $_POST['coverletter'];

  try{
    $mail->isSMTP();
    $mail->Host = 'ns6191.hostgator.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'career@rocklandsecurity.ca'; // Gmail address which you want to use as SMTP server
    $mail->Password = 'Rm03151991'; // Gmail address Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';

    $mail->setFrom('career@rocklandsecurity.ca'); // Gmail address which you used as SMTP server
    $mail->addAddress('career@rocklandsecurity.ca'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)
    // $mail->addAttachment($_FILES['file']['tmp_name'], $_FILES['file']['name']);
    $mail->addAttachment($_FILES['resume']['tmp_name'], $_FILES['resume']['name']);
    $mail->addAttachment($_FILES['coverletter']['tmp_name'], $_FILES['coverletter']['name']);

    $mail->isHTML(true);
    $mail->Subject = "Rockland Application from $name";
    $mail->Body = "
                    <h3>
                    Name : $name <br>
                    Email : $email<br>
                    Contact Number : $phone <br> 
                    License Number: $licensenum 
                    </h3>";

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
?>