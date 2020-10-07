<?php
session_start();
require_once "pdo.php";
if (!isset($_SESSION['success'])) 
{
    die('ACCESS DENIED');
}

else if (!isset($_GET['auto_id']) ) //if auto id not retrieved from table
{
    $_SESSION['error'] = "Missing user_id";
    header('Location: index.php');
    return;
}

else if ( isset($_POST['delete']) && isset($_GET['auto_id']) ) //correct auto id retrived and DELETE button pressed 
{
    $stmt = $pdo->prepare('DELETE FROM autos WHERE auto_id=:zip');
    $stmt->execute(array(':zip' => $_GET['auto_id'],));
    $_SESSION['success'] = 'Record deleted';
    header( 'Location: index.php' ) ;
    return;
}

else // Retrieve data from table whose id is retrieved from GET request(Compulsory process)
{
    $stmt = $pdo->prepare("SELECT make FROM autos where auto_id = :xyz");
    $stmt->execute(array(":xyz" => $_GET['auto_id']));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ( $row === false ) // if id is wrong
    {
        $_SESSION['error'] = 'Bad value for user_id';
        header('Location: index.php');
        return;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>86d4303e</title>
    <?php require_once "bootstrap.php"; ?>
</head>
<body>
<div class="container">
    <p>Confirm: Deleting <?php echo $row['make'] ?></p>  <!--Confirm to delete-->
    <form method="post">
    <input type="hidden" name="auto_id" value="<?php echo $_GET['autos_id'] ?>"> 
    <input type="submit" value="Delete" name="delete">   <!--Submit button of hidden form-->
    <a href="index.php">Cancel</a>                       <!--Link to homepage if cancel pressed-->
    </form>
</div>
</body>