<?php
/**
 * Created by PhpStorm.
 * User: dlf164
 * Date: 14-11-2015
 * Time: 03:14
 */
session_start();
require 'Algorithm/Markov.php';
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
$e->test_gauss();






?>