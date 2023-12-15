<?php 
session_start();
if(isset($_POST['cbtn']))
{
	$connection = mysqli_connect("localhost","root","","mmbazaar");
	$name = $_POST['cname'];
	$email = $_POST['cemail'];
	$select = $_POST['cselect'];
	$meg = $_POST['cmessage'];
	$query = "INSERT INTO contact (user_name,user_gmail,cat_info,contact_info) VALUES 
	('$name','$email','$select','$meg')";
	$result = mysqli_query($connection,$query);
	if($result)
	{
		$_SESSION['success'] ="Your Data is sent to admin!";
		header('Location: contact-us.php');
	}else
	{
		$_SESSION['status'] ="Your Data is not sent to admin!". $result . "<br>" . mysqli_error($connection);
		header('Location: contact-us.php');
		//echo "Error adding records: " . $result . "<br>" . mysqli_error($connection);
	}
	//mysqli_free_result($result);
	mysqli_close($connection);

}



if(isset($_POST['update_user_btn']))
{
	$edit_user_id=$_POST['edit_user_id'];
	$connection = mysqli_connect("localhost","root","","mmbazaar");
	$namegod=$_SESSION['user_name'];
	$username = $_POST['user_name'];
	$mail = $_POST['user_email'];
	$images = $_FILES['admin_images']['name'];
	$loc= $_POST['user_loc'];
	$cpassword = $_POST['confirm_pass'];
	$npassword = $_POST['new_pass'];
	echo "<script>alert('$edit_user_id');</script>";

	// $query = "UPDATE register SET username='$username',
	// email='$email',image='$images',password='$password' WHERE id='$id' ";

	$query = "UPDATE user SET user_name='$username',user_img='$images',user_gmail='$mail',user_password='$npassword',user_loc='$loc' WHERE user_id='$edit_user_id'";
	$query_run = mysqli_query($connection, $query);

	if($query_run)
	{
		move_uploaded_file($_FILES['admin_images']['tmp_name'], "images/".$_FILES['admin_images']['name']);
		$_SESSION['success'] = "Your data is Updated!";
		header('Location: edit-profile.php');
	}else
	{
		$_SESSION['status'] = "Your data is not Updated!". mysqli_error($connection);
		header('Location: edit-profile.php');
	}


}

	if(isset($_POST['del_user_btn']))
	{
		$connection = mysqli_connect("localhost","root","","mmbazaar");
		$username = $_POST['user_id_name'];
		$user_id=$_POST['id_user'];
		$meg = $_POST['message'];
		$query = "INSERT INTO `delete_acc`(  `user_id`,`user_name`, `del_info`, `created_time`) VALUES ('$user_id','$username','$meg',now())";

		// $query = "DELETE FROM `user` WHERE user_name='TUn'";
		 $query_run = mysqli_query($connection,$query);
		 // if($query_run)
		 // {
		 // 		//move_uploaded_file($_FILES['admin_images']['tmp_name'], "upload/".$_FILES['admin_images']['name']);
		 // 	$_SESSION['success'] = "User Profile Deleted!";
		 // 	//header('Location: edit-profile.php');

		 // }else
		 // {
		 // 	$_SESSION['status'] = "User Profile Not Deleted!". mysqli_error($connection);;
		 // 	//header('Location: edit-profile.php');
		 // }

		 $query1 = "DELETE FROM `user` WHERE `user_id`='$user_id'";
		 $query_run1 = mysqli_query($connection,$query1);
		 if($query_run1)
		 {
		 	$_SESSION['success'] = "User Profile Deleted!";
		 	header('Location: edit-profile.php');

		 }else
		 {
		 	$_SESSION['status'] = "User Profile Not Deleted!". mysqli_error($query_run1);
		 	header('Location: edit-profile.php');
		 }
		 mysqli_close($connection);
	}



//add  new product


if(isset($_POST['addprodbtn']))
{
	$connection = mysqli_connect("localhost","root","","mmbazaar");


	$brand = $_POST['prodbrand'];
	$name = $_POST['prodname'];
	$maincat = $_POST['maincat'];
	$subcat = $_POST['subcat'];
	$price  = $_POST['prodprice'];
	$info = $_POST['prodinfo'];
	// $count = $_POST['prodcount'];
	$images = $_FILES['prod_images']['name'];
	$loc = $_POST['prodloc'];
	$nego = $_POST['prodnego'];
	$prefer = $_POST['prodprefer'];
	$status = $_POST['prodstatus'];
	//$date = date('F d, Y, g: i a');
	$userid=$_POST['userid'];
	//$query_run1 = mysqli_query($connection,$userid);


	 echo "<script>alert(\"".$userid."\");</script>";
	if(file_exists("images/". $_FILES["prod_images"]["name"]))
	{
		$store = $_FILES["prod_images"]["name"];
		$_SESSION['status'] ="Image is already exists '.$store.'";
		header('Location: profile.php');
	}else
	{
		echo "<script>alert(\"".$userid."\");</script>";
			$query = "INSERT INTO `product`( `prod_brand`, `prod_name`, `prod_price`, `prod_info`, `prod_img`, `prod_loc`, `prod_status`, `nego_status`, `preffered_method`, `user_id`, `main_cat_name`, `sub_cat_name`, `created_date`, `modified_date`) VALUES ('$brand','$name','$price','$info','$images','$loc','$status','$nego','$prefer','$userid','$maincat','$subcat',now(),now() )";
			$query_run = mysqli_query($connection,$query);
			if($query_run)
			{
				move_uploaded_file($_FILES['prod_images']['tmp_name'], "images/".$_FILES['prod_images']['name']);
				$_SESSION['success'] = "New Product Added!";
				header('Location: profile.php');

			}else
			{
				$_SESSION['status'] = "Product Not Added!". mysqli_error($connection);
				header('Location: profile.php');
			}
		
	}
}	

if(isset($_POST['chg_edit_btn']))
{

	$connection = mysqli_connect("localhost","root","","mmbazaar");

	$id = $_POST['prod_edit_id'];
	$name = $_POST['ename'];
	$brand = $_POST['ebrand'];
	$main = $_POST['emain'];
	$sub = $_POST['subcat'];
	$price = $_POST['eprice'];
	$info = $_POST['einfo'];
	//$count = $_POST['eqty'];
	$loc = $_POST['eloc'];
	$status = $_POST['estatus'];
	$nego = $_POST['enego'];
	$prefer = $_POST['epreffered'];
	$images = $_FILES['prod_images']['name'];

	$query = "UPDATE `product` SET `prod_brand`='$brand',`prod_name`='$name',`prod_price`='$price',`prod_info`='$info',`prod_img`='$images',`prod_loc`='$loc',`prod_status`='$status',`nego_status`='$nego',`preffered_method`='$prefer',`main_cat_name`='$main',`sub_cat_name`='$sub',`modified_date`=now() WHERE `prod_id` ='$id'";

	$query_run = mysqli_query($connection, $query);
	//echo "<script>alert('$images');</script>";
	if($query_run)
	{
		move_uploaded_file($_FILES['prod_images']['tmp_name'], "images/".$_FILES['prod_images']['name']);
		$_SESSION['success'] = "Your data is Updated!";
		header('Location: profile.php');
	}else
	{
		$_SESSION['status'] = "Your data is not Updated!";
		header('Location: profile.php');
	}

}


if(isset($_POST['prod_del_btn']))
{
	$connection = mysqli_connect("localhost","root","","mmbazaar");

	$id = $_POST['prod_delete_id'];

	$query = "DELETE FROM `product` WHERE `prod_id`='$id'";
	$query_run = mysqli_query($connection, $query);

	if($query_run)
	{
		$_SESSION['success'] = "Your data is Deleted!";
		header('Location: profile.php');
	}else
	{
		$_SESSION['status'] = "Your data is Not Deleted!";
		header('Location: profile.php');
	}
}


if(isset($_POST['report_user_btn']))
{
	$connection = mysqli_connect("localhost","root","","mmbazaar");
	$userid =$_POST['id_user'];
	$meg =$_POST['message'];
	$prodid=$_POST['productid'];

	$query1 = "UPDATE `product` SET `report_count`=`report_count`+1 WHERE `prod_id`='$prodid'";
	$query_run = mysqli_query($connection, $query1);


	$query = "INSERT INTO `report`(`user_id`, `prod_id`, `report_text`) VALUES 
	('$userid','$prodid','$meg')";
	$result = mysqli_query($connection,$query);
	if($result)
	{
		$_SESSION['success'] ="Your Report is sent to admin!";
		header('Location: single.php?userid='.$userid.'&idprod='.$prodid);
	}else
	{
		$_SESSION['status'] ="Your Report is not sent to admin!". $result . "<br>" . mysqli_error($connection);
		header('Location: single.php?userid='.$userid.'&idprod='.$prodid);
		//echo "Error adding records: " . $result . "<br>" . mysqli_error($connection);
	}
	//mysqli_free_result($result);
	mysqli_close($connection);

}



?> 