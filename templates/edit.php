<?php
session_start();
require_once "pdo.php";

if(isset($_POST['cancel'])) // user submits CANCEL button
{
    header('Location: index.php');
    return;
}

if (isset($_POST['make']) && isset($_POST['model']) && isset($_POST['year']) && isset($_POST['mileage'])) 
{
    if (!is_numeric($_POST['year']) || !is_numeric($_POST['mileage']))
    {
        $_SESSION['error'] = 'Mileage and year must be numeric';
        header("Location: add.php");                 //redirects to add.php to update entry
        return;
    }

    elseif (strlen($_POST['make']) < 1) 
    {
        $_SESSION['error'] = 'Make is required';
        header("Location: add.php");                    //redirects to add.php to update entry
        return;
    }

    $sql = "UPDATE autos SET make = :make,
            model = :model, year = :year,mileage=:mileage
            WHERE auto_id = :auto_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
            ':make' => $_POST['make'],
            ':model' => $_POST['model'],
            ':year' => $_POST['year'],
            ':mileage' => $_POST['mileage'],
            ':auto_id' => $_GET['auto_id'])
    );
    $_SESSION['success'] = 'Record updated';
    header('Location: index.php');
    return;
}

if (!isset($_GET['auto_id'])) //If no id from index.php through GET request
{
    $_SESSION['error'] = "Missing auto_id";
    header('Location: index.php');
    return;
}

$stmt = $pdo->prepare("SELECT * FROM autos where auto_id = :xyz"); //to keep data already into input fields
$stmt->execute(array(":xyz" => $_GET['auto_id']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ($row === false)   //incorrect user id
{
    $_SESSION['error'] = 'Bad value for user_id';
    header('Location: index.php');
    return;
}

if (isset($_SESSION['error'])) 
{
    echo '<p style="color:red">' . $_SESSION['error'] . "</p>\n";
    unset($_SESSION['error']);
}
?>

<!DOCTYPE html>
<html>
<head>
    <?php require_once "bootstrap.php"; ?>
    <title>86d4303e</title>
</head>
<body>
<div class="container">
    <h1>Editing Automobile</h1>
    <form method="post">
        <p>Make<input type="text" name="make" size="40" value="<?php echo $row['make'] ?>"/></p>
        <p>Model<input type="text" name="model" size="40" value="<?php echo $row['model'] ?>"/></p>
        <p>Year<input type="text" name="year" size="10" value="<?php echo $row['year'] ?>"/></p>
        <p>Mileage<input type="text" name="mileage" size="10" value="<?php echo $row['mileage'] ?>"/></p>
        <input type="hidden" name="auto_id" value="0">
        <input type="submit" value="Save">
        <input type="submit" name="cancel" value="Cancel">
    </form>
    <p>
</div>
</body>
</html>