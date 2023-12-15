<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="usercode.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Username </label>
                <input type="text" name="username" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Save</button><!-- registerbtn -->
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Manage Users 
    </h6>
  </div>

  <div class="card-body">
    <?php 

    if(isset($_SESSION['success']) && $_SESSION['success'] !='')
    {
      echo '<h2 class="bg-primary text-white"> '.$_SESSION['success'].' </h2>';
      unset($_SESSION['success']);
    }

    if(isset($_SESSION['status']) && $_SESSION['status'] !='')
    {
      echo '<h2 class="bg-danger text-white"> '.$_SESSION['status'].' </h2>';
      unset($_SESSION['status']);

    }
     ?>



    <div class="table-responsive">
      <?php
      $query = "SELECT * FROM user";
      $query_run = mysqli_query($connection, $query);

       ?>
      <table class="table table-bordered" id="datatableid" width="100%" cellspacing="0" ><!-- table-dark table-striped -->
        <thead>
          <tr>
            <th>Image</th>
            <th> ID </th>
            <th> Username </th>
            <th>Email</th>
            <th>Location</th>
            <th>Listings</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
     
        <?php 

        if(mysqli_num_rows($query_run) > 0)
        {
          while($row = mysqli_fetch_assoc($query_run))
          {
            ?>
          <tr>
            <td><img src="../images/<?php echo $row['user_img']; ?>" height=100 width=100></td>
            <td><?php echo $row['user_id']; ?></td>
            <td><?php echo $row['user_name']; ?></td>
            <td><?php echo $row['user_gmail']; ?></td>
            <td><?php echo $row['user_loc']; ?></td>
            <td>

               <?php 
                $counter=$row['user_id'];
                //echo "<script>alert(\"".$counter."\");</script>";
                $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query1 = "SELECT prod_id FROM product WHERE user_id='$counter' ORDER BY user_id";
                $query_run1 = mysqli_query($connection , $query1);
                
                $row1= mysqli_num_rows($query_run1);
                echo $row1;


            ?>




            </td>

            
            <!-- <td><?php echo $row['user_listing']; ?></td> -->
            <td>
              <form action="usercode.php" method="post">
                <input type="hidden" name="delete_id" value="<?php echo $row['user_id']; ?>">
              <button type="submit" name="delete_btn" class="btn btn-danger">Delete</button>
              </form>
            </td>
          </tr>
          <?php
          }
        }
        else{
          echo "No Record Found";
        }
         ?>

        </tbody>
      </table>
    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>