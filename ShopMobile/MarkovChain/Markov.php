<?php
error_reporting(-1);
ini_set('display_errors', true);
class Markov {
    public $arr0;
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
    public function __construct($p)
    {
        $this->arr0=array(3);
        $this->arr1=array(3);
        $this->arr2=array(3);
        $this->n=$p;
        $this->p00=0;
        $this->p01=0;
        $this->p02=0;
        $this->p10=0;
        $this->p11=0;
        $this->p12=0;
        $this->p20=0;
        $this->p21=0;
        $this->p22=0;

        for($i=0; $i<3; $i++)
        {
            $this->arr0[$i]=0;
            $this->arr1[$i]=0;
            $this->arr2[$i]=0;
        }
    }
    public function calculate_constants($first=array(),$last=array())
    {


        if($this->n>1)
        {
            for($j=0; $j<count($first); $j++)
            {
                if($first[$j]>=0 && $first[$j]<3)
                {
                    if($last[$j]>=0 && $last[$j]<3)
                    {
                        $var = 'arr'.$first[$j];
                        $this->{$var}[$last[$j]] += 1;

                    }
                }
            }
        }
        else
        {
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
        $this->n-=1;
    }
    public function display_constants()
    {
        print_r($this->arr0);
        print_r($this->arr1);
        print_r($this->arr2);
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

$m= new Markov(4);
$m->calculate_constants(array(0,1,2),array(1,1,1));
$m->calculate_constants(array(0,1,2),array(0,0,0));
$m->calculate_constants(array(1,0,2),array(1,0,1));
$m->calculate_constants();
$m->display_constants();
?>