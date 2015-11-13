<?php
$db = new PDO("mysql:dbname=thismightkillyou;host=localhost", "user", "t3st");
$query = "select * from gen_steps";
if (isset($_GET['ara'])) {
	$query = $query . ' where ';
}
if (isset($_GET['ara'])) {
	$query = $query . ' ara = true ';
}
$query = $query . " order by RAND() limit 1;";

$rows = $db->query($query);
foreach ($rows as $row) {
	$data = array();
	$data['id']=$row['id'];
	$data['primary_action']=$row['primary_action'];
	$data['secondary_action']=$row['secondary_action'];
	$data['result']=$row['result'];
	$data['ara']=$row['ara'];
	$data['primary_type']=$row['primary_type'];
	$data['secondary_type']=$row['secondary_type'];
	$data['result_type']=$row['result_type'];
	echo json_encode($data);
/*	echo $row['id'];
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
	echo "\n";*/
}
?>
