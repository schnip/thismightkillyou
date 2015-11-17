<?php
$db = new PDO("mysql:dbname=thismightkillyou;host=localhost", "user", "t3st");
$handle = fopen("ara-foods.txt", "r");
$type = 'food';
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        if (substr($line,0,2) == '--') {
        	$type = substr()
        } else {

        }
    }
    fclose($handle);
} else {
    // error opening the file.
} 
$query = 'insert into recipes (name) values (' . $db->quote($_GET['name']) . ');';
?>