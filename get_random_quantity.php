<?php
$db = new PDO("mysql:dbname=thismightkillyou;host=localhost", "user", "t3st");
$query = "select * from gen_quantities";
if (isset($_GET['type'])) {
	$query = $query . ' where type = ' . $db->quote($_GET['type']);
	$query = $query . ' or type in (select parent from gen_type where type = ' . $db->quote($_GET['type']) . ')';
	//$query = $query . ' or type in (select type from gen_type where parent in (select type from gen_type where parent in' . $db->quote($_GET['type']) . '))';
}
$query = $query . " order by RAND() limit 1;";

$rows = $db->query($query);
foreach ($rows as $row) {
	$data = array('quantity' => $row['quantity'], 'type' => $row['type']);
	echo json_encode($data);
	//echo $row['quantity'];
	//echo "\n";
	//echo $row['type'];
}
?>
