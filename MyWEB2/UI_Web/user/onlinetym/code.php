<?php 
include('security.php');

$connection = mysqli_connect("localhost","root","","mmbazaar");

if(isset($_POST['registerbtn']))
{
	$username = $_POST['username'];
	$email = $_POST['email'];
	$images = $_FILES['admin_images']['name'];

	

	$password = $_POST['password'];
	$cpassword = $_POST['confirmpassword'];
	if(file_exists("upload/" . $_FILES["admin_images"]["name"]))
	{
		$store = $_FILES["admin_images"]["name"];
		$_SESSION['status'] ="Image is already exists '.$store.'";
		header('Location: register.php');
	}else
	{
		if($password === $cpassword)
		{
			$query = "INSERT INTO register (username,email,password,image) VALUES 
			('$username','$email','$password','$images')";
			$query_run = mysqli_query($connection,$query);
			if($query_run)
			{
				move_uploaded_file($_FILES['admin_images']['tmp_name'], "upload/".$_FILES['admin_images']['name']);
				$_SESSION['success'] = "Admin Profile Added!";
				header('Location: register.php');

			}else
			{
				$_SESSION['status'] = "Admin Profile Not Added!";
				header('Location: register.php');
			}
		}else
		{
			$_SESSION['status'] = "Password and Confirm Password Not Matched!";
			header('Location: register.php');
		}
	}
}



if(isset($_POST['updatebtn']))
{
	$id = $_POST['edit_id'];
	$username= $_POST['edit_username'];
	$email= $_POST['edit_email'];
	$password= $_POST['edit_password'];
	$images = $_FILES['admin_images']['name'];

	$query = "UPDATE register SET username='$username',
	email='$email',image='$images',password='$password' WHERE id='$id' ";
	$query_run = mysqli_query($connection, $query);
	echo "<script>alert('$images');</script>";
	if($query_run)
	{
		move_uploaded_file($_FILES['admin_images']['tmp_name'], "upload/".$_FILES['admin_images']['name']);
		$_SESSION['success'] = "Your data is Updated!";
		header('Location: register.php');
	}else
	{
		$_SESSION['status'] = "Your data is not Updated!";
		header('Location: register.php');
	}

}



if(isset($_POST['delete_btn']))
{
	$id = $_POST['delete_id'];

	$query = "DELETE FROM register WHERE id='$id' ";
	$query_run = mysqli_query($connection, $query);

	if($query_run)
	{
		$_SESSION['success'] = "Your data is Deleted!";
		header('Location: register.php');
	}else
	{
		$_SESSION['status'] = "Your data is Not Deleted!";
		header('Location: register.php');
	}
}


if(isset($_POST['login_btn']))
{
	$email_login = $_POST['email'];
	$password_login = $_POST['password'];
	$query = "SELECT * FROM register WHERE email='$email_login' AND password='$password_login' ";
	$query_run = mysqli_query($connection, $query);
	if(mysqli_fetch_array($query_run))
	{
		$_SESSION['username'] = $email_login;
		header('Location: index.php');
	}else
	{
		$_SESSION['status'] = "Email / Password is invalid";
		header('Location: login.php');
	}
}

if(isset($_POST['updatecatbtn']))
{
	$id = $_POST['edit_cat_id'];
	$categoryname= $_POST['categoryname'];
	$totalproduct= $_POST['totalproduct'];

	$query = "UPDATE category SET category_name='$categoryname',
			total_prod='$totalproduct' WHERE cat_id='$id' ";
	$query_run = mysqli_query($connection, $query);

	if($query_run)
	{
		$_SESSION['success'] = "Your Category is Updated!";
		header('Location: managecat.php');
	}else
	{
		$_SESSION['status'] = "Your Category is not Updated!";
		header('Location: managecat.php');
	}

}
//start
if(isset($_POST[' jajaja']))
{
	$categoryname= $_POST['categoryname'];
	$totalproduct= $_POST['totalproduct'];
	$query = "INSERT INTO category (category_name,total_prod) VALUES 
			('$categoryname','$totalproduct')";
	$query_run = mysqli_query($connection,$query);
	if($query_run)
	{
		$_SESSION['success'] = "Your category is Inserted!";
		header('Location: managecat.php');
	}else
	{
		$_SESSION['status'] = "Your Category is not Inserted!";
		header('Location: managecat.php');
	}
}
//end
if(isset($_POST['delete_cat_btn']))
{
	$id = $_POST['delete_cat_id'];

	$query = "DELETE FROM category WHERE cat_id='$id' ";
	$query_run = mysqli_query($connection, $query);

	if($query_run)
	{
		$_SESSION['success'] = "Your Category is Deleted!";
		header('Location: managecat.php');
	}else
	{
		$_SESSION['status'] = "Your Category is Not Deleted!";
		header('Location: managecat.php');
	}
}



?>