<?php
/**
 * Created by PhpStorm.
 * User: dlf164
 * Date: 12-11-2015
 * Time: 20:52
 */
$name=$_POST['n'];
$price=$_POST['p'];

 $mysqli=new mysqli('localhost','root','password','transaction_store');
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$price=$mysqli->real_escape_string($price);
$m=$mysqli->query("select * from product_info");
if($m->num_rows>0)
{
    $mysqli->query("update product_info set prod_name='$name' , prod_price='$price' ");
    $response='success';
}
else {
    $q = $mysqli->query("insert into product_info(prod_name,prod_price) VALUES('$name','$price')");
    $a = $mysqli->query("select * from product_info");
    if ($a->num_rows > 0) {
        $response = 'success';
    } else {
        $response = 'fail';
    }
}
    echo $response;
?>