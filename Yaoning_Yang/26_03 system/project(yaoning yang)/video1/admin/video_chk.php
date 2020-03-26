<?php
/**
 * Created by PhpStorm.
 * User: 18030585
 * Date: 2020/3/17
 * Time: 14:46
 */
include_once './config/config.php';
include_once './config/file.function.php';

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';

switch ($action){
    case 'delete':
        if($_GET['did']){

            $sql = "delete from ".DB_PREFIX."list where id='$_GET[did]'";
            $result = $mysqli->query($sql) or die('Database query error:' . $mysqli->errno() . '-----' . $mysqli->error());
            if(!$result){

                die('<script>alert("Delete failed"); window.location="video.php"</script>');

            }

            die('<script>alert("Delete successful"); window.location="video.php"</script>');

        }
        break;
    case 'add':
        if($_POST){

            if($_FILES['video_cover']['name']){
                $video_cover = file_up('video_cover', '../uploads/');
            }else{
                $video_cover = 'default.jpg';
            }

            if($_FILES['video']['name']){
                $url = file_up('video', '../video/', 1073741824, ['video/mp4']);
            }else{
                $url = 'default.video';
            }

            if($_POST['create_time']){
                $create_time = $_POST['create_time'];
            }else{
                $create_time = date('Y-m-d H:i:s');
            }

            if($_POST['source']){
                $source = $_POST['source'];
            }else{
                $source = 'original';
            }

            $sql = "insert into ".DB_PREFIX."list(title, source, duration,  video_cover, url, create_time) values('$_POST[title]', '$source', '$_POST[duration]', '$video_cover', '$url', '$create_time')";

            $result = $mysqli->query($sql) or die('Database query error:' . $mysqli->errno . '-----' . $mysqli->error);

            if(!$result){
                die('<script>alert("Add failure"); history.back();</script>');
            }

            die('<script>alert("Add success"); window.location="video.php"</script>');

        }
        break;
    case 'edit':
        if($_POST){
            $sql = "select * from ".DB_PREFIX."list where id='$_POST[eid]'";
            $result = $mysqli->query($sql) or die('Database query error:' . $mysqli->errno . '-----' . $mysqli->error);
            $row = $result->fetch_assoc();

            if($_FILES['video_cover']['name']){
                $video_cover = file_up('video_cover', '../uploads/');
            }else{
                $video_cover = $row['video_cover'];
            }

            if($_FILES['video']['name']){
                $url = file_up('video', '../video/', 1073741824, ['video/mp4']);
            }else{
                $url = $row['url'];
            }

            $sql = "update ".DB_PREFIX."list set title='$_POST[title]', source='$_POST[source]', duration = '$_POST[duration]', video_cover = '$video_cover', url = '$url', create_time = '$_POST[create_time]' where id='$_POST[eid]'";
//            die($sql);
            $result = $mysqli->query($sql) or die('Database query error:' . $mysqli->errno . '-----' . $mysqli->error);

            if(!$result){
                die('<script>alert("Edit failure"); history.back();</script>');
            }

            die('<script>alert("Edit success"); window.location="video.php"</script>');
        }
        break;
    default:
        die('<script>window.location="video.php"</script>');
        break;
}