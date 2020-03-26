<?php
if(!session_id()){
    session_start();
}

header('Content-Type:text/html; charset=utf-8');
@set_time_limit(60 * 60);
const DB_HOST = 'localhost'; //database host
const DB_USER = 'root'; //database username
const DB_PWD = 'root';  //database password
const DB_NAME = 'video'; //database name
const DB_PREFIX = 'video_'; //database table prefix

@$mysqli = new MySqli(DB_HOST, DB_USER, DB_PWD, DB_NAME);
if($mysqli->connect_error){
    echo "Connet Error:" . $mysqli->connect_errno . '---' . $mysqli->connect_error;
}