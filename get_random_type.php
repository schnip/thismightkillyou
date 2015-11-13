<?php
$db = new PDO("mysql:dbname=thismightkillyou;host=localhost", "user", "t3st");
$query = "select * from gen_type";
if (isset($_GET['parent'])) {
	$query = $query . ' where parent = ' . $db->quote($_GET['parent']);
}
$query = $query . " order by RAND() limit 1;";

$rows = $db->query($query);
foreach ($rows as $row) {
	$data = array('type' => $row['type']);
	echo json_encode($data);
	//echo $row['type'];
}
?>
