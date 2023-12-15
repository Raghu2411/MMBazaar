<?php 
session_start();
$server_name = "localhost";
$db_username= "root";
$db_password = "";
$db_name="mmbazaar";
$connection = mysqli_connect($server_name,$db_username,$db_password);
$dbconfig = mysqli_select_db($connection, $db_name);


if($dbconfig)
{
	//echo "Database connected";
}else
{
	echo "Database Connection Failed";
}

// echo $_SESSION['your_state'];
// echo $_SESSION['search_value'];
// echo $_SESSION['sub'];
// echo $_SESSION['main'];

if(isset($_POST['useraction']))
	{
		if($_SESSION['your_state']==="search_box")//for search
		{
			$name1=explode(" ",$_SESSION['search_value']);
            	$value1=array();
            	$sql="select p.prod_id,p.prod_name,p.prod_info,p.prod_img,p.modified_date,m.main_cat_name from product p,maincat m where p.main_cat_name=m.main_cat_id and (p.prod_name like '%".$_SESSION['search_value']."%'";
            	if(count($name1)>1)
            	{
            		foreach($name1 as $val)
            			$sql.=" or p.prod_name like'%".$val."%'";
            	}
            	$sql.=")";
		}else if ($_SESSION['your_state']==="sub_cat") // for sub_cat
		{
			$name=$_SESSION['sub'];
			$sql="SELECT `prod_id`, `prod_brand`, `prod_name`, `prod_price`, `prod_info`, `prod_img`, `prod_loc`, `prod_status`, `nego_status`, `preffered_method`, `user_id`, `main_cat_name`, `sub_cat_name`, `rate_count`, `created_date`, `modified_date` FROM `product` WHERE `sub_cat_name`=(SELECT `sub_cat_id` FROM `subcat` WHERE `sub_cat_name`='$name')";
		}else 	//for main_cat
		{
			$main=$_SESSION['main'];
			$sql="SELECT `prod_id`, `prod_brand`, `prod_name`, `prod_price`, `prod_info`, `prod_img`, `prod_loc`, `prod_status`, `nego_status`, `preffered_method`, `user_id`, `main_cat_name`, `sub_cat_name`, `rate_count`, `created_date`, `modified_date` FROM `product` WHERE `main_cat_name`=(SELECT `main_cat_id` FROM `maincat` WHERE `main_cat_name`='$main')";
		}






		// $sql = "SELECT * FROM product WHERE prod_brand !=''"; //wtf is this

		if(isset($_POST['prod_brand']))
		{
			$brand = implode("','", $_POST['prod_brand']);
			$sql .="AND prod_brand IN('".$brand."')";
		}
		if(isset($_POST['prod_status']))
		{
			$status = implode("','", $_POST['prod_status']);
			$sql .="AND prod_status IN('".$status."')";
		}
		if(isset($_POST['preffered_method']))
		{
			$prefferedmethod = implode("','", $_POST['preffered_method']);
			$sql .="AND preffered_method IN('".$prefferedmethod."')";
		}
		if(isset($_POST['prod_loc']))
		{
			$prod_loc = implode("','", $_POST['prod_loc']);
			$sql .="AND prod_loc IN('".$prod_loc."')";
		}

		$result = $connection->query($sql);
		$output='';




		if($result->num_rows>0)
		{
			while($row=$result->fetch_assoc())
			{
				$output .="
<div class='col-sm-12 col-lg-4 col-md-6'>
<div class='product-item bg-light'>
	<div class='card'>
		<div class='thumb-content'>
				<img class='card-img-top img-fluid' src='images/".$row['prod_img']."' alt='Product Image'>
		</div>
		<div class='card-body'>
		    <h4 class='card-title'><a href='single.php?userid=".$row['user_id']."&idprod=".$row['prod_id']."'>".$row['prod_name']."</a></h4>
		    <ul class='list-inline product-meta'>
		    	<li class='list-inline-item'>
		    		<i class='fa fa-money'></i>".$row['prod_price']."
		    	</li>
		    	<br>
		    	<li class='list-inline-item'>";
		    	$q="select main_cat_name from maincat where main_cat_id=".$row['main_cat_name'];
		    	$r=mysqli_query($connection,$q);
		    	$rw=mysqli_fetch_assoc($r);
		    	$output.=("<i class='fa fa-folder-open-o'></i>".$rw['main_cat_name']."
		    	</li>
		    	<br>
		    	<li class='list-inline-item'>
		    		<i class='fa fa-calendar'></i>".$row['modified_date']."
		    	</li>
		    </ul>
		</div>
	</div>
</div>
</div>");
			}
		}
		else
		{
			$output = "<h3>&nbsp;&nbsp;&nbsp;No Products Found!</h3>";
		}
		echo $output;
	}

 ?>