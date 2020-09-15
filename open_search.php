<?php
session_start();





    include("dbconnect.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
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
    <style>
    .card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 15%;
  border-radius: 5px;
  margin :20px;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

img {
  border-radius: 5px 5px 0 0;
}

.container {
  padding: 2px 16px;
}
.container-disp {
    display: flex;
  flex-wrap: wrap;
  overflow-x: hidden;
}
#about_heading {
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
        .alert{
            margin-top:10px;
            margin-left:790px;
            height:60px;width:280px;

        }



        /* end */
    </style>


    <title>Register</title>
</head>
<body>
<section id="register_jumbotron" class="jumbotron text-light py-2">
    <div class="col-2 pl-0">
        <a href="index.php" class="previous btn btn-outline-light">&laquo; Back</a>
    </div>

    <div class="col-lg-12">
        <h1 class="display-3 text-center text-light">Search</h1>
    </div>
</section><center>
 <form  method="post" action=""  id="searchform">
	      <input  type="text" name="bloodgroup">
     <input  type="submit" name="submit" value="Search">
	    </form>
                        <section class="container-disp">
                        <?php
                        $bg = null;
                        if(isset($_POST['submit'])){
                            $bg=$_POST['bloodgroup'];
                            $bg=strtoupper($bg);

                            $patterns[0] = '/[+]/';
                            $patterns[1] = '/-/';
                            $replacements[0] = 'p';
                            $replacements[1] = 'm';
                            $bg= preg_replace($patterns, $replacements, $bg);
                        }
                        $query = "select * from Users where Users.BloodGroup='$bg'";
                        $result = mysqli_query($conn, $query);
                        if (!$result) {
                        echo "nip";

    }
                      $query1 = "select * From Org join OrgBlood on Org.id=OrgBlood.id where $bg>1";
    $result1 = mysqli_query($conn, $query1);
    if (!$result1) {
        if(isset($_POST['submit'])){
            echo '<div class="alert alert-danger center ">
                    <p class="center">Inavalid Input</p>
                </div>';}

}
            while ($disp = mysqli_fetch_assoc($result)) {
                $patterns[0] = '+';
                $patterns[1] = '-';
                $replacements[0] = '/p/';
                $replacements[1] = '/m/';
                 $bg= preg_replace( $replacements,$patterns, $bg);

                echo '<div class="card">';
                if($disp['Gender']=="Female")
                echo '<img src="images/img_avatar2.png" alt="Avatar" style="width:100%">';
                else
                echo '<img src="images/img_avatar.png" alt="Avatar" style="width:100%">';

                echo '<div class="container">
                  <h4><b>',$disp['Name'],'</b></h4> <p>',$bg,'</p> <p>',$disp['Mobile'],'</p>
                </div>
              </div><br>';
            }
            while ($disp1 = mysqli_fetch_assoc($result1)) {


                echo '<div class="card col-6-sm">';
                echo '<img src="images/img_avatar3.png" alt="Avatar" style="width:100%">';
                echo '<div class="container">
                  <h4><b>',$disp1['Name'],'</b></h4> <p>',$disp1['Mobile'],'</p> <p>',$disp1['Email'],'</p>
                </div>
              </div><br>';
            }
            ?></section></center>
</div>
</div>
</body>

</html>
