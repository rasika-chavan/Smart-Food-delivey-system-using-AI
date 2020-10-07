<?php 
session_start();
require_once "pdo.php";
require_once "layout.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>About Us</title>
</head>
<body>
<div class="container" style="min-height: 100vh;">
    <div class="content-section mr-5 ml-5 mt-5 mb-5" width="35%">
        <div class="row mr-5 ml-5 mt-5 mb-5">
            <div class="col-8">
                <h2 class="title">About Us</h2>
                <p>Foodscape.com is a food delivery system that act as connection between Restrurants and Customers.</p>
                <br><h4 class="abc">Our Aims:</h4> 
                (1)To give food delivery service to customers at their doorstep for those who are unable to cook food due to their busy routine and to fulfill their cravings.
                <br>(2)To give platforms to Restrurants for extending their business and to serve their customers better.
                <br>(3)To provide employement to many Delivery boys for serving you in a better way.<br>

                <br>
                <h4 class="abc">Our Developer Team:</h4>  
                Rasika Chavan
                <br>Rasika Gawande
                <br>Disha Lekurwale
                <br>Neha Bharsat</p>
            </div>
            <div class="col-4">
                <h2 class="title">Contact Us</h2>
                <p>Have a problem? We're happy to serve you 24x7!</p> 
                Just drop a mail at <span style="color:blue">help@foodscape.com</span>
                <br>Don't Hesitate to contact us for any food delivery service related query.
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php
echo "<br>";
require_once "footer.php";
?>