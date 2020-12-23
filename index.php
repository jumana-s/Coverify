<?php
session_start();
?>

<!DOCTYPE html>
<html>

    <head>
        <title>Main Page</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/2c22c0073d.js" crossorigin="anonymous"></script>
    </head>
   
    <body>
        <!-- Navagation bar -->
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Coverify</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">
                            <i class="fas fa-home"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="products.php">
                            <i class="fas fa-tablet"></i> Products
                        </a>
                    </li>
                    <li class="nav-item">           
                        <?php
                            // if the user is logged in we show the logout button, else we show the login buttons.
                            if (isset($_SESSION['id'])) {
                                echo '<a class="nav-link" href="cart.php">';
                                echo '<i class="fas fa-shopping-cart"></i> Cart';
                                echo '</a>';
                            } else {
                                echo '<a class="nav-link" href="register.php">';
                                echo '<i class="fas fa-registered"></i> Register';
                                echo '</a>';
                            }
                            ?>
                    </li>
                    <li class="nav-item">           
                        <?php
                            // if the user is logged in we show the logout button, else we show the login buttons.
                            if (isset($_SESSION['id'])) {
                                echo '<a class="nav-link" href="logout.php">';
                                echo '<i class="fas fa-sign-out-alt"></i> Logout';
                                echo '</a>';
                            } else {
                                echo '<a class="nav-link" href="login.php">';
                                echo '<i class="fas fa-sign-in-alt"></i> Login';
                                echo '</a>';
                            }
                            ?>
                    </li>
                    
                </ul>
            </div>
        </nav>
		<div class="row">
        	<div class="jumbotron col-lg-6 col-md-4 col-sm-12 col-12 text-white bg-secondary" style="margin-bottom: 0px;">
                <h1 class="display-4">Coverify</h1>
                <p class="lead">Coverify – Design of Tomorrow</p>
                <hr class="my-4">
                <p>Custom cover tablets.</p>
                <p class="lead">
                    <a class="btn btn-primary btn-lg" href="products.php" role="button">Products</a>
                </p>
            </div>

            <div id="carouselExampleIndicators" class="carousel slide col-lg-6 col-md-8 col-sm-12 col-12" data-ride="carousel">
                <ol class="carousel-indicators ">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="bg-dark" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1" class="bg-dark"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2" class="bg-dark"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="3" class="bg-dark"></li>
                </ol>
                <div class="carousel-inner">
                    
                    <div class="carousel-item active">
                        <img class="d-block img-fluid m-auto" src="http://moham12y.myweb.cs.uwindsor.ca/project/images/1.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid m-auto" src="http://moham12y.myweb.cs.uwindsor.ca/project/images/2.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid m-auto" src="http://moham12y.myweb.cs.uwindsor.ca/project/images/3.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid m-auto" src="http://moham12y.myweb.cs.uwindsor.ca/project/images/4.jpg" alt="Fourth slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true" style="-webkit-filter: invert(100%); filter: invert(100%);"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true" style="-webkit-filter: invert(100%); filter: invert(100%);"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

		<footer class="bg-dark text-center text-lg-start">
          <!-- Copyright -->
          <div class="text-center p-3">
            <a class="text-white" href="feedback.php"> Feedback Form</a>
          </div>
          <!-- Copyright -->
      </footer>
    </body>

</html>