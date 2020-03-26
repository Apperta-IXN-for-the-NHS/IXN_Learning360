<?php
include_once "./admin/config/config.php";
if(isset($_GET['vid'])){
    $sql = "select * from ".DB_PREFIX."list where id='$_GET[vid]'";
    $result = $mysqli->query($sql) or die('Database query error:' . $mysqli->errno . '-----' . $mysqli->error);
    $row = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta content="text/html;charset=UTF-8" http-equiv="Content-Type">
    <meta charset="utf-8">
    <title>Video</title>
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
                <article><a name="c"></a> 
                 <embed src="video/<?=$row['url']?>" width="960" height="540" align="middle" allowScriptAccess="always" allowFullScreen="true" mode="transparent">

                 </embed>
				 
				 
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
