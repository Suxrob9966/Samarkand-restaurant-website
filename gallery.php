<?php
//include auth.php file on all secure pages
//include("auth.php");
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>
            Gallery
        </title>

        <!-- Bootstrap files start -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
        </script> <!--end Bootstrap files-->

        <link rel="stylesheet"type="text/css" href="forrestaurant.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> <!--used for adding social media icons-->
        <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@700&display=swap" rel="stylesheet">

    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <nav class="navbar navbar-default navbar-static-top"> 
                    <div class="col-sm-8">
                        <div class="nav navbar-header navbar-right">
                            <h1 id="logo" >Saykali Samarkand</h1>
                        </div>


                    </div>
                    <div class="col-sm-4">
                        <ul class="nav navbar-nav navbar-right">
                            <?php                           /*chernovoy dlya sign in page*/
                            if(!isset($_SESSION["username"])){
                                echo  "<li><a href='login.php'><span class='glyphicon glyphicon-user'></span> Login</a></li>";
                            }
                            else{
                                echo  "<li><a href='logout.php'><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>";
                            }
                            ?>  
                        </ul>
                    </div>
                </nav> 
            </div>

            <div class="row text-center navBar">
                <ul class="nav nav-pills nav-justified">
                    <li role="presentation"><a href="index.php">Home</a></li>
                    <li role="presentation"><a href="dashboard.php">Menu</a></li>
                    <li role="presentation"><a href="contact.php">Contact</a></li>
                    <li role="presentation"><a href="reservation.php">Reservation</a></li>
                    <li role="presentation" class="active"><a href="gallery.php">Gallery</a></li>
                    <li role="presentation"><a href="aboutus.php">About us</a></li>
                </ul>
            </div>

            <div class="container">
                <div class="jumbotron text-center">
                    <h1>Here are some awesome videos</h1>
                    <h2>Watch these videos to get idea of making these lovely foods!</h2>
                </div>

                <div class="row text-center">
                    <h2>Cooking Pulav</h2>
                    <div id="A_Video" class="embed-responsive embed-responsive-16by9">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/fZYU5auIM_0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>

                <div class="row text-center">
                    <h2>Cooking shashlik kebab</h2>
                    <div id="B_Video" class="embed-responsive embed-responsive-16by9">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/beY7qmk1Eoo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>


            </div>

        </div>
    </body>
</html>
