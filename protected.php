<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.css">

</head>
<body class="row">

    <form class="card pt-2 m-2" style='width: 18rem;' action="aggiungi_persona.php" method="post">
        <h5>aggiungi persona</h5>
        <input type="text" class="m-2" name="nome" placeholder="nome" required>
        <input type="text" class="m-2" name="cognome" placeholder="cognome" required>
        <button type="submit" class="btn btn-success m-2">Aggiungi</button>
    </form>

    <script>

        function delete_item(item) {
            console.log(item.id);
            fetch('/delete.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ id: item.id })
            });
        }
        function edit_item(item) {
            console.log(item);
        }

    </script>

</body>
</html>

<?php
    require_once("./persona.php");

    $cont = 0;

    session_start();
    if (isset($_SESSION["username"])){
        $persone = json_decode(file_get_contents("persone.json"),true);
        if (!is_array($persone)) {
            $persone = [];
        }

        foreach ($persone as $persona) {
            echo "<div id='{$cont}' class='card pt-2 m-2' style='width: 18rem;'>";
            echo "<h5>nome: {$persona["nome"]}</h5>";
            echo "<h5>cognome: {$persona["cognome"]}</h5>";
            echo "<button onclick='delete_item(this.parentElement)' class='btn btn-danger m-2'>delete</button><button onclick='edit_item(this.parentElement)' class='btn m-2 btn-warning'>edit</button>";
            echo "</div>";
            $cont++;

        }




    }else{
        header("location:index.html");
    }

?>