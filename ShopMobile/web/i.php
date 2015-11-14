<?php
/**
 * Created by PhpStorm.
 * User: dlf164
 * Date: 13-11-2015
 * Time: 03:25
 */
$name=$_POST['n'];
if(!empty($name)) {
    if (!filter_var($name, FILTER_VALIDATE_EMAIL)) {
        $response = 'fail';
    } else {
        $mysqli = new mysqli('localhost', 'root', 'password', 'transaction_store');
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }

        $q = $mysqli->query("insert into object_store(Email) VALUES('$name')");
        $a = $mysqli->query("select * from object_store");
        if ($a->num_rows > 0) {
            $response = 'success';
        } else {
            $response = 'fail';
        }
    }
}
else
{
    $response='fail';
}
echo $response;





?>