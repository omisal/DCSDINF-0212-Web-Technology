<?php
require_once("connection.php");
if(isset($_POST["courseCode"])){
    $id = $_POST["courseID"];
    $code = $_POST["courseCode"];
    $name = $_POST["courseName"];
    $unit = $_POST["courseUnit"];
    $stmt=$conn->prepare("UPDATE courses SET courseCode=:code,courseName=:name,courseUnit=:unit WHERE courseID=:id");
    $stmt->execute(array(":code"=>$code,":name"=>$name,":unit"=>$unit,":id"=>$id));
    // // echo $conn->lastInsertId();   
}
header("location:../courses.php");
?>