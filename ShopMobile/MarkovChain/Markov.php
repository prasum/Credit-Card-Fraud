<?php
error_reporting(-1);
ini_set('display_errors', true);
class Markov {
    protected $arr0;
    protected $arr1;
    protected $arr2;
    public $n;
    public $p00;
    public $p01;
    public $p02;
    public $p10;
    public $p11;
    public $p12;
    public $p20;
    public $p21;
    public $p22;
    public $item;
    protected $initial;
    protected $final;

    /**
     *  Constructor $p
     */
    public function __construct()
    {
        $this->arr0=array(3);
        $this->arr1=array(3);
        $this->arr2=array(3);
        $this->n=0;
        $this->p00=0;
        $this->p01=0;
        $this->p02=0;
        $this->p10=0;
        $this->p11=0;
        $this->p12=0;
        $this->p20=0;
        $this->p21=0;
        $this->p22=0;
        $this->item=0;
        $this->initial=array();
        $this->final=array();
        for($i=0; $i<3; $i++)
        {
            $this->arr0[$i]=0;
            $this->arr1[$i]=0;
            $this->arr2[$i]=0;
        }
    }
    public function add_item($p)
    {
        $this->item=$p;
    }
    public function convert()
    {

        if($this->item<10000)
        {
            return 0;
        }
        elseif($this->item>=10000 && $this->item<20000)
        {
            return 1;

        }
        else
        {
            return 2;
        }
    }
    public function add_state()
    {
    $s=$this->convert();
    if($this->n==0)
    {
        array_push($this->initial,$s);
    }
        elseif($this->n>0 && $this->n<4)
        {
            array_push($this->initial,$s);
            array_push($this->final,$s);
        }
        elseif($this->n==4)
        {
            array_push($this->final,$s);
        }
        $this->n+=1;
    }
    public function view_state()
    {
        var_dump($this->initial);
        var_dump($this->final);
    }

    /**
     Function evaluating transition probabilities
     * @param array $first
     * @param array $last
     */
    public function calculate_constants()
    {
        if($this->n==0) {
            echo "<b>" . "Number of trials cannot be zero" . "</b>";
            return;
        }
        else{

            for($j=0; $j<count($this->initial); $j++)
            {
                if($this->initial[$j]>=0 && $this->initial[$j]<3)
                {
                    if($this->final[$j]>=0 && $this->final[$j]<3)
                    {
                        $var = 'arr'.$this->initial[$j];
                        $this->{$var}[$this->final[$j]] += 1;

                    }
                }
            }


            for($k=0; $k<3; $k++)
            {
                $var='p0'.$k;
                $this->{$var}=$this->arr0[$k]/array_sum($this->arr0);

            }

            for($k=0; $k<3; $k++)
            {
                $var1='p1'.$k;
                $this->{$var1}=$this->arr1[$k]/(($this->arr1[0])+($this->arr1[1])+($this->arr1[2]));
            }
            for($k=0; $k<3; $k++)
            {
                $var2='p2'.$k;
                $this->{$var2}=$this->arr2[$k]/(($this->arr2[0])+($this->arr2[1])+($this->arr2[2]));
            }
        }

    }

    /**
     Function Displaying Transition Probabilities
     */
    public function display_constants()
    {
       /* print_r($this->arr0);
        print_r($this->arr1);
        print_r($this->arr2); */
        echo '<br/>';
        echo '<p>'.'<em>'.'Value of Markov Chain Transition Probabilities are:'.'</em></p>';
        echo  $this->p00;
        echo '&nbsp;'.'&nbsp;'.$this->p01;
        echo '&nbsp;'.'&nbsp;'.$this->p02;
        echo '<br/>'.$this->p10;
        echo '&nbsp;'.'&nbsp;'.$this->p11;
        echo '&nbsp;'.'&nbsp;'.$this->p12;
        echo '<br/>'.$this->p20;
        echo '&nbsp;'.'&nbsp;'.$this->p21;
        echo '&nbsp;'.'&nbsp;'.$this->p22;


    }
}

/*$m= new Markov(4);
$m->calculate_constants(array(0,1,2),array(1,1,1));
$m->calculate_constants(array(0,1,2),array(0,0,0));
$m->calculate_constants(array(1,0,2),array(1,0,1));
$m->calculate_constants();
$m->display_constants(); */
?>