<?php
$db = new PDO("mysql:dbname=thismightkillyou;host=localhost", "user", "t3st");
if (isset($_GET['username'])) {
	$query = 'insert into votes (username, recipe_id, value) values (' . $db->quote($_GET['username']) . ',' . $_GET['recipe_id'] . ',1);';
	$db->exec($query);
}
?>