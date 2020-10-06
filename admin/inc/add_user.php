<?php 
include "inc/dbconfig.php"; 

// $regex = "/tom/";
//   if(preg_match($regex,$login_email)){
//     echo 'we have a match';

//   }else {
//     echo 'we dont have a match';
//   }
// if this is set
if(isset($_POST['create_user'])){
  
  // create a test
  //echo $_POST['title'];

  // VALUES PICK UP
  $user_email       = $_POST['user_email'];
  $username         = $_POST['username'];
  $user_password    = $_POST['user_password'];
  //$user_firstname         = $_POST['user_firstname'];
  //$user_permission       = $_POST['user_permission'];

  // CLEAN PASSWORD encryption.
  $user_password =  mysqli_real_escape_string($connection, $user_password);

  //create hash format
  $hashFormat = '$2y$10$';

  // create salt which should be at least 22 charters any charecters
  $salt = 'iusesomecrazystrings22';

  // now we put them together to pass them into the crypt function. this well make it very secure
  $hashF_and_salt = $hashFormat . $salt;

  // now we pass it in with the function crypt()
  $user_password = crypt($user_password, $hashF_and_salt);
  
  // INSERT INTO DATABASE
  $query = "INSERT INTO users(user_email,username,user_password) ";

  // INSERT VALUES FROM USER
  $query .= "VALUES('{$user_email}','{$username}','{$user_password}') "; 
  
  // SEND IN 
  $create_user_query = mysqli_query($connection, $query); 

  // CONFIRM
  if(!$create_user_query){

    
    die("QUERY FAILED" . mysqli_error($connection));

  } else {
    //could add styling to this at some point
    echo "User Created: " . " " . "<a href='users.php'>View Users</a> "; 
  }

}

?>

<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 col-lg-offset-1">
              
  <form action="" method="post" enctype="multipart/form-data"> 

    <div class="form-group">
      <label>Email</label>
      <input type="email" class="form-control" name="user_email" placeholder="email">
    </div>

    <div class="form-group">
      <label>Username</label>
      <input type="text" class="form-control" name="username" placeholder="Your Username">
    </div>

    <div class="form-group">
      <label>Password</label>
      <input type="password" class="form-control" name="user_password" placeholder="" value="">
    </div>

    <button type="submit" name="create_user" class="btn btn-default btn-success">Add User</button>

  </form>

</div><!-- alignment -->