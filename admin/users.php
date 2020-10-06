<?php include "inc/admin_head.php"; ?>

	

		<!-- admin Navigation -->
		<?php include "inc/admin_navigation.php"; ?>
  
		<div class="page-wrapper">
      <?php include "inc/admin_sidebar.php"; ?>
      <div class="content-wrapper">
        <div class="container-fluid">

        <!-- Page Heading -->
          <div class="row">
            
              

              <?php 

              //check if the 'source' has been declared
              if(isset($_GET['source'])){

                // if ture assign variable
                $source = $_GET['source'];

              // we have to put an else because im getting an undefined variable.  
              } else {

                // variable assigned to eptmy string
                $source = '';

              }

              // compare variable with each case.
              switch($source){
                // if source is equal to add post
                case 'add_user';

                //then display this
                include "inc/add_user.php";
              
                // stop
                break;

                // if source is equal to this page
                case 'edit_user';

                //then display this
                include "inc/edit_user.php";
              
                // stop
                break;

                // if case's fail then default to this page.
                default: 

                include "inc/view_all_users.php";
                
                // stop running  
                break;

              }

              ?>

            
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      
      </div><!-- ./content-wrapper --> 

		</div><!-- /.page-wrapper -->
