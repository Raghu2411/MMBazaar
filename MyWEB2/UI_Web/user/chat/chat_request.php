<?php
$con=mysqli_connect("localhost","root","","project");
if($_REQUEST['request']==="msg_send")
	{
		$query="insert into msg_for_".$_REQUEST['user_id']."(other_user,msg_type,status,msg,assoc_item,
		trans_status,date,time) values(".$_REQUEST['other_user'].",'".$_REQUEST['msg_type']."','".$_REQUEST['status']."','".$_REQUEST['msg']."','".$_REQUEST['assoc_item']."','".$_REQUEST['trans_status']."',curdate(),'".$_REQUEST['time']."')";
		if(!mysqli_query($con,$query))
			echo "msg insert fail";
	}
?>		