<?php
    session_start();
    require_once("connection.php");
    $user=$_SESSION["user"];
    $stmt=$conn->prepare("UPDATE users SET lastLogin=CURRENT_TIMESTAMP WHERE userName=:name");
    $stmt->execute(array(":name"=>$user));
    unset($_SESSION["user"]);
    unset($_SESSION["role"]);
    // session_destroy();
    header("location:../index.php");
?>