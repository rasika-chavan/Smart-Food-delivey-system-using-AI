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
	<meta charset="utf-8">
	<title>Sign Up</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="css/montserrat-font.css">
	<link rel="stylesheet" type="text/css"
		href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
	<!-- Main Style Css -->
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/stylenavbar.css">
    <script src="css/navbar.js"></script>
</head>
<body class="form-v10" >
	<div class="page-content" style="background: -moz-linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,181,255,1) 100%);
background: -webkit-linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,181,255,1) 100%);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,181,255,1) 100%);">
		<div class="form-v10-content">
			<form class="form-detail" method="post" enctype="multipart/form-data">
				<div class="form-right">
                    <h2>SIGN UP</h2>
                    <?php
                        if (isset($_SESSION['error'])) 
                        {
                            echo('<p style="color: red; position:relative; left:50px; top:10px;">' . htmlentities($_SESSION['error']) . "</p>\n");
                            unset($_SESSION['error']);
                        }
                    ?>			
					<div class="form-row">
						<input type="text" name="make" class="contactno" id="no" placeholder="Username">
					</div>
					<div class="form-row">
						<input type="text" name="model" id="your_email" class="input-text"   
							pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" placeholder="Your Email">
					</div>
					<div class="form-row">
						<input type="password" name="year" class="password" id="password" placeholder="Enter Password"   >
					</div>
					<div class="form-row">
						<input type="password" name="mileage" class="answer" id="password" placeholder="Re-Enter Password">
					</div>
					<div class="form-row-last">
						<input type="submit" name="add" class="register" value="Register">
                        <input type="submit" name="cancel" class="register" value="Cancel">
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>
<?php
require_once "footer.php";
?> 