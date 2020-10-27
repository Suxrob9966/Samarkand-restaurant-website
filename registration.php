<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Registration</title>
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body>
        <!--?php   //*******OLD CODES********//
require('db.php');

if (isset($_REQUEST['username'])){                      
// removes backslashes
$username = stripslashes($_REQUEST['username']);
//escapes special characters in a string
$username = mysqli_real_escape_string($con,$username); 
$email = stripslashes($_REQUEST['email']);
$email = mysqli_real_escape_string($con,$email);
$password = stripslashes($_REQUEST['password']);
$password = mysqli_real_escape_string($con,$password);
$trn_date = date("Y-m-d H:i:s");
$query = "INSERT into `users` (username, password, email, trn_date)
VALUES ('$username', '".md5($password)."', '$email', '$trn_date')";
$result = mysqli_query($con,$query);
if($result){
echo "<div class='form'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
}
}else{
?>
<div class="form">
<h1>Registration</h1>
<form name="registration" action="" method="post">
<input type="text" name="username" placeholder="Username" required />
<input type="email" name="email" placeholder="Email" required />
<input type="password" name="password" placeholder="Password" required />
<input type="submit" name="submit" value="Register" />
</form>
</div>
<!--?php } ?-->

        <?php
        require('db.php');
        // define variables and set to empty values
        $usernameErr = $emailErr = $passErr = "";
        $username = $email = $pass = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {    
            $username = test_input($_POST["username"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
                $usernameErr = "Only letters and white space allowed";
            }
            else{
                $email = test_input($_POST["email"]);
                // check if e-mail address is well-formed
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Invalid email format";
                }
                else{
                    $pass = test_input($_POST["password"]);
                    // check if e-mail address is well-formed
                    if (strlen($pass)<4) {
                        $passErr = "Not less than 4 characters";

                    }
                    else{
                        $trn_date = date("Y-m-d H:i:s");
                        $query = "SELECT * FROM `users` WHERE username='$username' OR email= '$email'";
                        $result = mysqli_query($con,$query) or die(mysql_error());
                        $rows = mysqli_num_rows($result);

                        if($rows==1){
                            echo "Username already exists!";
                        }
                        else{
                            $query1 = "INSERT into `users` (username, password, email, trn_date)
                                VALUES ('$username', '".md5($pass)."', '$email', '$trn_date')";
                            $result1 = mysqli_query($con,$query1);
                            if($result1){
                                echo "<div class='form'>
                                    <h3>You are registered successfully.</h3>
                                    <!--br/>Click here to <a href='login.php'>Login</a></div-->";
                            }
                        }
                    }
                }
            }
        }


        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        ?>

        <div class="form">
            <h1>Registration</h1>
            <form name="registration" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <input type="text" name="username" placeholder="Username" required /><br><small style="color: red;"><?php echo $usernameErr;?></small>
                <input type="email" name="email" placeholder="Email" required /><br><small style="color: red;"><?php echo $emailErr;?></small>
                <input type="password" name="password" placeholder="Password" required /><br><small style="color: red;"><?php echo $passErr;?></small>
                <br>
                <input type="submit" name="submit" value="Register"/>
                <input type="reset" name="cancel" value="Cancel"/>
            </form>
            <h4>Click <a href="login.php">here</a> to return to login page!</h4>
        </div>


    </body>
</html>