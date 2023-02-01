<?php
session_start();
$user = $_SESSION["user"];
require_once("connection.php");
if (isset($_FILES["profile"])) {
    $picture = $_FILES["profile"];
    // check if the uploaded is an image with no error, before saving the file
    if (($picture["type"] == "image/png" or $picture["type"] == "image/jpeg" or $picture["type"] == "image/jpg" or $picture["type"] == "image/gif") and $picture["error"] == 0) {
        // split the image name into an array using dot (.),in order to get the extension of the uploaded file
        // the extension is the the last value in the obtained array.
        // eg. if the file name is "a1.png", the resulted array will be ["a1","png"]
        $arr = explode(".", $picture["name"]);
        // combine the text (img_) with the name of the logged in user and its file extension to obtain unique file name..
        // eg. if user is "admin" and the previos obtained extension was "png", the new file name will be "img_admin.png"
        $name = "img_" . $user . "." . end($arr);
        // state the where the image should be saved, the path is relative to this current file
        $path = "../assets/profile/" . $name;
        // move the uploaded file from the current temporary location to the destination path
        if (move_uploaded_file($picture["tmp_name"], $path)) {
            // once the file is saved, update the new image name to the database
            $stmt = $conn->prepare("UPDATE users SET profile=:prof WHERE userName=:name");
            $stmt->execute(array(":prof" => $name, ":name" => $user));
        }
    }
}
header("location:../profile.php");
