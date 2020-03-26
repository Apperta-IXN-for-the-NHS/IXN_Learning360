<?php
/**
 * Created by PhpStorm.
 * User: 18030585
 * Date: 2020/3/17
 * Time: 13:33
 */
include_once './config/config.php';

if($_POST){
//    echo $_POST['old_password'], $_POST['new_password'], $_POST['confirm_password'];
//    die();
    if(!$_POST['old_password'] || !$_POST['new_password'] || !$_POST['confirm_password']){
        die('<script>alert("Password cannot be empty"); history.back()</script>');
    }
    $sql = "select * from ".DB_PREFIX."admin where admin_name='$_SESSION[admin_name]'";
    $result = $mysqli->query($sql) or die('Database query error:' . $mysqli->errno() . '-----' . $mysqli->error());
    $row = $result->fetch_assoc();

    $old_pwd = $_POST['old_password'];

    if($old_pwd != $row['admin_pwd']){
        die('<script>alert("Old password error"); history.back()</script>');
    }

    if($_POST['new_password'] != $_POST['confirm_password']){

        die('<script>alert("The password and the confirmation you typed do not match. Please retype this information"); history.back()</script>');

    }

    $pwd = $_POST['new_password'];

    $sql = "update ".DB_PREFIX."admin set admin_pwd='$pwd' where id='$row[id]'";

    $result = $mysqli->query($sql) or die('Database query error:' . $mysqli->errno() . '-----' . $mysqli->error());

    if($result){

        die('<script>alert("Modified success"); window.top.location="logout.php"</script>');

    }else{

        die('<script>alert("Modification failed"); history.back()</script>');

    }
}