<?php
require_once("connection.php");
if(isset($_GET["cId"])){
    $id = $_GET["cId"];
    $stmt=$conn->prepare("DELETE FROM courses WHERE courseID=:cid");
    $stmt->execute(array(":cid"=>$id));
    header("location:../courses.php");
}
else{
    echo "No data";
}

?>