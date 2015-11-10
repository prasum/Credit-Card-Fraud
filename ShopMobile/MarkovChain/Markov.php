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
    public $flag;
    public $cal_done;
    public $c0;
    public $c1;
    public $c2;
    public $eq_form;
    protected $ieq;
    protected $x0;
    protected $x1;
    protected $x2;
    protected $initial;
    protected $final;
    protected $shop_cart;


    /**
     *  Constructor $p
     */
    public function __construct()
    {
        $this->x0=array(3);
        $this->x1=array(3);
        $this->x2=array(3);
        $this->arr0=array(3);
        $this->arr1=array(3);
        $this->arr2=array(3);
        $this->ieq=array(3);
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
        $this->flag=0;
        $this->cal_done=0;
        $this->eq_form=0;
        $this->c0=-1;
        $this->c1=-1;
        $this->c2=-1;
        $this->initial=array();
        $this->final=array();
        $this->shop_cart=array();
        for($i=0; $i<3; $i++)
        {
            $this->arr0[$i]=0;
            $this->arr1[$i]=0;
            $this->arr2[$i]=0;
            $this->x0[$i]=0;
            $this->x1[$i]=0;
            $this->x2[$i]=0;
            $this->ieq[$i]=1;
        }
    }

    /**
     * Get  number of items
     * @return int
     */
    public function get_item_no()
    {
        return $this->n;
    }

    /**
     * get item price
     * @return int
     */
    public function get_item()
    {
        return $this->item;
    }

    /**
     * insert item in cart
     */
    public function insert_in_cart()
    {
      array_push($this->shop_cart,$this->item);
    }

    /**
     * View cart
     */
    public function view_cart()
    {
        echo "Shopping list"."<br/>";
        for($g=0; $g<count($this->shop_cart); $g++)
        {
            $c=$g+1;
            echo "Item".$c."&nbsp;&nbsp".$this->shop_cart[$g];
            echo "<br/>";
        }
    }

    /**
     * Add item for conversion
     * @param $p
     */
    public function add_item($p)
    {
        $this->item=$p;
    }

    /**
     * Converts price to state
     * @return int
     */
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

    /**
     * add initial and final state
     * @param int $f
     */
    public function add_state($f=0)
    {
        $this->flag=$f;
    $s=$this->convert();
    if($this->n==0)
    {
        array_push($this->initial,$s);
    }
        elseif($this->n>0 && $this->flag==0)
        {
            array_push($this->initial,$s);
            array_push($this->final,$s);
        }
        elseif($this->flag==1)
        {
            array_push($this->final,$s);
        }
        $this->n+=1;
    }

    /**
     * View State
     */
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
    $this->cal_done=1;
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
    public function calculate_prob_state()
    {
      if($this->flag==1 && $this->cal_done==1)
      {
          for($j=0; $j<3; $j++)
          {
            for($k=0; $k<3; $k++)
            {
                $var='p'.$k.$j;
                $var2=$this->{$var};
                $var1='x'.$j;
                $this->{$var1}[$k]=$var2;
            }
          }
          for($r=0; $r<3; $r++)
          {
              for($s=0; $s<3; $s++)
              {

                  $var1='x'.$r;
                  $var3='c'.$r;
                  $var4=$this->{$var3};
                  if($r==$s)
                  {
                      $this->{$var1}[$s]+=$var4;
                  }
              }
          }
          $e=0;
          $var1='x'.$e;
          for($w=0; $w<3; $w++)
          {
              $this->{$var1}[$w]+=$this->ieq[$w];
          }
      }
        /*var_dump($this->x0);
        var_dump($this->x1);
        var_dump($this->x2);

*/
    $this->eq_form=1;
    }

    public function swap_rows(&$a, &$b, $r1, $r2)
    {
        if ($r1 == $r2) return;

        $tmp = $a[$r1];
        $a[$r1] = $a[$r2];
        $a[$r2] = $tmp;

        $tmp = $b[$r1];
        $b[$r1] = $b[$r2];
        $b[$r2] = $tmp;
    }

    public function gauss_eliminate($A, $b, $N)
    {
        for ($col = 0; $col < $N; $col++)
        {
            $j = $col;
            $max = $A[$j][$j];

            for ($i = $col + 1; $i < $N; $i++)
            {
                $tmp = abs($A[$i][$col]);
                if ($tmp > $max)
                {
                    $j = $i;
                    $max = $tmp;
                }
            }

            $this->swap_rows($A, $b, $col, $j);

            for ($i = $col + 1; $i < $N; $i++)
            {
                $tmp = $A[$i][$col] / $A[$col][$col];
                for ($j = $col + 1; $j < $N; $j++)
                {
                    $A[$i][$j] -= $tmp * $A[$col][$j];
                }
                $A[$i][$col] = 0;
                $b[$i] -= $tmp * $b[$col];
            }
        }
        $x = array();
        for ($col = $N - 1; $col >= 0; $col--)
        {
            $tmp = $b[$col];
            for ($j = $N - 1; $j > $col; $j--)
            {
                $tmp -= $x[$j] * $A[$col][$j];
            }
            $x[$col] = $tmp / $A[$col][$col];
        }
        return $x;
    }
    function test_gauss()
    {
        if ($this->eq_form == 1) {
            $a = array(
                $this->x0, $this->x1, $this->x2


            );
            $b = array(1, 0, 0);

            $x = $this->gauss_eliminate($a, $b, 3);

            ksort($x);
            print_r($x);
        }
    }
}

/*$m= new Markov(4);
$m->calculate_constants(array(0,1,2),array(1,1,1));
$m->calculate_constants(array(0,1,2),array(0,0,0));
$m->calculate_constants(array(1,0,2),array(1,0,1));
$m->calculate_constants();
$m->display_constants(); */
?>