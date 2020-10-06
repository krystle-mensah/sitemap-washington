<!DOCTYPE html>

<?php include 'admin/inc/dbconfig.php';?>

<html lang="en">
<head>

<?php include('inc/head.php');?>
</head>

  <body class="player">
    
    <?php include 'inc/header.php';?>

    <?php include 'inc/navigation.php' ?>

    <?php
    if(isset($_GET['specific_chapter_id'])){
      $the_chapter = $_GET['specific_chapter_id'];
    }
    $connection = $pdo->open();
    try {
      $all_chapters = $connection->prepare("SELECT * FROM chapters");
      $all_chapters->execute();
                                
      foreach($all_chapters as $row) {
        $chapter_id = $row['chapter_id'];
        if($chapter_id == $the_chapter) {
          $chapter_video = $row['video'];
          $chapter_text = $row['slide'];
          $chapter_name = $row['chapter_name'];     
        
        }


      }
    }
    catch(PDOException $e){
      echo "There is some problem in connection: " . $e->getMessage();
    }
    $pdo->close();?>

    <div class="modal-wrap">
        
          <div class="container"> 
            <div class="row">
      
             
              <video id="the-video-player-for-chapters" class="col-xs-12 col-xs-12 col-md-12 col-lg-8" controls>
                <source src="mov_bbb.mp4" type="video/mp4">
                <source src="mov_bbb.ogg" type="video/ogg">
                Your browser does not support HTML video.
              </video><!-- #the-video-player-for-chapters --> 
             

              <div id="player-information" class="col-xs-12 col-sm-12 col-md-12 col-lg-4">       
                
                <h2 class="the-player-chapter-title"><?= $chapter_name; ?></h2>

                <h3 class="the-player-sub-text">sub text</h3>

                <p class="player-text">
                  <?=$chapter_text; ?>
                </p>

                <div class="player-controls grid-2">
                  <a class="player-controls-link" href="" id=""><i class="fa fa-list" id="the-transcript-icon" aria-hidden="true"></i>transcript</a>
                  <a class="player-controls-link share-hover-styles" href="" id=""><i class="fa fa-share-alt" id="the-share-icon"></i>share

                    <div class="tooltiptext">
                      
                      Tooltip text
                    
                    </div>

                  </a>
                </div><!-- player-controls -->
              </div><!-- player-information -->
            </div><!-- row -->
           
          </div><!-- container -->
        <!-- </div> -->
        <!-- player-wrap -->  
      <!-- </div> -->
      <!-- modal -->
    </div><!-- modal-wrap --> 

    <?php include 'inc/footer.php' ?>
  
    <!-- SCRIPTS -->
    <?php include './inc/scripts.php' ?>
    
  </body>
    
</html>


