<?php
include_once './admin/config/config.php'
?>
<!DOCTYPE html>
<html>

<head>
  <meta content="text/html;charset=UTF-8" http-equiv="Content-Type">
  <meta charset="utf-8">
  <title>Home</title>
  <link rel="stylesheet" href="css/zerogrid.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/responsive.css">

</head>

<body>
  <div class="wrap-body zerogrid">
    <!--------------head--------------->
    <header>
      <div class="wrap-header">
        <div id="logo"> <img src="images/banner.jpg" width="100%"> </div>
      </div>
    </header>
    <!--------------body--------------->
    <section id="content">
      <div class="wrap-content">
        <div class="row block">
          <div id="main-content" class="col-2-3">
            <div class="wrap-col">
              <article>

                <div class="heading">
                  <h2><a>Video</a></h2>
                </div>
                  <?php
                  $sql = "select * from " . DB_PREFIX . "list order by id desc";
                  $result = $mysqli->query($sql) or die('Database query error:' . $mysqli->errno() . '-----' . $mysqli->error());
                  while($row = $result->fetch_assoc()) {
                      ?>
                      <div class="content">
                          <a href="video.php?vid=<?=$row['id']?>">
                              <img src="uploads/<?=$row['video_cover']?>" width="125px">

                              <p class="title"><?=$row['title']?></p>
                              <p class="source"><?=$row['source']?></p>
                              <p class="date"><?=$row['create_time']?></p>

                          </a>
                      </div>
                      <?php
                  }
                  ?>
              </article>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!--------------footer--------------->
  <footer>
    <div class="copyright">
      <p>Copyright © 2020.Video All rights reserved.</p>
    </div>
  </footer>

</body>

</html>