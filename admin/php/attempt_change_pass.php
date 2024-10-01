<?php
//include_once ('/home/desarsgr/public_html/admin/php/session_save.php');

require_once 'config.php'; 

$hash = htmlspecialchars($_GET["key"]);

$query_email = "SELECT * FROM db_users WHERE new_password_hash = '$hash'";
$result_count = mysqli_query($db,$query_email) or die('Could not query');

if (mysqli_num_rows($result_count) > 0)
{
    $rows_count=$result_count->fetch_assoc();

    $_SESSION['change_password_account'] = $rows_count['email'];

    $redirectLoc = "../forgot-password.php";
    header("location: $redirectLoc");
    exit;
}
?>