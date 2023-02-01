<?php
require_once("connection.php");
if(isset($_POST["firstName"])){
    $fName = $_POST["firstName"];
    $mName = $_POST["middleName"];
    $lName = $_POST["lastName"];
    $dob = $_POST["dob"];
    $user = $_POST["userName"];
    $pass= md5($user);
    $role = $_POST["role"];
    $stmt=$conn->prepare("INSERT INTO users(userName, password, roleID, lastLogin) VALUES (:user,:pass,:role,CURRENT_TIMESTAMP)");
    $stmt->execute(array(":user"=>$user,":role"=>$role,":pass"=>$pass));
    $userID= $conn->lastInsertId();
    $stmt2=$conn->prepare("INSERT INTO staffs(firstName, middleName, lastName, DOB, userID,profile) VALUES (:fname,:mname,:lname,:dob,:user,'avatar.jpg')");
    $stmt2->execute(array(":fname"=>$fName,":mname"=>$mName,":lname"=>$lName,":dob"=>$dob,"user"=>$userID));
}
header("location:../users.php");
?>