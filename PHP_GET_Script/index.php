<?php
// Database Credentials
$host = '<Add your custom details>';
$username = '<Add your custom details>';
$password = '<Add your custom details>';
$db_name = '<Add your custom details>';

//Establishes the connection
$conn = mysqli_init();
mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306);
if (mysqli_connect_errno($conn)) {
die('Failed to connect to MySQL: '.mysqli_connect_error());
}

//Run the Select query
$res = mysqli_query($conn, 'SELECT * FROM videos');
$json_array = array();
while ($row = mysqli_fetch_assoc($res)) {
	$json_array[] = $row;
}
// Send the data in JSON format, in order to be easily parsed by the WebGL build
echo(json_encode($json_array, JSON_UNESCAPED_SLASHES));

//Close the connection
mysqli_close($conn);
?>