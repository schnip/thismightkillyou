<?php
$db = new PDO("mysql:dbname=thismightkillyou;host=localhost", "user", "t3st");
$query = 'insert into recipes (name) values (' . $db->quote($_GET['name']) . ');';
$db->exec($query);
$rows = $db->query('select id from recipes where name = ' . $db->quote($_GET['name']) . ';');
$recipe_id = 0;
foreach ($rows as $row) {
	$recipe_id = $row['id'];
}
$i_num = -1;
while(isset($_GET['ingredient' . ++$i_num])) {
	$query = 'insert into ingredients (recipe_id, i_num, quantity, name) values (' . $recipe_id . ',' . $i_num . ',' . $db->quote($_GET['ingredient' . $i_num]) . ',' . $db->quote($_GET['quantity' . $i_num]) . ');';
	$db->exec($query);
}
$d_num = -1;
while(isset($_GET['direction' . ++$d_num])) {
	$query = 'insert into directions (recipe_id, d_num, d_text) values (' . $recipe_id . ',' . $d_num . ',' . $db->quote($_GET['direction' . $d_num]) . ');';
	$db->exec($query);
}
echo $recipe_id;
?>