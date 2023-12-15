<?php 
	require 'database/dbconfig.php';

	if(isset($_POST['action']))
	{
		$sql = "SELECT * FROM product WHERE prod_brand !=''";

		if(isset($_POST['prod_brand']))
		{
			$brand = implode("','", $_POST['prod_brand']);
			$sql .="AND prod_brand IN('".$brand."')";
		}
		if(isset($_POST['prod_loc']))
		{
			$loc = implode("','", $_POST['prod_loc']);
			$sql .="AND prod_loc IN('".$loc."')";
		}
		if(isset($_POST['prod_status']))
		{
			$status = implode("','", $_POST['prod_status']);
			$sql .="AND prod_status IN('".$status."')";
		}
		 if(isset($_POST['main_cat_name']))
		 {
		 	$catname = implode("','", $_POST['main_cat_name']);
		 	$sql .="AND main_cat_name IN('".$catname."')";
		 }
		if(isset($_POST['report_count']))
		{
			$reportcount = implode("','", $_POST['report_count']);
			$sql .="AND report_count IN('".$reportcount."')";
		}

		$result = $connection->query($sql);
		$output='';




		if($result->num_rows>0)
		{
			while($row=$result->fetch_assoc())
			{
				$output .=" <div class='cl-md-3 mb-2'>
					 	<div class='card-deck'>
					 		<div class='card border-secondary'>
					 			<img src='images/".$row['prod_img']."' class=\\\"card-img-top\\\">
					 			<div class='card-img-overlay'>
			 		 				<h6 style='margin-top:150px;' class='text-light bg-info text-center rounded p-1'>'".$row['prod_name']."'</h6>
					 			</div>
					 			<div class='card-body'>
					 				<h4 class='card-title text-danger'>Price : '". number_format($row['prod_price'])."' Kyats</h4><p>";
					 		 
					                    $userid=$row['user_id'];
					                    $connection = mysqli_connect('localhost','root','','mmbazaar');
					                    $query = 'SELECT `user_name`,`user_gmail` FROM `user` WHERE `user_id`='.$userid.'';
					                    $query_run = mysqli_query($connection, $query);
					                    while($row1 = mysqli_fetch_assoc($query_run))
					                    {
					                          $output.="Owner :'".$row1['user_name']."'<br>";
					                          echo "<script>var w_user_gmail='".$row1['user_gmail']."';var w_user_name='".$row1['user_name']."';</script>";
					                    }

					                    $output.="Owner_id: '".$row['user_id']."'<br>
					                    Product Status : '".$row['prod_status']."'<br>
					                    Product Brand : '".$row['prod_brand']."'<br>
					                    Prefeered Method : '".$row['preffered_method']."'<br>
					                    Number of reports : '".$row['report_count']."'<br></p><a href='#' class='btn btn-danger btn-block' onclick='warn(w_user_gmail,w_user_name)'>Warn!</a>
					                    </div>
					 		</div>
					 	</div>
					 </div>";
			}
		}
		else
		{
			$output = "<h3>No Products Found!</h3>";
		}
		echo $output;
	}


 ?>
 <script>
 	function warn(email,name){
      var gmail=email;
      $("#warn-name").html(name);
      $("#warning-box").modal("show");
    }
 </script>