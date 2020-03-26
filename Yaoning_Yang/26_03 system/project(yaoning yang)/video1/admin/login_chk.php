<?php
include_once "./config/config.php";

if($_POST){
    $sql = "select * from " . DB_PREFIX . "admin where admin_name='$_POST[admin_name]'";
    $result = $mysqli->query($sql) or die('Database query error:' . $mysqli->errno() . '-----' . $mysqli->error());

    if (!$result->num_rows) {
        die('<script>alert("Wrong user name or password"); history.back()</script>');
    }
    $row = $result->fetch_assoc();
   
    if ($_POST['admin_pwd'] != $row['admin_pwd']) {
        die('<script>alert("Wrong user name or password"); history.back()</script>');
    }

    $_SESSION['admin_name'] = $_POST['admin_name'];

    die('<script>alert("Login successfully"); window.location="index.php"</script>');

}else{
    echo '<script>window.location="./login.html";</script>';
}