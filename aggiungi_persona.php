<?php
    session_start();
    require_once("./persona.php");

    
    if (isset($_SESSION["username"])){

        $nome = $_POST["nome"];
        $cognome = $_POST["cognome"];

        $persone = json_decode(file_get_contents("persone.json"),true);
        if (!is_array($persone)) {
            $persone = [];
        }
        
        if ($nome!="" and $cognome!= "") {
            $persona = new Persona($nome,$cognome);
            array_push($persone,$persona);
            file_put_contents("persone.json",json_encode($persone));
        }


        header("location:./protected.php");


    }else{
        header("location:index.html");
    }




?>