<!DOCTYPE html>
<html lang="en">
<head>

  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User Followers</title>
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>

  <!-- FAVICON -->
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

<?php
include_once("includes/header.php");
?>
<!--==================================
=            User Profile            =
===================================-->
<section class="dashboard section">
  <!-- Container Start -->
  <div class="container">
    <!-- Row Start -->
    <div class="row">
      <div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
        <div class="sidebar">
          <!-- User Widget -->
          <div class="widget user-dashboard-profile">
            <!-- User Image -->
            <div class="profile-thumb">
              <img src="images/user/userimg.png" alt="" class="rounded-circle">
            </div>
            <!-- User Name -->
            <h5 class="text-center">Aung Bo</h5>
            
            <a href="#"><strong>Gmail :</strong>User@gmail.com</a></br>
            <strong >Location :</strong>Myanmar </br></br>
            <p>Joined February 06, 2018</p>
          </div>
          <!-- Dashboard Links -->
          <div class="widget user-dashboard-menu">
            <ul>
              <li ><a href="profile.php"><i class="fa fa-user"></i> Listing</a></li>
            <li  ><a href="following.php"><i class="fa fa-user"></i> Followings</a></li><li  class="active"><a href="followers.php"><i class="fa fa-user"></i> Followers</a></li><li><a href="edit-profile.php"><i class="fa fa-edit"></i> Edit Profile</a></li>
              <li><a href="chat/chat.php"><i class="fas fa-comments"></i> Chat</a></li>
              <li><a href=""><i class="fas fa-heart"></i> Favourite Products</a></li>
              <li><a href="#"><i class="fa fa-cog"></i> Logout</a></li>
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
      <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
        <!-- Recently Favorited -->
        <div class="widget dashboard-container my-adslist">
          
          <table class="table table-responsive product-dashboard-table">
            <thead>
             
            </thead>
            <tbody>
              <tr>

                <td class="product-thumb">
                  <img width="80px" height="auto" src="images/products/user.png" alt="image description"></td>
                <td class="product-details">
                  <h3 class="title"> </h3>
                  <span class="add-id"><strong>Username :</strong> User</span>
                  <span><strong>Gmail :</strong><a href="www.user.com">User@gmail.com</a> </span>
                  
                  <span class="location"><strong>Location</strong>Myanmar</span>
                </td>
                <td class="action" data-title="Action">
                  <div class="">
                    <ul class="list-inline justify-content-center">
                      <li class="list-inline-item">
                        <button class="btn btn-primary">Follow Back</button>
                        
                      </li>
                         
                    </ul>
                  </div>
                </td>
              </tr>
              <tr>

                <td class="product-thumb">
                  <img width="80px" height="auto" src="images/products/user.png" alt="image description"></td>
                <td class="product-details">
                  <h3 class="title">  </h3>
                  <span class="add-id"><strong>Username :</strong> User</span>
                  <span><strong>Posted on: </strong><a href="#">Feb 12, 2017</a> </span>
                  
                  <span class="location"><strong>Location</strong>Myanmar</span>
                </td>
                <td class="action" data-title="Action">
                  <div class="">
                    <ul class="list-inline justify-content-center">
                      <li class="list-inline-item">
                        <button class="btn btn-primary">Followed
                        	<i class="fa fa-check-circle"></i>
                        </button>
                      </li>
                         
                    </ul>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="product-thumb">
                  <img width="80px" height="auto" src="images/products/user.png" alt="image description"></td>
                <td class="product-details">
                  <h3 class="title"> </h3>
                  <span class="add-id"><strong>Username :</strong> User</span>
                  <span><strong>Gmail :</strong><a href="#">User@gmail.com</time> </span>
                  
                  <span class="location"><strong>Location</strong>Myanmar</span>
                </td>
                <td class="action" data-title="Action">
                  <div class="">
                    <ul class="list-inline justify-content-center">
                      <li class="list-inline-item">
                        <button class="btn btn-primary">Follow Back</button>
                      </li>
                         
                    </ul>
                  </div>
                </td>
              </tr>
              <tr>

                <td class="product-thumb">
                  <img width="80px" height="auto" src="images/products/user.png" alt="image description"></td>
                <td class="product-details">
                  <h3 class="title"> </h3>
                  <span class="add-id"><strong>Username :</strong> User</span>
                  <span><strong>Gmail :</strong><a href="#">User@gmail.com</time> </span>
                  
                  <span class="location"><strong>Location</strong>Myanmar</span>
                </td>
                <td class="action" data-title="Action">
                  <div class="">
                    <ul class="list-inline justify-content-center">
                      <li class="list-inline-item">
                        <button class="btn btn-primary">Followed
                        	<i class="fa fa-check-circle"></i></button>
                      </li>
                         
                    </ul>
                  </div>
                </td>
              </tr>
              <tr>

                <td class="product-thumb">
                  <img width="80px" height="auto" src="images/products/user.png" alt="image description"></td>
                <td class="product-details">
                  <h3 class="title"> </h3>
                  <span class="add-id"><strong>Username :</strong> User</span>
                  <span><strong>Gmail :</strong><a href="#">User@gmail.com</time> </span>
                  
                  <span class="location"><strong>Location</strong>Myanmar</span>
                </td>
                <td class="action" data-title="Action">
                  <div class="">
                    <ul class="list-inline justify-content-center">
                      <li class="list-inline-item">
                        <button class="btn btn-primary">Followed
                          <i class="fa fa-check-circle"></i>
                        </a></button>
                      </li>
                         
                    </ul>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>

        </div>

        <!-- pagination -->
        <div class="pagination justify-content-center">
					<nav aria-label="Page navigation example">
						<ul class="pagination">
							<li class="page-item">
								<a class="page-link" href="#" aria-label="Previous">
									<span aria-hidden="true">&laquo;</span>
									<span class="sr-only">Previous</span>
								</a>
							</li>
							<li class="page-item active"><a class="page-link" href="#">1</a></li>
							<li class="page-item "><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item">
								<a class="page-link" href="#" aria-label="Next">
									<span aria-hidden="true">&raquo;</span>
									<span class="sr-only">Next</span>
								</a>
							</li>
						</ul>
					</nav>
				</div>
        <!-- pagination -->

      </div>
    </div>
    <!-- Row End -->
  </div>
  <!-- Container End -->
</section>
<!--============================
=            Footer            =
=============================-->


<?php
include_once("includes/script.php");
?>