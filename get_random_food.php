<?php
$db = new PDO("mysql:dbname=thismightkillyou;host=localhost", "user", "t3st");
$query = "select * from gen_food";
if ((isset($_GET['ara'])) || (isset($_GET['type']))) {
	$query = $query . ' where ';
}
if (isset($_GET['ara'])) {
	$query = $query . ' ara = true ';
}
if ((isset($_GET['ara'])) && (isset($_GET['type']))) {
	$query = $query . ' and ';
}
if (isset($_GET['type'])) {
	$query = $query . ' type = ' . $db->quote($_GET['type']);
}
if (isset($_GET['num'])) {
	$query = $query . " order by RAND() limit " . $_GET['num'] . ";";
} else {
	$query = $query . " order by RAND() limit 1;";
}

$rows = $db->query($query);
$data = array();
$names = array();
$types = array();
foreach ($rows as $row) {
	$data = array('name' => $row['name'], 'type' => $row['type']);
	array_push($names, $row['name']);
	array_push($types, $row['type']);
}
if (isset($_GET['num'])) {
	$data = array('names' => $names, 'types', $types);
}
echo json_encode($data);
?>
