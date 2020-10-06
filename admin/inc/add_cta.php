<?php //include "inc/admin_head.php"; ?>
<?php include "inc/dbconfig.php"; ?>

<?php

/*

Notice: Undefined index: url_location in /Applications/XAMPP/xamppfiles/htdocs/sitemap-washington/admin/inc/add_cta.php on line 12

Notice: Undefined index: sorting in /Applications/XAMPP/xamppfiles/htdocs/sitemap-washington/admin/inc/add_cta.php on line 14
QUERY FAILEDColumn count doesn't match value count at row 1

*/

// if this is declared/PRESSED
if(isset($_POST['create_cta'])){
  
  // create a test
  //echo $_POST['url_location'];

  $url           = $_POST['url_location'];
  $title         = $_POST['title'];
  $cta_sorting         = $_POST['sorting'];
  
  // INSERT INTO DATABASE TABLE AND COLUMNS
  $query = "INSERT INTO calltoaction(url_location, title, sorting) ";

  // INSERT VALUES FROM USER
  $query .= "VALUES('{$url}','{$title}') "; 
  
  // SEND IN 
  $create_cta_query = mysqli_query($connection, $query); 

  // CONFIRM
  if(!$create_cta_query){

    die("QUERY FAILED" . mysqli_error($connection));

  }

}

?>

<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 col-lg-offset-1">
              
  <form action="" method="post" enctype="multipart/form-data"> 

    <div class="form-group">
      <label>Title</label>
      <input type="text" class="form-control" name="title" placeholder="Title">
    </div>

    <div class="form-group">
      <label>Url</label>
      <input type="text" class="form-control" name="url" placeholder="Url">
    </div>

    <button type="submit" name="create_cta" class="btn btn-default btn-success">Add CTA</button>

  </form>

</div><!-- alignment -->