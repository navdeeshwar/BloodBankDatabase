<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (isset($_POST['Submit'])) {
    $User = $_POST['Email'];
    $password = password_hash($_POST['Password'],PASSWORD_DEFAULT);
    $name = $_POST['Name'];
    $gender = $_POST['Gender'];
    $BG = $_POST['BloodGroup'];
    $Age = $_POST['Age'];
    $Address = $_POST['Address'];
    $Mobile = $_POST['Mobile'];

    include("dbconnect.php");

    $query = "INSERT INTO Users(Name,Gender,Age,BloodGroup,Address,Mobile,Email,Password)";
    $query .= "VALUES('$name','$gender','$Age','$BG','$Address','$Mobile','$User','$password')";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        
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
<html>
<head>
    <title>Camp Registration</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="css/form.css" rel="stylesheet">

</head>
<body>
<div class="testbox">
    <form action="" method="post">
        <div class="banner">
            <h1></h1>
        </div>
        <br/>
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

            <div class="item">
                <label for="fname">Name<span>*</span></label>
                <input id="fname" type="text" name="Name" />
            </div>
            <div class="item">
                <p>Gender</p>
                <select name="Gender" size="0">
                    <option>Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select><br>
            </div>
            <div class="item">
                <label for="bdate">Birth Date <span>*</span></label>
                <input id="bdate" type="date" name="Age" />
                <i class="fas fa-calendar-alt"></i>
            </div>
            <div class="item">
                <p>BloodGroup</p>
                <select name="BloodGroup" size="1">
                    <option>Select your Blood Group</option>
                    <option value="Ap">A+</option>
                    <option value="Am">A-</option>
                    <option value="Bp">B+</option>
                    <option value="Bm">B-</option>
                    <option value="ABp">AB+</option>
                    <option value="ABm">AB-</option>
                    <option value="Om">O+</option>
                    <option value="Op">O-</option>
                    
                </select>
            </div>
            <div class="item">
                <label for="Phone">Mobile Number<span>*</span></label>
                <input type="text" name="Mobile" placeholder="Mobile Number"><br>
            </div>
            <div class="item">
                <label for="Address">Address<span>*</span></label>
                <textarea name="Address"></textarea><br>
            </div>
            <div class="item">
                <label for="Email">Email<span>*</span></label>
                <input type="Email" name="Email" placeholder="Example@site.com"><br>

            </div>
            <div class="item">
                <label for="Password">Password<span>*</span></label>
                <input type="Password" name="Password" placeholder="Password"><br>
            </div>

        </fieldset>
        <div class="btn-block">
            <input onclick=""type="submit" name="Submit" class="btn btn-primary">
        </div>
    </form>
</div>
</body>
</html>
