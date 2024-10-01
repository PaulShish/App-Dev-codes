<?php
require_once 'config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer//src/SMTP.php';

$email = htmlspecialchars($_GET["email"]);
$query_email = "SELECT * FROM db_users WHERE email = '$email'";
$result_count = mysqli_query($db,$query_email) or die('Could not query');

if (mysqli_num_rows($result_count) > 0)
{
    $rows_count=$result_count->fetch_assoc();

    $link = "https://admin.desarsgreenhands.com/php/attempt_change_pass.php";
    $hash = md5(uniqid(rand(), true));

    // Attempt update query execution
    $sql = "UPDATE db_users SET
    new_password_hash='$hash' 
    WHERE email = '$email'";
    
    if(mysqli_query($db, $sql)){
        echo "Record edited successfully.";
    }

    $mail = new PHPMailer(true);

    $from_mail = 'gaming.rhermano@gmail.com';
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = $from_mail;
    $mail->Password = 'yxtkhsnchpliuctp';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->SetFrom($from_mail);
    $mail->addAddress($email);
    $mail->isHTML(true);

    $mail->Subject = "Change Password";

    $msg = "Hi " . $rows_count['firstname'].", \nKindly access this link and change your password here $link?key=$hash ";
    $msg = wordwrap($msg,70);

    $mail->Body = $msg; 
    $mail->send();

    $redirectLoc = "http://admin.desarsgreenhands.com/login.php";
    header("location: $redirectLoc");

}
else 
{
    echo "No record found";
}



?>