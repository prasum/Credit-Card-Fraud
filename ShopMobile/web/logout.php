<?php
/**
 * Created by PhpStorm.
 * User: dlf164
 * Date: 13-11-2015
 * Time: 05:49
 */
session_start();
$email=$_SESSION['name'];
$mysqli=new mysqli('localhost','root','password','transaction_store');
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
if(isset($_SESSION['name']))
{
    $q = $mysqli->query("select object from object_store where Email='$email' ");
    if(($q->num_rows)>0) {
        $r = $q->fetch_assoc();
        $d = unserialize($r['object']);
        if ($d->return_flag() == 1) {
            $mysqli->query("delete object from object_store where Email='$email'");
        }
    }
 unset($_SESSION['name']);
    unset($_SESSION['pname']);
    unset($_SESSION['pprice']);
    unset($_SESSION['mail']);


    session_destroy();
    header('location: main.php');

}





?>