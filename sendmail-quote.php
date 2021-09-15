<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);

$alert = '';

if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $company = $_POST['company'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  try{
    $mail->isSMTP();
    $mail->Host = 'ns6191.hostgator.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'info@rocklandsecurity.ca'; // Gmail address which you want to use as SMTP server
    $mail->Password = 'Rm03151991'; // Gmail address Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';

    $mail->setFrom('info@rocklandsecurity.ca'); // Gmail address which you used as SMTP server
    $mail->addAddress('info@rocklandsecurity.ca'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)

    $mail->isHTML(true);
    $mail->Subject = "QUOTATION for $company";
    $mail->Body = "<h3>Company : $company<br> Name : $name<br>Email : $email<br>Contact Number : $phone <br><br></h3> <h4>Service: $subject <br><br> Message : <br><br>$message<h4>";

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