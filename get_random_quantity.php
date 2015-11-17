<?php
$db = new PDO("mysql:dbname=thismightkillyou;host=localhost", "user", "t3st");
if (isset($_GET['multi'])) {
	$num = -1;
	$data = array();
	while(isset('type' . ++$num)) {
		$query = "select * from gen_quantities";
		if (isset($_GET['type' . $num])) {
			$query = $query . ' where type = ' . $db->quote($_GET['type' . $num]);
			$query = $query . ' or type in (select parent from gen_type where type = ' . $db->quote($_GET['type' . $num]) . ')';
			$query = $query . ' or type in (select parent from gen_type where type in (select parent from gen_type where type = ' . $db->quote($_GET['type' . $num]) . '))';
		}
		$query = $query . " order by RAND() limit 1;";

		$rows = $db->query($query);
		foreach ($rows as $row) {
			array_push($data, $row['quantity']);
		}
	}
	echo json_encode(array('quantity' => $data));
} else {
	$query = "select * from gen_quantities";
	if (isset($_GET['type'])) {
		$query = $query . ' where type = ' . $db->quote($_GET['type']);
		$query = $query . ' or type in (select parent from gen_type where type = ' . $db->quote($_GET['type']) . ')';
		$query = $query . ' or type in (select parent from gen_type where type in (select parent from gen_type where type = ' . $db->quote($_GET['type']) . '))';
	}
	$query = $query . " order by RAND() limit 1;";

	$rows = $db->query($query);
	foreach ($rows as $row) {
		$data = array('quantity' => $row['quantity'], 'type' => $row['type']);
		echo json_encode($data);
	}
}
?>
