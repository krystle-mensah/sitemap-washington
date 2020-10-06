<!-- Footer -->
<footer>
  <div class="footer-container">

    <h5 class="footer-university-title hide_on_small"><?= date("Y");?> &#169; Washington University in St. Louis - School of Law</h5>
      
    <span class="share-footer-text hide_on_small ">share</span>
    
    <div class="share-block hide_on_small">
      <i class="fa fa-share-alt foot-share-icon"></i>

     
      <ul class="share-content">
        <li class="share-content-item"><a href="https://www.facebook.com/" class="share-content-link facebook-share socialicon" target="blank_" title="Share on Facebook">
          <em class="fa fa-facebook" aria-hidden="true"></em>
          <div class="sr-only">Share on Facebook</div></a>
        </li>
        <li class="share-content-item"><a href="https://twitter.com/" target="blank_" class="share-content-link twitter-share socialicon" title="Share on Twitter">
          <em class="fa fa-twitter" aria-hidden="true"></em>
          <div class="sr-only">Share on Twitter</div></a>
        </li>
        <li class="share-content-item"><a class="share-content-link" href="#" title="Share via Email">
        <em class="fa fa-envelope" aria-hidden="true"></em>
        <div class="sr-only">Share via Email</div></a>
        </li>
      </ul><!-- share-content --> 
       
			

    </div><!-- share-block -->
    
  
    <a class="studentBridge-logo-link hide_on_small " href="https://www.studentbridge.com/" target="_blank" title="StudentBridge">
      <img class="the-studentBridge-logo-image" src="img/studentBridge-logo.png" alt="StudentBridge">
    </a>
    

    <!-- MOBILE FOOTER -->
    <section class="footer-mobile display-none">
      <div class="footer-cta">
      <?php $connection = $pdo->open();
      try {
        $call_to_actions = $connection->prepare("SELECT * FROM calltoaction");
        $call_to_actions->execute();
        foreach ($call_to_actions as $row) {

          echo 
          "<div class='mobile-cta-item'>
            <a class='mobile-cta-item-link' href='$row[url_location]'>$row[title]</a>
            $row[icon]
          </div>";

        }
      }
       // if there are any errors
       catch(PDOException $e){
        echo "There is some problem in connection: " . $e->getMessage();
      }

      $pdo->close();?>

      </div><!-- footer-cta -->
    </section><!-- footer-mobile -->

  </div> <!-- footer-container -->
</footer>