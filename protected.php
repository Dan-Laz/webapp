<?php
session_start();
if (isset($_SESSION["username"])){
    echo "work";
}else{
    header("location:index.html");
}

?>