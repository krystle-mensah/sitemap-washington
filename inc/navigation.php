<nav class="nav-wrap hide-on-small" aria-label="Site navigation">

  <ul class="navbar-main-menu">
    <li class="navbar-icon-item">
      <a href="homepage.php" class="the-navbar-icon-link"><div class="sr-only">Return to homepage</div><i class="fa fa-home"></i></a>
    </li><!-- navbar-icon-item -->

  <?php $connection = $pdo->open();
      try {

        $all_channels = $connection->prepare("SELECT * FROM channels");

        foreach($all_channels as $row) {
        
        $channel_name = $row['name'];
        $sorting_fk = $row['sorting_fk'];
        
        ?>
          <?= "<li class='navbar-menu-item'>"; ?>
            <?= "<a class='the-navbar-menu-item-link'>$channel_name<i class='fa fa-caret-down'></i></a>"; ?>
          
            <?= "<ul class='navbar-sub-menu'>"; ?>
            
            <?php 
            $all_chapters = $connection->prepare("SELECT * FROM chapters");

              foreach($all_chapters as $row) {
                  $chapter_name = $row['chapter_name'];
                  $chapter_id = $row['chapter_id'];
                  $sorting_chapter = $row['sorting']; 
                ?>
                
                <?php if($sorting_chapter == $sorting_fk):
                echo 
                  "
                    <li class='navbar-sub-menu-item'>
                      <a href='player.php?specific_chapter_id=$chapter_id' class='the-navber-sub-menu-item-link'>$chapter_name</a>
                    </li>
                  
                  ";    
                    
                endif; 

              } ?>

            <?php echo "</ul>";//navbar-sub-menu ?>
          <?php echo "</li>";//navbar-menu-item ?>
        <?php } 
      }
      catch(PDOException $e){
        echo "There is some problem in connection: " . $e->getMessage();
      }
      $pdo->close();?>
  </ul><!-- navbar-main-menu -->
</nav><!-- nav-wrap -->