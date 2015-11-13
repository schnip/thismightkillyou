<?php
// This won't work until we actually have some data, so next task is to write the helpers necessary to create data

$db = new PDO("mysql:dbname=thismightkillyou;host=localhost", "user", "t3st");
$rows = $db->query("select * from recipes order by RAND() limit 1;");
echo $rows;
//$rows = $db->query("select * from ingredients where recipe_id=" . $recipe_id . ';');
?>