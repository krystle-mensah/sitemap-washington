<?php include "inc/admin_head.php"; ?>
<?php include "inc/dbconfig.php"; ?>

		<!-- admin Navigation -->
		<?php //include "inc/admin_navigation.php"; ?>
    
		<div class="page-wrapper">
      <?php //include "inc/admin_sidebar.php"; ?>
      <div class="content-wrapper">
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="row">

            <div class="col-sm-12 col-md-12 col-lg-10 col-lg-offset-1">

              <!-- <a href="cta.php?source=add_cta" class="btn btn-default btn-success"><i class="fa fa-plus"></i> Add CTA</a><br><br> -->

              <?php 
                
                $query = "SELECT * FROM calltoaction";
                
                // mysqli_query function sends in the above query and connection. 
                $all_cta = mysqli_query($connection,$query);
                
                while($row = mysqli_fetch_array($all_cta)){ ?>

                <?php 

                $admin_cta_id = $row['id'];
                $admin_cta_url = $row['url_location'];
                $admin_cta_title = $row['title'];
                $admin_cta_icon = $row['icon'];
                
                ?>

                <div class="box">
                  <table>
                    <tr>
                      <td class="title">
                        <h4 class='cta-longurl'><?php echo $admin_cta_title; ?> - URL: <?php echo $admin_cta_url; ?></h4>
                      </td>
                      <td class="actions" style="width: 230px;">
                        <a href="cta.php?source=edit_cta&edit=<?php echo $admin_cta_id; ?>" class="btn btn-default"><i class="fa fa-edit"></i> Edit</a> 
                      </td> 
                    </tr>
                  </table>
                </div><!-- box --> 
                <?php }  ?>
            </div><!-- alignment-->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->      
      </div><!-- ./content-wrapper --> 
		</div><!-- /.page-wrapper -->
