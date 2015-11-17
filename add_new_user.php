<?php
$db = new PDO("mysql:dbname=thismightkillyou;host=localhost", "user", "t3st");
$email = 'null';
if (isset($_GET['email'])) {
	$email = $db->quote($_GET['email']);
}
$query = 'insert into recipes (username, password, email) values (' . $db->quote($_GET['username']) . ',' . $db->quote($_GET['password']) . ',' . $email . ');';
echo $query;
$db->exec($query);
?>