
<?php
error_reporting(-1);
ini_set('display_errors', true);

require 'Markov.php';
echo "<em>"."Tests"."</em>";
echo "<br><br>";
echo "<em>"."Test1"."</em>";
echo "<br>";
$m= new Markov();
$m->add_item(6000);
$m->add_state();
$m->add_item(15000);
$m->add_state();
$m->add_item(21000);
$m->add_state();
$m->add_item(3000);
$m->add_state();
$m->add_item(25000);
$m->add_state();
$m->view_state();
$m->calculate_constants();
$m->display_constants();

/*$m->calculate_constants(array(0,1,2),array(1,1,1));
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
*/

?>