<?php
$db = new PDO("mysql:dbname=thismightkillyou;host=localhost", "user", "t3st");
$rows = $db->query("select recipe_id from votes where value > 0 and username = " . $db->quote($_GET['username']) . ";");

$data = array();
foreach ($rows as $row) {
	array_push($data, $row['recipe_id']);
}
echo json_encode(array('upvoted' => $data));
?>