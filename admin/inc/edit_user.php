<?php //include "inc/admin_head.php"; ?>
<?php include "inc/dbconfig.php"; ?>

<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 col-lg-offset-1">

  <?php

        // Getting values from database

        //IF SET GET URL
        if(isset( $_GET['edit'] )) {
          // test 
          //echo $_GET['edit']; // outputs 1.

          // then we convert to a variable
          $the_user_id = $_GET['edit'];

          // test
          //echo $the_user_id;

          // then query the database for table where the column equals the url id we are catching
          $query = "SELECT * FROM users WHERE userId = $the_user_id ";

          // SEND IN function - Perform query against a database and send in connection and query.
          $select_all_users_query = mysqli_query($connection,$query);

          //then loop through that row's values for that id
          while($row = mysqli_fetch_array($select_all_users_query)) {
            
            //$userId = $row['userId']; 
            $user_email = $row['user_email'];
            $username  = $row['username'];
            //$user_password = $_row['user_password'];
            
            //now we put these values into the form

          }

          // PASSWORD encryption.
          ////$user_password =  mysqli_real_escape_string($connection, $user_password);

          ////create hash format
          ////$hashFormat = '$2y$10$';

          // //create salt which should be at least 22 charters any charecters
          ////$salt = 'iusesomecrazystrings22';

          // //now we put them together to pass into the crypt function. this well make it very secure
          ////$hashF_and_salt = $hashFormat . $salt;

          // //now we pass it in with the function crypt()
          ////$user_password = crypt($user_password, $hashF_and_salt);

          // //now we wont to get the values for that row from each column. that the user is edited

        }

        //update

        if(isset($_POST['edit_user'])){
          //test - should see the value of the input
          //echo $_POST['edit_user'];

          // test if you are getting thos values
          //echo $user_email = $_POST['user_email'];
          $user_email = $_POST['user_email'];
          $username = $_POST['username'];

          // INSERT INTO TABLE
          $query = "UPDATE users SET user_email = '{$user_email}', username = '{$username}' WHERE userId = {$the_user_id} ";

          //SEND IT IN
          $edit_user_query = mysqli_query($connection, $query);

          if(!$edit_user_query) {
            die('QUERY FAILED' . mysqli_error($connection) );
          } else {
            echo "User Updated: " . " " . "<a href='users.php'>View Users</a> "; 
          }

        }
  
  ?>

  <form action="" method="post" enctype="multipart/form-data"> 

    <div class="form-group">
      <label>Email</label>
        <input type="email" value="<?php echo $user_email; ?>" class="form-control" name="user_email" placeholder="email">
    </div>

    <div class="form-group">
      <label for="title">Username</label>
      <input type="text" value="<?php echo $username; ?>" class="form-control" name="username">
    </div>

    <!-- <div class="form-group">
      <label>Password</label>
      <input type="password" class="form-control" name="user_password" placeholder="password" value="<?php //echo $user_password; ?>">
    </div> -->

    <div class="form-group">
      <input class="btn btn-default btn-success" type="submit" name="edit_user" value="Save">
    </div> 

  </form>
</div><!-- alignment-->
