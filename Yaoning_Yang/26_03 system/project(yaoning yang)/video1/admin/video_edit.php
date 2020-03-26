<?php
include_once "./config/config.php";
if(isset($_GET['eid'])){
    $sql = "select * from ".DB_PREFIX."list where id='$_GET[eid]'";
    $result = $mysqli->query($sql) or die('Database query error:' . $mysqli->errno . '-----' . $mysqli->error);
    $row = $result->fetch_assoc();

}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="con">
        <form action="video_chk.php" method="post" enctype="multipart/form-data" id="form">
            <div class="form-group">
                <label>Title</label>
                <div class="col">
                    <input type="text" name="title" value="<?=$row['title']?>" required>
                </div>
            </div>
            <div class="form-group">
                <label>Source</label>
                <div class="col">
                    <input type="text" name="source" value="<?=$row['source']?>">
                </div>
            </div>
            <div class="form-group">
                <label>Duration</label>
                <div class="col">
                    <input type="text" name="duration"  value="<?=$row['duration']?>" required>
                </div>
            </div>
            <div class="form-group">
                <label>Date</label>
                <div class="col">
                    <input type="datetime-local" name="create_time" value="<?=date('Y-m-d\TH:i', strtotime($row['create_time']))?>">
                </div>
            </div>

            <div class="form-group">
                <label>Video Cover</label>
                <div class="col">
                    <img src="../uploads/<?=$row['video_cover']?>" width="125" alt="" style="margin-left: 10px">
                    <input type="file" name="video_cover">
                </div>
            </div>
            <div class="form-group">
                <label>Video</label>
                <div class="col" style="position: relative">
                    <video src="../video/<?=$row['url']?>" width="125" style="margin-left: 10px"></video>
                    <input type="file" name="video" class="video">
                    <div class="progress"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="submit">
                    <input type="hidden" value="edit" name="action">
                    <input type="hidden" value="<?=$row['id']?>" name="eid">
                    <input type="submit" name="submit" value="submit">
                </div>
            </div>
        </form>
    </div>

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script>
        $(function () {
            $('input[type="submit"]').on('click', function () {
                if($('input[name="duration"]').val() && $('input[name="title"]').val()){
                    if($('.video').val()){
                        $('.progress').show();
                    }
                }
            });
        });
    </script>
</body>
</html>