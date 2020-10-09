<?php
session_start();
require_once "pdo.php";
require_once "layout.php";

// if clicked on Cancel
if (isset($_POST['cancel'])) 
{
    header("Location: index.php");
    return;
}
// if clicked on Remember Me
if(!empty($_POST["remember"])) {
	setcookie ("username",$_POST["username"],time()+ 3600);
	setcookie ("password",$_POST["password"],time()+ 3600);
	echo "Cookies Set Successfuly";
} else {
	setcookie("username","");
	setcookie("password","");
}
$failure = false;  // If we have no POST data

if (isset($_POST['username']) && isset($_POST['password'])) //submit preesed
{
    if (strlen($_POST['username']) < 1 || strlen($_POST['password']) < 1) //empty fields
    {
        $_SESSION['error'] = "User name and password are required";
    } 
   
    else  //both fields filled
    {
        $username=$_POST['username'];
        $password=$_POST['password'];
        $stmt = $pdo->query("SELECT make,year FROM autos where make='{$username}'");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (sizeof($rows) < 1)      //incorrect username
        {
            error_log("Login fail ".$_POST['username']);
            $_SESSION['error'] = "No User Found!";
        }
        else                        //correct username
        {
            if($rows[0]['year']==$_POST['password'])   //password match
            {
                error_log("Login success ".$_POST['username']);
                $_SESSION['name'] = $_POST['username'];
                $_SESSION['success']="Login Successful";
                header("Location: index.php");
                return;
            }
            else                                    //password missmatch
            {
                error_log("Login fail ".$_POST['username']);
                $_SESSION['error'] = "Incorrect password";
            }
        }
    }
}

?>
<!DOCTYPE html>
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
        User Name <input type="text" name="username" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>"><br/>
        Password <input type="password" name="password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>"><br/>
        <input type="checkbox" name="remember" /> Remember me
        <br>
        <input type="submit" value="Log In">
        <input type="submit" name="cancel" value="Cancel">
    </form>
    Don't Have an account? <a href="add.php">Sign Up Now</a></center>;
</center>
</div>
</body>
<?php
echo "<br>";
require_once "footer.php";
?>
