<?php
require_once("connection.php");
if(isset($_POST["acYear"])){
    $name = $_POST["acYear"];
    $stmt=$conn->prepare("INSERT INTO academic_years(acYear) VALUES(:name)");
    $stmt->execute(array(":name"=>$name));
    // echo $conn->lastInsertId();
}
header("location:../academic_year.php");
?>