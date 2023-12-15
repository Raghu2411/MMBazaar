<!DOCTYPE html>
<html lang="en">
<head>

  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MMBazaar Home</title>
  <link rel="shortcut icon" type="image/x-icon" href="mmbazaar.jpg">
  <!-- FAVICON -->
  <link href="img/favicon.png" rel="shortcut icon">
  <!-- PLUGINS CSS STYLE -->
  <!-- <link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet"> -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
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
<script type="text/javascript " src="http://192.168.43.141:8000/socket.io/socket.io.js"></script>
<?php
session_start();
$con=mysqli_connect("localhost","root","","mmbazaar");
include_once("includes/header.php");
if(isset($_POST['logout']))
{
	if($_POST['logout']==="yes")
	{
		if(isset($_SESSION))
		{
			session_unset();
			session_destroy();
			$_POST=array();
			echo "<script>window.location.href='index.php';</script>";
		}
	}
}
if(isset($_POST['user_id']))
{
	$_SESSION['user_id']=$_POST['user_id'];
	$_SESSION['user_name']=$_POST['user_name'];
	$_SESSION['user_img']=$_POST['user_img'];
	$_POST=array();
	echo "<script> window.location.href='index.php';</script>";
}
if(isset($_SESSION['user_id']))
{
	$query="select * from msg_for_".$_SESSION['user_id'];
		if(!mysqli_query($con,$query))
		{
			$query="create table msg_for_".$_SESSION['user_id']."(msg_id int auto_increment,other_user int,msg_type varchar(5),status varchar(7),msg text,assoc_item int,trans_status varchar(4),date date,time time,primary key(msg_id),foreign key(other_user) references user(user_id),foreign key(assoc_item) references product(prod_id))";
			mysqli_query($con,$query);
		}
		echo '<script>
		var socket=io.connect("http://192.168.43.141:8000");
		socket.on("connect",function(){
			socket.emit("newuser_join",'.$_SESSION['user_id'].');
		});	
		</script>';	
}
?>
<script type="text/javascript">
		function search_box(){
			var value=document.getElementById("inputtext4").value;
			window.location.href="category.php?request=search_box&value="+value;
		}
</script>

<!--===============================
=            Hero Area            =
================================-->

<section class="hero-area bg-1 text-center overly">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Header Contetnt -->
				<div class="content-block">
					<h1>Buy & Sell Near You </h1>
					<p>Join the millions who buy and sell from each other <br> everyday in local communities around the world</p>
					<div class="short-popular-category-list text-center">
						<h2>Popular Category</h2>
						<ul class="list-inline">
							<li class="list-inline-item">
								<a href="category.php?request=main_cat&value=Men Fashions"><i class="fas fa-mars"></i>Male Fashion</a></li>
							<li class="list-inline-item">
								<a href="category.php?request=main_cat&value=Woman Fashions"><i class="fas fa-venus"></i>Female Fashion</a>
							</li>
							<li class="list-inline-item">
								<a href="category.php?request=main_cat&value=Music"><i class="fa fa-music"></i>Music</a>
							</li>
							<li class="list-inline-item">
								<a href="category.php?request=main_cat&value=Electronic"><i class="fas fa-tv"></i> Electronics</a>
							</li>
							<li class="list-inline-item">
								<a href="category.php?request=main_cat&value=Baby"><i class="fas fa-baby"></i> Babies & Toys</a>
							</li>
						</ul>
					</div>		
				</div>
				<!-- Advance Search -->
				<div class="advance-search">
						<div class="container">
							<div class="row justify-content-center">
								<div class="col-lg-12 col-md-12">
										<div>
											<div class="form-row" style="margin-left: 120px;">
												<div class="form-group col-md-8">
													<input type="text" class="form-control" id="inputtext4" placeholder="What are you looking for">
												</div>	
												<div class="form-group col-md-4 align-self-center">
													<a onclick="search_box()"><button class="btn btn-primary">Search Now</button></a>
												</div>
											</div>
										</div>	
									</div>
								</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<!-- Container End -->
</section>

<!--===================================
=            Client Slider            =
====================================-->


<!--===========================================
=            Popular deals section            =
============================================-->

<section class="popular-deals section bg-gray">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<h2>Trending Adds</h2>
					<p>Check Out What's NEW!</p>
				</div>
			</div>
		</div>
		<div class="row">
			<!-- offer 01 -->
			<div class="col-lg-12">
				<div class="trending-ads-slide">

       <?php 
       		$query="select * from product p,maincat m where p.main_cat_name=m.main_cat_id and p.sold_status='no' limit 5";
       		$result=mysqli_query($con,$query);
       		if(mysqli_num_rows($result)>0)
       		{
       			while($row=mysqli_fetch_assoc($result))
       			{
       				echo '<div class="product-item bg-light mr-3"><div class="card"><div class="thumb-content">
       				<a href="single.php"><img class="card-img-top" src="images/'.$row['prod_img'].'" alt="Card image cap" height="300px" style="max-height:300px;object-fit:cover;"></a></div><div class="card-body"><h4 class="card-title"><a href="single.php?idprod='.$row['prod_id'].'&userid='.$row['user_id'].'">'.$row['prod_name'].'</a></h4><br><ul class="list-inline product-meta"><li class="list-inline-item"><i class="fa fa-folder-open-o"></i>'.$row['main_cat_name'].'</li><br><li class="list-inline-item"><i class="fa fa-calendar"></i>'.$row['modified_date'].'</li></ul><br></div></div></div>';
       			}
       		}
       ?>

					</div>
				</div>
			</div>
			
			
		</div>
	</div>
</section>



<!--==========================================
=            All Category Section            =
===========================================-->

<section class=" section">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-12">
				<!-- Section title -->
				<div class="section-title">
					<h2>Popular Categories</h2>
					<p>Simply Find Out Your Product!</p>
				</div>
				<div class="row">
					<!-- Category list -->
					<div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
						<div class="category-block">
							<div class="header">
								<i class="fa fa-laptop icon-bg-1"></i> 
								<h4>Electronics</h4>
							</div>
							<ul class="category-list" >
								<li><a href="category.php?request=sub_cat&name=Laptop">Laptop <span>
									<?php

                $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query = "SELECT prod_id FROM product WHERE sub_cat_name='1' ORDER BY prod_id";
                $query_run = mysqli_query($connection , $query);
                
                $row = mysqli_num_rows($query_run);
                echo $row;

               ?>
									</span></a></li>
								<li><a href="category.php?request=sub_cat&name=Phones">Phones <span>
									<?php

                $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query = "SELECT prod_id FROM product WHERE sub_cat_name='3' ORDER BY prod_id";
                $query_run = mysqli_query($connection , $query);
                
                $row = mysqli_num_rows($query_run);
                echo $row;

               ?>
								</span></a></li>
								<li><a href="category.php?request=sub_cat&name=GPS & Securities">GPS & Securities  <span>
									<?php

                $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query = "SELECT prod_id FROM product WHERE sub_cat_name='4' ORDER BY prod_id";
                $query_run = mysqli_query($connection , $query);
                
                $row = mysqli_num_rows($query_run);
                echo $row;

               ?>
								</span></a></li>
								<li><a href="category.php?request=sub_cat&name=Smart Watches">Smart Watches <span><?php

                $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query = "SELECT prod_id FROM product WHERE sub_cat_name='5' ORDER BY prod_id";
                $query_run = mysqli_query($connection , $query);
                
                $row = mysqli_num_rows($query_run);
                echo $row;

               ?></span></a></li>
								<li><a href="category.php?request=sub_cat&name=Others for Electronics">Others for Electronics <span>
									<?php

                $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query = "SELECT prod_id FROM product WHERE sub_cat_name='6' ORDER BY prod_id";
                $query_run = mysqli_query($connection , $query);
                
                $row = mysqli_num_rows($query_run);
                echo $row;

               ?>
								</span></a></li>
							</ul>
						</div>
					</div> <!-- /Category List -->
					<!-- Category list -->
					<div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
						<div class="category-block">
							<div class="header">
								<i class="fas fa-mars icon-bg-3"></i> 
								<h4>Men_Fashion</h4>
							</div>
							<ul class="category-list" >
								<li><a href="category.php?request=sub_cat&name=Bags">Bags <span><?php

                $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query = "SELECT prod_id FROM product WHERE sub_cat_name='22' ORDER BY prod_id";
                $query_run = mysqli_query($connection , $query);
                
                $row = mysqli_num_rows($query_run);
                echo $row;

               ?></span></a></li>
								<li><a href="category.php?request=sub_cat&name=Pants">Pants <span><?php

                $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query = "SELECT prod_id FROM product WHERE sub_cat_name='23' ORDER BY prod_id";
                $query_run = mysqli_query($connection , $query);
                
                $row = mysqli_num_rows($query_run);
                echo $row;

               ?></span></a></li>
								<li><a href="category.php?request=sub_cat&name=Shirts & Jackets">Shirts & Jackets  <span><?php

                $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query = "SELECT prod_id FROM product WHERE sub_cat_name='24' ORDER BY prod_id";
                $query_run = mysqli_query($connection , $query);
                
                $row = mysqli_num_rows($query_run);
                echo $row;

               ?></span></a></li>
								<li><a href="category.php?request=sub_cat&name=Shoes">Shoes<span><?php

                $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query = "SELECT prod_id FROM product WHERE sub_cat_name='25' ORDER BY prod_id";
                $query_run = mysqli_query($connection , $query);
                
                $row = mysqli_num_rows($query_run);
                echo $row;

               ?></span></a></li>
								<li><a href="category.php?request=sub_cat&name=Others for Men Fashions">Others for Men Fashions <span>
									<?php

                $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query = "SELECT prod_id FROM product WHERE sub_cat_name='26' ORDER BY prod_id";
                $query_run = mysqli_query($connection , $query);
                
                $row = mysqli_num_rows($query_run);
                echo $row;

               ?>
								</span></a></li>
							</ul>
						</div>
					</div> <!-- /Category List -->
					<!-- Category list -->
					<div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
						<div class="category-block">
							<div class="header">
								<i class="fas fa-venus icon-bg-2"></i> 
								<h4>Women_Fashion</h4>
							</div>
							<ul class="category-list" >
								<li><a href="category.php?request=sub_cat&name=Dresses">Dresses <span><?php

                $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query = "SELECT prod_id FROM product WHERE sub_cat_name='27' ORDER BY prod_id";
                $query_run = mysqli_query($connection , $query);
                
                $row = mysqli_num_rows($query_run);
                echo $row;

               ?></span></a></li>
								<li><a href="category.php?request=sub_cat&name=Scandals">Scandals <span><?php

                $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query = "SELECT prod_id FROM product WHERE sub_cat_name='28' ORDER BY prod_id";
                $query_run = mysqli_query($connection , $query);
                
                $row = mysqli_num_rows($query_run);
                echo $row;

               ?></span></a></li>
								<li><a href="category.php?request=sub_cat&name=Shirts">Shirts  <span><?php

                $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query = "SELECT prod_id FROM product WHERE sub_cat_name='29' ORDER BY prod_id";
                $query_run = mysqli_query($connection , $query);
                
                $row = mysqli_num_rows($query_run);
                echo $row;

               ?></span></a></li>
								<li><a href="category.php?request=sub_cat&name=Skirts & Pants">Skirts & Pants <span><?php

                $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query = "SELECT prod_id FROM product WHERE sub_cat_name='30' ORDER BY prod_id";
                $query_run = mysqli_query($connection , $query);
                
                $row = mysqli_num_rows($query_run);
                echo $row;

               ?></span></a></li>
								<li><a href="category.php?request=sub_cat&name=Others for Woman Fashions">Others for Woman Fashions <span>
									<?php

                $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query = "SELECT prod_id FROM product WHERE sub_cat_name='31' ORDER BY prod_id";
                $query_run = mysqli_query($connection , $query);
                
                $row = mysqli_num_rows($query_run);
                echo $row;

               ?>
								</span></a></li>
							</ul>
						</div>
					</div> <!-- /Category List -->
					<!-- Category list -->
					<div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
						<div class="category-block">
							<div class="header">
								<i class="fa fa-music icon-bg-4"></i> 
								<h4>Music</h4>
							</div>
							<ul class="category-list" >
								<li><a href="category.php?request=sub_cat&name=Musical Instruments">Musical Instruments<span><?php

                $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query = "SELECT prod_id FROM product WHERE sub_cat_name='32' ORDER BY prod_id";
                $query_run = mysqli_query($connection , $query);
                
                $row = mysqli_num_rows($query_run);
                echo $row;

               ?></span></a></li>
								<li><a href="category.php?request=sub_cat&name=K-pop Albums">K-pop Albums <span><?php

                $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query = "SELECT prod_id FROM product WHERE sub_cat_name='33' ORDER BY prod_id";
                $query_run = mysqli_query($connection , $query);
                
                $row = mysqli_num_rows($query_run);
                echo $row;

               ?></span></a></li>
								<li><a href="category.php?request=sub_cat&name=US Albums">US Albums <span><?php

                $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query = "SELECT prod_id FROM product WHERE sub_cat_name='34' ORDER BY prod_id";
                $query_run = mysqli_query($connection , $query);
                
                $row = mysqli_num_rows($query_run);
                echo $row;

               ?></span></a></li>
								<li><a href="category.php?request=sub_cat&name=Acessories for Music">Acessories for Music <span><?php

                $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query = "SELECT prod_id FROM product WHERE sub_cat_name='35' ORDER BY prod_id";
                $query_run = mysqli_query($connection , $query);
                
                $row = mysqli_num_rows($query_run);
                echo $row;

               ?></span></a></li>
								<li><a href="category.php?request=sub_cat&name=Others for Music">Others for Music <span>
									<?php

                $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query = "SELECT prod_id FROM product WHERE sub_cat_name='36' ORDER BY prod_id";
                $query_run = mysqli_query($connection , $query);
                
                $row = mysqli_num_rows($query_run);
                echo $row;

               ?>
								</span></a></li>
							</ul>
						</div>
					</div> <!-- /Category List -->
					<!-- Category list -->
					<div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
						<div class="category-block">
							<div class="header">
								<i class="fas fa-baby icon-bg-5"></i> 
								<h4>Baby</h4>
							</div>
							<ul class="category-list" >
								<li><a href="category.php?request=sub_cat&name=Bags,Backpacks & Belts">Bags,Backpacks & Belts <span><?php

                $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query = "SELECT prod_id FROM product WHERE sub_cat_name='7' ORDER BY prod_id";
                $query_run = mysqli_query($connection , $query);
                
                $row = mysqli_num_rows($query_run);
                echo $row;

               ?></span></a></li>
								<li><a href="category.php?request=sub_cat&name=Clothing">Clothing <span><?php

                $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query = "SELECT prod_id FROM product WHERE sub_cat_name='8' ORDER BY prod_id";
                $query_run = mysqli_query($connection , $query);
                
                $row = mysqli_num_rows($query_run);
                echo $row;

               ?></span></a></li>
								<li><a href="category.php?request=sub_cat&name=Things for Newborn">Things for Newborn  <span><?php

                $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query = "SELECT prod_id FROM product WHERE sub_cat_name='9' ORDER BY prod_id";
                $query_run = mysqli_query($connection , $query);
                
                $row = mysqli_num_rows($query_run);
                echo $row;

               ?></span></a></li>
								<li><a href="category.php?request=sub_cat&name=Shoes">Shoes <span><?php

                $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query = "SELECT prod_id FROM product WHERE sub_cat_name='10' ORDER BY prod_id";
                $query_run = mysqli_query($connection , $query);
                
                $row = mysqli_num_rows($query_run);
                echo $row;

               ?></span></a></li>
								<li><a href="category.php?request=sub_cat&name=Others for Baby">Others for Baby <span><?php

                $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query = "SELECT prod_id FROM product WHERE sub_cat_name='11' ORDER BY prod_id";
                $query_run = mysqli_query($connection , $query);
                
                $row = mysqli_num_rows($query_run);
                echo $row;

               ?></span></a></li>
							</ul>
						</div>
					</div> <!-- /Category List -->
					<!-- Category list -->
					<div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
						<div class="category-block">
							<div class="header">
								<i class="fas fa-magic icon-bg-6"></i> 
								<h4>Beauty</h4>
							</div>
							<ul class="category-list" >
								<li><a href="category.php?request=sub_cat&name=Beauty_Accessories">Beauty_Accessories <span><?php

                $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query = "SELECT prod_id FROM product WHERE sub_cat_name='12' ORDER BY prod_id";
                $query_run = mysqli_query($connection , $query);
                
                $row = mysqli_num_rows($query_run);
                echo $row;

               ?></span></a></li>
								<li><a href="category.php?request=sub_cat&name=Foundations">Foundations <span><?php

                $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query = "SELECT prod_id FROM product WHERE sub_cat_name='13' ORDER BY prod_id";
                $query_run = mysqli_query($connection , $query);
                
                $row = mysqli_num_rows($query_run);
                echo $row;

               ?></span></a></li>
								<li><a href="category.php?request=sub_cat&name=Lipsticks">Lipsticks  <span><?php

                $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query = "SELECT prod_id FROM product WHERE sub_cat_name='14' ORDER BY prod_id";
                $query_run = mysqli_query($connection , $query);
                
                $row = mysqli_num_rows($query_run);
                echo $row;

               ?></span></a></li>
								<li><a href="category.php?request=sub_cat&name=Skincare">Skincare <span><?php

                $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query = "SELECT prod_id FROM product WHERE sub_cat_name='15' ORDER BY prod_id";
                $query_run = mysqli_query($connection , $query);
                
                $row = mysqli_num_rows($query_run);
                echo $row;

               ?></span></a></li>
								<li><a href="category.php?request=sub_cat&name=Others for Beauty">Others for Beauty <span>
									<?php

                $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query = "SELECT prod_id FROM product WHERE sub_cat_name='16' ORDER BY prod_id";
                $query_run = mysqli_query($connection , $query);
                
                $row = mysqli_num_rows($query_run);
                echo $row;

               ?>
								</span></a></li>
							</ul>
						</div>
					</div> <!-- /Category List -->
					<!-- Category list -->
					<div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
						<div class="category-block">
							<div class="header">
								<i class="fas fa-igloo icon-bg-7"></i>
								<h4>Decorations</h4>
							</div>
							<ul class="category-list" >
								<li><a href="category.php?request=sub_cat&name=Blankets & Quilts">Blankets & Quilts <span><?php

                $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query = "SELECT prod_id FROM product WHERE sub_cat_name='17' ORDER BY prod_id";
                $query_run = mysqli_query($connection , $query);
                
                $row = mysqli_num_rows($query_run);
                echo $row;

               ?></span></a></li>
								<li><a href="category.php?request=sub_cat&name=Chairs & Armchairs">Chairs & Armchairs <span><?php

                $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query = "SELECT prod_id FROM product WHERE sub_cat_name='18' ORDER BY prod_id";
                $query_run = mysqli_query($connection , $query);
                
                $row = mysqli_num_rows($query_run);
                echo $row;

               ?></span></a></li>
								<li><a href="category.php?request=sub_cat&name=Vases">Vases  <span><?php

                $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query = "SELECT prod_id FROM product WHERE sub_cat_name='19' ORDER BY prod_id";
                $query_run = mysqli_query($connection , $query);
                
                $row = mysqli_num_rows($query_run);
                echo $row;

               ?></span></a></li>
								<li><a href="category.php?request=sub_cat&name=Lamps & Lighting">Lamps & Lighting <span><?php

                $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query = "SELECT prod_id FROM product WHERE sub_cat_name='20' ORDER BY prod_id";
                $query_run = mysqli_query($connection , $query);
                
                $row = mysqli_num_rows($query_run);
                echo $row;

               ?></span></a></li>
								<li><a href="category.php?request=sub_cat&name=Others for Decorations">Others for Decorations <span>
									<?php

                $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query = "SELECT prod_id FROM product WHERE sub_cat_name='21' ORDER BY prod_id";
                $query_run = mysqli_query($connection , $query);
                
                $row = mysqli_num_rows($query_run);
                echo $row;

               ?>
								</span></a></li>
							</ul>
						</div>
					</div> <!-- /Category List -->
					<!-- Category list -->
					<div class="col-lg-3 offset-lg-0 col-md-5 offset-md-1 col-sm-6 col-6">
						<div class="category-block">
							
							<div class="header">
								<i class="fas fa-dice-d20 icon-bg-8"></i> 
								<h4>Acessories</h4>
							</div>
							<ul class="category-list" >
								<li><a href="category.php?request=sub_cat&name=Rings">Rings <span><?php

                $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query = "SELECT prod_id FROM product WHERE sub_cat_name='40' ORDER BY prod_id";
                $query_run = mysqli_query($connection , $query);
                
                $row = mysqli_num_rows($query_run);
                echo $row;

               ?></span></a></li>
								<li><a href="category.php?request=sub_cat&name=Bracelet">Bracelet <span><?php

                $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query = "SELECT prod_id FROM product WHERE sub_cat_name='37' ORDER BY prod_id";
                $query_run = mysqli_query($connection , $query);
                
                $row = mysqli_num_rows($query_run);
                echo $row;

               ?></span></a></li>
								<li><a href="category.php?request=sub_cat&name=Earings">Earings  <span><?php

                $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query = "SELECT prod_id FROM product WHERE sub_cat_name='38' ORDER BY prod_id";
                $query_run = mysqli_query($connection , $query);
                
                $row = mysqli_num_rows($query_run);
                echo $row;

               ?></span></a></li>
								<li><a href="category.php?request=sub_cat&name=Necklace">Necklace <span><?php

                $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query = "SELECT prod_id FROM product WHERE sub_cat_name='39' ORDER BY prod_id";
                $query_run = mysqli_query($connection , $query);
                
                $row = mysqli_num_rows($query_run);
                echo $row;

               ?></span></a></li>
								<li><a href="category.php?request=sub_cat&name=Others for Acessories">Others for Acessories <span>
									<?php

                $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query = "SELECT prod_id FROM product WHERE sub_cat_name='41' ORDER BY prod_id";
                $query_run = mysqli_query($connection , $query);
                
                $row = mysqli_num_rows($query_run);
                echo $row;

               ?>
								</span></a></li>
							</ul>
						</div>
					</div> <!-- /Category List -->
					
					
				</div>
			</div>
		</div>
	</div>
	<!-- Container End -->
</section>


<!--====================================
=            Call to Action            =
=====================================-->

<section class="call-to-action overly bg-3 section-sm">
	<!-- Container Start -->
	<div class="container">
		<div class="row justify-content-md-center text-center">
			<div class="col-md-8">
				<div class="content-holder">
					<h2>Start today to get more exposure and
					grow your business!</h2>
					<!-- <ul class="list-inline mt-30">
						<li class="list-inline-item"><a class="btn btn-main" href="Ad-listing.php">Add Listing</a></li>
					</ul> -->
				</div>
			</div>
		</div>
	</div>
	<!-- Container End -->
</section>		
<!--============================
=            Footer            =
=============================-->



<!-- JAVASCRIPTS -->

<?php
include_once("includes/script.php");
include_once("includes/footer.php");
?>