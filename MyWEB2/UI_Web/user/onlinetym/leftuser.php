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
      $query = "SELECT * FROM delete_acc";
      $query_run = mysqli_query($connection, $query);

       ?>
      <table class="table table-bordered" id="datatableid" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Name </th>
            <th> Message </th>
            <th> Time</th>
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
            <td><?php echo $row['del_id']; ?></td>
            <td><?php echo $row['user_name']; ?></td>
            <td><?php echo $row['del_info']; ?></td>
            <td><?php echo $row['created_time']; ?></td>
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