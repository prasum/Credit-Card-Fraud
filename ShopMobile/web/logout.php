<?php
/**
 * Created by PhpStorm.
 * User: dlf164
 * Date: 13-11-2015
 * Time: 05:49
 */
session_start();
if(isset($_SESSION['name']))
{
 unset($_SESSION['name']);
    unset($_SESSION['pname']);
    unset($_SESSION['pprice']);



    session_destroy();
    header('location: main.php');

}





?>