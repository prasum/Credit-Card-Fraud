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
if(!isset($_SESSION['name']))
{
    session_regenerate_id();
header('location: main.php');
}
 $email=$_SESSION['name'];
$mysqli=new mysqli('localhost','root','password','transaction_store');
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$q = $mysqli->query("select object from object_store where Email='$email' ");
    if(($q->num_rows)>0) {
        $r = $q->fetch_assoc();
        if (!is_null($r['object'])) {


            $d = unserialize($r['object']);
            $e = $d->return_flag();
            if ($e==1) {
                $mysqli->query("update object_store set object=NULL  where Email='$email'");
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