<?php
include("dbconnect.php");

    $query = "CREATE TABLE Users (
  U_Id int(11) NOT NULL AUTO_INCREMENT,
  Name varchar(255) NOT NULL,
  Gender varchar(10) NOT NULL,
  Age date NOT NULL,
  BloodGroup varchar(5) NOT NULL,
  Address varchar(255) NOT NULL,
  Mobile varchar(15) NOT NULL,
  Email varchar(50) NOT NULL,
  Password varchar(255) DEFAULT NULL,
  PRIMARY KEY (U_Id)
) ";
$result = mysqli_query($conn, $query);
    if (!$result) {echo "no created check dbconnect.php";}
// table 2 //

$query = "CREATE TABLE Org (
  Id int(11) NOT NULL AUTO_INCREMENT,
  Name varchar(50) DEFAULT NULL,
  Address varchar(255) DEFAULT NULL,
  Email varchar(255) DEFAULT NULL,
  Mobile varchar(15) DEFAULT NULL,
  Password varchar(255) DEFAULT NULL,
  PRIMARY KEY (Id),
  UNIQUE KEY Email (Email)
) ";

  $result = mysqli_query($conn, $query);
    if (!$result) {echo "no created check dbconnect.php";}?>

$query="CREATE TABLE OrgBlood (
  OB_Id int(11) NOT NULL AUTO_INCREMENT,
  Id int(11) NOT NULL,
  Ap int(11) NOT NULL,
  Am int(11) NOT NULL,
  Bp int(11) NOT NULL,
  Bm int(11) NOT NULL,
  ABp int(11) NOT NULL,
  ABm int(11) NOT NULL,
  Op int(11) NOT NULL,
  Om int(11) NOT NULL,
  PRIMARY KEY (OB_Id),
  KEY Id (Id),
  CONSTRAINT OrgBlood_ibfk_1 FOREIGN KEY (Id) REFERENCES Org (Id)
)";
$result = mysqli_query($conn, $query);
    if (!$result) {echo "no created check dbconnect.php";}
