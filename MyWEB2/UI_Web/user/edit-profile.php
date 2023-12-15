<!DOCTYPE html>
<html lang="en">
<head>

  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Profile</title>
  
  <!-- FAVICON -->
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
  <link href="img/favicon.png" rel="shortcut icon">
  <!-- PLUGINS CSS STYLE -->
  <!-- <link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet"> -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap-slider.css">
  <!-- Font Awesome -->
  <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- Owl Carousel -->
  <link href="plugins/slick-carousel/slick/slick.css" rel="stylesheet">
  <link href="plugins/slick-carousel/slick/slick-theme.css" rel="stylesheet">
  <!-- Fancy Box -->
  <link href="plugins/fancybox/jquery.fancybox.pack.css" rel="stylesheet">
  <link href="plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet">
  <!-- CUSTOM CSS -->
  <link href="css/style.css" rel="stylesheet">


  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body class="body-wrapper">
<!--==================================
=            User Profile            =
===================================-->
<?php 
session_start();
include_once("includes/header.php");
//$_SESSION['user_id']=$_POST['user_id'];
$namegod=$_SESSION['user_name'];
//$_SESSION['user_img']=$_POST['user_img'];
 ?>
<section class="user-profile section">
	<div class="container">
		<div class="row">
			<div class="col-md-10 offset-md-1 col-lg-3 offset-lg-0">
				<div class="sidebar">
					<!-- User Widget -->
					<div class="widget user">
						<!-- User Image -->
						<?php 
						$connection = mysqli_connect("localhost","root","","mmbazaar");
									$query = "SELECT  `user_img` FROM `user` WHERE user_name='$namegod'";
									$query_run = mysqli_query($connection, $query);
						if(mysqli_num_rows($query_run) > 0)
								        {
								        	while($row = mysqli_fetch_assoc($query_run))
								        	{
						?>


						<div class="image d-flex justify-content-center">
							<img src="images/<?php echo $row['user_img']; ?>" alt="Image" class="">
						</div>
						<?php 
							}
								        }
								        else{
								        	echo "No Record Found";
								        }

								 ?>
						<!-- User Name -->
						<h5 class="text-center">
							<center>
							Name: <?php echo "$namegod" ?>
							</center>
						</h5>
					</div>

					<!-- Dashboard Links -->
					 <div class="widget user-dashboard-menu">
            <ul>
              <li ><a href="profile.php"><i class="fa fa-user"></i> Listing</a></li>
            <li class="active">
            	<a href="edit-profile.php">
            	<i class="fa fa-edit" ></i> Edit Profile</a>
            </li>
            <li><a href="chat.php"><i class="fas fa-comments"></i> Chat</a></li>
              <li><a data-target="#logout-alert" data-toggle="modal"><i class="fa fa-cog"></i> Logout</a></li>
              <li><a href="" data-toggle="modal" data-target="#deleteaccount"><i class="fa fa-power-off"></i>Delete
                  Account</a></li>
            </ul>
          </div>
          <!-- delete-account modal -->
          						  <!-- delete account popup modal start-->
                <!-- Modal -->
                <div class="modal fade" id="deleteaccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">




                    <div class="modal-content">
                    	<form action="cody.php" method="POST">
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
                      <div class="modal-header border-bottom-0">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body text-center">
                        <img src="images/account/Account1.png" class="img-fluid mb-2" alt="">
                        <h6 class="py-2">Are you sure you want to delete your account?</h6>
                        <p>Do you really want to delete these records? This process cannot be undone.</p>
                        <textarea name="message" id="" cols="40" rows="4" class="w-100 rounded"></textarea>
                      </div>
                      <div class="modal-footer border-top-0 mb-3 mx-5 justify-content-lg-between justify-content-center">



                      	<input type="hidden" name="user_id_name" value="Aung Bo">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger" name="del_user_btn">Delete</button>
                      </div>
                      </form>
                    </div>




                  </div>
                </div>
                <!-- delete account popup modal end-->
          <!-- delete-account modal -->
					
				</div>
			</div>
			<div class="col-md-10 offset-md-1 col-lg-9 offset-lg-0">
				<!-- Edit Profile Welcome Text -->
				<div class="widget welcome-message">
					<h2>Edit Profile?</h2>
					<p>Edit your profile only with the correct Informations.Otherwise you will get reported by users who follows you or checks your products.
						<br>
					Your account can be banned by the admin if the report count exceeded among the given count!
					</p>
				</div>
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
					
			
				<div class="row">
					<div class="col-lg-12 col-md-6">
						<div class="widget personal-info">
							<h3 class="widget-header user">Edit Personal Information</h3>

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


							//echo "<script>alert(\"".$namegod."\");</script>";
									$connection = mysqli_connect("localhost","root","","mmbazaar");
									$query = "SELECT `user_id`, `user_name`, `user_img`, `user_gmail`, `user_password`, `user_loc`, `created_date` FROM `user` WHERE user_name='$namegod'";
									$query_run = mysqli_query($connection, $query);
								//nice
								// value="<?php echo $row['cat_id'];


								        if(mysqli_num_rows($query_run) > 0)
								        {
								        	while($row = mysqli_fetch_assoc($query_run))
								        	{
								        		?>
							<form action="cody.php" method="POST" enctype="multipart/form-data">
								        	
								<!-- First Name -->
								<div class="form-group">
									<label for="first-name">Name</label>
									<input type="text" class="form-control" name="user_name" id="first-name" value="<?php echo $row['user_name']; ?>">
								</div>
								<!-- File chooser -->
								<div class="form-group choose-file d-inline-flex">
									<i class="fa fa-user text-center px-3"></i>
									<input type="file" name="admin_images" id="admin_images" class="form-control" value="<?php echo $row['user_img'] ?>">
								 </div>
								<div class="form-group">
									<label>Location</label>
									<select  class="form-control w-100" name="user_loc" value="<?php echo $row['user_loc']; ?>">
									<option value="">Choose</option>
	                                <option value="Ahlon">Ahlon</option>
	                                <option value="Bahan">Bahan</option>
	                                <option value="Botataung">Botataung</option>
	                                <option value="Dagon">Dagon</option>
	                                <option value="Dala">Dala</option>
	                                <option value="Hlaing">Hlaing</option>
	                                <option value="Insein">Insein</option>
	                                <option value="Latha">Latha</option>
	                                <option value="Mingaladon">Mingaladon</option>
	                                <option value="Tamwe">Tamwe</option>
	                                <option value="Yankin">Yankin</option>
	                                <option value="Other">Other</option>
								    </select>
								</div>
								<h3 class="widget-header user">Edit Email</h3>
								<div class="form-group">
								<label for="current-email">Current Email</label>
								<input type="email" class="form-control" id="current-email" name="user_email" value="<?php echo $row['user_gmail']; ?>">
							</div>
							<!-- New email -->
							<h3 class="widget-header user">Edit Password</h3>
							<div class="form-group">
								<label for="current-password">Current Password</label>
								<input type="text" class="form-control" id="current-password" value="<?php echo $row['user_password']; ?>">
							</div>
							<!-- New Password -->
							<div class="form-group">
								<label for="new-password">New Password</label>
								<input type="password" class="form-control" id="new-password" name="new_pass">
							</div>
							<!-- Confirm New Password -->
							<div class="form-group">
								<label for="confirm-password">Confirm New Password</label>
								<input type="password" class="form-control" id="confirm-password" name="confirm_pass">
							</div>
							<!-- Submit Button -->
							<input type="hidden" name="edit_user_id" value="<?php echo $row['user_id']; ?>">
							<button class="btn btn-transparent" name="update_user_btn">Change</button>
							</form>

							<?php 
							}
								        }
								        else{
								        	echo "No Record Found";
								        }

								 ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!--============================
=            Footer            =
=============================-->

<?php
include_once("includes/script.php");
?>