<?php
$db = new PDO("mysql:dbname=imdb;host=localhost", "user", "t3st");
$rows = $db->query("select * from recipes order by RAND() limit 1;")
$rows = $db->query("select * from ingredients where recipe_id=" . $recipe_id . ';');
?>