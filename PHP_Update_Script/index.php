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

$TYPE = $_POST['TYPE'];

//Custom variables used to send the azure blob storage link split into its componenets, change the variables as needed based on your specific solution
$URL = $_POST['URL'];
$SE =  $_POST['se'];
$SP = '&sp='.$_POST['sp'];
$SV = '&sv='.$_POST['sv'];
$SS = '&ss='.$_POST['ss'];
$SRT = '&srt='.$_POST['srt'];
$SIG = '&sig='.$_POST['sig'];
$DBURL = $URL.$SE.$SP.$SV.$SS.$SRT.$SIG;

if($TYPE == 'Delete') {
    //Create a DELETE prepared statement and run it
    if ($stmt = mysqli_prepare($conn, "DELETE FROM VIDEOS WHERE VideoLink = ?")) {
        mysqli_stmt_bind_param($stmt, 's', $DBURL);
        mysqli_stmt_execute($stmt);
        printf("Delete: Affected %d rows\n", mysqli_stmt_affected_rows($stmt));
        mysqli_stmt_close($stmt);
    }
}
else if ($TYPE == 'Insert'){
    //Create an Insert prepared statement and run it
    if ($stmt = mysqli_prepare($conn, "INSERT INTO Videos (VideoLink) VALUES (?)")) {
        mysqli_stmt_bind_param($stmt, 's', $DBURL);
        mysqli_stmt_execute($stmt);
        printf("Insert: Affected %d rows\n", mysqli_stmt_affected_rows($stmt));
        mysqli_stmt_close($stmt);
    }
}

//Close the connection
mysqli_close($conn);
?>