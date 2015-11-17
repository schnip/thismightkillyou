<?php
$db = new PDO("mysql:dbname=thismightkillyou;host=localhost", "user", "t3st");
$query = 'insert into recipes (name) values (' . $db->quote($_GET['name']) . ');';
$db->exec($query);
$rows = $db->query('select id from recipes where name = ' . $db->quote($_GET['name']) . ';');
$recipe_id = 0;
foreach ($rows as $row) {
	$recipe_id = $row['id'];
}

?>