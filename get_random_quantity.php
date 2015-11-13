<?php
$db = new PDO("mysql:dbname=imdb;host=localhost", "user", "t3st");
$query = "select * from gen_quantities";
if (isset($_GET['type']) {
	$query = $query . ' where type = ' . $db->quote($_GET['type']);
}
$query = $query . " order by RAND() limit 1;";

$rows = $db->query($query);
foreach ($rows as $row) {
	echo $row['quantity'];
}
?>
