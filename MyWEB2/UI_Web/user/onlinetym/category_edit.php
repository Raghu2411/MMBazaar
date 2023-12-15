<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"> Edit Category
</h6>
  </div>
  <div class="card-body">
  	<?php 

  	$connection = mysqli_connect("localhost","root","","onlineadmin");
  	if(isset($_POST['edit_cat_btn']))
		{
			$id = $_POST['edit_cat_id'];
	
			$query = "SELECT * FROM category WHERE cat_id='$id'";
			$query_run= mysqli_query($connection, $query);

			foreach ($query_run as $row) 
			{
				?>

				<form action="code.php" method="POST">
					
			<input type="hidden" name="edit_cat_id" value="<?php echo $row['cat_id'] ?>">	
            <div class="form-group">
                <label> Category_Name </label>
                <input type="text" name="categoryname" class="form-control" value="<?php echo $row['category_name'] ?>" required>
            </div>
            <div class="form-group">
                <label>Total Products</label>
                <input type="text" name="totalproduct" class="form-control" value="<?php echo $row['total_prod'] ?>" required>
            </div> 
            	<a href="managecat.php" class="btn btn-danger"> CANCEL </a>
            	<button type="submit"  name="updatecatbtn" class="btn btn-primary"> Update </button>

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