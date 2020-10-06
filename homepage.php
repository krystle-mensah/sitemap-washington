<!DOCTYPE html>

<?php include 'admin/inc/dbconfig.php';?>

<html lang="en">
<head>

<?php include 'inc/head.php';?>
</head>

<body class="homepage">

  <?php include 'inc/header.php';?>

    <div class="homepage-wrap hide_on_small">
      <div class="homepage-container">
        <!-- not sure about this div right now -->
        <div class="homepage-content">

        <?php $connection = $pdo->open();
            try{
              $all_channels = $connection->prepare("SELECT * FROM channels");
              $all_channels->execute();

            foreach($all_channels as $row) {
              $channel_name = $row['name'];
              $channel_sorting = $row['sorting_fk'];
                echo "
                <div class='homepage-block'>
                  <div class='channel-title inner-outline-for-channel-title'>
                    <h3 class='the-channel-title'>$row[name]<i class='fa fa-arrow-right channel-name-icon'></i></h3>
                  </div>";//channel-title ?>
                  
                  <?php echo "<div class='reveal'>"; ?>
                  
                    <?php echo "<div class='reveal-thumbnail'>"; ?>

                      <?php echo " <div class='the-reveal-thumbnail' style='background-image:url(img/$row[thumb])'></div>"; ?>
                    
                      <?php echo "<div class='chapters'>"; 
                      
                           $all_chapters = $connection->prepare("SELECT * FROM chapters");
                                $all_chapters->execute();
                          
                                foreach($all_chapters as $row) {
                                 
                                  $sorting_chapter = $row['sorting']; 
                                ?>
                                <?php 
                                
                                if( $sorting_chapter == $channel_sorting) {
                                  echo 
                                  "<a href='player.php?specific_chapter_id=$row[chapter_id]' class='chapter-name-link'>
                                      <i class='fa fa-play chapter-name-icon'></i>
                                        $row[chapter_name]
                                    </a>
                                  ";//chapter-name-link
                                }
                                
                                ?>                                 
                                
                                <?php } ?>

                      <?php echo "</div>"; //chapters ?>
                    <?php echo "</div>";//<!-- reveal-thumbnail -->  ?>
                    
                    <?php echo "<div class='reveal-title inner-outline-for-reveal-title'>"; ?>
                      <?php echo "<h3 class='the-reveal-channel-title'>$channel_name</h3>"; ?>
                    <?php echo "</div>";//reveal-title?>  
                    

                  <?php echo "</div>";//reveal ?>
                <?php echo "</div>"; //homepage-block  ?>
              
              <?php } 
            }
            catch(PDOException $e){
              echo "There is some problem in connection: " . $e->getMessage();
            }
            ?>
        </div> <!-- homepage-content -->
      </div><!-- homepage-container -->
    </div><!-- homepage-wrap -->

    <!-- HOMEPAGE MOBILE -->

    <div class="homepage-wrap-mobile display-none">
      <div class="homepage-container-mobile">
        

<?php
try { 
    $all_channels = $connection->prepare("SELECT * FROM channels");
    $all_channels->execute();

    foreach($all_channels as $row) {
      // Then assign the arrays to a variable
      $channel_name = $row['name'];
      //$sorting_fk = $row['sorting_fk'];
      $channel_sorting = $row['sorting_fk'];

      ?>
                  <?php echo "<div class='homepage-mobile'>";?>
                    
                    <?php echo "<div class='channel-title-mobile'> ";?>
                      <?php echo "<h3 class='the-channel-title-mobile'>$channel_name</h3>";?>
                    <?php echo "</div>";//channel-title-mobile?>

                              <?php

                                    $all_chapters = $connection->prepare("SELECT * FROM chapters");
                                    $all_chapters->execute();
                                    
                                    foreach($all_chapters as $row) {
                                      $chapter_name = $row['chapter_name'];
                                      $chapter_id = $row['chapter_id'];
                                      $sorting_chapter = $row['sorting']; 
                                    ?>

                                    <?php
                                    
                                    if($channel_sorting == $row['sorting']) {
                                      echo "<a href='player.php?specific_chapter_id=$row[chapter_id]' class='chapter-name-link-mobile'>
                                        <span class='the-channel-name-mobile'>$chapter_name</span>
                                        </a>
                                        
                                        ";
                                    }
                                    
                                    ?>
      
                                    <?php } ?>
                    
                          
                  
                  <?php echo "</div>";//homepage-mobile ?>
                  
                  <?php } ?>
            <?php     
          }
          catch(PDOException $e){
            echo "There is some problem in connection: " . $e->getMessage();
          }
          $pdo->close();?>
      </div><!-- homepage-container-mobile -->
    </div><!-- homepage-wrap-mobile -->

    <!-- you need to include the footer. -->
    <?php include 'inc/footer.php' ?>

    <!-- SCRIPTS -->
    <?php include './inc/scripts.php' ?>
</body>
</html>
