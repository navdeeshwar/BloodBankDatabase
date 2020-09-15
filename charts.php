
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
if(!isset($_SESSION['user'])){
    header("location:./index.php");
    
}

$user=$_SESSION['user'];

?>
<?php 
                    include("dbconnect.php");
                    $query3 = "select sum(ABm),sum(ABp),sum(Am),sum(Ap),sum(Bm),sum(Bp),sum(Om),sum(Op) From Org join OrgBlood on Org.id=OrgBlood.id";
                    $result3 = mysqli_query($conn, $query3);
                    while ($disp3 = mysqli_fetch_assoc($result3)){
                      $data = $disp3;
                      
                      
                        
                        
                    }
                    
                   
                    $query = "select BloodGroup,Count(BloodGroup) From Users group by BloodGroup";
                    $result = mysqli_query($conn, $query);
                    while ($disp = mysqli_fetch_assoc($result) ){
                      if($disp['BloodGroup']=="ABm"){
                        $data['sum(ABm)']=$disp['Count(BloodGroup)']+$data['sum(ABm)'];}
                      if($disp['BloodGroup']=="ABp"){
                        $data['sum(ABp)']=$disp['Count(BloodGroup)']+$data['sum(ABp)'];}
                      if($disp['BloodGroup']=="Am"){
                        $data['sum(Am)']=$disp['Count(BloodGroup)']+$data['sum(Am)'];}
                      if($disp['BloodGroup']=="Ap"){
                        $data['sum(Ap)']=$disp['Count(BloodGroup)']+$data['sum(Ap)'];}
                        if($disp['BloodGroup']=="Bm"){
                          $data['sum(Bm)']=$disp['Count(BloodGroup)']+$data['sum(Bm)'];}
                          if($disp['BloodGroup']=="Bp"){
                            $data['sum(Bp)']=$disp['Count(BloodGroup)']+$data['sum(Bp)'];}
                            if($disp['BloodGroup']=="Om"){
                              $data['sum(Om)']=$disp['Count(BloodGroup)']+$data['sum(ABm)'];}
                              if($disp['BloodGroup']=="Op"){
                                $data['sum(Op)']=$disp['Count(BloodGroup)']+$data['sum(Op)'];}

                      
                      
                        
                        
                    }
                                
                    
                    
                    
                
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
   

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display --> 
            <div class="navbar-header">
            <a class=" navbar-brand" href="main.php">Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-fw fa-user"></i> <?php echo $user;?> </b></a>
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
                        <a href="charts.php"><i class="fa fa-fw fa-bar-chart-o"></i>Charts</a>
                    </li>
                    
                    <li>
                        <a href="search.php"><i class="fa fa-fw fa-edit"></i> Search</a>
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
                                <i class="fa fa-dashboard"></i>  <a href="charts.php">Bloodinfo_Charts</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file">Welcome</i>
                            </li>
                        </ol>
                        <div class="container">
    <canvas id="myChart"style="height:60vh; width:50vw"></canvas>
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
  <script>
    let myChart = document.getElementById('myChart').getContext('2d');

    // Global Options
    Chart.defaults.global.defaultFontFamily = 'Lato';
    Chart.defaults.global.defaultFontSize = 18;
    Chart.defaults.global.defaultFontColor = '#777';

    let massPopChart = new Chart(myChart, {
      type:'pie', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
      data:{
        labels:["A+","A-","AB+","AB-","B+","B-","O+","O-"],
        datasets:[{
          label:'Population',
          data:[<?php echo $data['sum(Ap)']; ?>,
          <?php echo $data['sum(Am)']; ?>,
          <?php echo $data['sum(ABp)']; ?>,
          <?php echo $data['sum(ABm)']; ?>,
          <?php echo $data['sum(Bp)']; ?>,
          <?php echo $data['sum(Bm)']; ?>,
          <?php echo $data['sum(Op)']; ?>,
          <?php echo $data['sum(Om)']; ?>],
          //backgroundColor:'green',
          backgroundColor:[
            'rgba(255, 99, 132, 0.6)',
            'rgba(54, 162, 235, 0.6)',
            'rgba(255, 206, 86, 0.6)',
            'rgba(75, 192, 192, 0.6)',
            'rgba(153, 102, 255, 0.6)',
            'rgba(255, 159, 64, 0.6)',
            'rgba(255, 99, 13, 0.6)',
            'rgba(25, 99, 13, 0.6)',
            'rgba(153, 10, 255, 0.6)',
          ],
          borderWidth:1,
          borderColor:'#777',
          hoverBorderWidth:3,
          hoverBorderColor:'#000'
        }]
      },
      options:{
        title:{
          display:true,

          text:'Blood Info',
          fontSize:25
        },
        legend:{
          display:true,
          position:'top',
         
          labels:{
            fontColor:'#000'
          }
        },
        layout:{
          padding:{
            left:50,
            right:0,
            bottom:0,
            top:0
          }
        },
        tooltips:{
          enabled:true
        }
      }
    });
  </script>

</body>

</html>