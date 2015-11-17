<?php
$db = new PDO("mysql:dbname=thismightkillyou;host=localhost", "user", "t3st");
$rows = $db->query('select * from recipes where recipe_id = ' . $_GET['recipe_id'] . ';');
foreach ($rows as $row) {
	$recipe_id = $row['id'];
	$recipe_name = $row['name'];
}
$data = array();
$data['id'] = $recipe_id;
$data['name'] = $recipe_name;

// Add in all the ingredients
$rows = $db->query("select * from ingredients where recipe_id=" . $recipe_id . ';');
$ingredients = array();
foreach ($rows as $row) {
	array_push($ingredients, array('name' => $row['name'], 'quantity' => $row['quantity']));
}
$data['ingredients'] = $ingredients;

// Add in all the steps
$rows = $db->query("select * from directions where recipe_id=" . $recipe_id . ';');
$directions = array();
foreach ($rows as $row) {
	array_push($directions, $row['d_text']);
}
$data['directions'] = $directions;
echo json_encode($data);
?>