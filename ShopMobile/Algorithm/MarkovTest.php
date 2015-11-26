<?php
/**
 * Created by PhpStorm.
 * User: dlf164
 * Date: 25-11-2015
 * Time: 22:17
 */
require 'Markov.php';
class MarkovTest extends PHPUnit_Framework_TestCase {


    public function test()
    {
        $m=new Markov();
        $m->add_item(6000);
        $m->insert_in_cart();
        $m->add_state();
        $m->add_item(5000);
        $m->insert_in_cart();
        $m->add_state();
        $m->add_item(1000);
        $m->insert_in_cart();
        $m->add_state();
        $m->add_item(30000);
        $m->insert_in_cart();
        $m->add_state();
        $m->add_item(5000);
        $m->insert_in_cart();
        $m->add_state();
        $m->add_item(31000);
        $m->insert_in_cart();
        $m->add_state();
        $m->add_item(52000);
        $m->insert_in_cart();
        $m->add_state();
        $m->add_item(2000);
        $m->insert_in_cart();
        $m->add_state();
        $m->add_item(1000);
        $m->insert_in_cart();
        $m->add_state();
        $m->add_item(21000);
        $m->insert_in_cart();
        $m->add_state();
        $m->add_item(1000);
        $m->insert_in_cart();
        $m->add_state();
        $m->add_item(5000);
        $m->insert_in_cart();
        $m->add_state();
        $m->add_item(20000);
        $m->insert_in_cart();
        $m->add_state();
        $m->add_item(7000);
        $m->insert_in_cart();
        $m->add_state();
        $m->add_item(60000);
        $m->insert_in_cart();
        $m->add_state();
        $m->add_item(3500);
        $m->insert_in_cart();
        $m->add_state();
        $m->add_item(1000);
        $m->insert_in_cart();
        $m->add_state();
        $m->add_item(50000);
        $m->insert_in_cart();
        $m->add_state();
        $m->add_item(2000);
        $m->insert_in_cart();
        $m->add_state();
        $m->add_item(13000);
        $m->insert_in_cart();
        $m->add_state();
        $m->add_item(20000);
        $m->insert_in_cart();

        $m->add_state(1);


        $m->calculate_constants();
        $m->calculate_prob_state();

        $this->assertEquals('low', $m->test_gauss());
    }

    public function test1()
    {
        $m=new Markov();
        $m->add_item(6000);
        $m->insert_in_cart();
        $m->add_state();
        $m->add_item(5000);
        $m->insert_in_cart();
        $m->add_state();
        $m->add_item(1000);
        $m->insert_in_cart();
        $m->add_state();
        $m->add_item(30000);
        $m->insert_in_cart();
        $m->add_state();
        $m->add_item(5000);
        $m->insert_in_cart();
        $m->add_state();
        $m->add_item(31000);
        $m->insert_in_cart();
        $m->add_state();
        $m->add_item(52000);
        $m->insert_in_cart();
        $m->add_state();
        $m->add_item(2000);
        $m->insert_in_cart();
        $m->add_state();
        $m->add_item(1000);
        $m->insert_in_cart();
        $m->add_state();
        $m->add_item(21000);
        $m->insert_in_cart();
        $m->add_state();
        $m->add_item(1000);
        $m->insert_in_cart();
        $m->add_state();
        $m->add_item(5000);
        $m->insert_in_cart();
        $m->add_state();
        $m->add_item(20000);
        $m->insert_in_cart();
        $m->add_state();
        $m->add_item(7000);
        $m->insert_in_cart();
        $m->add_state();
        $m->add_item(60000);
        $m->insert_in_cart();
        $m->add_state();
        $m->add_item(3500);
        $m->insert_in_cart();
        $m->add_state();
        $m->add_item(1000);
        $m->insert_in_cart();
        $m->add_state();
        $m->add_item(50000);
        $m->insert_in_cart();
        $m->add_state();
        $m->add_item(2000);
        $m->insert_in_cart();
        $m->add_state();
        $m->add_item(13000);
        $m->insert_in_cart();
        $m->add_state();
        $m->add_item(20000);
        $m->insert_in_cart();
        $m->add_state();
        $m->add_item(1000);
        $m->insert_in_cart();

        $m->add_state(1);


        $m->calculate_constants();
        $m->calculate_prob_state();

        $this->assertEquals('low', $m->test_gauss());
    }

    public function test2()
    {
        $m=new Markov();
        $m->add_item(6000);
        $m->insert_in_cart();
        $m->add_state();
        $m->add_item(3000);
        $m->insert_in_cart();
        $m->add_state();
        $m->add_item(15000);
        $m->insert_in_cart();
        $m->add_state();
        $m->add_item(2000);
        $m->insert_in_cart();
        $m->add_state();
        $m->add_item(15000);
        $m->insert_in_cart();
        $m->add_state();
        $m->add_item(50000);
        $m->insert_in_cart();
        $m->add_state();
        $m->add_item(15000);
        $m->insert_in_cart();
        $m->add_state();
        $m->add_item(25000);
        $m->insert_in_cart();


        $m->add_state(1);


        $m->calculate_constants();
        $m->calculate_prob_state();

        $this->assertEquals('medium', $m->test_gauss());
    }

    public function test3()
    {
        $m=new Markov();
        $m->add_item(6000);
        $m->insert_in_cart();
        $m->add_state();
        $m->add_item(30000);
        $m->insert_in_cart();
        $m->add_state();
        $m->add_item(5000);
        $m->insert_in_cart();
        $m->add_state();
        $m->add_item(20000);
        $m->insert_in_cart();
        $m->add_state();
        $m->add_item(5000);
        $m->insert_in_cart();
        $m->add_state();
        $m->add_item(5000);
        $m->insert_in_cart();
        $m->add_state();
        $m->add_item(50000);
        $m->insert_in_cart();
        $m->add_state();
        $m->add_item(20000);
        $m->insert_in_cart();


        $m->add_state(1);


        $m->calculate_constants();
        $m->calculate_prob_state();

        $this->assertEquals('high', $m->test_gauss());
    }

}
