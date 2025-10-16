<?php
    session_start();
    require_once("./user.php");

    $username=$_POST["username"];
    $password=$_POST["password"];

    $users = json_decode(file_get_contents("users.json"),true);

    if (!is_array($users)) {
        $users = [];
    }

    $register = new User($username,$password);
    $present = false;
    foreach ($users as $user) {
        if ($user==(array)$register){
            $present = true;
        }
    }
    if (!$present){
        array_push($users,$register);
        file_put_contents("users.json",json_encode($users));
        $_SESSION["username"]=$username;
        header("location:protected.php");
    }else{
        unset($_SESSION["username"]);
        header("location:index.html");
    }
?>