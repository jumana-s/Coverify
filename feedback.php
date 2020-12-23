<?php
session_start();
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (empty($_POST['fname'])) {
		$fnameError = 'First Name is empty';
    } 
    else {
		$fname = $_POST['fname'];
    }

    if (empty($_POST['lname'])) {
		$lnameError = 'Last Name is empty';
    } 
    else {
		$lname = $_POST['lname'];
    }
    
	if (empty($_POST['email'])) {
		$emailError = 'Email is empty';
	} else {
		$email = $_POST['email'];
	}

	if (empty($_POST['message'])) {
		$messageError = 'Message is empty';
	} else {
		$message = $_POST['message'];
    }

    if(empty($fnameError) && empty($lnameError) && empty($emailError) && empty($messageError)){
        $date = date('j, F Y h:i A');
        $emailBody = "
            <html>
            <head>
                <title>From Spotter</title>
            </head>
            <body style=\"background-color:#fafafa;\">
                <div style=\"padding:20px;\">
                    Sender: <span style=\"color:#888\">$fname $lname</span>
                    <br>
                    Date: <span style=\"color:#888\">$date</span>
                    <br>
                    Email: <span style=\"color:#888\">$email</span>
                    <br>
                    Message: <div style=\"color:#888\">$message</div>
                </div>
            </body>
            </html>
        ";
    
        $headers = 	'From: Contact Form <contact@mydomain.com>' . "\r\n" .
                "Reply-To: $email" . "\r\n" .
                "MIME-Version: 1.0\r\n" . 
                "Content-Type: text/html; charset=iso-8859-1\n";
                
                $to = 'salwam4@gmail.com';
                $subject = 'Message from Coverify';
    
        if(mail($to, $subject, $emailBody, $headers)){
            $sent =true;
        }
       
    }
}
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Feedback</title>
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
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">
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

        <form method="POST" action=""> 
            <div class="form-group">
                <label for="email">Email address</label>
                <input required type="email" class="form-control" id="email" name="email" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="fname">First Name</label>
                <input required type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name">
            </div>
            <div class="form-group">
                <label for="lname">Last Name</label>
                <input required type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name">
            </div>
            <div class="form-group">
                <label for="text">Body</label>
                <textarea required class="form-control" id="text" name="message" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Send</button>
        </form> 


  </body>
</html>
