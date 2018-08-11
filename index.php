<?php
/*
	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	} else {
		$uri = 'http://';
	}
	$uri .= $_SERVER['HTTP_HOST'];
	header('Location: '.$uri.'/dashboard/');
	exit;
*/
?>
<!--Something is wrong with the XAMPP installation :-(-->

<?php
$username = "root";
$password = "";
$database = "nychacks";
$conn = new mysqli("localhost", $username, $password, $database);
if ($conn->connect_error) {
	die("Connection failed: ". $conn->connect_error);
}
$sql = "select * from test;";
$result = $conn->query($sql);
if($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		echo "name: " . $row["name"] . " city: " . $row["city"] . " state: " . $row["state"] . " zip: " . $row["zip"] . "\n";
	}
} else {
	echo "0 results";
}
$conn->close();
?>
