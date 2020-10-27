<?php
session_start();
require('db.php');
//require("auth.php"); //to be uncommented
require("dbcontroller.php"); //last added up to DOCTYPEhtml
$db_handle = new DBController();
if(!empty($_GET["action"])) {
    switch($_GET["action"]) {
        case "add":
            if(!isset($_SESSION["username"])){
                header("Location: login.php");
                exit(); 
            }
            else{
                if(!empty($_POST["quantity"]) && $_POST["quantity"]>=1) {
                    $productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
                    $itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'image'=>$productByCode[0]["image"]));

                    if(!empty($_SESSION["cart_item"])) {
                        if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
                            foreach($_SESSION["cart_item"] as $k => $v) {
                                if($productByCode[0]["code"] == $k) {
                                    if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                                        $_SESSION["cart_item"][$k]["quantity"] = 0;
                                    }
                                    $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                                }
                            }
                        } else {
                            $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
                        }
                    } else {
                        $_SESSION["cart_item"] = $itemArray;
                    }
                }
                else{
                    echo "<script>alert('Illegal quantity value');</script>";
                }
            }
            break;
        case "remove":
            if(!empty($_SESSION["cart_item"])) {
                foreach($_SESSION["cart_item"] as $k => $v) {
                    if($_GET["code"] == $k)
                        unset($_SESSION["cart_item"][$k]);				
                    if(empty($_SESSION["cart_item"]))
                        unset($_SESSION["cart_item"]);
                }
            }
            break;
        case "empty":
            unset($_SESSION["cart_item"]);
            break;	
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>
            Menu page
        </title>

        <!-- Bootstrap files start -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
        </script> <!--end Bootstrap files-->

        <link rel="stylesheet"type="text/css" href="forrestaurant.css">
        <link href="css/style1.css" type="text/css" rel="stylesheet"> <!--for dashboard.php menu-->
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
                    <li role="presentation" class="active"><a href="dashboard.php">Menu</a></li>
                    <li role="presentation"><a href="contact.php">Contact</a></li>
                    <li role="presentation"><a href="reservation.php">Reservation</a></li>
                    <li role="presentation"><a href="gallery.php">Gallery</a></li>
                    <li role="presentation"><a href="aboutus.php">About us</a></li>
                </ul>
            </div>



            <div class="container">
                <div id="shopping-cart">
                    <div class="txt-heading">Shopping Cart</div>

                    <a id="btnEmpty" href="dashboard.php?action=empty">Empty Cart</a>
                    <?php
                    if(isset($_SESSION["cart_item"])){
                        $total_quantity = 0;
                        $total_price = 0;
                    ?>	
                    <table class="tbl-cart" cellpadding="5" cellspacing="1">
                        <tbody>
                            <tr>
                                <th style="text-align:left;">Name</th>
                                <th style="text-align:left;" width="30%">Code</th>
                                <th style="text-align:right;" width="5%">Quantity</th>
                                <th style="text-align:right;" width="10%">Unit Price</th>
                                <th style="text-align:right;" width="10%">Price</th>
                                <th style="text-align:center;" width="5%">Remove</th>
                            </tr>	
                            <?php		                                       //shopping cart part
                        foreach ($_SESSION["cart_item"] as $item){
                            $item_price = $item["quantity"]*$item["price"];
                            ?>
                            <tr>
                                <td style="text-align:left;"><!--img src="<!--?php echo $item["image"]; ?>" class="cart-item-image" /--><?php echo $item["name"]; ?></td>
                                <td style="text-align:left;"><?php echo $item["code"]; ?></td>
                                <td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
                                <td style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
                                <td style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
                                <td style="text-align:center;"><a href="dashboard.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
                            </tr>
                            <?php
                            $total_quantity += $item["quantity"];
                            $total_price += ($item["price"]*$item["quantity"]);
                        }
                            ?>

                            <tr>
                                <td colspan="2" align="right">Total:</td>
                                <td align="right"><?php echo $total_quantity; ?></td>
                                <td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>		
                    <?php
                    } else {
                    ?>
                    <div id="myCart" class="no-records">Your Cart is Empty</div>
                    <?php 
                    }
                    ?>
                </div>
            </div>

            <div class="container">
                <div id="product-grid">    <!--menu part-->
                    <div class="txt-heading">Products</div>
                    <?php
                    $product_array = $db_handle->runQuery("SELECT * FROM tblproduct ORDER BY id ASC");
                    if (!empty($product_array)) { 
                        foreach($product_array as $key=>$value){
                    ?>
                    <div class="col-sm-4">
                        <div class="product-item">
                            <form method="post" action="dashboard.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">

                                <div class="product-image"><img src="<?php echo $product_array[$key]["image"]; ?>"></div> 
                                <div class="product-tile-footer">
                                    <div class="product-title"><?php echo $product_array[$key]["name"]; ?></div>
                                    <div class="product-price"><?php echo "$".$product_array[$key]["price"]; ?></div>
                                    <div class="cart-action">
                                        <input type="text" class="product-quantity" name="quantity" value="1" size="2"/>
                                        <input type="submit" value="Add to Cart" class="btnAddAction" />
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>

                    <?php
                        }
                    }
                    ?>



                </div>
            </div>
        </div>
    </body>
</html>
