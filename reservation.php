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
            Reservation
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
                    <li role="presentation" class="active"><a href="reservation.php">Reservation</a></li>
                    <li role="presentation"><a href="gallery.php">Gallery</a></li>
                    <li role="presentation"><a href="aboutus.php">About us</a></li>
                </ul>
            </div>
            <div class="container">
                <form method="post" action="#" onSubmit="return validateForm();">
                    <div style="max-width: 400px;">
                    </div>
                    <div style="padding-bottom: 18px;font-size : 24px;">Table Reservation</div>
                    <div style="padding-bottom: 18px;font-size : 18px;">We would be glad to reserve a table for you at our restaurant!</div>
                    <div style="padding-bottom: 18px;">Name<span style="color: red;"> *</span><br/>
                        <input type="text" id="data_3" name="data_3" style="max-width : 400px;" class="form-control"/>
                    </div>
                    <div style="padding-bottom: 18px;">Phone<br/>
                        <input type="text" id="data_4" name="data_4" style="max-width : 400px;" class="form-control"/>
                    </div>
                    <div style="padding-bottom: 18px;">Email<br/>
                        <input type="text" id="data_5" name="data_5" style="max-width : 400px;" class="form-control"/>
                    </div>
                    <div style="padding-bottom: 18px;">Date<span style="color: red;"> *</span><br/>
                        <input type="text" id="data_6" name="data_6" style="max-width : 250px;" class="form-control"/>
                    </div>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.4.0/pikaday.min.js" type="text/javascript"></script>
                    <link href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.4.0/css/pikaday.min.css" rel="stylesheet" type="text/css" />
                    <script type="text/javascript">new Pikaday({ field: document.getElementById('data_6') });</script>
                    <div style="padding-bottom: 18px;">Time<span style="color: red;"> *</span><br/>
                        <input type="text" id="data_7" name="data_7" style="max-width : 250px;" class="form-control"/>
                    </div>
                    <div style="padding-bottom: 18px;">Number of Attendees<span style="color: red;"> *</span><br/>
                        <select id="data_8" name="data_8" style="max-width : 250px;" class="form-control"><option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                            <option>10+ (Specify in Comments)</option>
                        </select>
                    </div>
                    <div style="padding-bottom: 18px;">Comments / Additional Requests<br/>
                        <textarea id="data_9" false name="data_9" style="max-width : 400px;" rows="6" class="form-control"></textarea>
                    </div>
                    <div style="padding-bottom: 18px;"><button class="btn btn-primary" name="skip_Submit" type="submit">Submit</button></div>
                    <div>
                        <div style="float:right"><a href="https://www.100forms.com" id="lnk100" title="form to email">form to email</a></div>
                        <script src="https://www.100forms.com/js/FORMKEY:H6TSB8GWFZWB/SEND:suxrobt@gmail.com" type="text/javascript"></script>
                    </div>
                </form>
            </div>

            <script type="text/javascript" src="script.js"></script>



        </div>

    </body>
</html>