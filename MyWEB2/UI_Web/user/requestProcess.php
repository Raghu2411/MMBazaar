<?php
	if($con=mysqli_connect("localhost","root","","mmbazaar"))
	{
		if($_REQUEST['request']==="login")
		{
			$email=$_REQUEST['email'];
			$pas=$_REQUEST['password'];
			$query="select * from user where user_gmail='".$email."'";
			$result=mysqli_query($con,$query);
			if(mysqli_num_rows($result)>0)
			{
				$row=mysqli_fetch_assoc($result);
				if($row['user_password']===$pas)
					echo '{"status":"1","user_name":"'.$row['user_name'].'","user_id":"'.$row['user_id'].'","user_img":"'.$row['user_img'].'"}';
				else
					echo '{"status":"0","error":"Incorrect password"}';
			}
			else
				echo '{"status":"0","error":"This email is not registered"}';
			mysqli_close($con);
		}
		if($_REQUEST['request']==='signup-check')
		{
			$email=$_REQUEST['email'];
			$query="select * from user where user_gmail='".$email."'";
			$result=mysqli_query($con,$query);
			if(mysqli_num_rows($result)>0)
			{
				echo '{"status":"0","error":"1"}';
			}
			else
			{
				$vf=rand(10000,99999);
				$message="Your verification code is ".$vf;
				if(mail($_REQUEST['email'],"Verification code",$message,"From:Online shopping<saihtetaung276@gmail.com>"))
					echo '{"status":"1","vf":"'.$vf.'"}';
				else
					echo '{"status":"0","error":"2"}';
			}	
			mysqli_close($con);
		}
		if($_REQUEST['request']==='signup')
		{
			$query="insert into user(user_name,user_gmail,user_password,user_loc,created_date) 
			values('".$_REQUEST['name']."','".$_REQUEST['email']."','".$_REQUEST['password'].
			"','".$_REQUEST['address']."',now())";
			if(mysqli_query($con,$query))
				echo "1";
			else
				echo "0";
			mysqli_close($con);

		}
		if($_REQUEST['request']==="forgot")
		{
			$email=$_REQUEST['email'];
			$query="select * from user where user_gmail='".$email."'";
			$result=mysqli_query($con,$query);
			if(mysqli_num_rows($result)>0)
				{
					$vf=rand(10000,99999);
					$message="Your verification code is ".$vf;
					if(mail("saihtetaung276@gmail.com","Verification code",$message,"From:Online shopping<saihtetaung276@gmail.com>"))
						echo $vf;
					else
						echo "2";
				}
			else
				echo "0";
			mysqli_close($con);
		}
		if($_REQUEST['request']==="psw_reset")
		{
			$new_psw=$_REQUEST['new_password'];
			$query="update user set user_password='".$new_psw."' where user_gmail='".$_REQUEST['email']."'";
			if(mysqli_query($con,$query))
				echo "1";
			else
				echo "0";
			mysqli_close($con);
		}
		if($_REQUEST['request']==="chat-img")
		{
			$file=$_FILES['image'];
			$fileExt=explode(".",$file['name']);
			$fileExt=end($fileExt);
			$allow=array("jpg","jpeg","png","svg","gif");
			if(in_array($fileExt, $allow))
			{
				if($file['error']===0)
				{
					if($file['size']<50000000)
					{
						$new_name="chat".uniqid().".".$fileExt;
						$destination="chat_img_upload/".$new_name;
						move_uploaded_file($file['tmp_name'], $destination);
						echo '{"success":"1","location":"'.$destination.'"}';
					}
					else
						echo '{"success":"0","error":"Image size is too big to upload"}';
				}
				else
					echo '{"success":"0","error":"Error uploading image"}';
			}
			else
				echo '{"success":"0","error":"This file type cannot be uploaded"}';
		}
		if($_REQUEST['request']==="activeCheck")
		{
			$query="select other_user from msg_for_".$_REQUEST['id']." group by other_user";
			$result=mysqli_query($con,$query);
			$ary=array();
			if(mysqli_num_rows($result)>0)
			{
				while($row=mysqli_fetch_assoc($result))
					array_push($ary,$row['other_user']);
				echo json_encode($ary);
			}
			mysqli_close($con);
		}
		if($_REQUEST['request']=="search")
		{
			$name="";
			$retVal=array();
			$a=explode(" ",$_REQUEST['name']);
			foreach($a as $val)
				$name.="%".$val;
			$name.="%";
			$query="select * from msg_for_".$_REQUEST['id']." m join user u on m.other_user=u.user_id and ";
			if($_REQUEST['trans_status']!=="all")
				$query.="m.trans_status='".$_REQUEST['trans_status']."' and ";
			$query.="u.user_name like '".$name."' where m.msg_id in (select max(msg_id) from msg_for_".$_REQUEST['id']." group by other_user,assoc_item) group by other_user,assoc_item order by date desc,time desc";
			$result=mysqli_query($con,$query);
			if(mysqli_num_rows($result)>0)
			{
				while($row=mysqli_fetch_assoc($result))
				{
					if($row['date']===(date("Y-m-d")))
						{
							$time=(int)(substr($row['time'],0,2));
							if($time>12)
							{
								$time=($time-12).substr($row['time'],2,3)." pm";
							}
							else
							{
								$time=substr($row['time'],0,5)." am";
							}
						}
						else
							$time=$row['date'];	
						if($row['msg_type']!=="img")
							{
								if(strlen($row['msg'])>13)
									$pre_msg=substr($row['msg'],0,14).'...';
								else
									$pre_msg=$row['msg'];
							}
							else
							{
								if($row['status']==="receive")
									$pre_msg="Photo message";
								else
									$pre_msg="You sent a photo";
							}
						$chat_id=$row['other_user']."-".$row['assoc_item'];	
						$text='<div class="media" data-toggle="tab" data-target="#chat-for-'.$chat_id.'" onclick="chat_active('.$row['user_id'].','.$row['assoc_item'].')" id="chatlist-for-'.$chat_id.'"><div class="media-left"><span class="red" id="a-status-for-'.$chat_id.'"></span><img src="'.$row['user_img'].'" class="rounded-circle " width="50" height="50"></div><div class="media-body"><h5>'.$row['user_name'].'</h5><time id="pre-msg-for-'.$chat_id.'">'.$pre_msg.'</time><span class="time" id="time-for-'.$chat_id.'">'.$time.'</span></div><div class="medai-right"><img src="images/img_2.jpg" width="60" height="60" class="img-fluid"></div></div>';
						array_push($retVal,$text);
				}
				echo json_encode($retVal);
				mysqli_close($con);
			}
			else
				echo "";
		}
		if($_REQUEST['request']==="warn")
		{
			if(mail($_REQUEST['email'],"Warning",$_REQUEST['msg'],"From:Online shopping<saihtetaung276@gmail.com>"))
				echo "";
			else
				echo "Email send fail.";
		}
		if($_REQUEST['request']==="item_option")
		{
			$query="select * from product where prod_id=".$_REQUEST['item'];
			$result=mysqli_query($con,$query);
			if(mysqli_num_rows($result)>0)
			{
				while($row=mysqli_fetch_assoc($result))
					echo '{"prod_name":"'.$row['prod_name'].'","prod_price":"'.$row['prod_price'].'","prod_img":"'.$row['prod_img'].'","sold_status":"'.$row['sold_status'].'"}';
			}
		}
		if($_REQUEST['request']==="prod_image")
		{
			$query="select prod_img from product where prod_id=".$_REQUEST['p_id'];
			$result=mysqli_query($con,$query);
			if(mysqli_num_rows($result)>0)
			{
				$row=mysqli_fetch_assoc($result);
				echo $row['prod_img'];
			}
		}
	}
	else
		echo "Can't connect to the database";
?>