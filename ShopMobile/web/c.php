<?php
/**
 * Created by PhpStorm.
 * User: dlf164
 * Date: 14-11-2015
 * Time: 00:28
 */
session_set_cookie_params(0);
session_start();
require 'Algorithm/Markov.php';
$qt=$_POST['n'];
if(!isset($_SESSION['name']))
{
    session_regenerate_id();
    header('location: main.php');
}
if(empty($qt)||$qt==0||!is_numeric($qt))
{
    $response='fail';
}
else {
    $email = $_SESSION['name'];
    $name1 = $_SESSION['pname'];
    $price = $_SESSION['pprice'];
    $mysqli = new mysqli('localhost', 'root', 'password', 'transaction_store');
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    for ($i = 0; $i < $qt; $i++) {
        $q = $mysqli->query("select object from object_store where Email='$email' ");
        $r = $q->fetch_assoc();
        if ($r['object'] === NULL) {
            $m = new Markov();
            $m->add_item($price);
            $m->insert_in_cart();
            $m->make_dict();
            $m->add_state();
            $mysqli->query("update object_store set object='" . serialize($m) . "'  where Email='$email' ");
        } else {
            $d = unserialize($r['object']);
            $d->add_item($price);
            $d->insert_in_cart();
            $d->make_dict();
            $d->add_state();
            $mysqli->query("update object_store set object='" . serialize($d) . "'  where Email='$email' ");
        }

    }
    $response = 'success';
}
echo $response;


?>