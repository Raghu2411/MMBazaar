<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Chat</title>
  <!-- PLUGINS CSS STYLE -->
  <link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap-slider.css">
  <!-- Font Awesome -->
 <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <style type="text/css">
  	html,body{height: 100%;}
  	.left{background: white;height: 100%;border-top:1px solid silver;padding:0;background: rgb(50,50,200);}
  	.right{height: 100%;padding:0;border-top:1px solid silver;}
  	#chat-container,#chat-container .container-fluid,#chat-container .row{height: 100%;}
  	.left-header{height: 18%;background: rgb(50,50,200);padding:10px 10px 0 20px;border-bottom:2px solid rgba(250,250,250,0.5);}
  	.left-body{height:82%;overflow:auto;padding-top: 30px;}
  	.chat-search{background:white;border-radius: 30px;width:70%;height:40%;display: inline;}
  	#left-side .form-control:focus{background:white;border-color:grey;}
  	#left-side .media-left,#right-side .media-left{margin-right: 10px;}
  	#left-side .media{padding:15px 10px 15px 10px;border-bottom: 1px solid rgba(250,250,250,0.1);
  		cursor: pointer;}
  	.red{background-color:rgb(250,0,0);width:10px;height:10px;border-radius: 50%;
  		display: inline-block;margin-right: 10px;}	
  	.left-header span{color:white;margin-right: 10px;font-size: 1.5em;}	
  	#right-side .tab-pane{height: 100%;}
  	.right-header{height:12%;box-shadow:1px 3px 5px silver;display: flex;align-items: center;width:100%;}
  	#left-nav{margin:20px 10px 10px 0px;display: flex;justify-content: center;}
  	#left-header .nav-item{border-radius: 30px;}
  	#left-nav .nav-pills>li>a.active,.nav-pills>li>a.active:focus,.nav-pills>li>a.active:hover{color:black;background:white;}
  	#left-nav .nav-pills li a{padding:5px 20px 5px 20px;cursor: pointer;color:white;border-radius: 30px;}
  	#chat-list{text-decoration: none;color:white;}
  	#chat-list .tab-pane .active{background:rgba(250,250,250,0.1);}
  	#chat-list .tab-pane .media:hover{background:rgba(250,250,250,0.1);}
  	#right-side .tab-pane{width:100%;}
  	.time{color:grey;font-size: small;margin-left: 10px;}
  	.right-footer{height: 10%;border-top:1px solid silver;display: flex;align-items: center;
  		padding:0 10px 0 10px;}
  	.right-body{height: 76%;padding:20px 20px 5px 20px;overflow: auto;}
  	.img-send-btn{font-size: 200%;color:rgb(50,50,200);margin-right: 10px;}
  	.form-control:focus{-webkit-box-shadow:none;border-color:silver;}
  	.msg-input{width: 50%;}
  	.send-btn-bg{background: transparent;}
  	.send-btn{color:rgb(50,50,200);cursor: pointer;}
  	.hide{display: none;}
  	.rh-r{width:80%;display: inline-block;margin-left: 20px;}
  	.rh-l{width: 10%;display: inline-block;margin-left: 60%;text-align: right;margin-right: 20px;font-size: 120%;color:rgb(50,50,200);cursor: pointer;}
  	.f-left{float: left;list-style-type: none;clear: both;}
  	.f-right{float: right;list-style-type:none; clear: both;}
  	.msg-receive{max-width: 320px;height: auto;padding:2px 10px 10px 10px;
  		background: silver;border-radius: 5px;text-align: justify;}
  	.msg-send{max-width: 320px;height: auto;padding:2px 10px 10px 10px;background: rgb(50,50,200);
  		border-radius: 5px;color:white;text-align: justify;}
  	.img-msg{max-width: 300px;max-height: 300px;width: auto;height: auto;border-radius: 4px;
  		display:block;}	
  	.center-msg{text-align: center;color:black;list-style-type: none;clear: both;}
  	.center-time{color:silver;margin-bottom: 10px;}
  	.msg-time-left{color:grey;margin-bottom: 10px;float:right;}
  	.msg-time-right{color:grey;margin-bottom:10px;float: right;clear:both;}
  	.f-left .media-body,.f-right .media-body{margin-bottom: 10px;}
  	#all time,#buy time,#sell time{color:silver;}
  </style>
</head>
<body>
	<?php
	if(!isset($_SESSION))
	{	
		session_start();
	}
	include_once("includes/header.php");
	 //include_once("includes/header.php");
	 $con=mysqli_connect("localhost","root","","mmbazaar");
	$query="select * from msg_for_".$_SESSION['user_id'];
		if(!mysqli_query($con,$query))
		{
			$query="create table msg_for_".$_SESSION['user_id']."(msg_id int auto_increment,other_user int,msg_type varchar(5),status varchar(7),msg text,assoc_item int,trans_status varchar(4),date date,time time,primary key(msg_id),foreign key(other_user) references user(user_id),foreign key(assoc_item) references product(prod_id))";
			mysqli_query($con,$query);
		}
	?>
	<main id="chat-container">
	<section class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-md-4 left" id="left-side">
				<div class="left-header">
					<span>Inbox</span><input class="form-control chat-search" placeholder="Search" 
					id="user-search">
					<div id="left-nav">
						<ul class="nav nav-pills">
							<li class="nav-item">
								<a href="#all" class="nav-link active" data-toggle="tab" 
								onclick="t_status_set('all')">All</a>
							</li>
							<li class="nav-item">
								<a href="#buy" class="nav-link" data-toggle="tab" 
								onclick="t_status_set('buy')">Buy</a>
							</li>
							<li class="nav-item">
								<a href="#sell" class="nav-link" data-toggle="tab" 
								onclick="t_status_set('sell')">Sell</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="left-body tab-content" id="chat-list">
					<div class="tab-pane active nav" id="all">
					</div>	
					<div class="tab-pane" id="buy">
					</div>
					<div class="tab-pane" id="sell">
					</div>
				</div>
			</div>
			<!-- Hidden file input for message image select box -->
			<form class="hide" enctype="multipart/form-data" id="chat-img-upload">
			<input type="file" name="image" id="img-select" enctype="multipart/form-data" 
			multiple="true">
			</form>
			<!-- end -->
			<div class="col-xs-12 col-md-8 right tab-content" id="right-side">	
			</div>
		</div>
	</section>	
	</main>
	<?php
	 include_once("includes/script.php");
	 include_once("chat_option.php");
	?>
	<script type="text/javascript " src="http://192.168.43.141:8000/socket.io/socket.io.js"></script>
	<script type="text/javascript">
		var active_user;
		var xhr=new XMLHttpRequest();
		var d=new Date();
		var active_tab="all";
		var trans_status="";
		var active_status=new Array();
		var active_chatid_status=new Array();
		var active_chat="";
		var price_offer={};
		var active_item;
		var user_id=<?php echo $_SESSION['user_id'];?>;
		var user_name="<?php echo $_SESSION['user_name'];?>";
		var user_img="<?php echo $_SESSION['user_img']?>";
		var socket=io.connect("http://192.168.43.141:8000");
		socket.on('connect',function(){
			socket.emit("newuser_join",user_id);
		});	
		socket.on('user_disconnect',function(id){
			var tempid=active_chatid_status[active_status.indexOf(Number(id))];
			if($("#all #chatlist-for-"+tempid).length!=0)
			{
				$("#all #a-status-for-"+tempid).css("background-color","rgb(250,0,0)");
				$("#ac-status-for-"+tempid).html("Offline");
				copy_content(tempid);
			}
		});
		socket.on("user_connect",function(id){
			var tempid=active_chatid_status[active_status.indexOf(Number(id))];
			if($("#all #chatlist-for-"+tempid).length!=0)
			{
				$("#all #a-status-for-"+tempid).css("background-color","rgb(0,250,0)");
				$("#ac-status-for-"+tempid).html("Online");
				copy_content(tempid);
			}
		});
		socket.on("new_msg",function(data){
			var msg=data.message;
			if((data.type)+""=="txt"||(data.type)+""=="offer")
			{
				if((""+data.message).length>13)
					var pre_msg=(msg).substring(0,14)+"...";
				else
					var pre_msg=msg;
			}
			else
				var pre_msg="Photo message";
			var time=timeProcess(""+data.time);
			if($("#chatlist-for-"+data.from+"-"+data.assoc_item).length==0)
			{
				var prod_image="";
				var chat_id=data.from+"-"+data.assoc_item;
				xhr.open("POST","requestProcess.php?request=prod_image&p_id="+data.assoc_item,true);
				xhr.onreadystatechange=function(){
					if(this.readyState==4&&this.status==200)
					{
						prod_image=this.responseText;
					}
				}
				xhr.send();
				var text='<div class="media" data-toggle="tab" data-target="#chat-for-'+chat_id+'" onclick="chat_active('+data.from+','+data.assoc_item+',\\\''+data.tr_status+'\\\')" id="chatlist-for-'+chat_id+'"><div class="media-left"><span class="red" id="a-status-for-'+chat_id+'"></span><img src="images/'+data.sender_img+'" class="rounded-circle" width="50" height="50"></div><div class="media-body"><h5>'+data.sender_name+'</h5><time id="pre-msg-for-'+chat_id+'"></time><span class="time"></span></div><div class="media-right"><img src="images/'+prod_image+'" width="60" height="60" class="img-fluid"></div></div>';
				domWrite("all",text);
				domWrite("sell",text);
				text='<div id="chat-for-'+chat_id+'" class="tab-pane"><div class="right-header"><div class="rh-r"><div class="media"><img src="images/'+data.sender_img+'" class="mr-3 rounded-circle"  width="60" height="60"><div class="media-body"><h5>'+data.sender_name+'</h5><p id="ac-status-for-'+chat_id+'"></p></div></div></div><div class="rh-l mr-2"><i class="fa fa-bell mr-3" id="item-alert-for-'+chat_id+'" onclick="offer_alert()"></i></div></div><div class="right-body" id="msg-container-for-'+chat_id+'"></div><div class="right-footer"><button class="btn btn-default fa fa-image img-send-btn" onclick="img_select()"></button><div class="input-group"><input class="msg-input form-control" type="text" placeholder="Type here" id="msg-input-for-'+chat_id+'"><div class="input-group-append"><span class="input-group-text send-btn-bg" onclick="send()"><span class="fa fa-paper-plane send-btn"</span></div></div></div></div>';
				domWrite("right-side",text);
				checkActive();		
			}
			if(data.type!="offer")
			{
				var text='<li class="f-left"><div class="media"><img src="images/'+data.sender_img+'" class="rounded-circle mr-2" width="30" height="30"><div class="media-body">';
				if((data.type+"")=="img")
					text+='<img src="'+msg+'" class="img-msg">';
				else
					text+='<div class="msg-receive">'+msg+'</div>';
				text+=('<time class="msg-time-left">'+time+'</time></div></div></li>');
			}
			else{
				var text='<li class="center-msg"><div><span style="color:silver;" class="fa fa-arrow-circle-right"></span>&nbsp;&nbsp;'+msg+'</div><time class="center-time">'+time+'</time></li>';
			}
			domWrite('msg-container-for-'+data.from+'-'+data.assoc_item,text);
			document.getElementById('pre-msg-for-'+data.from+'-'+data.assoc_item).innerHTML=pre_msg;
			document.getElementById('time-for-'+data.from+'-'+data.assoc_item).innerHTML=time;
			var ele=document.getElementById('msg-container-for-'+data.from+'-'+data.assoc_item);
			ele.scrollTop=ele.scrollHeight;
			copy_content(data.from+"-"+data.assoc_item);
		});
		socket.on("return_active_check",function(data){
			for(var i=0;i<active_status.length;i++)
			{
				if($("#a-status-for-"+active_chatid_status[i]).length!=0)
				{
					if(data[active_status[i]]=="yes"){
						$("#a-status-for-"+active_chatid_status[i]).css("background-color","rgb(0,250,0)");
						$("#ac-status-for-"+active_chatid_status[i]).html("Online");
						copy_content(active_chatid_status[i]);
					}
					else
						$("#ac-status-for-"+active_chatid_status[i]).html("Offline");
				}
				else
					continue;
			}
		});
		socket.on("offer",function(data){
			$("#item-alert-for-"+data.from+"-"+data.assoc_item).css("color","red");
			price_offer[data.from+"-"+data.assoc_item]={"amount":"\""+data.amount+"\"","name":"\""+
			data.offer_name+"\""};
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#img-select").change(function(){
				var form=new FormData(document.getElementById('chat-img-upload'));
				xhr.open("POST","requestProcess.php?request=chat-img",true);
				xhr.onreadystatechange=function(){
					if(this.readyState==4&&this.status==200)
					{
						var data=JSON.parse(this.responseText);
						if(data.success=="1")
						{
							var send_time=d.getHours()+":"+d.getMinutes()+":"+d.getSeconds();
							send_time=timeReset(send_time);
							socket.emit("msg_send",{from:user_id,to:active_user,message:data.location,assoc_item:active_item,type:'img',tr_status:trans_status,sender_name:user_name,sender_img:user_img,time:send_time});
							var text='<li class="f-right"><div class="media"><div class="media-body mr-2"><img src="'+data.location+'" class="img-msg"><time class="msg-time-right">'+timeProcess(send_time)+'</time></div><img src="'+user_img+'" class="rounded-circle ml-2" width="30" height="30"></div></div></li>';
							domWrite('msg-container-for-'+active_chat,text);
							document.getElementById('pre-msg-for-'+active_chat).innerHTML="You sent a photo";
							var ele=document.getElementById('msg-container-for-'+active_chat);
							ele.scrollTop=ele.scrollHeight;
						}
						else
							alert(data.error);
					}
				}
				xhr.send(form);
			});
		});
		function chat_active(id,assoc_item,t_status){
			active_user=id;
			active_chat=id+"-"+assoc_item;
			active_item=assoc_item;
			trans_status=t_status;
			window.scrollTo(0,document.body.scrollHeight);
		}
		function t_status_set(txt){
			active_tab=txt;
		}
		function timeProcess(time)
		{
			var h=Number(time.substring(0,2))
			if(h>12)
				return "0"+(h-12)+time.substring(2,5)+" pm";
			else
				return time.substring(0,5)+" am";
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
		function img_select(){
			$("#img-select").click();
		}
		function domWrite(id,txt)
		{
			document.getElementById(id).innerHTML+=txt;
		}
		function checkActive(){
			xhr.open("POST","requestProcess.php?request=activeCheck&&id="+user_id,true);
			xhr.onreadystatechange=function(){
				if(this.readyState==4&&this.status==200)
				{
					var data=JSON.parse(this.responseText);
					socket.emit("active_check",data);
				}
			}
			xhr.send();
		}
		function active_push(id,item){
			if(!active_status.includes(id)){
				active_status.push(id);
				active_chatid_status.push(id+"-"+item);
			}
		}
		function copy_content(id)
		{
			if($("#buy #chatlist-for-"+id).length!=0){
				$("#buy #chatlist-for-"+id).html($("#all #chatlist-for-"+id).html());
			}
			else if($("#sell #chatlist-for-"+id).length!=0){
				$("#sell #chatlist-for-"+id).html($("#all #chatlist-for-"+id).html());
			}
		}
		function send()
		{
			var msg=document.getElementById('msg-input-for-'+active_chat).value;
			if(msg.length>13)
				var pre_msg=msg.substring(0,14)+"...";
			else
				var pre_msg=msg;
			var send_time=d.getHours()+":"+d.getMinutes()+":"+d.getSeconds();
			send_time=timeReset(send_time);
			if(active_user!="")
			{
				socket.emit("msg_send",{from:user_id,to:active_user,message:msg,assoc_item:active_item,type:'txt',tr_status:trans_status,sender_name:user_name,sender_img:user_img,time:send_time});
			}
			var text='<li class="f-right"><div class="media"><div class="media-body mr-2"><div class="msg-send">'+msg+'</div><time class="msg-time-right">'+timeProcess(send_time)+'</time></div><img src="images/'+user_img+'" class="rounded-circle" width="30" height="30"></div></div></li>';
			domWrite('msg-container-for-'+active_chat,text);
			document.getElementById('pre-msg-for-'+active_chat).innerHTML=pre_msg;
			document.getElementById('time-for-'+active_chat).innerHTML=timeProcess(send_time);
			var ele=document.getElementById('msg-container-for-'+active_chat);
			ele.scrollTop=ele.scrollHeight;
			document.getElementById('msg-input-for-'+active_chat).value="";
			copy_content(active_chat);
		}
		$(document).ready(function(){
			$("#user-search").on('input',function(){
				var name=$("#user-search").val();
				if(name!="")
				{
					xhr.open('POST',"requestProcess.php?request=search&id="+user_id+"&name="+name+"&trans_status="+active_tab,true);
					xhr.onreadystatechange=function(){
						if(this.readyState==4&&this.status==200)
						{
							$("#"+active_tab).html("");
							if(this.responseText!="")
							{
								var data=JSON.parse(this.responseText);
								for(var i=0;i<data.length;i++)
									domWrite(active_tab,data[i]);
								checkActive();
							}
						}
					}
					xhr.send();
				}
				else
					window.location.href="chat.php";
			});
		});
		function priceOffer(price_amount)
		{
			// $text.=($msg.'&nbsp;&nbsp;<span class="fa fa-arrow-circle-left"></span>');

			var send_time=timeReset(d.getHours()+":"+d.getMinutes()+":"+d.getSeconds());
			var msg="Offer item for "+price_amount+" kyats.";
			var text='<li class="center-msg"><div>'+msg+'&nbsp;&nbsp;<span style="color:rgb(50,50,200);" class="fa fa-arrow-circle-left"></span></div><time class="center-time">'+timeProcess(send_time)+'</time></li>';
			domWrite("msg-container-for-"+active_chat,text);
			send_time=timeReset(send_time);
			socket.emit("msg_send",{from:user_id,to:active_user,message:msg,assoc_item:active_item,type:'offer',tr_status:trans_status,sender_name:user_name,sender_img:user_img,time:send_time});
			socket.emit("offer",{from:user_id,to:active_user,offer_name:user_name,assoc_item:active_item,amount:price_amount});
			$("#buyer-offer-price").val("");
			$("#buyer-option").modal("hide");
		}
		function offer_alert(){
				xhr.open("POST","requestProcess.php?request=item_option&item="+active_item);
				xhr.onreadystatechange=function(){
					if(this.readyState==4&&this.status==200)
					{
						var data=JSON.parse(this.responseText);
							document.getElementById("seller-img").src="images/"+data.prod_img;
							document.getElementById("seller-name").innerHTML=data.prod_name;
							document.getElementById("seller-price").innerHTML=data.prod_price;
					}
				}
				xhr.send();
				if(typeof price_offer[active_chat]=="undefined"||price_offer[active_chat]=="")
				{
					$("#offer-show").css("display","none");
					$("#offer-no").css("display","block");
					$("#offer-btn-show").css("display","none");
					$("#offer-btn-no").css("display","block");
				}
				else
				{
					$("#seller-offer-name").html(price_offer[active_chat]['name']);
					$("#seller-show-price").html(price_offer[active_chat]['amount']);
					$("#offer-show").css("display","block");
					$("#offer-no").css("display","none");
					$("#offer-btn-show").css("display","block");
					$("#offer-btn-no").css("display","none");
				}
				$("#seller-option").modal("show");
		}
		function buyer_alert(){
			xhr.open("POST","requestProcess.php?request=item_option&item="+active_item);
			xhr.onreadystatechange=function(){
				if(this.readyState==4&&this.status==200)
				{
					var data=JSON.parse(this.responseText);
					if(data.sold_status=="no")
						{
							document.getElementById("buyer-img").src="images/"+data.prod_img;
							document.getElementById("buyer-name").innerHTML=data.prod_name;
							document.getElementById("buyer-price").innerHTML=data.prod_price;
							document.getElementById("buyer-show-price").innerHTML=data.prod_price;
							$("#buyer-option").modal("show");
						}
						else
							$("#sold-out-warn").modal("show");
				}
			}
			xhr.send();
		}
		function offer_accept(){
			var msg="I accept this offer.";
			var time=d.getHours()+":"+d.getMinutes()+":"+d.getSeconds();
			var send_time=timeReset(time);
			var txt='<li class="center-msg"><div>'+msg+'&nbsp;&nbsp;<span style="color:rgb(50,50,200);" class="fa fa-arrow-circle-left"></span></div><time class="center-time">'+timeProcess(time)+'</time></li>';
			domWrite('msg-container-for-'+active_chat,txt);
			socket.emit("msg_send",{from:user_id,to:active_user,message:msg,assoc_item:active_item,type:'offer',tr_status:trans_status,sender_name:user_name,sender_img:user_img,time:send_time});
			$("#item-alert-for-"+active_chat).css("color","rgb(50,50,200)");
			price_offer[active_chat]="";
			$("#seller-option").modal("hide");
			socket.emit("offer_seen",{from:user_id,to:active_user,assoc_item:active_item});
			socket.emit("offer_done",active_item,);
		}
		function not_accept(){
			var msg="I do not accept this offer.";
			var time=d.getHours()+":"+d.getMinutes()+":"+d.getSeconds();
			var send_time=timeReset(time);
			var txt='<li class="center-msg"><div>'+msg+'&nbsp;&nbsp;<span style="color:rgb(50,50,200);" class="fa fa-arrow-circle-left"></span></div><time class="center-time">'+timeProcess(time)+'</time></li>';
			domWrite('msg-container-for-'+active_chat,txt);
			socket.emit("msg_send",{from:user_id,to:active_user,message:msg,assoc_item:active_item,type:'offer',tr_status:trans_status,sender_name:user_name,sender_img:user_img,time:send_time});
			$("#item-alert-for-"+active_chat).css("color","rgb(50,50,200)");
			price_offer[active_chat]="";
			$("#seller-option").modal("hide");
			socket.emit("offer_seen",{from:user_id,to:active_user,assoc_item:active_item});
		}
	</script>
	<?php
		loadMsgList();
		echo "<script>checkActive();</script>";
		offer_set();
		function loadMsgList()
		{
			global $con;
			if($con)
				{
					$query="select * from msg_for_".$_SESSION['user_id']." m join user u on m.other_user=u.user_id where m.msg_id in (select max(msg_id) from msg_for_".$_SESSION['user_id']." group by other_user,assoc_item) group by other_user,assoc_item order by date desc,time desc";
					$result=mysqli_query($con,$query);
					if(mysqli_num_rows($result)>0)
					{
						while($row=mysqli_fetch_assoc($result))
						{
							$query2="select prod_img from product where prod_id=".$row['assoc_item'];
							$result2=mysqli_query($con,$query2);
							$row2=mysqli_fetch_assoc($result2);
							$prod_img=$row2['prod_img'];
							echo "<script> active_push(".$row['other_user'].",".$row['assoc_item'].");</script>";
							if($row['date']===(date("y-m-d")))
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
							$text='<div class="media" data-toggle="tab" data-target="#chat-for-'.$chat_id.'" onclick="chat_active('.$row['user_id'].','.$row['assoc_item'].',\\\''.$row['trans_status'].'\\\')" id="chatlist-for-'.$chat_id.'"><div class="media-left"><span class="red" id="a-status-for-'.$chat_id.'"></span><img src="images/'.$row['user_img'].'" class="rounded-circle " width="50" height="50"></div><div class="media-body"><h5>'.$row['user_name'].'</h5><time id="pre-msg-for-'.$chat_id.'">'.$pre_msg.'</time><span class="time" id="time-for-'.$chat_id.'">'.$time.'</span></div><div class="medai-right"><img src="images/'.$prod_img.'" width="60" height="60" class="img-fluid"></div></div>';
							echo "<script> domWrite('all','$text');</script>";
							if($row['trans_status']=='buy')
							{
								echo "<script>domWrite('buy','$text');</script>";
							}
							else
								echo "<script>domWrite('sell','$text');</script>";
							$text='<div id="chat-for-'.$chat_id.'" class="tab-pane"><div class="right-header"><div class="rh-r"><div class="media"><img src="images/'.$row['user_img'].'" class="mr-3 rounded-circle" width="60" height="60"><div class="media-body"><h5>'.$row['user_name'].'</h5><p id="ac-status-for-'.$chat_id.'"></p></div></div></div><div class="rh-l mr-2">';
							if($row['trans_status']=="sell")
								$text.='<i class="fa fa-bell mr-3" id="item-alert-for-'.$chat_id.'" onclick="offer_alert()">';
							else
								$text.='<i class="fa fa-angle-down mr-3" onclick="buyer_alert()" id="item-alert-for-'.$chat_id.'">';
							$text.='</i></div></div><div class="right-body" id="msg-container-for-'.$chat_id.'"></div><div class="right-footer"><button class="btn btn-default fa fa-image img-send-btn" onclick="img_select()"></button><div class="input-group"><input class="msg-input form-control" type="text" placeholder="Type here" id="msg-input-for-'.$chat_id.'"><div class="input-group-append" ><span class="input-group-text send-btn-bg" onclick="send()"><span class="fa fa-paper-plane send-btn"></span></div></div></div></div>';
							
							echo "<script> domWrite('right-side','$text');</script>";
							$other_pf=$row['user_img'];
							$other_id=$row['user_id']."-".$row['assoc_item'];
							$query="select * from msg_for_".$_SESSION['user_id']." where other_user='".$row['user_id']."' and assoc_item='".$row['assoc_item']."'";
							$result1=mysqli_query($con,$query);
							if(mysqli_num_rows($result1))
							{
								while($row1=mysqli_fetch_assoc($result1))
								{
									$time=(int)(substr($row1['time'],0,2));
									if($time>12)
									{
										$time=($time-12).substr($row1['time'],2,3)." pm";
									}
									else
									{
										$time=substr($row1['time'],0,5)." am";
									}
									$msg=$row1['msg'];
										if(strpos($msg,"'"))
											$msg=str_replace("'", "\'", $msg);
									if($row1['msg_type']!=="offer")
									{	
										if($row1['status']==='send')
										{
											$text='<li class="f-right"><div class="media"><div class="media-body mr2">';
											if($row1['msg_type']==="img")
												$text=$text.'<img src="'.$row1['msg'].'" class="img-msg">';
											else if($row1['msg_type']==="txt")
												$text=$text.'<div class="msg-send">'.$msg.'</div>';
											$text=$text.'<time class="msg-time-right">'.$time.'</time></div><img src="images/'.$_SESSION['user_img'].'" class="rounded-circle ml-2" width="30" height="30"></div></div></li>';
										}	
										else
										{
											$text='<li class="f-left"><div class="media"><img src="images/'.$other_pf.'" class="rounded-circle mr-2" width="30" height="30"><div class="media-body">';
											if($row1['msg_type']==="img")
												$text=$text.'<img src="'.$msg.'" class="img-msg">';
											else
												$text=$text.'<div class="msg-receive">'.$msg.'</div>';

											$text=$text.'<time class="msg-time-left">'.$time.'</time></div></div></li>';
										}
									}
									else
									{
										$text='<li class="center-msg"><div>';
										if($row1['status']=="send")
											$text.=($msg.'&nbsp;&nbsp;<span style="color:rgb(50,50,200);" class="fa fa-arrow-circle-left"></span>');
										else
											$text.=('<span style="color:silver;" class="fa fa-arrow-circle-right"></span>&nbsp;&nbsp;'.$msg);
									$text.='</div><time class="center-time">'.$time.'</time></li>';
									}
								echo "<script>domWrite('msg-container-for-".$other_id."','$text');</script>";
								}
							}
						}
					}
				}
			}
			function offer_set(){
				global $con;
				$query="select * from offer where seller=".$_SESSION['user_id']." and seen_status='no'";
				$result=mysqli_query($con,$query);
				if(mysqli_num_rows($result))
				{
					while($row=mysqli_fetch_assoc($result))
					{
						echo '<script>$("#item-alert-for-'.$row['buyer'].'-'.$row['assoc_item'].'").css("color","red");</script>';
						echo '<script>price_offer["'.$row['buyer'].'-'.$row['assoc_item'].'"]={"name":"'.$row['buyer_name'].'","amount":"'.$row['amount'].'"};</script>';
					}
				}
			}
		?>
		<div class="modal fade" tabindex="-1" data-backdrop="static" id="sold-out-warn">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Warn</h4>
						<span class="close" data-dismiss="modal">&times;</span>
					</div>
					<div class="modal-body">
						This item has been sold out!
					</div>
					<div class="modal-footer">
						<button class="btn btn-primary" data-dismiss="modal">OK</button>
					</div>
				</div>
			</div>
		</div>
</body>
</html>