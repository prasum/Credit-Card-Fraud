<?php
error_reporting(-1);
ini_set('display_errors', true);
require 'Markov.php';
$mysqli=new mysqli('localhost','root','password','transaction_store');
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$w=$mysqli->query("select object from object_store");
$row = $w->fetch_array(MYSQLI_ASSOC);
$l=unserialize($row['object']);
$l->display_constants();
?>