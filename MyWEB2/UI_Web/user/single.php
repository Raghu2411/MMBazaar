<!DOCTYPE html>
<html lang="en">
<head>

  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>View Product</title>
  
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

  <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">


    <!--for chat-->

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
	if(isset($_SESSION['user_id']))
	{
		$namegod=$_SESSION['user_name'];
	  	$idgod=$_SESSION['user_id'];
	  	include_once("offer.php");
	  	echo '<script>
		var socket=io.connect("http://192.168.43.141:8000");
		socket.on("connect",function(){
			socket.emit("newuser_join",'.$_SESSION['user_id'].');
		});	
		</script>';	
  	}
  include_once("includes/header.php");
  // if(isset($_GET['prodname']))
  // {
  	$idprod=$_GET['idprod'];
  	$userid=$_GET['userid'];
  // }
?>
<!--===================================
=            Store Section            =
====================================-->

<div class="modal fade" id="reportprod" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                        <h6 class="py-2">Are you sure you want to report this product? This process cannot be undone.</p>
                        <textarea name="message" id="" cols="40" rows="4" class="w-100 rounded"></textarea>
                      </div>
                      <div class="modal-footer border-top-0 mb-3 mx-5 justify-content-lg-between justify-content-center">
                      	<input type="hidden" name="productid" value="<?php echo $idprod; ?>">
                        <input type="hidden" name="id_user" value=" <?php echo $idgod; ?>">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger" name="report_user_btn">Report</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>



<section class="section bg-gray">
	<!-- Container Start -->
	<?php 
            $connection = mysqli_connect("localhost","root","","mmbazaar");
            $sql="SELECT `prod_id`,`prod_brand`, `prod_name`, `prod_price`, `prod_info`, `prod_img`, `prod_loc`, `prod_status`, `nego_status`, `preffered_method`, `user_id`, `main_cat_name`, `sub_cat_name`, `rate_count`, `created_date`, `modified_date` FROM `product` WHERE `prod_id`='$idprod'";
            $result=mysqli_query($connection,$sql);
            if (!$result)
            {
                die('Invalid query: '.mysql_error());
            }
            while($row = $result->fetch_assoc())
            //fetch_assoc($result) or $result->fetch_assoc() ?
            {
            	$to_user_id=$row['user_id'];
?>
	<div class="container">
		<div class="row">
			<!-- Left sidebar -->
			<div class="col-md-8">
				<div class="product-details">
					<h1 class="product-title"><?php echo $row['prod_name']; ?></h1>
					<div class="product-meta">
						<ul class="list-inline">
							<li class="list-inline-item"><i class="fa fa-folder-open-o"></i> 

							<!-- add Cat here -->
							Category 
							<?php 

				                  $mainnamer =$row['main_cat_name'];
				                  $qu="SELECT  `main_cat_name` FROM `maincat` WHERE `main_cat_id`='$mainnamer'";
				                  $q_run=mysqli_query($connection,$qu);
				                  while ($r=$q_run->fetch_assoc()) 
				                  {
				                    echo $r['main_cat_name'];
				                  }

				            ?> 
							</li>
							<li class="list-inline-item"><i class="fa fa-location-arrow"></i> Location <?php echo $row['prod_loc']; ?></li>
						</ul>
					</div>

					<!-- product slider -->
					
						<div class="product-slider-item my-4">
							<img class="img-fluid w-100" src="images/<?php echo $row['prod_img']; ?>" alt="product-img" width="600" height="500">
						</div>
						
					
					<!-- product slider -->

					<div class="content mt-5 pt-5">
						<ul class="nav nav-pills  justify-content-center" id="pills-tab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home"
								 aria-selected="true">Product Details</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile"
								 aria-selected="false">Specifications</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact"
								 aria-selected="false">Reviews</a>
							</li>
						</ul>
						<div class="tab-content" id="pills-tabContent">
							<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
								<h3 class="tab-title">Product Description</h3>
								<p><?php echo $row['prod_info']; ?></p>
							</div>
							<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
								<h3 class="tab-title">Product Specifications</h3>
								<table class="table table-bordered product-table">
									<tbody>
										<tr>
											<td>Seller Price</td>
											<td><?php echo $row['prod_price']; ?></td>
										</tr>
										<tr>
											<td>Added</td>
											<td><?php echo $row['modified_date']; ?></td>
										</tr>
										<tr>
											<td>State</td>
											<td><?php echo $row['prod_loc']; ?></td>
										</tr>
										<tr>
											<td>Brand</td>
											<td><?php echo $row['prod_brand']; ?></td>
										</tr>
										<tr>
											<td>Condition</td>
											<td><?php echo $row['prod_status']; ?></td>
										</tr>
										<tr>
											<td>Negotiable Status</td>
											<td><?php echo $row['nego_status']; ?></td>
										</tr>
										<tr>
											<td>Preferred Method</td>
											<td><?php echo $row['preffered_method']; ?></td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
								<h3 class="tab-title">Product Review</h3>
								<div class="product-review">

										<div class="review-submission">
										<h3 class="tab-title">Submit your review</h3>
										<!-- Rate -->
										

								<div class="review-submit">



								<form method="POST" id="comment_form">			 	
								<?php 
									$query = "SELECT `user_name`,`user_img` FROM `user` WHERE `user_id`='$idgod'";
			                $query_run = mysqli_query($connection, $query);
			                while($row = mysqli_fetch_assoc($query_run))
			                {
								 ?>	
    								<div class="form-group">
    									<input type="hidden" class="form-control" name="comment_name" id="comment_name" placeholder="Enter name" value="<?php echo $row['user_name']; ?>">
    									
    									<label>Name: <?php echo $row['user_name']; ?></label> 
    								</div>
    								<!-- <img class="rounded-circle img-fluid mb-5 px-5" src="images/<?php echo $row['user_img']; ?>" alt=""> -->
    								<!-- <input type="hidden" name="comment_user_img" value="images/<?php echo $row['user_img']; ?>"> -->
    						<?php 
			                 }

			                ?>		
    								<input type="hidden" name="comment_prod_id" id="comment_prod_id" value="<?php echo $idprod ?>">
    								<input type="hidden" name="comment_user_id" id="comment_user_id" value="<?php echo $idgod ?>">
    								<div class="form-group">
     								<textarea name="comment_content" id="comment_content" class="form-control" placeholder="Enter Comment" rows="5"></textarea>
    								</div>
								
									<div class="col-12">
									<input onclick="location.reload();" type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
									</div>
								</form>
								</div>	


											<!-- comment -->
											
											
											<div id="display_comment"></div>
										
									
									
									</div>
								</div>
							</div>
						</div>
					</div>
					 <!-- <div class="widget rate"> -->
						<!-- Heading -->
						<!-- <h5 class="widget-header text-center">What would you rate
							<br>
							this product</h5> -->
						<!-- Rate -->
						<!-- <div class="starrr"></div>
					</div> -->
					<div class="widget disclaimer">
						<h5 class="widget-header">Safety Tips</h5>
						<ul>
							<li>Meet seller at a public place!</li>
							<li>Check the item before you buy!</li>
							<li>Pay only after collecting the item!</li>
							<li>Wait till the dealing ends!</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="sidebar">
					<div class="widget price text-center">
						<h4>Price</h4>
						<?php 
							$query = "SELECT `prod_price` FROM `product` WHERE `prod_id`='$idprod'";
			                $query_run = mysqli_query($connection, $query);
			                while($row = mysqli_fetch_assoc($query_run))
			                {
									

						 ?>
						<p><?php echo $row['prod_price']; ?>Kyats</p>
						<?php 
			                 }

			                ?>
					</div>
					<!-- User Profile widget -->
					<div class="widget user text-center">

						<?php 

			                $query = "SELECT `user_name`,`user_img`, `user_gmail`, `user_loc`, `created_date` FROM `user` WHERE `user_id`='$userid'";
			                $query_run = mysqli_query($connection, $query);
			                while($row = mysqli_fetch_assoc($query_run))
			                {
            			?>
						<!-- add user info here -->

						<img class="rounded-circle img-fluid mb-5 px-5" src="images/<?php echo $row['user_img']; ?>" alt="">
						<h4><a href=""><?php echo $row['user_name']; ?></a></h4>
						<p class="member-time">Member Since <?php echo $row['created_date']; ?></p>
						<ul class="list-inline mt-20">
							<li class="list-inline-item" id="offer-btn" data-target="#offer-box" data-toggle="modal"><button class="btn btn-offer d-inline-block btn-primary ml-n1 my-1 px-lg-4 px-md-3">Make an offer</button></li>
						</ul>

						<?php 

		                 }
		                ?>
						<!-- end user info here -->

					</div>
					<!-- Map Widget -->
					<!-- <div class="widget map">
						<div class="map">
							<div id="map_canvas" data-latitude="16.7745" data-longitude="96.1588"></div>
						</div>
					</div> -->
					<!-- Rate Widget -->
					
					<!-- Safety tips widget -->
					
					<!-- Coupon Widget -->
					<div class="widget coupon text-center">
						<!-- Coupon description -->
						<p>If you aren't satified with this product's price, quality and any other things,
							you can inform it to Admin's team by REPORTING!
						</p>
						<!-- Submii button -->
						
						<a href="single.php?userid=<?php echo $userid ?>&idprod=<?php echo $idprod ?>" data-toggle="modal" data-target="#reportprod" class="btn btn-transparent-white">Report</a>
					</div>

				</div>
			</div>

		</div>
	</div>
	<!-- Container End -->
<?php } 
?>
</section>
<!--============================
=            Footer            =
=============================-->

  <div class="site-section bg-light">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-7 text-left border-primary">
            <h2 class="font-weight-light text-primary">Trending Today</h2>
          </div>
        </div>
        <div class="row mt-5">

          	<?php
          		$query="select * from product p ,maincat m where p.prod_id!=".$_GET['idprod']." and p.main_cat_name=m.main_cat_id and p.sold_status='no' and p.sub_cat_name=(select sub_cat_name from product where prod_id=".$idprod.") limit 8";
          		$query_run = mysqli_query($connection, $query);
			                while($row2=mysqli_fetch_assoc($query_run))
			                {
			           
          	?>

          	<div class="col-lg-6">
            <div class="d-block d-md-flex listing">
              <a href="single.php?userid=<?php echo $row2['user_id'];?>&idprod=<?php echo $row2['prod_id'];?>" class="img d-block"><img src="images/<?php echo $row2['prod_img'];?>" width="200" height="200"></a>
              <div class="lh-content">
                <a href="single.php?userid=<?php echo $row2['user_id'];?>&idprod=<?php echo $row2['prod_id'];?>"><span class="category"><?php echo $row2['main_cat_name'];?></span>
                <h3><a href="#"><?php echo $row2['prod_name']?></a></h3>
                <h3 >Location: <?php echo $row2['prod_loc'];?></h3>
                <h3 >Price: <?php echo $row2['prod_price'];?> Kyats</h3>
              </div>
            </div> 
        </div>
        <?php }?>
      </div>
    </div>


<script>
function offer_send(){
		var msg=document.getElementById("offer-msg").value;
		var this_name="<?php echo $_SESSION['user_name'];?>";
		var this_img="<?php echo $_SESSION['user_img'];?>";
		var this_id=<?php echo $_SESSION['user_id'];?>;
		var to_id=<?php echo $to_user_id;?>;
		var item=<?php echo $_GET['idprod'];?>;
		var d=new Date();
		var send_time=d.getHours()+":"+d.getMinutes()+":"+d.getSeconds();
		send_time=timeReset(send_time);
		socket.emit("msg_send",{from:this_id,to:to_id,message:msg,assoc_item:item,type:'txt',tr_status:'buy',sender_name:this_name,sender_img:this_img,time:send_time});
		$("#offer-box").modal("hide");
	}
function timeReset(time){
			var t=time.split(":");
			var output="";
			for(var i=0;i<3;i++)
			{
				if((t[i]+"").length==1)
					output+="0"+t[i];
				else
					output+=t[i];
				if(i!=2)
					output+=":";
			}
			return output;
		}			
$(document).ready(function(){
 
 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  var form_data = $(this).serialize();
  $.ajax({
   url:"add_comment.php",
   method:"POST",
   data:form_data,
   dataType:"JSON",
   success:function(data)
   {
    if(data.error != '')
    {
     $('#comment_form')[0].reset();
     $('#comment_message').html(data.error);
     $('#comment_id').val('0');
     load_comment();
    }
   }
  })	
 });

 load_comment();

 function load_comment()
 {
 	var comment_prod_id =$('#comment_prod_id').val();
  $.ajax({
   url:"fetch_comment.php?comment_prod_id="+comment_prod_id,
   // data:'comment_prod_id='+comment_prod_id,
   method:"POST",
   success:function(data)
   {
    $('#display_comment').html(data);
   }
  })
 }

 $(document).on('click', '.reply', function(){
  var comment_id = $(this).attr("id");
  $('#comment_id').val(comment_id);
  $('#comment_name').focus();
 });
 
});
</script>


<?php
include_once("offer.php");
include_once("includes/script.php");
include_once("includes/footer.php");
?>