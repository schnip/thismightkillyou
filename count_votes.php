<?php
$db = new PDO("mysql:dbname=thismightkillyou;host=localhost", "user", "t3st");
$query = "select sum(value) as verdict from votes where recipe_id = " . $_GET['recipe_id'];

$rows = $db->query($query);
foreach ($rows as $row) {
	$data = array('votes' => $row['verdict']);
	echo json_encode($data);
	//echo $row['type'];
}
?>
