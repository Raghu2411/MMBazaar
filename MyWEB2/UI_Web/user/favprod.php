<!DOCTYPE html>
<html lang="en">
<head>

  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Favourite Products</title>
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
session_start();
include_once("includes/header.php");
  //$_SESSION['user_id']=$_POST['user_id'];
  $namegod=$_SESSION['user_name'];
  
  //$_SESSION['user_img']=$_POST['user_img'];
  //echo "<script>alert(\"".$namegod."\");</script>";

  $connection = mysqli_connect("localhost","root","","mmbazaar");
?>

<!--==================================
=            User Profile            =
===================================-->
<section class="dashboard section">






<div class="modal fade" id="addnewprod" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Product Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>




        <div class="modal-body">








          <div class="row">
          <div class="col-lg-50 col-md-12">
            <div class="widget personal-info">
              <form action="cody.php" method="POST" enctype="multipart/form-data">
                <!-- First Name -->
                <?php 
                $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query = "SELECT `user_id` FROM `user` WHERE user_name='$namegod'";
                $query_run = mysqli_query($connection, $query);
                while($row = mysqli_fetch_assoc($query_run))
                {
            ?>
                <input type="hidden" name="userid" value="<?php echo $row['user_id']; ?>">
                <?php 
                 }

                 ?>
                <div class="form-group">
                  <label>Select Product Brand:</label>
                  <input type="text" class="form-control" id="first-name" name="prodbrand">
                </div>
                <!-- Last Name -->
                <div class="form-group">
                  <label for="last-name">Enter the product name:</label>
                  <input type="text" class="form-control" id="last-name" name="prodname">
                </div>
                <div class="form-group">
                  <label for="zip-code">Select Category:</label>
                  <select class="form-control" id="sel1" name="maincat">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="zip-code">Select Sub-Category:</label>
                  <select class="form-control" id="sel1" name="subcat">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="last-name">Enter the product price:</label>
                  <input type="text" class="form-control" id="last-name" placeholder="(Enter only Kyats!)" name="prodprice">
                </div>
                <div class="form-group">
                  <label for="last-name">Enter the product informations:</label>
                  <input type="text" class="form-control" id="last-name" name="prodinfo">
                </div>
                <div class="form-group">
                  <label for="last-name">Enter the product count(s):</label>
                  <input type="text" class="form-control" id="last-name" name="prodcount">
                </div>
                <!-- File chooser -->
                <div class="form-group choose-file d-inline-flex">
                  <i class="fa fa-file-image-o text-center px-3"></i>
                  <input type="file" class="form-control-file mt-2 pt-1" id="input-file" name="prod_images">
                 </div>
                <!-- Comunity Name -->
                <div class="form-group">
                  <label for="last-name">Enter the product location:</label>
                  <select class="form-control" id="sel1" name="prodloc">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="comunity-name">Select Product Status:</label>
                  <select class="form-control" id="sel1" name="prodstatus">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                </select>
                </div>
                <!-- Zip Code -->
                <div class="form-group">
                  <label for="zip-code">Select Negotation Status:</label>
                  <select class="form-control" id="sel1" name="prodnego">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="zip-code">Select Preffered-Method:</label>
                  <select class="form-control" id="sel1" name="prodprefer">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  </select>
                </div>
                <!-- Submit button -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="addprodbtn" class="btn btn-primary">Save</button><!-- registerbtn -->
                </div>
              </form>
            </div>
          </div>

        </div>
        </div>
        




    </div>
  </div>
</div>








  <!-- Container Start -->
  <div class="container">
    <!-- Row Start -->
    <div class="row">
      <div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
        <div class="sidebar">
          <!-- User Widget -->

            <?php 

                $query = "SELECT `user_img`, `user_gmail`, `user_loc`, `created_date` FROM `user` WHERE user_name='$namegod'";
                $query_run = mysqli_query($connection, $query);
                while($row = mysqli_fetch_assoc($query_run))
                {
            ?>
          <div class="widget user-dashboard-profile">
            <!-- User Image -->
            <div class="profile-thumb">
              <img src="images/<?php echo $row['user_img']; ?>" alt="Image" class="">
            </div>
            <!-- User Name -->
            <center>
            <h5 class="text-center">Name: <?php echo "$namegod"; ?></h5>
            </center>
            <a href="#"><strong>Gmail :</strong><?php echo $row['user_gmail']; ?></a></br>
            <strong >Location :</strong><?php echo $row['user_loc']; ?> </br></br>
            <center>
             <p>Joined On: <?php echo $row['created_date']; ?></p>
             </center>
          </div>
          <?php 
                 }

                 ?>
          <!-- Dashboard Links -->
          <div class="widget user-dashboard-menu">
            <ul>
              <li class="active"><a href="profile.php"><i class="fa fa-user"></i> Listing</a></li>
            <li ><a href="following.php"><i class="fa fa-user"></i> Followings</a></li><li ><a href="followers.php"><i class="fa fa-user"></i> Followers</a></li><li><a href="edit-profile.php"><i class="fa fa-edit" ></i> Edit Profile</a></li>
              <li><a href="chat/chat.php"><i class="fas fa-comments"></i> Chat</a></li>
              <li><a href="favprod.php"><i class="fas fa-heart"></i> Favourite Products</a></li>
              <li><a href="index.php"><i class="fa fa-cog"></i> Logout</a></li>
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
        <div class="widget dashboard-container my-adslist">
  
            <h3 class="widget-header">My Items</h3>

          <table class="table table-responsive product-dashboard-table">
            <thead>
              <tr>
                <th>Image</th>
                <th>Product Details</th>
                <th class="text-center">Price</th>
                <th class="text-center">Category</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>

              <?php 
              echo "<script>alert(\"".$namegod."\");</script>";
            $connection = mysqli_connect("localhost","root","","mmbazaar");
            $sql="SELECT `fav_id`, `prod_id`, `prod_img`, `prod_name`, `prod_brand`, `prod_count`, `prod_price`, `prod_main_cat`, `created_date`, `user_id`, `prod_loc` FROM `favourite` WHERE `user_id`=(SELECT `user_id` FROM `user` WHERE `user_name`='$namegod')";
           //echo "<script>alert(\"".$sql."\");</script>";
            $result=mysqli_query($connection,$sql);
            if (!$result)
            {
                die('Invalid query: '.mysql_error());
            }
            while($row = $result->fetch_assoc())
            //fetch_assoc($result) or $result->fetch_assoc() ?
            {

           ?>
              <tr>

                <td class="product-thumb">
                  <img width="80px" height="auto" src="images/<?php echo $row['prod_img']; ?>" alt="image description"></td>
                <td class="product-details">
                  <h3 class="title"><?php echo $row['prod_name']; ?></h3>
                  <span class="add-id"><strong>Brand:</strong><?php echo $row['prod_brand']; ?></span>

                  <span class="status active"><strong>Quantity:</strong><?php echo $row['prod_count']; ?></span>
                  
                  <span class="location"><strong>Location:</strong><?php echo $row['prod_loc']; ?></span>
                  <span><strong>Posted on: </strong><time><?php echo $row['created_date']; ?></time> </span>
                </td>


                <td class="product-category"><span class="categories"><?php echo $row['prod_price']; ?> Kyats</span></td>

                <td class="product-category"><span class="categories"><?php echo $row['prod_main_cat']; ?></span></td>


                <td class="action" data-title="Action">
                  <div class="">

                    <form action="cody.php" method="post">
                        <input type="hidden" name="prod_view_id" value="<?php echo $row['prod_id']; ?>">
                      <button type="submit" name="prod_view_btn" class="btn btn-primary">View!
                      </button>
                    </form>

                  </div>

                </td>
              </tr>
                            <!--Added Thon data from here on!-->
                <!--View-->
                <!--edit-->
                   <?php }
                    ?>   
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