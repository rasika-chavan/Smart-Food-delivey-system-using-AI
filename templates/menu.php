<?php
session_start();
require_once "pdo.php";
require_once "layout.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
    <style>
        * {
            box-sizing: border-box;
        }
        
        .column {
            float: left;
            width: 33.33%;
            padding: 0;
            position: relative;
            text-align: center;
            color: white;
        }
        /* Clearfix (clear floats) */
        
        .row::after {
            content: "";
            clear: both;
            display: table;
        }
        /* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
        
        @media screen and (max-width: 650px) {
            .column {
                width: 100%;
            }
        }
        
        .img-container {
            background-color: black;
        }
        
        .img-container img {
            opacity: 0.7;
        }
        
        .centered {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .center {
            position: absolute;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .left {
            position: absolute;
            top: 40%;
            left: 30%;
            transform: translate(-50%, -50%);
        }
        .right {
            position: absolute;
            top: 40%;
            left: 60%;
            transform: translate(-50%, -50%);
        }
        .mytext
        {
            color:white;
        }
    </style>
    
    <body>
    <div class="row">
        <div class="column img-container">
            <a href="{{ url_for('categorypage', catname='indian')}}"><img src="{{ url_for('static', filename='indian2.jpg') }}" alt="Indian" style="width:100%;"></a>
            <div class="centered">
                <h1 class="mytext">INDIAN</h1>
            </div>
        </div>
        <div class="column img-container">
            <a href="{{ url_for('categorypage', catname='cake n pastries')}}"><img src="{{ url_for('static', filename='cake2.jpg') }}" alt="Cake" style="width:100%"></a>
            <div class="centered">
                <h2 class="mytext">CAKES AND PASTRIES</h2>
            </div>
        </div>
        <div class="column img-container">
            <a href="{{ url_for('categorypage', catname='chinese')}}"><img src="{{ url_for('static', filename='chinese2.jpg') }}" alt="Chinese" style="width:100%"></a>
            <div class="centered">
                <h1 class="mytext">CHINESE</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="column img-container">
            <a href="{{ url_for('categorypage', catname='fast food')}}"><img src="{{ url_for('static', filename='fastfood3.jpg') }}" alt="fastfood" style="width:100%"></a>
            <div class="right">
                <h1 class="mytext">FAST FOOD</h1>
            </div>
        </div>
        <div class="column img-container">
            <a href="{{ url_for('categorypage', catname='ice-cream and beverages')}}"><img src="{{ url_for('static', filename='ice2.jpg') }}" alt="icecream" style="width:100%"></a>
            <div class="center">
                <h2 class="mytext">ICE-CREAM AND BEVERAGES</h2>
            </div>
        </div>
        <div class="column img-container">
            <a href="{{ url_for('categorypage', catname='italian')}}"><img src="{{ url_for('static', filename='italian3.jpg') }}" alt="italian" style="width:100%"></a>
            <div class="left">
                <h1 class="mytext">ITALIAN</h1>
            </div>
        </div>
    </div>
</body>
<?php
echo "<br>";
require_once "footer.php";
?>