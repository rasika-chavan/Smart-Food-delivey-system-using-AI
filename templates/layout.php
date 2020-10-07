<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="main.css">
    <link rel="stylesheet" type="text/css" href="{{ url_for('static', filename='pdesp.css') }}">
    <title>Home</title>
    <style>
      /* Make the image fully responsive */
      .carousel-inner img {
          width: 100%;
          height: 100%;
      }
      @font-face {
        font-family: "LEFTOVER";                     /*any name*/
        src: url("../static/LoveYaLikeASister.TTF");
      }
      .title{
        font-family: "LEFTOVER";
      }
      @font-face {
        font-family: "product";                     /*any name*/
        src: url("../static/PictorialSignature.TTF");
      }
      .myproduct{
        font-family: "product";
      }
      @font-face {
        font-family: "abc";                     /*any name*/
        src: url("../static/Chilanka-regular.TTF");
      }
      .abc{
        font-family: "abc";
      }
      .text      {
        text-align: left;
      }
      </style>
</head>
<body>
    
<nav class="navbar navbar-expand-sm bg-steel navbar-dark fixed-top" >
  
  <!-- Links -->
  <header class="site-header" >
    <nav class="navbar navbar-expand-md navbar-dark bg-steel fixed-top" style="background-color:rgb(26,23,44);">
      <div class="container" float: left; >
        <a class="navbar-brand" href="#">
          <img src="mylogo.jpeg" height="45px" width="250px" float: left;>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggle" aria-controls="navbarToggle" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarToggle">
          <div class="navbar-nav mr-auto">
            <a class="nav-item nav-link" href="index.php">Home</a>
            <a class="nav-item nav-link" href="about.php">About Us</a>
          </div>
         <!--<form class="form-inline ml-auto" action="{{ url_for('search') }}" method="post" name="search">
            <div class="md-form my-0">
            {{ g.search_form.hidden_tag() }}{{ g.search_form.search(class="form-control", placeholder="Search for an item") }}</div>
          <input type="submit" value="Search" class="btn btn-outline-white btn-md my-0 ml-sm-2" style="color: white;"></form>-->

          <!-- Navbar Right Side -->
          <div class="navbar-nav">
            <a class="nav-item nav-link" href='menu.php'>MENU    </a>
            <?php
            if (isset($_SESSION['success']))
            {
                echo "<a class='nav-item nav-link' href='cart.php'>Cart</a>";
                echo "<a class='nav-item nav-link' href='orders.php'>Your Orders</a>";
                echo "<a class='nav-item nav-link' href='account.php'>Account</a>";
                echo "<a class='nav-item nav-link' href='logout.php'>Logout</a>";
            }
            else
            {
                echo "<a class='nav-item nav-link' href='login.php'>Login</a>";
                echo "<a class='nav-item nav-link' href='add.php'>Sign Up</a>";
            }
            ?>
          </div>
        </div>
      </div>
    </nav>
  </header>
  </nav>
  <br><br><br><br>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
</body>
</html>