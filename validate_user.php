<?php
$db = new PDO("mysql:dbname=thismightkillyou;host=localhost", "user", "t3st");
if (isset($_GET['username'])) {
	$query = "select username from users where username = " . $_GET['username'] . ' and password = ' . $_GET['password'] . ';';
	$rows = $db->query($query);
	if (count($rows)) {
		echo 'true';
	}
} else {
	if (isset($_GET['email'])) {
		$query = "select username from users where email = " . $_GET['email'] . ' and password = ' . $_GET['password'] . ';';
		$rows = $db->query($query);
		if (count($rows)) {
			echo 'true';
		}
	} else {
		echo 'false';
	}
}
?>