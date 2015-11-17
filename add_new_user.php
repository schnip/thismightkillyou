<?php
$db = new PDO("mysql:dbname=thismightkillyou;host=localhost", "user", "t3st");
$query = 'insert into recipes (username, password, email) values (' . $db->quote($_GET['username']) . ',' . $db->quote($_GET['password']) . ',' . $db->quote($_GET['email']) . ');';
$db->exec($query);
?>