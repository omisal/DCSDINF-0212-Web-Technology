<?php
require_once("connection.php");
if(isset($_POST["staffID"])){
    $fName = $_POST["firstName"];
    $mName = $_POST["middleName"];
    $lName = $_POST["lastName"];
    $dob = $_POST["dob"];
    $staffID = $_POST["staffID"];
    $stmt2=$conn->prepare("UPDATE staffs SET firstName=:fname, middleName=:mname, lastName=:lname, DOB=:dob WHERE staffID=:staff");
    $stmt2->execute(array(":fname"=>$fName,":mname"=>$mName,":lname"=>$lName,":dob"=>$dob,":staff"=>$staffID));
}
header("location:../profile.php");
?>