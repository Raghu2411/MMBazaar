<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<div class="modal fade" id="addcat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>




      <form action="code.php" method="POST" enctype="multipart/form-data">

        <div class="modal-body">

            <div class="form-group">
                <label> Category_Name </label>
                <input type="text" name="categoryname" class="form-control" placeholder="Enter Category Name" required>
            </div>
            <div class="form-group">
                <label>Total Products</label>
                <input type="text" name="totalproduct" class="form-control" placeholder="Enter Total Products" required>
            </div>       
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="categorybtn" class="btn btn-primary">Save</button><!-- registerbtn -->
        </div>
      </form>





    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Add New Category
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addcat">
              Add Category
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
    	$query = "SELECT * FROM category";
    	$query_run = mysqli_query($connection, $query);

    	 ?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> Category_Id </th>
            <th> Category_Name </th>
            <th> Total Product </th>
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
            <td><?php echo $row['cat_id']; ?></td>
            <td><?php echo $row['category_name']; ?></td>
            <td><?php echo $row['total_prod']; ?></td>
            <td>
            	<form action="category_edit.php" method="post">
            		<input type="hidden" name="edit_cat_id" 
            		value="<?php echo $row['cat_id']; ?>">
            	<button type="submit" name="edit_cat_btn" class="btn btn-success">Edit
            	</button>
            	</form>
            </td>
            <td>
            	<form action="code.php" method="post">
            		<input type="hidden" name="delete_cat_id" value="<?php echo $row['cat_id']; ?>">
            	<button type="submit" name="delete_cat_btn" class="btn btn-danger">Delete</button>
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