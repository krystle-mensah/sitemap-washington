<?php //include "inc/admin_head.php"; ?>
<?php include "inc/dbconfig.php"; ?>

<?php 

//if edit button is pressed
if(isset($_GET['edit'])){

  //then convert that into the $var
  $the_cta_id = $_GET['edit']; 
  
  $query = "SELECT * FROM calltoaction WHERE id = {$the_cta_id} ";
  
  // function performs a query against a database to send in. 
  $edit_cta_query = mysqli_query($connection,$query);

  while($row = mysqli_fetch_array($edit_cta_query)) {
    //echo $row['title'];

    $admin_cta_title = $row['title'];
    $admin_cta_url = $row['url_location'];

  }

}

//UPDATING

if( isset( $_POST['edit_cta'] ) ) {

  // TEST
  ////echo $_POST['edit_cta'];

  // pick up values
  $admin_cta_title = $_POST['title'];
  $admin_cta_url = $_POST['url'];

  // create query to update table 
  $query = " UPDATE calltoaction  SET title = '{$admin_cta_title}', url_location = '{$admin_cta_url}' WHERE id = {$the_cta_id} ";

  // then we wont to sent that request in
  $update_cta_query = mysqli_query( $connection, $query );

  //look into accessing varible outside of this if statement

  if(!$update_cta_query) {

    die( 'QUERY FAILED' . mysqli_error($connection) );
  
  } else {
    //could add styling to this at some point
    echo "CTA Updated: " . " " . "<a href='cta.php'>View CTA'S</a> "; 
  }

}

?>

<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 col-lg-offset-2">

  <form action="" method="post" enctype="multipart/form-data"> 
  
    <div class="form-group">
      <label>CTA Title</label>
      <input type="text" class="form-control" name="title" placeholder="CTA Title" value="<?php echo $admin_cta_title; ?>">
    </div>

    <div class="form-group">
      <label>CTA URL (Include http://)</label>
      <input type="text" class="form-control" name="url" placeholder="CTA URL" value="<?php echo $admin_cta_url; ?>">
    </div>

    <div class="form-group">
      <input class="btn btn-default btn-success" type="submit" name="edit_cta" value="Update CTA">
    </div>

    </form>

</div><!-- alignment -->

<?php  
// TESTING
//// checking id
//// if(isset($_GET['edit'])){ echo $_GET['edit']; } 
//// CHECKING QUERY
//// if(isset($_GET['edit'])){
////   $the_cta_id = $_GET['edit']; 
////   $query = "SELECT * FROM calltoaction WHERE id = {$the_cta_id} ";
////   //echo $query;
////   $edit_cta_query = mysqli_query($connection,$query);
////   if ( false===$edit_cta_query ) {
////     printf("error: %s\n", mysqli_error($connection));
////   }
////   else {
////     echo 'done.';
////   }
//// }
?>
