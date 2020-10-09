<?php
session_start();
require_once "pdo.php";

?>
<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2>Table</h2>

<table>
  <tr>
    <th>Username</th>
    <th>Email Address</th>
  </tr>
<?php
try {
    

    $sql = 'SELECT *
               FROM autos
            ';

    $q = $pdo->query($sql);
    while ($row = $q->fetch(PDO::FETCH_NUM)) {
        echo "<tr>";
        echo"<td>";
        echo $row[1]."</td>";
        echo"<td>";
        echo $row[4]."</td>";
        echo "</tr>";
        }
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
?>
  
</table>

</body>
</html>