<!DOCTYPE html>
<html lang="en">
<head>

  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Search</title>
  
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
  include('includes/script.php');
?>

<style>
	.product-grid-list{
		height: 1660px;
		overflow: hidden;
	}
	.product-grid-list:hover{
		overflow-y: auto; 
	}
/*img {
  width:300px;
  height:168px;
  object-fit:cover;
}*/


</style>

<section class="page-search">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Advance Search -->
				
			</div>
		</div>
	</div>
</section>
<section class="section-sm">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="search-result bg-gray">
					<h2>Results For <?php if($_GET['request']==="sub_cat") $name=$_GET['name']; else $name=$_GET['value'];echo $name; ?></h2>
					<p>123 Results on 21 June, 2019</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="category-sidebar">
					<div class="widget category-list">
  <h4 class="widget-header">All Categories</h4>
  <ul class="category-list">
    <li><a href="category.php?request=main_cat&value=Electronic">Electronics <span>
      <?php

                $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query = "SELECT prod_id FROM product WHERE main_cat_name='1' ORDER BY prod_id";
                $query_run = mysqli_query($connection , $query);
                
                $row = mysqli_num_rows($query_run);
                echo $row;

               ?></span></a></li>
    <li><a href="category.php?request=main_cat&value=Men Fashions">Men Fashion <span>
    <?php

                $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query = "SELECT prod_id FROM product WHERE main_cat_name='5' ORDER BY prod_id";
                $query_run = mysqli_query($connection , $query);
                
                $row = mysqli_num_rows($query_run);
                echo $row;

               ?>  
    </span></a></li>
    <li><a href="category.php?request=main_cat&value=Woman Fashions">Women Fashion <span>
      <?php

                $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query = "SELECT prod_id FROM product WHERE main_cat_name='6' ORDER BY prod_id";
                $query_run = mysqli_query($connection , $query);
                
                $row = mysqli_num_rows($query_run);
                echo $row;

               ?>
    </span></a></li>
    <li><a href="category.php?request=main_cat&value=Music">Music <span>
      <?php

                $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query = "SELECT prod_id FROM product WHERE main_cat_name='7' ORDER BY prod_id";
                $query_run = mysqli_query($connection , $query);
                
                $row = mysqli_num_rows($query_run);
                echo $row;

               ?>
    </span></a></li>
    <li><a href="category.php?request=main_cat&value=Baby">Baby <span>
      <?php

                $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query = "SELECT prod_id FROM product WHERE main_cat_name='2' ORDER BY prod_id";
                $query_run = mysqli_query($connection , $query);
                
                $row = mysqli_num_rows($query_run);
                echo $row;

               ?>
    </span></a></li>
    <li><a href="category.php?request=main_cat&value=Beauty">Beauty <span>
    <?php

                $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query = "SELECT prod_id FROM product WHERE main_cat_name='3' ORDER BY prod_id";
                $query_run = mysqli_query($connection , $query);
                
                $row = mysqli_num_rows($query_run);
                echo $row;

               ?></span></a></li>
    <li><a href="category.php?request=main_cat&value=Decorations">Decorations <span>
      <?php

                $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query = "SELECT prod_id FROM product WHERE main_cat_name='4' ORDER BY prod_id";
                $query_run = mysqli_query($connection , $query);
                
                $row = mysqli_num_rows($query_run);
                echo $row;

               ?>
    </span></a></li>
    <li><a href="category.php?request=main_cat&value=Acessories">Acessories <span>
      <?php

                $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query = "SELECT prod_id FROM product WHERE main_cat_name='8' ORDER BY prod_id";
                $query_run = mysqli_query($connection , $query);
                
                $row = mysqli_num_rows($query_run);
                echo $row;

               ?>
    </span></a></li>
  </ul>
</di

<div class="widget category-list">
	<h4 class="widget-header">Nearby Within Yangon</h4>
	<ul class="list-group">
          <?php 
          $connection = mysqli_connect("localhost","root","","mmbazaar");
            $sql="SELECT DISTINCT prod_loc FROM product ORDER BY prod_loc";
            $result=$connection->query($sql);
            while($row=$result->fetch_assoc()){
           ?>
           <li class="list-group-item">
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input product_check"
                value="<?= $row['prod_loc']; ?>" id="loc">
                <?= $row['prod_loc']; ?>
              </label>
            </div>
           </li>
          <?php } ?>
        </ul>
</div>

<!-- <div class="widget filter">
	<h4 class="widget-header">Filter By Brand</h4>
	<ul class="list-group">
          <?php 
          	$connection = mysqli_connect("localhost","root","","mmbazaar");
            $sql="SELECT DISTINCT prod_brand FROM product ORDER BY prod_brand";
            $result=$connection->query($sql);
            while($row=$result->fetch_assoc()){
           ?>
           <li class="list-group-item">
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input product_check"
                value="<?= $row['prod_brand']; ?>" id="brand">
                <?= $row['prod_brand']; ?>
              </label>
            </div>
           </li>
          <?php } ?>
    </ul>
</div> -->

<!-- <div class="widget price-range w-100">
	<h4 class="widget-header">Price Range</h4>
	<div class="block">
						<input class="range-track w-100" type="text" data-slider-min="0" data-slider-max="50000" data-slider-step="5"
						data-slider-value="[0,50000]">
				<div class="d-flex justify-content-between mt-2">
						<span class="value">1000 Kyats - 50000 Kyats</span>
				</div>
	</div>
</div> -->

<div class="widget product-shorting">
	<h4 class="widget-header">Filter By Condition</h4>
	<ul class="list-group">
          <?php 
            $sql="SELECT DISTINCT prod_status FROM product ORDER BY prod_status";
            $result=$connection->query($sql);
            while($row=$result->fetch_assoc()){
           ?>
           <li class="list-group-item">
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input product_check"
                value="<?= $row['prod_status']; ?>" id="status">
                <?= $row['prod_status']; ?>
              </label>
            </div>
           </li>
          <?php } ?>
        </ul>
</div>


<div class="widget product-shorting">
	<h4 class="widget-header">Filter By Method</h4>
	<ul class="list-group">
          <?php 
            $sql="SELECT DISTINCT preffered_method FROM product ORDER BY preffered_method";
            $result=$connection->query($sql);
            while($row=$result->fetch_assoc()){
           ?>
           <li class="list-group-item">
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input product_check"
                value="<?= $row['preffered_method']; ?>" id="prefferedmethod">
                <?= $row['preffered_method']; ?>
              </label>
            </div>
           </li>
          <?php } ?>
        </ul>
</div>



				</div>
			</div>





			<div class="col-md-9">
				<div class="product-grid-list">
					<div class="text-center">
				          <img src="images/loader.gif" id="loader" width="200" style="display:none;">
				        </div>
					<div class="row mt-30" id="result">

<?php 
            $connection = mysqli_connect("localhost","root","","mmbazaar");
            if($_GET['request']==="search_box")
            {
            	$name1=explode(" ",$_GET['value']);
            	$value1=array();
            	$sql="select p.user_id,p.prod_id,p.prod_name,p.prod_price,p.prod_img,p.modified_date,m.main_cat_name from product p,maincat m where p.sold_status='no' and p.main_cat_name=m.main_cat_id and (p.prod_name like '%".$_GET['value']."%'";
            	if(count($name1)>1)
            	{
            		foreach($name1 as $val)
            			$sql.=" or p.prod_name like'%".$val."%'";
            	}
            	$sql.=")";
              $_SESSION['your_state'] = "search_box";
              $_SESSION['search_value']=$_GET['value'];
            }
            else if($_GET['request']==="sub_cat")
            {
           		 $sql="SELECT `prod_id`, `prod_brand`, `prod_name`, `prod_price`, `prod_info`, `prod_img`, `prod_loc`, `prod_status`, `nego_status`, `preffered_method`, `user_id`, `main_cat_name`, `sub_cat_name`, `rate_count`, `created_date`, `modified_date` FROM `product` WHERE `sold_status`='no' and `sub_cat_name`=(SELECT `sub_cat_id` FROM `subcat` WHERE `sub_cat_name`='$name')";
               $_SESSION['your_state'] = "sub_cat";
                $_SESSION['sub']=$_GET['name'];
        	}
        	else if($_GET['request']==="main_cat")
        	{
        		// $sql="SELECT * from product where main_cat_name in SELECT main_cat_id from maincat where main_cat_name='".$_GET['name']."'";

        		$sql="SELECT `prod_id`, `prod_brand`, `prod_name`, `prod_price`, `prod_info`, `prod_img`, `prod_loc`, `prod_status`, `nego_status`, `preffered_method`, `user_id`, `main_cat_name`, `sub_cat_name`, `rate_count`, `created_date`, `modified_date` FROM `product` WHERE `sold_status`='no' and `main_cat_name`=(SELECT `main_cat_id` FROM `maincat` WHERE `main_cat_name`='".$_GET['value']."')";
            $_SESSION['main']=$_GET['value'];
            $_SESSION['your_state'] = "main_cat";
        	}
            $result=mysqli_query($connection,$sql);
            if (!$result)
            {
                die('Invalid query: '.mysql_error());
            }
            while($row = $result->fetch_assoc())
            //fetch_assoc($result) or $result->fetch_assoc() ?
            {
?>
<!-- start here -->
<div class="col-sm-12 col-lg-4 col-md-6">
							<!-- product card -->
<div class="product-item bg-light">
	<div class="card">
		<div class="thumb-content">
			<a href="single.php?userid=<?php echo $row['user_id']; ?>&idprod=<?php echo $row['prod_id']; ?>">
				<img class="card-img-top img-fluid" src="images/<?php echo $row['prod_img']; ?>" alt="Product Image">
			</a>
		</div>
		<div class="card-body">
		    <h4 class="card-title"><a href="single.php?userid=<?php echo $row['user_id']; ?>&idprod=<?php echo $row['prod_id']; ?>"><?php echo $row['prod_name']; ?></a></h4>
		    <ul class="list-inline product-meta">
          <li class="list-inline-item">
            <i class="fa fa-money"></i> <?php echo $row['prod_price']; ?> Kyats
          </li>
          <br>
		    	<li class="list-inline-item">
            <?php 
              $qq="select main_cat_name from maincat where main_cat_name='".$row['main_cat_name']."'";
              $r=mysqli_query($connection,$qq);
              $rw=mysqli_fetch_assoc($r);
             ?> 
		    		<i class="fa fa-folder-open-o"></i><?php echo $rw['main_cat_name']; ?>
		    	</li>
          <br>
		    	<li class="list-inline-item">
		    		<i class="fa fa-calendar"></i> <?php echo $row['modified_date']; ?>
		    	</li>
		    </ul>
		    <!-- <a href="single.php?idprod="<?php echo $row['prod_id']; ?>><input type="hidden"></a> -->
		    <!-- <div class="product-ratings">
		    	<ul class="list-inline">
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    	</ul>
		    </div> -->
		</div>
	</div>
</div>
</div>
<!-- End here -->
<?php } ?>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
    $(document).ready(function()
      {
        $(".product_check").click(function()
          {
            $("#loader").show();

            var useraction ='data';
            var brand =get_filter_text('brand');
            var status =get_filter_text('status');
            var prefferedmethod =get_filter_text('prefferedmethod');
            var loc=get_filter_text('loc');
            $.ajax(
              {
                url:'useraction.php',
                method:'POST',
                data:{useraction:useraction,prod_loc:loc,prod_brand:brand,prod_status:status,preffered_method:prefferedmethod},
                success:function(response)
                {
                  $("#result").html(response);
                  $("#loader").hide();
                  $("#textChange").text("Filtered Products");
                }
              });

          });
        function get_filter_text(text_id)
        {
          var filterData = [];
          $('#'+text_id+':checked').each(function()
          {
            filterData.push($(this).val());
          });
          return filterData;
        }
      });
  </script>
<!--============================
=            Footer            =
=============================-->
<?php
include_once("includes/script.php");
include_once("includes/footer.php");
?>