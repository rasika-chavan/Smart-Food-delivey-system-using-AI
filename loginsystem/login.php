<?php
session_start();
require_once "pdo.php";
// require_once "layout.php";

if (isset($_POST['cancel'])) 
{
    header("Location: login.php");
    return;
}

$failure = false;  // If we have no POST data

if (isset($_POST['email']) && isset($_POST['pass'])) //submit preesed
{
    if (strlen($_POST['email']) < 1 || strlen($_POST['pass']) < 1) //empty fields
    {
        $_SESSION['error'] = "User name and password are required";
    } 
   
    else  //both fields filled
    {
        $username=$_POST['email'];
        $password=$_POST['pass'];
        $stmt = $pdo->query("SELECT make,year FROM autos where make='{$username}'");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (sizeof($rows) < 1)      //incorrect username
        {
            error_log("Login fail ".$_POST['email']);
            $_SESSION['error'] = "No User Found!";
        }
        else                        //correct username
        {
            if($rows[0]['year']==$_POST['pass'])   //password match
            {
                error_log("Login success ".$_POST['email']);
                $_SESSION['name'] = $_POST['email'];
                $_SESSION['success']="Login Successful";
                header("Location: index.php");
                return;
            }
            else                                    //password missmatch
            {
                error_log("Login fail ".$_POST['email']);
                $_SESSION['error'] = "Incorrect password";
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>

    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link rel="stylesheet" type="text/css" href="css/montserrat-font.css">
    <link rel="stylesheet" type="text/css"
        href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
        <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">


    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-red p-t-180 p-b-100 font-robo" style="background: -moz-linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,181,255,1) 100%);
background: -webkit-linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,181,255,1) 100%);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,181,255,1) 100%);">
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Log-in</h2>
                    <form method="POST">
                        <div class="row row-space">
                            <div class="col-2">
                            <?php
    if ( isset($_SESSION['error']) ) 
    {
        echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
        #uns($_SESSION['error']);
    }
    ?>
                                <div class="input-group">
                                    <input class="input--style-2"  type="text" name="Username" placeholder="Email address" 
                                       required>
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <input class="input--style-2" type="password" placeholder="Password" name="pass"
                            required>
	                      </div>
													
						<!-- <div class="checkbox">
						<input type="checkbox" name="remember" >
                        <label>Remember me!</label>
						 </div> -->
                        
						<div class="p-t-30">
						    <!-- <button class="btn btn--radius btn--green"  type="submit" value="Log In">Login</button>
						    <button class="btn btn--radius btn--green"  type="submit" name="cancel" value="Cancel">Cancel</button> -->
                            <input type="submit" value="Log In">
        <input type="submit" name="cancel" value="Cancel">

                        </div>
						<br>
                        <div class="forgot">
							<span class="forgot"><a href="forgotpassword.php?step1=1">Forgot password ?</a></span>
                            <span class="forgot"><a href="add.php">New, Create account.</a></span><br>
							<br>
                            
                        </div>
						
                    </form>
                </div>
            </div>
        </div>
    </div>

        <script src="vendor/jquery/jquery.min.js"></script>
    
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

       <script src="js/global.js"></script>

</body>
</html>
<!-- <!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>
<center>
<div class="container">
    <h1>Please Log In</h1>
    <?php
    if ( isset($_SESSION['error']) ) 
    {
        echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
        #uns($_SESSION['error']);
    }
    ?>
    <form method="POST" action="login.php">
        User Name <input type="text" name="email"><br/>
        Password <input type="password" name="pass"><br/>
        <input type="submit" value="Log In">
        <input type="submit" name="cancel" value="Cancel">
    </form>
    Don't Have an account? <a href="add.php">Sign Up Now</a></center>;
</center>
</div>
</body>
<?php
// echo "<br>";
// require_once "footer.php";
?>  -->