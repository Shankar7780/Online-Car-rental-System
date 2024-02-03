<?php include_once 'dbfun.php';?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental</title>    
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="css/fontawesome.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/owl.css">
    <link rel="stylesheet" href="css/all.css">
    

    <!-- Bootstrap core JavaScript -->
    <script src="js/jquery-3.4.1.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- Additional Scripts -->
    <script src="js/custom.js"></script>
    <script src="js/owl.js"></script>
    
</head>
<body>
    <!-- Header -->
    <header class="">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="/"><h2>Car <em>Rental</em></h2></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>

                        <li class="nav-item"><a class="nav-link" href="products.php">Cars</a></li>
                        <?php if(is_logged_in() && $_SESSION["role"]=="Customer")
                        { ?>
                        <li class="nav-item"><a class="nav-link" href="mybookings.php">My Bookings</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php">Hi <?= $_SESSION["uname"]?></a></li>
                        <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                        <?php }
                        else if(is_logged_in() && $_SESSION["role"]=="Driver"){ ?>
                        <li class="nav-item"><a class="nav-link" href="dbookings.php">My Bookings</a></li>
                        <li class="nav-item"><a class="nav-link" href="leaves.php">Leaves</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php">Hi <?= $_SESSION["uname"]?></a></li>
                        <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                       <?php }
                        else
                        { ?>
                        <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
                        <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                        <?php }?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    
