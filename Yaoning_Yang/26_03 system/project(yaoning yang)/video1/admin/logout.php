<?php
/**
 * Created by PhpStorm.
 * User: 18030585
 * Date: 2020/3/16
 * Time: 23:48
 */
if(!session_id()){
    session_start();
}
session_destroy();
die('<script>alert("Log out successfully");window.location="./login.html"</script>');