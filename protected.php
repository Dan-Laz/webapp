<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.css">

</head>
<body class="container row">

    <form class="card" action="aggiungi_persona.php" method="post">
        <h5>aggiungi persona</h5>
        <input type="text" name="nome" placeholder="nome" required>
        <input type="text" name="cognome" placeholder="cognome" required>
        <button type="submit">Aggiungi</button>
    </form>


</body>
</html>

<?php
    require_once("./persona.php");

    session_start();
    if (isset($_SESSION["username"])){
        $persone = json_decode(file_get_contents("persone.json"),true);
        if (!is_array($persone)) {
            $persone = [];
        }

        foreach ($persone as $persona) {
            echo "<div class='card'>";
            echo "<h5>nome: {$persona["nome"]}</h5>";
            echo "<h5>cognome: {$persona["cognome"]}</h5>";
            echo "</div>";

        }




    }else{
        header("location:index.html");
    }

?>