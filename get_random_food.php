<?php
$db = new PDO("mysql:dbname=thismightkillyou;host=localhost", "user", "t3st");
$query = "select * from gen_food";
if ((isset($_GET['ara'])) || (isset($_GET['type'])) {
	$query = $query . ' where ';
}
if (isset($_GET['ara']) {
	$query = $query . ' ara = true ';
}
if ((isset($_GET['ara'])) && (isset($_GET['type'])) {
	$query = $query . ' and ';
}
if (isset($_GET['type']) {
	$query = $query . ' type = ' . $db->quote($_GET['type']);
}
$query = $query . " order by RAND() limit 1;";

$rows = $db->query($query);
foreach ($rows as $row) {
	echo $row['name'];
	echo $row['type'];
}
?>
