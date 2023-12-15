<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">User Requests
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
      $connection = mysqli_connect("localhost","root","","mmbazaar");
      $query = "SELECT * FROM contact";
      $query_run = mysqli_query($connection, $query);

       ?>
      <table class="table table-bordered" id="datatableid" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Name </th>
            <th> Email </th>
            <th> About </th>
            <th> Message </th>
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
            <td><?php echo $row['contact_id']; ?></td>
            <td><?php echo $row['user_name']; ?></td>
            <td><?php echo $row['user_gmail']; ?></td>
            <td><?php echo $row['cat_info']; ?></td>
            <td><?php echo $row['contact_info']; ?></td>
            <td>
              <form action="usercode.php" method="post">
                <input type="hidden" name="delete_con_id" value="<?php echo $row['contact_id']; ?>">
              <button type="submit" name="del_con_btn" class="btn btn-danger">Delete</button>
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