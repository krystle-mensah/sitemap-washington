
<?php 

// <!-- checking the page is there -->
//echo "here";

// add connection to file
include 'inc/dbconfig.php';

// add connection to class with our method
$connection = $pdo->open(); 

?>

<?php
if(isset($_POST['login_button'])){
  
  $login_email = $_POST['login_email'];
  $login_password = $_POST['login_password'];

  try{
    // try this statment 
    $statement = $connection->prepare("SELECT * FROM users WHERE  user_email = '{$login_email}' ");
    // then do it
    $statement->execute(); 
    
    foreach($statement as $row){

      // TEST 
      //$row['userId'];  // OUTPUT - id
  
      // now we get that users row information
      $db_userId = $row['userId'];
      $db_user_email = $row['user_email'];
      $db_user_password = $row['user_password'];
      //$db_username = $row['username'];
      //$db_user_firstname = $row['user_firstname'];
      //$db_user_permission = $row['user_permission'];
      
    }

    //VALIDATE USER
  
    if($login_email !== $db_user_email && $login_password !== $db_user_password) {

    //ELSE we do find a match
    } else {

      // Then create sessions
      //echo $_SESSION['username'] = $db_username;
  
      // $_SESSION['user_email'] = $db_user_email;
      // $_SESSION['user_password'] = $db_user_password;
      // $_SESSION['username'] = $db_username;
      // $_SESSION['user_firstname'] = $db_user_firstname;
      // $_SESSION['user_permission'] = $db_user_permission;

    //AND locate user to the cta.php page  
    header("Location: cta.php");
    
    }
    

  }//try
  //catch errors
  catch(PDOException $e){
    echo "There is some problem in connection: " . $e->getMessage();
  }
  $pdo->close();

} // isset

?>