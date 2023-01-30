<?php
require_once("connection.php");
if(isset($_GET["cId"])){
    $id = $_GET["cId"];
    $stmt=$conn->prepare("DELETE FROM academic_years WHERE acYearID=:cid");
    $stmt->execute(array(":cid"=>$id));
}
header("location:../academic_year.php");
?>