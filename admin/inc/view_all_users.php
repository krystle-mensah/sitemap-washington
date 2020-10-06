<?php 
include "inc/admin_head.php"; 
include "inc/dbconfig.php";
?>

<div class="page-wrapper">
      <div class="content-wrapper">
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="row">
              
          <div class="col-sm-12 col-md-12 col-lg-10 col-lg-offset-1">
            <a href="users.php?source=add_user" class="btn btn-default btn-success"><i class="fa fa-plus"></i> Add User</a><br><br>

            <div class="box">
              <table>
                <tr>
                  <td class="number"></td>
                  <td class="title">Email</td>
                  <td class="title">Username</td>
                  <td class="title">Password</td>
                  <!-- <td class="title">Account Level</td> -->
                  <td class="title" style="width: 230px;"></td>
                </tr>
              </table>
            </div>
            <?php $connection = $pdo->open(); 

              try {

                $statement = $connection->prepare("SELECT * FROM users");
                $statement->execute();

                foreach($statement as $row){ ?>
                  <div class="box">
                    <table class="user_table">
                      <tr>
                        <td class="number">
                          <h3></h3>
                        </td>
                        <td class="title">
                          <h4><?=$row['user_email']; ?></h4>
                        </td>
                        <td class="title">
                          <h4><?=$row['username'];?></h4>
                        </td>
                        <td class="title">
                          <h4><input type="password" name="" value="<?=$row['user_password'];?>" /></h4>
                        </td>
                        
                        <td class="actions" style="width: 230px;">
                          <a href="users.php?source=edit_user&edit=<?= $row['userId']; ?>" class="btn btn-default"><i class="fa fa-edit"></i> Edit</a> 
                     
                          <a href="users.php?delete=<?=$row['userId'];?>" class="btn btn-default btn-danger deleteUser"><i class="fa fa-trash-o"></i>Delete</a>
                        </td>
                      </tr>
                    </table>
                  </div>
                  <?php }  
                
              } catch(PDOException $e){
                echo "There is some problem in connection: " . $e->getMessage();
              }

            $pdo->close();?>

                  <?php 
                  
                  //  if pressed
                  if(isset($_GET['delete'])){

                    //  then convert that into the $var
                    $the_user_id = $_GET['delete']; 
                    
                    // query the database for {$the_comment_id}
                    $query = "DELETE FROM users WHERE userId = {$the_user_id} ";
                    
                    // function performs a query against a database to send in. 
                    $delete_user_query = mysqli_query($connection,$query);
                    
                    // then refresh the page everytime it is submited
                    //header("Location: users.php");
                    
                  }
          
                  ?>

          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      
      </div><!-- ./content-wrapper --> 

</div><!-- /.page-wrapper -->
