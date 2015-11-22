<?php

error_reporting(-1);
ini_set('display_errors', true);
session_start();
require 'Algorithm/Markov.php';
$r=$_SESSION['mail'];
 $mysqli=new mysqli('localhost','root','password','transaction_store');
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
$a=$mysqli->query("select * from object_store WHERE Email='$r'");

if($a->num_rows>0)
{
    $t=$a->fetch_assoc();
    $_SESSION['name']=$t['Email'];
}
else
{
    header('location: main.php');
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
if(!is_null($d))
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
    <link rel="stylesheet" type="text/css" href="css/camera.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
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
					<img src="img/mobile.png" alt="Sapphire">shopmobile
				</a>
			  </div>
  
                 
                 <div class="navbar-collapse collapse navbar-right">
					<ul class="nav navbar-nav">
                      <li class="active"><a href="index.html">Home</a></li>




                      <li><a href="contact.html" class="ajax_right">Contact</a></li>
                    </ul>

                    <ul class="nav navbar-right cart">
                      <li class="dropdown">
					<a href="cart.html" class="dropdown-toggle" data-toggle="dropdown"><span> <?php if($a==true) { ?><?php echo $d->n;  ?> <?php } ?></span></a>
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
						  <div class="checkout"><a href="cart.html" class="ajax_right">View Cart</a> | <a href="checkout.html" class="ajax_right">Checkout</a></div>
						</div>
					</div> 
			      </li>
			     </ul>

                     <div class="navbar-collapse collapse navbar-right">
                         <ul class="nav navbar-nav">
                             <li><a href="#">Welcome&nbsp; <?php echo $_SESSION['name']; ?> </a></li>
                             <li><a href="logout.php" class="ajax_right">Logout</a>
                        </ul>
					 
                  </div><!-- /.navbar-collapse -->
			</nav>		
		</div>
		
	<div class="container">
		<div class="row">
		    <div class="col-md-12 slideshow">
				<div id="slideshow0">
					<div class="camera_wrap camera_emboss camera_white_skin">
						<img src="image/sam.png" alt="Banner 1" />
						<div data-thumb="image/market.jpg" data-src="image/market.jpg" data-link="product.html">
						</div>
						<div data-thumb="image/sam.png" data-src="image/sam.png" >
						</div>
						<div data-thumb="image/mob.png" data-src="image/mob.png" >
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!--
		<div class="row banners">
		    <div class="col-md-4">
			    <div class="banner">
					<h2>Free delivery</h2>
				</div>
			</div>

		    <div class="col-md-4">
			    <div class="banner">
				</div>
			</div>


		    <div class="col-md-4">
			    <div class="banner">
				</div>
			</div>
		</div>
		-->
		
				
		<div class="row">
		    <div class="col-md-3 left-menu">
				<div class="">
					<h3>Mobile Phones</h3>
					<ul>

						<li class="active"><a href="#">Low</a></li>
						<li><a href="#">Moderate</a></li>

						<li><a href="#">expensive</a></li>
					</ul>


				</div>



			</div>
		
		<div class="col-md-9">
		
		<div class="row">
		    <div class="col-md-4">
			    <div class="product">
				    <p><img alt="dress1home" src="products/mob1.png"></p>
					<div class="name" id="samsung">
				    <p id="sam">Samsung</p>
				    </div>
				    <div class="price" id="p">
				    <p id="l"><i class="fa fa-inr" id="k">7000</i></p>
                        <p>   <button type="button" class="btn btn-primary btn-small" id="buy1">Buy</button> </p>
				    </div>
				</div>
			</div>
		    <div class="col-md-4">
			    <div class="product">
				    <p><img alt="dres2" src="products/mob2.jpg"></p>
				    <div class="name" id="karbonn">
				    <p id="karb">Karbonn</p>
				    </div>
				    <div class="price">
				    <p><i class="fa fa-inr" id="o">3000 </i></p>
                     <p>   <button type="button" class="btn btn-primary btn-small" id="buy2">Buy</button> </p>
				    </div>	

				</div>	
			
			</div>			
		    <div class="col-md-4">
			    <div class="product">
                    <p><img alt="dress3" src="products/mob3.jpg"></p>
					<div class="name" id="iphone">
				    <p id="ip">Iphone</p>
				    </div>
				    <div class="price">
				    <p><i class="fa fa-inr" id="j">45000 </i></p>
                        <p>   <button type="button" class="btn btn-primary btn-small" id="buy3">Buy</button> </p>
				    </div>
				</div>	
			</div>		
			
			<!--
		    <div class="col-md-4">
			    <div class="product">
				    <a href="product.html"><img alt="dress4" src="products/dress2home.jpg"></a>
				    <div class="name">
				    <a href="">Black Dress</a>
				    </div>
				    <div class="price">
				    <p>$150.00</p>
				    </div>

				</div>	
			</div>	-->	
		
		</div>
	

		<div class="row">
		    <div class="col-md-4">
			    <div class="product">
                    <p><img alt="dress5" src="products/mob4.png"></p>
				    <div class="name" id="micromax">
				    <p id="micro">Micromax</p>
				    </div>
				    <div class="price">
				    <p><i class="fa fa-inr" id="u">2500</i></p>
                        <p>   <button type="button" class="btn btn-primary btn-small" id="buy4">Buy</button> </p>
				    </div>	
				</div>
			
			</div>
		    <div class="col-md-4">
			    <div class="product">
                    <p> <img alt="dress6" src="products/mob5.jpg"></p>
				    <div class="name" id="xolo">
				    <p id="x">Xolo</p>
				    </div>
				    <div class="price">
				    <p><i class="fa fa-inr" id="v">35000</i></p>
                        <p>   <button type="button" class="btn btn-primary btn-small" id="buy5">Buy</button> </p>
				    </div>	

				</div>			
			</div>			
		    <div class="col-md-4">
			    <div class="product">
				    <div class="product_sale">-30%</div>
                    <p><img alt="dress7" src="products/mob6.jpg"></p>
				    <div class="name" id="motorola">
				    <p id="moto">Motorola</p>
				    </div>
				    <div class="price">
				    <p><i class="fa fa-inr" id="w">11000</i></p>
                        <p>   <button type="button" class="btn btn-primary btn-small" id="buy6">Buy</button> </p>
				    </div>

				</div>			
			</div>		
			
			<!--
		    <div class="col-md-4">
			    <div class="product">
				    <a href="product.html"><img alt="dress8" src="products/dress8home.jpg"></a>
				    <div class="name">
				    <a href="">Evening Dress</a>
				    </div>
				    <div class="price">
				    <p>$670.00</p>
				    </div>	
				</div>				
			</div>		
		-->
		</div>
		
		
			
		<div class="row">
		    <div class="col-md-4">
			    <div class="product">
					<div class="product_sale">Sale</div>
                    <p><img alt="dress1home" src="products/mob7.jpg"></p>
					<div class="name" id="asus">
				    <p id="as">Asus</p>
				    </div>
				    <div class="price">
				    <p><i class="fa fa-inr" id="z">15000</i></p>
                        <p>   <button type="button" class="btn btn-primary btn-small" id="buy7">Buy</button> </p>
				    </div>
				</div>
			</div>
		    <div class="col-md-4">
			    <div class="product">
                    <p><img alt="dres2" src="products/mob8.jpg"></p>
				    <div class="name" id="huawei">
				    <p id="hu">Huawei</p>
				    </div>
				    <div class="price">
				    <p><i class="fa fa-inr" id="y">6000</i></p>
                        <p>   <button type="button" class="btn btn-primary btn-small" id="buy8">Buy</button> </p>
				    </div>	

				</div>	
			
			</div>			
		    <div class="col-md-4">
			    <div class="product">
                    <p><img alt="dress3" src="products/mob9.jpg"></p>
					<div class="name" id="microsoft">
				    <p id="ms">Microsoft</p>
				    </div>
				    <div class="price">
				    <p><i class="fa fa-inr" id="a">12000</i></p>
                        <p>   <button type="button" class="btn btn-primary btn-small" id="buy9">Buy</button> </p>
				    </div>
				</div>	
			</div>		
			
			<!--
		    <div class="col-md-4">
			    <div class="product">
				    <a href="product.html"><img alt="dress4" src="products/dress2home.jpg"></a>
				    <div class="name">
				    <a href="">Black Dress</a>
				    </div>
				    <div class="price">
				    <p>$150.00</p>
				    </div>

				</div>	
			</div>	-->	
		
		</div>

			<div class="row">
			<div class="col-md-12">
				
				<div class="newsletter clearfix">
						<h3>Newsletter</h3>
						<div>
						<input type="text" name="email" class="email">
						<input type="submit" value="Subscribe" class="btn btn-primary">
						</div>
				</div>
			</div>
			</div>
	   </div>
	 </div>	
	</div>		
	
	

	<div class="footer black">
		<div class="container">
			<!-- div class="arrow"><b class="caret"></b></div -->
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
					<div class="copy">Copyright &copy; shopmobile</div>
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

<!-- script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>window.jQuery || document.write("<script src='js/jquery-1.10.2.min.js'><\/script>")</script -->
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/camera.js"></script>
<script type="text/javascript" src="js/sapphire.js"></script>
<script>
		$(document).ready( function()
		{	
			jQuery('#slideshow0 > div').camera({
			alignment:"center",
			autoAdvance:true,
			mobileAutoAdvance:true,
			barDirection:"leftToRight",
			barPosition:"bottom",
			cols:6,
			easing:"easeInOutExpo",
			mobileEasing:"easeInOutExpo",
			fx:"random",
			mobileFx:"random",
			gridDifference:250,
			height:"auto",
			hover:true,
			loader:"pie",
			loaderColor:"#eeeeee",
			loaderBgColor:"#222222",
			loaderOpacity:0.3,
			loaderPadding:2,
			loaderStroke:7,
			minHeight:"200px",
			navigation:true,
			navigationHover:true,
			mobileNavHover:true,
			opacityOnGrid:false,
			overlayer:true,
			pagination:true,
			pauseOnClick:true,
			playPause:true,
			pieDiameter:38,
			piePosition:"rightTop",
			portrait:false,
			rows:4,
			slicedCols:12,
			slicedRows:8,
			slideOn:"random",
			thumbnails:false,
			time:7000,
			transPeriod:1500,
			imagePath: '../image/'
		});



            $('#buy1').on('click', function (e) {
                e.preventDefault();
                $.post('product.php', {
                    'n': $('#sam').text(),
                    'p': $('#k').text()


                },function (data) {
                    if(data=='success') {
                        var url = "http://localhost/MarkovChain/sapphire/product1.php";
                        $(location).attr('href', url);
                        return false;

                    }
                    else
                    {
                        var a=$('#k').text();
                        alert(a);
                        return false;
                    }
                });

            });
            $('#buy2').on('click', function (e) {
                e.preventDefault();
                $.post('product.php', {
                    'n': $('#karb').text(),
                    'p': $('#o').text()


                },function (data) {
                    if(data=='success') {
                        var url = "http://localhost/MarkovChain/sapphire/product1.php";
                        $(location).attr('href', url);
                        return false;

                    }
                    else
                    {
                        var a=$('#o').text();
                        alert(a);
                        return false;
                    }
                });

            });
            $('#buy3').on('click', function (e) {
                e.preventDefault();
                $.post('product.php', {
                    'n': $('#ip').text(),
                    'p': $('#j').text()


                },function (data) {
                    if(data=='success') {
                        var url = "http://localhost/MarkovChain/sapphire/product1.php";
                        $(location).attr('href', url);
                        return false;

                    }
                    else
                    {
                        var a=$('#j').text();
                        alert(a);
                        return false;
                    }
                });

            });
            $('#buy4').on('click', function (e) {
                e.preventDefault();
                $.post('product.php', {
                    'n': $('#micro').text(),
                    'p': $('#u').text()


                },function (data) {
                    if(data=='success') {
                        var url = "http://localhost/MarkovChain/sapphire/product1.php";
                        $(location).attr('href', url);
                        return false;

                    }
                    else
                    {
                        var a=$('#k').text();
                        alert(a);
                        return false;
                    }
                });

            });
            $('#buy5').on('click', function (e) {
                e.preventDefault();
                $.post('product.php', {
                    'n': $('#x').text(),
                    'p': $('#v').text()


                },function (data) {
                    if(data=='success') {
                        var url = "http://localhost/MarkovChain/sapphire/product1.php";
                        $(location).attr('href', url);
                        return false;

                    }
                    else
                    {
                        var a=$('#v').text();
                        alert(a);
                        return false;
                    }
                });

            });
            $('#buy6').on('click', function (e) {
                e.preventDefault();
                $.post('product.php', {
                    'n': $('#moto').text(),
                    'p': $('#w').text()


                },function (data) {
                    if(data=='success') {
                        var url = "http://localhost/MarkovChain/sapphire/product1.php";
                        $(location).attr('href', url);
                        return false;

                    }
                    else
                    {
                        var a=$('#w').text();
                        alert(a);
                        return false;
                    }
                });

            });
            $('#buy7').on('click', function (e) {
                e.preventDefault();
                $.post('product.php', {
                    'n': $('#as').text(),
                    'p': $('#z').text()


                },function (data) {
                    if(data=='success') {
                        var url = "http://localhost/MarkovChain/sapphire/product1.php";
                        $(location).attr('href', url);
                        return false;

                    }
                    else
                    {
                        var a=$('#z').text();
                        alert(a);
                        return false;
                    }
                });

            });
            $('#buy8').on('click', function (e) {
                e.preventDefault();
                $.post('product.php', {
                    'n': $('#hu').text(),
                    'p': $('#y').text()


                },function (data) {
                    if(data=='success') {
                        var url = "http://localhost/MarkovChain/sapphire/product1.php";
                        $(location).attr('href', url);
                        return false;

                    }
                    else
                    {
                        var a=$('#y').text();
                        alert(a);
                        return false;
                    }
                });

            });
            $('#buy9').on('click', function (e) {
                e.preventDefault();
                $.post('product.php', {
                    'n': $('#ms').text(),
                    'p': $('#a').text()


                },function (data) {
                    if(data=='success') {
                        var url = "http://localhost/MarkovChain/sapphire/product1.php";
                        $(location).attr('href', url);
                        return false;

                    }
                    else
                    {
                        var a=$('#a').text();
                        alert(a);
                        return false;
                    }
                });

            });



	});
	</script>    
</body>
</html>
