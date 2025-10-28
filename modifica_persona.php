<?php
    require_once("./persona.php");
    session_start();

    
    if (isset($_SESSION["username"])){

        $input = json_decode(file_get_contents('php://input'), true);
        $id = (int)$input['id'];
        $nome = $input["nome"];
        $cognome = $input["cognome"];


        $persone = json_decode(file_get_contents("persone.json"),true);
        if (!is_array($persone)) {
            $persone = [];
        }

        $persone[$id]=new Persona($nome,$cognome);

        file_put_contents("persone.json",json_encode($persone));

    }


?>