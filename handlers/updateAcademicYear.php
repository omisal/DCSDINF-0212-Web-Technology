<?php
require_once("connection.php");
if(isset($_POST["acYear"])){
    $id = $_POST["acYearID"];
    $name = $_POST["acYear"];
    $stmt=$conn->prepare("UPDATE academic_years SET acYear=:name WHERE acYearID=:id");
    $stmt->execute(array(":name"=>$name,":id"=>$id));
    // // echo $conn->lastInsertId();   
}
header("location:../academic_year.php");
?>