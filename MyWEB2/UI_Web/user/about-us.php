<!DOCTYPE html>
<html lang="en">
<head>

  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>About Us</title>
  
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
<!--================================
=            Page Title            =
=================================-->
<section class="page-title">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-md-2 text-center">
				<!-- Title text -->
				<h3>About Us</h3>
			</div>
		</div>
	</div>
	<!-- Container End -->
</section>

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about-img">
                    <img src="images/about/aboutus.jpg" class="img-fluid w-100 rounded" alt="">
                </div>
            </div>
            <div class="col-lg-6 pt-5 pt-lg-0">
                <div class="about-content">
                    <h3 class="font-weight-bold">Introduction</h3>
                    <p>Launched in 2012, Shop is South Asia's online shopping and selling destination of choice – present in Pakistan, Bangladesh, Sri Lanka, Myanmar and Nepal. Supported by a wide range of tailored marketing, data, and service solutions, the pioneering ecommerce ecosystem in South Asia has 30,000 sellers and 500 brands, serving 5 million consumers. With 2 million products available, Shop offers a diverse assortment of products in categories ranging from consumer electronics to household goods, beauty, fashion, sports equipment, and groceries. Focused on providing an excellent customer experience, it offers multiple payment methods including cash-on-delivery, comprehensive customer care and hassle-free returns.</p>
                    <h3 class="font-weight-bold">How we can help</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc est justo, aliquam nec tempor
                        fermentum, commodo et libero. Quisque et rutrum arcu. Vivamus dictum tincidunt magna id
                        euismod. Nam sollicitudin mi quis orci lobortis feugiat. Lorem ipsum dolor sit amet,
                        consectetur adipiscing elit. Nunc est justo, aliquam nec tempor fermentum, commodo et libero.
                        Quisque et rutrum arcu. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc est
                        justo, aliquam nec tempor fermentum, commodo et libero. Quisque et rutrum arcu. Vivamus dictum
                        tincidunt magna id euismod. Nam sollicitudin mi quis orci lobortis feugiat.</p>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="section bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6 my-lg-0 my-3">
                <div class="counter-content text-center bg-light py-4 rounded">
                    <i class="fa fa-smile-o d-block"></i>
                    <span class="counter my-2 d-block">
                      <?php 

                    $connection = mysqli_connect("localhost","root","","mmbazaar");
                    $query = "SELECT user_id FROM user ORDER BY user_id";
                    $query_run = mysqli_query($connection , $query);
                    
                    $row = mysqli_num_rows($query_run);
                    echo $row;


                     ?>
                    </span>
                    <h5>Happy Customers</h5>
                    </script>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 my-lg-0 my-3">
                <div class="counter-content text-center bg-light py-4 rounded">
                    <i class="fa fa-list-alt d-block"></i>
                    <span class="counter my-2 d-block">
                      <?php

                $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query = "SELECT main_cat_id FROM maincat ORDER BY main_cat_id";
                $query_run = mysqli_query($connection , $query);
                
                $row = mysqli_num_rows($query_run);
                echo $row;

               ?>
                    </span>
                    <h5>Total Categories</h5>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 my-lg-0 my-3">
                <div class="counter-content text-center bg-light py-4 rounded">
                    <i class="fa fa-bookmark-o d-block"></i>
                    <span class="counter my-2 d-block">
                      <?php

                $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query = "SELECT prod_id FROM product ORDER BY prod_id";
                $query_run = mysqli_query($connection , $query);
                
                $row = mysqli_num_rows($query_run);
                echo $row;

               ?>
                    </span>
                    <h5>Total Products</h5>
                </div>
            </div>




            <div class="col-lg-3 col-sm-6 my-lg-0 my-3">
                <div class="counter-content text-center bg-light py-4 rounded">
                    <i class="fa fa-user-o d-block"></i>
                    <span class="counter my-2 d-block">
                      <?php 


                    $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query = "SELECT id FROM register ORDER BY id";
                $query_run = mysqli_query($connection , $query);
                
                $row = mysqli_num_rows($query_run);
                echo $row;



                     ?>
                    </span>
                    <h5>Total Admins</h5>
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
include_once("includes/footer.php");
?>