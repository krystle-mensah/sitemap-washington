<header class="site-header" class="hidden-small" role="banner" aria-label="site header">

  <div class="header-logo-container">

    <a class="header-logo-link" href="#" target="_blank">

      <img src="img/logo.png" class="logo" alt="">

    </a> 

  </div><!-- header-logo-container -->

  <!-- MENU BUTTON -->
  <div class="hamburger">
    <span class="display-none">
      <a href="#" onclick="openSlideMenu()">
      <svg width="30" height="30">
        <path d="M0,5 30,5" stroke="#fff" stroke-width="5"/>
        <path d="M0,14 30,14" stroke="#fff" stroke-width="5"/>
        <path d="M0,23 30,23" stroke="#fff" stroke-width="5"/>
      </svg>
      </a>
    </span>
  </div><!-- hamburger -->
  
  <!-- SIDE-NAV MENU -->
  <div id="side-menu" class="side-nav display-none">
    <!-- close button -->
    <a class="side-nav-close-botton" onclick="closeSlideMenu()" href="#">&times;</a>
    <!-- home button -->
    <a class="side-nav-link" href="#">home</a>
    <?php $connection = $pdo->open();
    try{
      $all_channels = $connection->prepare("SELECT * FROM channels");
      $all_channels->execute();
      foreach($all_channels as $row){
      
      $channel_sorting = $row['sorting_fk'];

      echo "<div class='side-nav-channel-name'>$row[name]";
                  
        $all_chapters = $connection->prepare("SELECT * FROM chapters");
        $all_chapters->execute();
      
        foreach($all_chapters as $row) {
          
          if( $channel_sorting == $row['sorting']) {
            
            echo "<a href='player.php?specific_chapter_id=$row[chapter_id]' class='nav_sub_menu_item_link'>$row[chapter_name]</a>";

          }
        }
      echo "</div>";//close side-nav-channel-name 
       
      };//channels 
    }
    catch(PDOException $e){
      echo "There is some problem in connection: " . $e->getMessage();
    }
    $pdo->close();?>
  </div><!-- side-menu -->
    
    
  
              

  <ul class="header-cta-container hide-on-small">
  <!-- here I have the connection propety equal to the pdo intance then I refar to the method to open a connection -->
    <?php $connection = $pdo->open();
       try{
        // try this statment 
        $statement = $connection->prepare("SELECT * FROM calltoaction");
        // then do it
        $statement->execute();
        //Then
        foreach ($statement as $row) {

          echo "<li class='cta-item hide-on-small'><a class='cta-item-link' href='$row[url_location]'>$row[title]</a>$row[icon]</li>";

        }
      }
      // if there are any errors
      catch(PDOException $e){
         echo "There is some problem in connection: " . $e->getMessage();
       }
    $pdo->close();?>
  </ul><!-- ul#header-cta -->

</header><!-- #site-header -->


