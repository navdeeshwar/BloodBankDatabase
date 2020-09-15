<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,700" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
          crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a0a577bb49.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/index.css">
    <title>Home</title>
</head>
<body>
<!-- navbar -->
<nav id="mainNavbar" class="navbar navbar-dark navbar-expand-md py-1 fixed-top">
    <section class="container">
        <!-- brand name -->
        <a href="#" class="navbar-brand"><i class="fas fa-heart"></i>BloodBank</a>
        <!-- brand name -->
        <!-- toggle navbar -->
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navLinks" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- collapse navbar -->
        <div class="collapse navbar-collapse" id="navLinks">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="#" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="about.php" class="nav-link">About</a>
                </li>
                <li class="nav-item">
                    <a href="open_search.php" class="nav-link">Search</a>
                </li>



            </ul>

            <ul class="navbar-nav ml-auto mr-3">
                <li>
                    <a href="login.php" class="nav-link btn btn-outline-info text-info"><i class="fas fa-user-plus"></i>Login</a>
                </li>
                </ul>

                <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle nav-link btn btn-outline-info text-info" data-toggle="dropdown"><i class="fa fa-user-plus"></i>Register<b class="caret"></b></a>
                    <ul class="dropdown-menu  ml-auto mr-3">
                        <li>
                            <a href="user_reg.php"><i class="fa fa-fw fa-user"></i>Personal</a>
                        </li>
                        <li class="divider"></li>

                        <li>
                            <a href="org_res.php"><i class="fa fa-building-o" aria-hidden="true"></i> Organisation</a>
                        </li>
                        
                    </ul>
                </li>
           
            </ul>
        </div>
    </section>
</nav>

<!-- jumbotron -->

<section id="main_page_jumbotron" class="container-fluid mt-5 px-0 " >
    <div class="jumbotron">


        <div id="jumbo_text"><h1 class="college display-1">World <i class="fas fa-tint"></i>BloodBank Organisation</h1>
<!--            <h1 class="college display-3">BloodBank</h1>-->

        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>


</body>
</html>
