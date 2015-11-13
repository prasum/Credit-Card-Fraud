<?php
/**
 * Created by PhpStorm.
 * User: dlf164
 * Date: 12-11-2015
 * Time: 23:54
 */


?>
<!doctype html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">

    <link href='http://fonts.googleapis.com/css?family=Montserrat:200,300,400,600,700' rel='stylesheet' type='text/css'/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:200,300,400,600,700' rel='stylesheet' type='text/css'/>
    <link href='css/font-awesome.min.css' rel='stylesheet' type='text/css'/>

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <style>
        body
        {
            background: #ffffff;
        }
        .col-md-12  {
            text-align:center;
        }
        .col-md-12  form {
            display:inline-block;
        }
    </style>
    <!--script type="text/javascript" src="https://getfirebug.com/firebug-lite-debug.js"></script-->
    <title>ShopMobile</title>
</head>
<body>

    <div class="header">
        <nav class="navbar container">



                <a href="main.php" class="navbar-brand">
                    <img src="img/mobile.png" alt="Sapphire">shopmobile
                </a>



            <div class="navbar-collapse collapse navbar-right">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.html">Home</a></li>




                    <li><a href="contact.html" class="ajax_right">Contact</a></li>
                </ul>
                </div>
            </nav>
        </div>
    <br> <br>
    <br>

            <div class="col-md-12">

                <form class="form-search">
                    <div class="form-group">
                        <input type="text" id="n1" name="n1" placeholder="Enter your email" class="col-md-12">
                    </div>
                     <br>
                     <button class="btn btn-primary" id="go" name="go" type="button">Go</button>
                </form>
    </div>
            </div>
        </div>

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
 <script>
    $(document).ready( function()
    {
        $('#go').on('click', function (e) {


           e.preventDefault();
            $.post('i.php', {
                'n': $('#n1').val()



            },function (data) {
                if(data=='success') {
                    var url = "http://localhost/MarkovChain/sapphire/index.php";
                    $(location).attr('href', url);
                    return false;

                }
                else
                {

                    alert('No value passed');
                    return false;
                }
            });

        });

    });
    </script>

</body>
