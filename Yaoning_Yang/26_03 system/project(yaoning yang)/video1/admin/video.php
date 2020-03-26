<?php
include_once "./config/config.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <style>

    </style>
</head>
<body>
<table class="table table-striped table-bordered table-hover">
    <thead>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Source</th>
        <th>Duration</th>
        <th>Date</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $sql = "select * from " . DB_PREFIX . "list order by id desc";
    $result = $mysqli->query($sql) or die('Database query error:' . $mysqli->errno() . '-----' . $mysqli->error());
    while($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <th><?=$row['id']?></th>
            <td><?=$row['title']?></td>
            <td><?=$row['source']?></td>
            <td><?=$row['duration']?></td>
            <td><?=$row['create_time']?></td>
            <td>
                <a href="video_edit.php?action=edit&eid=<?=$row['id']?>"><img src="images/edit.png" alt=""><span>Edit</span></a>
                <a href="video_chk.php?action=delete&did=<?=$row['id']?>" onclick="return confirm('Confirm Deletion?')"><img src="images/delete.png" alt=""><span>Delete</span></a>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
</body>
</html>