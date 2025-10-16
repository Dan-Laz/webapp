<?php
    session_start();

    require_once("./user.php");

    $username=$_POST["username"];
    $password=$_POST["password"];

    $users = json_decode(file_get_contents("users.json"),true);

    if (!is_array($users)) {
        $users = [];
    }
    $present=false;
    $login = new User($username,$password);
    foreach ($users as $user) {
        if ($user==(array)$login){
            $_SESSION["username"]=$username;
            header("location:protected.php");
            $present=true;
        }
    }
    if (!$present) {
        unset($_SESSION["username"]);
        header("location:index.html");
    }


?>