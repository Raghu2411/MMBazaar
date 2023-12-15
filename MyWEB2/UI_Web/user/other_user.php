<!DOCTYPE html>
<html lang="en">
<head>

  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User Profile</title>
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

<!-- testing selecting -->

<!-- end of testing selecting -->


</head>

<body class="body-wrapper">
<?php
session_start();
include_once("includes/header.php");
  //$_SESSION['user_id']=$_POST['user_id'];
  $namegod=$_SESSION['user_name'];
  $idgod=$_SESSION['user_id'];
  //$_SESSION['user_img']=$_POST['user_img'];
  //echo "<script>alert(\"".$namegod."\");</script>";

  $connection = mysqli_connect("localhost","root","","mmbazaar");
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

          <!-- delete-account modal -->
          						  <!-- delete account popup modal start-->
                <!-- Modal -->
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
  
            <center><h3 class="widget-header">User Listings!</h3></center>

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
              echo "<script>alert(\"".$idgod."\");</script>";
            $connection = mysqli_connect("localhost","root","","mmbazaar");
            $sql="SELECT  `prod_id`,`prod_brand`, `prod_name`, `prod_price`, `prod_info`, `prod_count`, `prod_img`, `prod_loc`, `prod_status`, `nego_status`, `preffered_method`,`user_id`, `main_cat_name`, `sub_cat_name`, `created_date`, `modified_date` FROM `product` WHERE `user_id`=(SELECT `user_id` FROM `user` WHERE `user_name`='$namegod')";
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

                <td class="product-category"><span class="categories">
                  <?php 

                  $mainnamer =$row['main_cat_name'];
                  $qu="SELECT  `main_cat_name` FROM `maincat` WHERE `main_cat_id`='$mainnamer'";
                  $q_run=mysqli_query($connection,$qu);
                  while ($r=$q_run->fetch_assoc()) 
                  {
                    echo $r['main_cat_name'];
                  }

                   ?>     
                  </span>
                </td>


                <td class="action" data-title="Action">
                  <div class="">



                    <ul class="list-inline justify-content-center">


                      <li class="list-inline-item">
                        <form action="prodview.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="view_id" 
                value="<?php echo $row['prod_id']; ?>">
                
                        <button type="submit" name="show_view" id="viewg" class="btn btn-transparent">View
                        </button>
                
                        </form>
                      </li> 

                    </ul>
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