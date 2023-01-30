<?php
require_once("connection.php");
if(isset($_POST["courseCode"])){
    $code = $_POST["courseCode"];
    $name = $_POST["courseName"];
    $unit = $_POST["courseUnit"];
    $stmt=$conn->prepare("INSERT INTO courses(courseCode,courseName,courseUnit) VALUES(:code,:name,:unit)");
    $stmt->execute(array(":code"=>$code,":name"=>$name,":unit"=>$unit));
    // echo $conn->lastInsertId();
}
header("location:../courses.php");

?>