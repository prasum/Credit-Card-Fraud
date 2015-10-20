<?php
require 'Markov.php';
echo "<em>"."Test1"."</em>";
echo "<br>";
$m= new Markov(4);
$m->calculate_constants(array(0,1,2),array(1,1,1));
$m->calculate_constants(array(0,1,2),array(0,0,0));
$m->calculate_constants(array(1,0,2),array(1,0,1));
$m->calculate_constants();
$m->display_constants();
echo "<br><br>";
echo "<em>"."Test2"."</em>";
echo "<br>";
$m= new Markov(0);
echo "<br>";
$m->calculate_constants(array(0,1,2),array(1,1,1));
$m->display_constants();


?>