<?php
error_reporting(-1);
ini_set('display_errors', true);
/**
 * Created by PhpStorm.
 * User: dlf164
 * Date: 14-11-2015
 * Time: 03:14
 */
session_set_cookie_params(0);
session_start();
require 'PHPMailer/PHPMailerAutoload.php';
require 'Algorithm/Markov.php';
if(!isset($_SESSION['name']))
{
    session_regenerate_id();
header('location: main.php');
}


$email=$_SESSION['name'];
/*$name1=$_SESSION['pname'];
$price=$_SESSION['pprice']; */
$mysqli=new mysqli('localhost','root','password','transaction_store');
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$o = $mysqli->query("select * from object_store where Email='$email' ");
$u = $o->fetch_assoc();
if($u['Fraudulent']==1)
{
    echo "Fraud";
}
else {
    $e = unserialize($u['object']);
    $e->calculate_constants();
    $e->display_constants();
    $e->calculate_prob_state();
    $r = $e->test_gauss();
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;                             // Enable SMTP authentication
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission 465 ssl
    $mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
    $mail->SMTPSecure = 'tls';
    $mail->Username = 'tendoesch@gmail.com';
    $mail->Password = '*******';
    $mail->From = 'tendoesch@gmail.com';
    $mail->FromName = 'Ten Doeschate';
    $mail->addAddress($_SESSION['name'], 'Sumeet Lalla');
    $mail->addReplyTo('tendoesch@gmail.com', 'Ten Doeschate');
    $mail->WordWrap = 50;
    $mail->isHTML(true);
    $mail->Subject = 'Transaction Report';

    $mail->Body = 'Hi, <br/> <br/> This message tells whether your account is fraudulent or not. The result is following <br/></br> <b>' . $r . '</b>';

    if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
        exit;
    }
    if ($r == "low") {
        echo "<br/><br/>";
        echo "Less fraudulent";
    } elseif ($r == "medium") {
        echo "<br/><br/>";
        echo "Medium fraudulent";
    } elseif ($r == "high") {
        $mysqli->query("update object_store set Fraudulent=1  where Email='$email'");
        echo "<br/><br/>";
        echo "fraudulent";
    }
}




?>
<!doctype html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    </head>
<body>
<br/> <br/>



</body>