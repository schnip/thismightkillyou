<?php
$db = new PDO("mysql:dbname=thismightkillyou;host=localhost", "user", "t3st");
$query = "select * from gen_quantities";
if (isset($_GET['type'])) {
	$query = $query . ' where type = ' . $db->quote($_GET['type']);
}
$query = $query . " order by RAND() limit 1;";

$rows = $db->query($query);
die(var_dump($rows));
foreach ($rows as $row) {
	echo $row['quantity'];
}
?>
