<?php
error_reporting(-1);
ini_set('display_errors', true);
/**
 * Created by PhpStorm.
 * User: dlf164
 * Date: 13-11-2015
 * Time: 05:49
 */
 
session_start();
require 'Algorithm/Markov.php';
 $email=$_SESSION['name'];
$mysqli=new mysqli('localhost','root','password','transaction_store');
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$q = $mysqli->query("select * from object_store where Email='$email' ");
    if(($q->num_rows)>0) {
        $r = $q->fetch_assoc();
		if($r['object']==='NULL')
		break;
		else
		{
        $d = unserialize($r['object']);
		$e=$d->flag;
        if ($e) {
            $mysqli->query("delete object from object_store where Email='$email'");
        }
		}
		}

 
 unset($_SESSION['name']);
    unset($_SESSION['pname']);
    unset($_SESSION['pprice']);
    unset($_SESSION['mail']);


    session_destroy();
    header('location: main.php');
	







?>