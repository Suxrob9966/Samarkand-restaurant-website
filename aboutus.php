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
            About us
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
                    <li role="presentation"><a href="gallery.php">Gallery</a></li>
                    <li role="presentation" class="active"><a href="aboutus.php">About us</a></li>
                </ul>
            </div>
            <div class="container">
                <div class="jumbotron text-center">

                    <p>"Saykali Samarkand" Restaurant became the First and Only authentic Halal Central Asian cuisine in Chicago. It has become a well known international escape for Chicago people and visitors alike. "Saykali Samarkand" restaurant provides a gateway into Uzbek, Kazakh, and Russian cuisine and its best traditions. The main dishes are prepared with only Halal highest quality meat. Our authentic decor and cosy ambiance imbue every experience with a taste and feel of Central Asian Cuisine and Culture. Our menu includes a variety of items each representing a firework of culinary fantasy. Also, introducing New Umka Perfect Puff Pies!</p>
                </div>
            </div>
        </div>
    </body>
</html>
