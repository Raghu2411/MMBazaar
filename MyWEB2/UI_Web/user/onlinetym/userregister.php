<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Admin Profile 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add Admin Profile 
            </button>
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
    	$query = "SELECT * FROM register";
    	$query_run = mysqli_query($connection, $query);

    	 ?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Username </th>
            <th>Email</th>
            <th>Password</th>
            <th>Edit</th>
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
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['password']; ?></td>
            <td>
            	<form action="register_edit.php" method="post">
            		<input type="hidden" name="edit_id" 
            		value="<?php echo $row['id']; ?>">
            	<button type="submit" name="edit_btn" class="btn btn-success">Edit
            	</button>
            	</form>
            </td>
            <td>
            	<form action="code.php" method="post">
            		<input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
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