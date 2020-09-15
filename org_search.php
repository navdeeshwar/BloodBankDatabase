
<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

session_start();
if(!isset($_SESSION['user'])){
    header("location:./index.php");

}

include("dbconnect.php");

$user=$_SESSION['user'];





?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Bootstrap Core CSS -->

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/names.css" rel="stylesheet">



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 20%;
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

</style>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href="org_main.php">Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-user"></i> <?php echo $user;?> </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php" ><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                <li>
                        <a href="org_charts.php"><i class="fa fa-fw fa-bar-chart-o"></i>Charts</a>
                    </li>

                    <li>
                        <a href="org_search.php"><i class="fa fa-fw fa-edit"></i> Search</a>
                    </li>

                    <li>
                    <li>
                                <a href="edit.php">Details</a>
                            </li>

                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Bloodbank
                            <small>Info</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="search.php">Search</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file">Welcome</i>
                            </li>
                        </ol>
                     <center>   <form  method="post" action=""  id="searchform">
	      <input  type="text" name="bloodgroup">
     <input  type="submit" name="submit" value="Search">
	    </form> </center>
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

                      $query1 = "select $bg From Org join OrgBlood on Org.id=OrgBlood.id where $bg>1";
    $result1 = mysqli_query($conn, $query1);
    if (!$result1) {

        if(isset($_POST['submit'])){
        echo '<div class="alert alert-danger ">
                <p class="center">Inavalid Input</p>
            </div>';}


}

            $data = null;
            while ($disp1 = mysqli_fetch_assoc($result1)) {

                $data=$disp1;

            }if($data){
                $patterns[0] = '+';
                $patterns[1] = '-';
                $replacements[0] = '/p/';
                $replacements[1] = '/m/';
                 $bg= preg_replace( $replacements,$patterns, $bg);
            echo '<div class="card">';
                echo '<img src="images/img_avatar3.png" alt="Avatar" style="width:100%">';
                echo '<div class="container">
                  <h4><b>',$bg,':';
                  $patterns[0] = '/[+]/';
                            $patterns[1] = '/-/';
                            $replacements[0] = 'p';
                            $replacements[1] = 'm';
                            $bg= preg_replace($patterns, $replacements, $bg);
                  echo $data[$bg],'</h4>
                </div>
              </div><br>';}
            ?></section>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

  </script>

</body>

</html>
