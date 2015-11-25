<?php
session_set_cookie_params(0);
session_start();
if(!isset($_SESSION['name']))
{
    session_regenerate_id();
    header('location: main.php');
}
$t=false;
$mysqli=new mysqli('localhost','root','password','transaction_store');
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$a=$mysqli->query("select * from product_info");
$r=$a->fetch_assoc();
$_SESSION['pname']=$r['prod_name'];
$_SESSION['pprice']=$r['prod_price'];
if($_SESSION['pname']=="Samsung")
{
    $t=true;
}
if($_SESSION['pname']=="Karbonn")
{
    $j=true;
}
if($_SESSION['pname']=="Iphone")
{
    $o=true;
}
if($_SESSION['pname']=="Micromax")
{
    $f=true;
}
if($_SESSION['pname']=="Xolo")
{
    $e=true;
}
if($_SESSION['pname']=="Motorola")
{
    $c=true;
}
if($_SESSION['pname']=="Asus")
{
    $p=true;
}
if($_SESSION['pname']=="Huawei")
{
    $i=true;
}
if($_SESSION['pname']=="Microsoft")
{
    $d=true;
}
$email=$_SESSION['name'];
$l=array();
$q=$mysqli->query("select object from object_store where Email='$email' ");
$r=$q->fetch_assoc();

$d=unserialize($r['object']);
/*if($d->return_flag()==1) {
   header('location: result.php');
}  */
array_push($l,$d);
if($d!=false)
{
    $a=true;
}
else
{
    $a=false;
}
$b=0;
$p=array();
$sum=0;

?>



<!doctype html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-select.css">
	<link href='http://fonts.googleapis.com/css?family=Montserrat:200,300,400,600,700' rel='stylesheet' type='text/css'/>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:200,300,400,600,700' rel='stylesheet' type='text/css'/>
	<link href='css/font-awesome.min.css' rel='stylesheet' type='text/css'/>
    <link rel="stylesheet" type="text/css" href="css/style.css">
	 <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <style>
        body{
            background: #ffffff;
        }
        .modal {
            text-align: center;
        }

        @media screen and (min-width: 768px) {
            .modal:before {
                display: inline-block;
                vertical-align: middle;
                content: " ";
                height: 100%;
            }
        }

        .modal-dialog {
            display: inline-block;
            text-align: left;
            vertical-align: middle;
        }
    </style>
    <!--script type="text/javascript" src="https://getfirebug.com/firebug-lite-debug.js"></script-->	
	<title>ShopMobile</title>
</head>
<body>
<div class="page-container">
    <div class="header">
			<nav class="navbar container">
		
			  <div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				  <span class="sr-only">Toggle navigation</span>
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				  <span class="icon-bar"></span>
				</button>
				<a href="index.html" class="navbar-brand">
					<img src="img/mobile.png" alt="Sapphire">ShopMobile
				</a>
			  </div>
  
                 
                 <div class="navbar-collapse collapse navbar-right">
					<ul class="nav navbar-nav">
                        <li><a href="blog.html">Home</a></li>


                      <li><a href="contact.html" class="ajax_right">Contact</a></li>
                        <li>Welcome&nbsp;<?php echo $_SESSION['name']; ?></li>
                       <li><a href="logout.php" class="ajax_right">Logout</a>
                     </li></ul>

                    <ul class="nav navbar-right cart">
                      <li class="dropdown">
					<a href="cart.html" class="dropdown-toggle" data-toggle="dropdown"><span><?php if($a==true) { ?><?php echo $d->n;  ?> <?php } ?> <?php if($a==false) { ?><?php echo '0';  ?> <?php } ?> </span></a>
					<div class="cart-info dropdown-menu">
						<table class="table">
							<thead>
							</thead>
							<tbody>
                            <?php if($a===false) {  ?>
                                <tr> <td> </td></td></tr>


                            <?php } ?>
                            <?php if($a===true) { $p=$d->dict; ?>
                            <?php foreach($p as $key=>$value) { ?>
								<tr>
                                    <?php if($key=="7000") { ?>
                                        <td class="image"><img alt="IMAGE" class="img-responsive" src="products/mob1.png"></td>

                                        <td class="name"><a href="project.html">Samsung</a></td>
                                        <?php $b=$key; ?>
                                    <?php } ?>
                                    <?php if($key=="3000") { ?>
                                        <td class="image"><img alt="IMAGE" class="img-responsive" src="products/mob2.jpg"></td>

                                        <td class="name"><a href="project.html">Karbonn</a></td>
                                        <?php $b=$key; ?>
                                    <?php } ?>
                                    <?php if($key=="45000") { ?>
                                        <td class="image"><img alt="IMAGE" class="img-responsive" src="products/mob3.jpg"></td>

                                        <td class="name"><a href="project.html">Iphone</a></td>
                                        <?php $b=$key; ?>
                                    <?php } ?>
                                    <?php if($key=="2500") { ?>
                                        <td class="image"><img alt="IMAGE" class="img-responsive" src="products/mob4.png"></td>

                                        <td class="name"><a href="project.html">Micromax</a></td>
                                        <?php $b=$key; ?>
                                    <?php } ?>
                                    <?php if($key=="35000") { ?>
                                        <td class="image"><img alt="IMAGE" class="img-responsive" src="products/mob5.jpg"></td>

                                        <td class="name"><a href="project.html">Xolo</a></td>
                                        <?php $b=$key; ?>
                                    <?php } ?>
                                    <?php if($key=="11000") { ?>
                                        <td class="image"><img alt="IMAGE" class="img-responsive" src="products/mob6.jpg"></td>

                                        <td class="name"><a href="project.html">Motorola</a></td>
                                        <?php $b=$key; ?>
                                    <?php } ?>
                                    <?php if($key=="15000") { ?>
                                        <td class="image"><img alt="IMAGE" class="img-responsive" src="products/mob7.jpg"></td>

                                        <td class="name"><a href="project.html">Asus</a></td>
                                        <?php $b=$key; ?>
                                    <?php } ?>
                                    <?php if($key=="6000") { ?>
                                        <td class="image"><img alt="IMAGE" class="img-responsive" src="products/mob8.jpg"></td>

                                        <td class="name"><a href="project.html">Huawei</a></td>
                                        <?php $b=$key; ?>
                                    <?php } ?>
                                    <?php if($key=="12000") { ?>
                                        <td class="image"><img alt="IMAGE" class="img-responsive" src="products/mob9.jpg"></td>

                                        <td class="name"><a href="project.html">Microsoft</a></td>
                                        <?php $b=$key; ?>
                                    <?php } ?>

                                    <td class="quantity">x&nbsp;<?php echo $value; ?></td>
                                    <td class="total"><i class="fa fa-inr"></i><?php echo ((int)$b)*$value;    ?></td>
                                    <!--	<td class="remove"><img src="image/remove-small.png" alt="Remove" title="Remove"></td>	-->





                            </tr>
                                    <?php  $sum= $sum+((int)$b)*$value; ?>
                                <?php } ?>
                            <?php } ?>
							</tbody>									
						</table>
						<div class="cart-total">
						  <table>
							 <tbody>
                             <?php if($a) { ?>
                                 <tr>
                                     <td><b>Sub-Total:</b></td>
                                     <td><i class="fa fa-inr"></i><?php echo $sum; ?></td>
                                 </tr>
                                 <tr>
                                     <td><b>Total:</b></td>
                                     <td><i class="fa fa-inr"></i><?php echo $sum; ?></td>
                                 </tr>
                             <?php } ?>
                             <?php if(!$a) { ?>
                                 <tr>
                                     <td><b>Sub-Total:</b></td>
                                     <td><i class="fa fa-inr"></i>0</td>
                                 </tr>
                                 <tr>
                                     <td><b>Total:</b></td>
                                     <td><i class="fa fa-inr"></i>0</td>
                                 </tr>
                             <?php } ?>
                             <?php unset($a); ?>
							</tbody>
						  </table>
						  <div class="checkout"> <a href="logout.php" class="ajax_right">Logout</a></div>
						</div>
					</div> 
			      </li>
			     </ul>


					 
                  </div><!-- /.navbar-collapse -->
			</nav>		
		</div>
    <div class="container">
		    <ul class="breadcrumb prod">
			    <li><a href="index.html">Home</a> <span class="divider"></span></li>
				<li class="active">Product</li>
		    </ul>

		<div class="row product-info">
		    <div class="col-md-6">
				<?php if($t) { unset($t); ?>
				<div class="image"><a  href="products/mob1.png" title="Nano"><img src="products/mob1.png" title="Nano" alt="Nano" id="image" /></a></div>
                 <?php } ?>
                <?php if($j) { unset($j); ?>
                <div class="image"><a  href="products/mob2.jpg" title="Nano"><img src="products/mob2.jpg" title="Nano" alt="Nano" id="image" /></a></div>
                <?php } ?>
                <?php if($o) { unset($o); ?>
                <div class="image"><a href="products/mob3.jpg" title="Nano"><img src="products/mob3.jpg" title="Nano" alt="Nano" id="image" /></a></div>
                <?php } ?>
                <?php if($f) { unset($f); ?>
                <div class="image"><a href="products/mob4.png" title="Nano"><img src="products/mob4.png" title="Nano" alt="Nano" id="image" /></a></div>
                <?php } ?>
                <?php if($e) { unset($e); ?>
                <div class="image"><a href="products/mob5.jpg" title="Nano"><img src="products/mob5.jpg" title="Nano" alt="Nano" id="image" /></a></div>
                <?php } ?>
                <?php if($c) { unset($c); ?>
                <div class="image"><a href="products/mob6.jpg" title="Nano"><img src="products/mob6.jpg" title="Nano" alt="Nano" id="image" /></a></div>
                <?php } ?>
                <?php if($p) { unset($p); ?>
                <div class="image"><a href="products/mob7.jpg" title="Nano"><img src="products/mob7.jpg" title="Nano" alt="Nano" id="image" /></a></div>
                <?php } ?>
                <?php if($i) { unset($i); ?>
                <div class="image"><a href="products/mob8.jpg" title="Nano"><img src="products/mob8.jpg" title="Nano" alt="Nano" id="image" /></a></div>
                <?php } ?>
                <?php if($d) { unset($d); ?>
                <div class="image"><a href="products/mob9.jpg" title="Nano"><img src="products/mob9.jpg" title="Nano" alt="Nano" id="image" /></a></div>
                <?php } ?>
  			</div>




		    <div class="col-md-6">
				<h1><?php echo $_SESSION['pname']; ?></h1>
				    <div class="line"></div>
						<ul>
							<li><span>Brand:</span> <a href="#">Shop Online</a></li>

							<li><span>Availability: </span>In Stock</li>
						</ul>
					<div class="price">
						Price  <i class="fa fa-inr"></i><span class="strike"><?php echo $_SESSION['pprice']+rand(0,1000);  ?> </span> <strong><?php echo $_SESSION['pprice']; ?></strong>
					</div>
					<!--
						<span class="price-tax">Ex Tax: $400.00</span>
						    <div class="control-group">
							<label class="control-label">Color<span class="required">*</span></label>
					            <div class="controls">
									<select>
										<option>Please Select...</option>
										<option>Blue</option>
										<option>Red</option>
										<option>Black</option>
									</select>
								</div>
							</div>
						    <div class="control-group">
									<label class="control-label">Size<span class="required">*</span></label>
					            <div class="controls">
									<select>
										<option>Please Select...</option>
										<option>XXS</option>
										<option>XS</option>
										<option>S</option>
									</select>
								</div>
							</div> -->



					<div class="line"></div>

					<form class="form-inline">
						<button class="btn btn-primary" id="add" name="add" type="button">Add to Cart</button>
						<label>Qty:</label> <input type="text" id="qty" name="qty"  class="col-md-1">
					</form>
                <form class="form-inline">
                    <button class="btn btn-primary" id="fin" name="fin" type="button">Final item</button>
					

					</div>
			</div>
		</div>
		

			
		</div>
		</div>



	
	<div class="footer black">
		<div class="container">
		    <div class="row">
		        <div class="col-md-3">
					<div>
			        <h3>Information</h3>
				        <ul>
					        <li><a href="about.html">About Us</a></li>
						    <li><a href="#">Delivery Information</a></li>
						    <li><a href="#">Privacy Policy</a></li>
						    <li><a href="#">Terms & Conditions</a></li>
					    </ul>
					  </div>
				</div>
		        <div class="col-md-3">
					<div>
			        <h3>Customer Service</h3>
				        <ul>
					        <li><a href="contact.html" class="ajax_right">Contact Us</a></li>
						    <li><a href="#">Returns</a></li>
						    <li><a href="#">Site Map</a></li>
							<li><a href="#">Shipping</a></li>
				        </ul>	
					  </div>
				</div>	
		        
		        <!-- div class="col-md-3 twitter">
					<div class="row">
						<h3>Follow us</h3>
						<script type="text/javascript" src="js/twitterFetcher_v9_min.js"></script>
						<ul id="twitter_update_list"><li class="col-md-2">Twitter feed loading</li></ul>			
						<script>twitterFetcher.fetch('256524641194098690', 'twitter_update_list', 2, true, true, false);</script> 
					</div>				
				</div-->	
				<div class="col-md-3">
				</div>
				
				<div class="col-md-3 social">
					<div class="copy">Copyright &copy; nicole_89</div>
					<ul class="social-network">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
						<li><a href="#"><i class="fa fa-rss"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>	
					</ul>
				</div>

		    </div>	
	</div>
	</div>	
</div>
<div id="myModal1" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Success</h4>
            </div>
            <div class="modal-body">
                <p>You have successfully entered your item</p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-lg" id="login2" data-dismiss="modal"> Click Ok to Continue</button>

            </div>
        </div>
    </div>
</div>
<div id="myModal2" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Failure</h4>
            </div>
            <div class="modal-body">
                <p>The quantity entered is either 0 or invalid or blank</p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-lg" id="login3" data-dismiss="modal"> Click Ok to Continue</button>

            </div>
        </div>
    </div>
</div>

<!-- script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>window.jQuery || document.write("<script src='js/jquery-1.10.2.min.js'><\/script>")</script -->
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/cloud-zoom.1.0.3.js"></script>
<script type="text/javascript" src="js/sapphire.js"></script>

<script>
$.fn.CloudZoom.defaults = {
	zoomWidth:"auto",
	zoomHeight:"auto",
	position:"inside",
	adjustX:0,
	adjustY:0,
	adjustY:"",
	tintOpacity:0.5,
	lensOpacity:0.5,
	titleOpacity:0.5,
	smoothMove:3,
	showTitle:false};
		
jQuery(document).ready(function() 
{
    $('#myTab a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
    })
    $('#add').on('click', function (e) {
        e.preventDefault();
        $.post('c.php', {
            'n': $('#qty').val()



        },function (data) {
            if(data=='success') {
                $('#myModal1').modal('show');
                return false;

            }
            else
            {
                $('#myModal2').modal('show');
                return false;
            }
        });

    });
    $('#fin').on('click', function (e) {
        e.preventDefault();
        $.post('f.php', {
            'n': $('#qty').val()



        },function (data) {
            if(data=='success') {
                var url="http://localhost/MarkovChain/sapphire/result.php";
                $(location).attr('href', url);
                return false;

            }
            else
            {
                $('#myModal2').modal('show');
                return false;
            }
        });

    });
    $('#login2').on('click', function () {
        var url = "http://localhost/MarkovChain/sapphire/index.php";
        $(location).attr('href', url);
    });
});
</script>
</body>
</html>
