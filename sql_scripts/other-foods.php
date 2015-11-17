<?php
$db = new PDO("mysql:dbname=thismightkillyou;host=localhost", "user", "t3st");
$handle = fopen("other-foods.txt", "r");
$type = 'food';
if ($handle) {
	while (($line = fgets($handle)) !== false) {
		if (substr($line,0,2) == '--') {
			$type = substr($line,2);
		} elseif (strlen($line) < 2) {

		} else {
			$inline = $string = trim(preg_replace('/\s\s+/', ' ', $line));
			$intype = $string = trim(preg_replace('/\s\s+/', ' ', $type));
			$query = 'insert into gen_food (name, ara, type) values ("' . $inline . '",false,"' . $intype . '");';
			$db->exec($query);
		}
	}
	fclose($handle);
} else {
	// error opening the file.
	echo 'error opening file';
} 
?>