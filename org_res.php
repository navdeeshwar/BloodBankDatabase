<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (isset($_POST['Submit'])) {
    $user = $_POST['Email'];
    $password = password_hash($_POST['Password'],PASSWORD_DEFAULT);
    $name = $_POST['Name'];
    $Address = $_POST['Address'];
    $Mobile = $_POST['Mobile'];

    include("dbconnect.php");

    $query = "INSERT INTO Org(Name,Address,Mobile,Email,Password)";
    $query .= "VALUES('$name','$Address','$Mobile','$user','$password')";
    $result = mysqli_query($conn, $query);
    if (!$result) {
            
        // header("location:./org_res.php");
    }
    else{
        $username = preg_split("/@/", $User);
        $username = $username[0];
        session_start();
        echo $_SESSION[$user] = $username;
        header("location:./main.php");}
    

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    
   

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
 
    <title>Register</title>
    <link href="css/form.css" rel="stylesheet">
  
</head>
<body>
    <div class="testbox">
<form action="" method="post">
<div class="banner">
            <h1></h1>
        </div>
    <fieldset>
<legend>Enter Details</legend>
<?php
            if(isset($_POST['Submit'])){
            if(!$result){
                echo '<div class="alert alert-danger ">
                <p class="center">Fill all the Details</p>
            </div>';
            }}
            ?>
<label for="fname">Name<span>*</span></label>
    <input type="text" name="Name" placeholder="Name"><br>
    <label for="fname">Mobile Number<span>*</span></label>
    <input type="text" name="Mobile" placeholder="Mobile Number"><br>
    <label for="fname">Address<span>*</span></label>
    <textarea name="Address"></textarea><br>
    <label for="fname">Email<span>*</span></label>
    <input type="Email" name="Email" placeholder="Example@site.com"><br>
    <label for="fname">Password<span>*</span></label>
    <input type="Password" name="Password" placeholder="Password"><br>

    <div class="btn-block">
            <input onclick=""type="submit" name="Submit" class="btn btn-primary">
        </div></fieldset>
</form>
</div>
</body>
</html>
