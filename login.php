<?php
session_start();



if(isset($_SESSION['user'])){
    echo "hello";
    header("location:./main.php");
    
}
if (isset($_POST['Submit'])) {
    $type=$_POST['type'];
    $Email = $_POST['Email'];
    $password = $_POST['Password'];

    include("dbconnect.php");
    if($type=="User"){
    $query = "select * from Users where Users.Email='$Email'";}
    else
    $query = "select * from Org where Org.Email='$Email'";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        echo "nip";
    }
    while ($disp = mysqli_fetch_assoc($result)) {

        $username = preg_split("/@/", $disp['Email']);
        $username = $username[0];
        $hashed_password=$disp['Password'];
        
        echo $_SESSION['user'] = $username;
        if(password_verify($_POST["Password"],$hashed_password))
        {
            if($type=="User"){
            header("location:./main.php");}
            else
            header("location:./org_main.php");
        }
        
        else 
        $disp=NULL;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <style>#about_heading {
            background: #cdf7e8;
            color: #014a3a;
        }

        /* css for register page */
        #register_form {
            margin-top: 10%;
            padding-left: 0%;
            padding-right: 0%;
        }

        #register_form .myForm input {
            border-color: #b8b894;
        }

        #register_image {
            margin-top: 2%;
            height: 10em;
            width: 12em;
        }

        #register_jumbotron {
            font-family: "Nunito", sans-serif;
            background: #152f59;
        }

        #register_jumbotron h1 {
            font-weight: 100;
            padding-top: 0.2em;
            margin-bottom: auto;
        }
        .cont {
            display: block-inline;
            position:relative;
            padding-left: 35px;
            margin-bottom: 12px;
            cursor: pointer;
            font-size: 22px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        /* Hide the browser's default radio button */
        .cont input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }

        /* Create a custom radio button */
        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 25px;
            width: 25px;
            background-color: #eee;
            border-radius: 50%;
        }

        /* On mouse-over, add a grey background color */
        .cont:hover input ~ .checkmark {
            background-color: #ccc;
        }

        /* When the radio button is checked, add a blue background */
        .cont input:checked ~ .checkmark {
            background-color: #2196F3;
        }

        /* Create the indicator (the dot/circle - hidden when not checked) */
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        /* Show the indicator (dot/circle) when checked */
        .cont input:checked ~ .checkmark:after {
            display: block;
        }

        /* Style the indicator (dot/circle) */
        .cont .checkmark:after {
            top: 9px;
            left: 9px;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: white;
        }

        /* end */
    </style>
    <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,700"
            rel="stylesheet"
    />
    <!-- Bootstrap CSS -->
    <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
            integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
            crossorigin="anonymous"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/a0a577bb49.js"
            crossorigin="anonymous"> ;
    </script>

    <title>Register</title>
</head>
<body>
<section id="register_jumbotron" class="jumbotron text-light py-2">
    <div class="col-2 pl-0">
        <a href="index.php" class="previous btn btn-outline-light">&laquo; Back</a>
    </div>

    <div class="col-lg-12">
        <h1 class="display-3 text-center text-light">LOGIN</h1>
    </div>
</section>

<div id="register_form" class="container mt-5">
    <div class="row justify-content-center" style="margin-top: 10%;">
        <div
                class="col-4 border border-dark rounded px-0 shadow-sm"
                style="padding:40px;">
            <!-- <div class="border-bottom border-success pt-2 ">
               <p class="text-success text-center">Please insert your information below.</p>

               </div> -->
            <?php
            if(isset($_POST['Submit'])){
            if(!$disp){
                echo '<div class="alert alert-danger ">
                <h6 class="text-center">Wrong Email or Password</h6>
            </div>';
            }}
            ?>

            <div class="alert alert-info ">
                <h6 class="text-center">ENTER YOUR INFO. HERE</h6>
            </div>

            <div id="register_image"  class="container d-flex justify-content-center mb-0">
                <img
                        class="img-fluid"
                        src="https://qph.fs.quoracdn.net/main-qimg-4ddff6af413765b68e7f0cfa93e3bb37"
                        alt=""
                />
            </div>
            <form class="myForm px-3" method="post">

                <div class="form-group">
                    <hr>
                    <label class="cont checkbox-inline">Personal
                        <input type="radio" checked="checked" name="type" value="User">
                        <a class="checkmark"></a>
                    </label>&emsp;&emsp;&emsp;&emsp;
                    <label class="cont checkbox-inline">Organisation
                        <input type="radio" name="type" value="Org">
                        <a class="checkmark"></a>
                    </label><br>

                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" name="Email" class="form-control" id="exampleInputEmail1"
                           aria-describedby="emailHelp" placeholder="Email">
                    <small id="emailHelp" class="form-text text-muted">Example:example@site.com
                    </small>
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" name="Password" class="form-control" id="exampleInputEmail1"
                           aria-describedby="emailHelp" placeholder="Password">


                </div>
                <input type="submit" name="Submit" class="btn btn-primary">
        </div>
        </form>
    </div>
</div>
</div>
</body>

</html>