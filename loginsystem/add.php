<?php
session_start();
require_once "pdo.php";
require_once "layout.php";
if(isset($_POST['cancel'])) // user submits CANCEL button
{
    header('Location: index.php');
    return;
}

else if(isset($_POST['add'])) // user submits ADD button
{
    if (strlen($_POST['make']) < 1 || strlen($_POST['model']) < 1 || strlen($_POST['year']) < 1 || strlen($_POST['mileage']) < 1) 
    //any field blank
    {
        $_SESSION['error'] = 'All values are required';
        header("Location: add.php");
        return;
    } 

    else if (preg_match('#@#',$_POST['model'])==false)
    //email contains @ or not
    {
        $_SESSION['error'] = "Email Must contain @";
        header("Location: add.php");
        return;
    }

    else if (strlen($_POST['year'])<6)
    //Password constraints min 8 letters
    {
        $_SESSION['error'] = 'Password must contain minimum 8 letters';
        header("Location: add.php");
        return;
    }
  
    else if (preg_match('#[0-9]#',$_POST['year'])==false)
    //Password constraints
    {
        $_SESSION['error'] = 'Password must contain at least one numeric character';
        header("Location: add.php");
        return;
    }

    else if ($_POST['year']!=$_POST['mileage'])
    //Confirm password does not match with original password
    {
        $_SESSION['error'] = 'Password mismatch!';
        header("Location: add.php");
        return;
    }
    
    else //input is correct
    {
        $stmt = $pdo->prepare('INSERT INTO autos (make, model, year, mileage) VALUES ( :make, :model, :year, :mileage)');
        $stmt->execute(array(
                ':make' => $_POST['make'],
                ':model' => $_POST['model'],
                ':year' => $_POST['year'],
                ':mileage' => $_POST['mileage'])
        );
        $_SESSION['success'] = "You have registered sucessfully, Now you can Log in!.";
        header("Location: login.php");
        return;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
</head>
<body>
<center>
<div class="container">
    <h1>SIGN UP</h1>
    <?php
    if (isset($_SESSION['error'])) 
    {
        echo('<p style="color: red;">' . htmlentities($_SESSION['error']) . "</p>\n");
        unset($_SESSION['error']);
    }
    ?>

    <form method="post">
        <p>Name:
        <input type="text" name="make" size="40"/></p>

        <p>Email:
        <input type="text" name="model" size="40"/></p>

        <p>Password:
        <input type="password" name="year" size="40"/></p>

        <p>Confirm Password:
        <input type="password" name="mileage" size="40"/></p>
        <input type="submit" name="add" value="Sign Up">
        <input type="submit" name="cancel" value="Cancel">
        <!--Values can't feed in POST array unless input type is "submit"-->
    </form>
    <br><br>
</div>
Already Have an account? <a href="login.php">Log in here</a></center>
</body>
</html>
<?php
echo "<br>";
require_once "footer.php";
?>