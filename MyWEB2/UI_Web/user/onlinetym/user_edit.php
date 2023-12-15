<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> Edit Admin Profile
</h6>
  </div>
  <div class="card-body">
  	<?php 

  	$connection = mysqli_connect("localhost","root","","mmbazaar");
  	if(isset($_POST['edit_btn']))
		{
			$id = $_POST['edit_id'];
	
			$query = "SELECT * FROM users WHERE user_id='$id'";
			$query_run= mysqli_query($connection, $query);

			foreach ($query_run as $row) 
			{
				?>

				<form action="usercode.php" method="POST">
					
			<input type="hidden" name="edit_id" value="<?php echo $row['user_id'] ?>">	
			<div class="form-group">
                <label> Username </label>
                <input type="text" name="edit_username" value="<?php echo $row['username'] ?>" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="edit_email" value="<?php echo $row['user_email'] ?>" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="edit_password" value="<?php echo $row['user_password'] ?>" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Location</label>
                <input type="text" name="edit_loc" value="<?php echo $row['user_loc'] ?>" class="form-control" placeholder="Enter Location">
            </div>
            <div class="form-group">
                <label>Rate</label>
                <input type="text" name="edit_rate" value="<?php echo $row['user_rate'] ?>" class="form-control" placeholder="Enter Rate">
            </div>
             <div class="form-group">
                <label>Update Image</label>
                <input type="image" name="edit_img" value="<?php echo $row['user_img'] ?>" class="form-control">
            </div>
            <div class="form-group">
                <label>Listing</label>
                <input type="text" name="edit_listing" value="<?php echo $row['user_listing'] ?>" class="form-control" placeholder="Enter Listing">
            </div>
            <div class="form-group">
                <label>Follower</label>
                <input type="text" name="edit_follower" value="<?php echo $row['user_follower'] ?>" class="form-control" placeholder="Enter Follower">
            </div>
            <div class="form-group">
                <label>Following</label>
                <input type="text" name="edit_following" value="<?php echo $row['user_following'] ?>" class="form-control" placeholder="Enter Following">
            </div>

            	<a href="adminuser.php" class="btn btn-danger"> CANCEL </a>
            	<button type="submit"  name="updatebtn" class="btn btn-primary"> Update </button>

            </form>
            <?php
			}
		}	
  	 ?>
 

  	</div>
  </div>
</div>

</div>
<!-- /.container-fluid -->



<?php
include('includes/scripts.php');
include('includes/footer.php');
?>