<?php 
include('security.php');

$connection = mysqli_connect("localhost","root","","mmbazaar");
$connection1 = mysqli_connect("localhost","root","","mmbazaar");

if(isset($_POST['delete_btn']))
{
	$id = $_POST['delete_id'];

	$query = "DELETE FROM user WHERE user_id='$id' ";
	$query_run = mysqli_query($connection, $query);

	if($query_run)
	{
		$_SESSION['success'] = "Your data is Deleted!";
		header('Location: adminuser.php');
	}else
	{
		$_SESSION['status'] = "Your data is Not Deleted!";
		header('Location: adminuser.php');
	}
}


if(isset($_POST['del_con_btn']))
{
	$id = $_POST['delete_con_id'];

	$query = "DELETE FROM contact WHERE contact_id='$id' ";
	$query_run = mysqli_query($connection1, $query);

	if($query_run)
	{
		$_SESSION['success'] = "Your data is Deleted!";
		header('Location: requser.php');
	}else
	{
		$_SESSION['status'] = "Your data is Not Deleted!";
		header('Location: requser.php');
	}
}



?>