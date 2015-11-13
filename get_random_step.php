<?php
$db = new PDO("mysql:dbname=thismightkillyou;host=localhost", "user", "t3st");
$query = "select * from gen_type";
if (isset($_GET['ara'])) {
	$query = $query . ' where ';
}
if (isset($_GET['ara'])) {
	$query = $query . ' ara = true ';
}
$query = $query . " order by RAND() limit 1;";

$rows = $db->query($query);
foreach ($rows as $row) {
	echo $row['id'];
	echo "\n";
	echo $row['primary_action'];
	echo "\n";
	echo $row['secondary_action'];
	echo "\n";
	echo $row['result'];
	echo "\n";
	echo $row['ara'];
	echo "\n";
	echo $row['primary_type'];
	echo "\n";
	echo $row['secondary_type'];
	echo "\n";
	echo $row['result_type'];
	echo "\n";
}
?>
