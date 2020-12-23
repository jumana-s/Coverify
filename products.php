<?php
    require_once 'database.php';
    session_start();
    if (!isset($_SESSION['id'])) {
        header("Location: login.php");
        exit();
    }
?>

<html>
    <head>
        <title>Products</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/2c22c0073d.js" crossorigin="anonymous"></script>
    </head>
   
    <body>
        <?php
            if (isset($_SESSION['error'])) {
                echo "<a style='color: red'>{$_SESSION['error']}</a>";
                echo '<br><br>';
                unset($_SESSION['error']); // clear the error in the $_SESSION array
            }
        ?>

        <!-- Navagation bar -->
        <nav class="navbar navbar-expand-md navbar-light bg-light">
            <a class="navbar-brand" href="#">Coverify</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">
                            <i class="fas fa-home"></i> Home
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">
                            <i class="fas fa-tablet"></i> Products
                        </a>
                    </li>
                    <li class="nav-item">           
                        <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart" aria-hidden="true"></i> Cart</a>                    </li>
                    <li class="nav-item">           
                        <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt" aria-hidden="true"></i> Logout</a>                    </li>
                </ul>
            </div>
        </nav>

        <div class="row">
            <?php
                $result = $connection->query("SELECT * FROM Product WHERE 1");

                while($row = $result->fetch_assoc()) {
                    echo '<div class="card col-lg-4 col-md-4 col-sm-6 col-12">';
                    echo '<img src="'.$row["photoUrl"].'" class="card-img-top">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">'.$row["type"].' '.$row["name"].' Cover</h5>';
                    echo '<p class="card-text">$'.$row["price"].'</p>';    
                    echo '<form class="form-row align-items-center" method="POST" action="addCart.php">';
                    echo '<input type="number" class="form-control col-lg-2 col-md-2 col-sm-2 col-2 mr-2" min="1" value="1" name="quantity">';
                    echo '<input type="hidden" name="product_id" value="'.$row["id"].'">';
                    echo '<button type="submit" class="btn btn-primary">Add to cart</button>';
                    echo '</form>';                
                    echo '</div>';
                    echo '</div>';
                }

            ?>
        </div>


    </body>

</html>
