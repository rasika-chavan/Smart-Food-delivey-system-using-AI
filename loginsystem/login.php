<?php
session_start();
require_once "pdo.php";
require_once "layout.php";

if (isset($_POST['cancel'])) 
{
    header("Location: index.php");
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
echo "<br>";
require_once "footer.php";
?>