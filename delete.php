<?php
    session_start();
    require_once("./persona.php");

    
    if (isset($_SESSION["username"])){

        $id = $_POST["id"];

        $persone = json_decode(file_get_contents("persone.json"),true);
        if (!is_array($persone)) {
            $persone = [];
        }
        

        array_splice($persone,$id,1);

        file_put_contents("persone.json",json_encode($persone));


        header("location:./protected.php");


    }else{
        header("location:index.html");
    }




?>