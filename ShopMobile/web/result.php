<?php
/**
 * Created by PhpStorm.
 * User: dlf164
 * Date: 14-11-2015
 * Time: 03:14
 */
session_start();
require 'Algorithm/Markov.php';
if(!isset($_SESSION['name']))
{
    session_regenerate_id();
header('location: main.php');
}
$email=$_SESSION['name'];
$name1=$_SESSION['pname'];
$price=$_SESSION['pprice'];
$mysqli=new mysqli('localhost','root','password','transaction_store');
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$o = $mysqli->query("select object from object_store where Email='$email' ");
$u = $o->fetch_assoc();
$e=unserialize($u['object']);
$e->calculate_constants();
$e->display_constants();
$e->calculate_prob_state();
$r=$e->test_gauss();

if($r=="low")
{
    echo "<br/><br/>";
    echo "Less fraudulent";
}

elseif($r=="medium")
{
    echo "<br/><br/>";
    echo "Less fraudulent";
}
elseif($r=="high")
{
    echo "<br/><br/>";
    echo "fraudulent";
}





?>