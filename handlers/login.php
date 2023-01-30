<?php
    require_once("connection.php");
    if(isset($_POST["username"])){
        $user = $_POST["username"];
        $pass = md5($_POST["password"]);
        $stmt=$conn->prepare("SELECT * FROM users INNER JOIN roles ON users.roleID=roles.roleID WHERE users.userName=:name AND users.password=:pass;");
        $stmt->execute(array(":name"=>$user,":pass"=>$pass));
        echo $stmt->rowCount();
        if($stmt->rowCount()==1){
            $res=$stmt->fetch();
            // echo "LOGGED IN";
            session_start();
            $_SESSION["user"]=$res["userName"];
            $_SESSION["role"]=$res["roleName"];
            header("location:../dashboard.php");
        }else{
            header("location:../index.php");
        }
    }else{
        header("location:../index.php");
    }
?>