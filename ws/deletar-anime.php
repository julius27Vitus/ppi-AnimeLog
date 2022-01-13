<?php 
require_once "../model/Anime.php";
echo $_GET["id"];
Anime::deletar($_GET["id"]);

header("Location: ../");
?>