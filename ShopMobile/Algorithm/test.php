
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
$m->insert_in_cart();
$m->add_state();
$m->add_item(15000);
$m->insert_in_cart();
$m->add_state();
$m->add_item(21000);
$m->insert_in_cart();
$m->add_state();
$m->add_item(3000);
$m->insert_in_cart();
$m->add_state();
$m->add_item(25000);
$m->insert_in_cart();
$m->add_state(1);
$m->view_state();
$m->parse_dict();
$m->calculate_constants();
$m->display_constants();
$m->calculate_prob_state();
$m->test_gauss();
/*$t=serialize($m);

$mysqli=new mysqli('localhost','root','password','transaction_store');
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$q=$mysqli->query("insert into object_store(object) VALUES('".$t."')");

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