<!DOCTYPE html>
<html>
<head>
	<meta name='viewport' content="width=device-width, initial-scale=1.0">
	<style type="text/css">
		#register-box .nav-pills>li>a.active,.nav-pills>li>a.active:focus,.nav-pills>li>a.active:hover{color:#337ab7;background-color:transparent;border-bottom:2px solid #337ab7;border-radius: 0;}
		.align-center{display: flex;justify-content: center;}	
		#register-box .tab-content{margin-top:20px;}
		#register-box .modal-body{height: 400px;}
		#register-box .form-btn{background-color:#337ab7;width:100%;height:40px;color:white;}
		.fg-pas-link{margin-top: 20px;cursor: pointer}
		#register-box .help-block{color:red;}
		#register-box .nav-pills{font-size: 16px;font-weight: bold;}
		#register-box input{border-radius:5px;}
		.hide{display: none;}
		.retry{text-decoration: underline;color:blue;margin-left: 16px;cursor: pointer;}
		.pager{margin-bottom:10px;}
		.previous{border:1px solid silver;border-radius: 30px;width:70px;height:auto;display: flex;align-items: center;justify-content: center;padding:5px;cursor:pointer;color:#337ab7;}
		.hide{display: none;}
	</style>
</head>
<body>
	<div class="modal fade" id="register-box" tabindex="-1" data-backdrop="static">
		<div class="modal-dialog modal-md" id="login-dialog">
			<div class="modal-content">
				<div class="modal-body">
					<span class="close" data-dismiss="modal">&times;</span>
					<ul class="nav nav-pills">
						<li class="nav-item"><a href="#login_tab" data-toggle="tab" class="nav-link active">Log in</a></li>
						<li class="nav-item"><a href="#signup_tab" data-toggle="tab" class="nav-link">Create new account</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="login_tab">
							<div class="form-vertical" id="login">
								<div class="form-group">
									<input class="form-control" type="text" id="lgin-mail" placeholder="Enter email">
								</div>
								<div class="form-group">
									<input class="form-control" type="password" id="lgin-psw" placeholder="Enter password">
									<span class="help-block" id="lgin-status"></span>
								</div>
								<button class="form-btn btn" id="lgin-btn" onclick="login()">Login</button>
								<p class="fg-pas-link">Forgot your password?
									<span style="color:red" onclick="forgot_psw()">Click here</span></p>
							</div>

							<div id="forgot" style="display: none;">
								<div class="form-vertical" id="fg-mail-send">
									<ul class="pager">
										<li class="previous" onclick="back('login','forgot')">
											<a>&larr;Back</a></li>
									</ul>
									<div class="form-group">
										<input class="form-control" id="fg-mail" placeholder="Enter email" 
										type="text">
										<span class="help-block" id="fg-mail-status"></span>
									</div>
									<button class="btn form-btn" onclick="forgot_mail_submit()">
										Submit
									</button>
								</div>
								<div class="form-vertical" id="fg-otp-send" style="display: none;">
									<ul class="pager">
										<li class="previous" onclick="back('fg-mail-send','fg-otp-send')">
											<a>&larr;Back</a></li>
									</ul>
									<div class="form-group">
										<input type="text" id="fg-otp-psw" class="form-control" 
										placeholder="Enter Verification code">
										<span class="help-block" id="fg-otp-status"></span>
									</div>
									<button class="btn form-btn" onclick="fg_otp_submit()">
										Submit
									</button>
								</div>
								<div class="form-vertical" id="reset-send" style="display: none;">
									<ul class="pager">
										<li class="previous" onclick="back('fg-otp-send','reset-send')">
											<a>&larr;Back</a></li>
									</ul>
									<div class="form-group">
										<input type="password" id="new_psw" placeholder="Enter new password"
										class="form-control">
										<span class="help-block" id="fg-reset-status"></span>
									</div>
									<button class="btn form-btn" onclick="reset_submit()">
										Submit
									</button>
								</div>
							</div>

						</div>
						<div class="tab-pane" id="signup_tab">
							<div class="form-vertical" id="signup">
								<div class="form-group">
									<input class="form-control" id="sgup-mail" type="text" 
									placeholder="Enter email address">
								</div>
								<div class="form-group">
									<input class="form-control" id="sgup-user-name" type="text" 
									placeholder="Enter name">
								</div>
								<div class="form-group">
									<input class="form-control" id="sgup-address" type="text" 
									placeholder="Enter your location">
								</div>
								<div class="form-group">
									<input class="form-control" id="sgup-pas" type="password" 
									placeholder="Enter password">
									<span class="help-block" id="sgup-status"></span>
								</div>
								<button class="btn form-btn" id="sgup-btn" onclick='signup()'>Sign up
								</button>
							</div>
							<div class="form-vertical" id="sgup-otp-form" style="display: none;">
								<ul class="pager">
									<li class="previous" onclick="sgup_back()"><a>&larr;Back</a></li>
								</ul>
								<div class="form-group">
									<input class="form-control" id="sgup-otp" type="text" 
									placeholder="Enter OTP">
									<span class="help-block" id="sgup-otp-status"></span>
								</div>
								<button class="btn form-btn" id="sgup-otp-btn" 
								onclick="sgup_otp_submit()">Submit</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<form class="hide" action="index.php" method="post" id="session-set-form">
		<input type="txt" name="user_name" id="user_name">
		<input type="txt" name="user_id" id="user_id">
		<input type="txt" name="user_img" id="user_img">
	</form>
	<script type="text/javascript">
		var xhr=new XMLHttpRequest();
		var resOtp="";
		var resetMail="";
		function login(){
			var email=document.getElementById('lgin-mail').value;
			var pas=document.getElementById('lgin-psw').value;
			var status=document.getElementById('lgin-status');
			xhr.open('POST','requestProcess.php?request=login&email='+email+'&password='+pas,true);
			xhr.onreadystatechange=function(){
				if(this.readyState==4&&this.status==200)
				{
					var data=JSON.parse(this.responseText);
					if(data.status==="1")
					{
						document.getElementById('user_id').value=data.user_id;
						document.getElementById('user_name').value=data.user_name;
						document.getElementById('user_img').value=data.user_img;
						document.getElementById('session-set-form').submit();
						status.innerHTML="";
					}
					else
						status.innerHTML=data.error;
				}
				else
					status.innerHTML="Something went wrong!";
			}
			xhr.send();
		}
		function signup(){
			var email=document.getElementById('sgup-mail').value;
			xhr.open("POST","requestProcess.php?request=signup-check&email="+email);
			xhr.onreadystatechange=function(){
				if(this.readyState==4&&this.status==200)
				{
					var target=document.getElementById('sgup-status');
					target.innerHTML="Sending verification code to "+email;
					var data=JSON.parse(this.responseText);
					if(data.status=='1'){
						target.innerHTML="";
						resOtp=data.vf;
						document.getElementById('signup').style.display="none";
						document.getElementById('sgup-otp-form').style.display="block";
					}
					else if(data.status=='0')
					{
						if(data.error=='1')
							target.innerHTML="A user with this email is already registered";
						else
							target.innerHTML="Fail to send";
					}
				}
				else
					document.getElementById('sgup-status').innerHTML="Something went wrong!";
			}
			xhr.send();
		}
		function sgup_back(){
			document.getElementById('sgup-otp-status').innerHTML="";
			document.getElementById('signup').style.display="block";
			document.getElementById('sgup-otp-form').style.display="none";
		}
		function back(pr_id,id){
			document.getElementById(id).style.display="none";
			document.getElementById(pr_id).style.display="block";
		}
		function sgup_reset(){
			document.getElementById('sgup-mail').value="";
			document.getElementById('sgup-ph-no').value="";
			document.getElementById('sgup-address').value="";
			document.getElementById('sgup-pas').value="";
			document.getElementById('sgup-status').innerHTML="";
		}
		function sgup_otp_submit(){
			if(document.getElementById('sgup-otp').value==""+resOtp)
			{
				var email=document.getElementById('sgup-mail').value;
				var user_name=document.getElementById('sgup-user-name').value;
				var address=document.getElementById('sgup-address').value;
				var pas=document.getElementById('sgup-pas').value;
				xhr.open("POST","requestProcess.php?request=signup&email="+email+"&name="+user_name+
					"&address="+address+"&password="+pas,true);
				xhr.onreadystatechange=function(){
					if(this.readyState==4&&this.status==200)
					{
						if(this.responseText=='1')
						{
							alert('You are successfully registered!');
							sgup_back();
							sgup_reset();
							$('.nav-pills a:first').tab('show');
						}
						else
							document.getElementById("sgup-otp-status").innerHTML="Couldn't insert"+this.responseText;
					}
					else
						document.getElementById('sgup-otp-status').innerHTML="Something went wrong!";
				}
				xhr.send();
			}
			else
				document.getElementById('sgup-otp-status').innerHTML="<span style='color:blue' onclick='signup()'>resend</span>   <span style='color:blue' onclick='sgup_back()'>back</span>";
		}
		function forgot_psw()
		{
			document.getElementById('login').style.display="none";
			document.getElementById('forgot').style.display="block";
		}
		function forgot_mail_submit(){
			var email=document.getElementById("fg-mail").value;
			var target=document.getElementById("fg-mail-status");
			target.innerHTML="<span style='color:green'>Sending verification code to "+email+"</span>";
			xhr.open("POST","requestProcess.php?request=forgot&email="+email,true);
			xhr.onreadystatechange=function(){
				if(this.readyState==4&&this.status==200)
				{
					if(this.responseText=="0")
						target.innerHTML="This email is not registered!";
					else if(this.responseText=="2")
						target.innerHTML="Fail to send!";
					else
					{
						document.getElementById('fg-mail-send').style.display="none";
						document.getElementById('fg-otp-send').style.display="block";
						document.getElementById('fg-otp-status').innerHTML="<span style='color:green'>\
						Sending success</span>";
						resOtp=this.responseText;
						resetMail=email;
					}
				}
			}
			xhr.send()
		}
		function fg_otp_submit(){
			if(document.getElementById('fg-otp-psw').value==""+resOtp)
			{
				document.getElementById('fg-otp-send').style.display="none";
				document.getElementById('reset-send').style.display="block";
			}
			else
				document.getElementById('fg-otp-status').innerHTML="Wrong Verification code \
				<span class='retry' onclick='forgot_mail_submit()'>Resent</span>";
		}
		function fg_reset(){
			document.getElementById('fg-mail-status').innerHTML="";
			document.getElementById('fg-otp-psw').value="";
			document.getElementById('fg-otp-status').innerHTML="";
			document.getElementById('new_psw').value="";
			document.getElementById('fg-reset-status').innerHTML="";
			document.getElementById('reset-send').style.display="none";
			document.getElementById('fg-mail-send').style.display="block";
			document.getElementById('forgot').style.display="none";
			document.getElementById('login').style.display="block";
		}
		function reset_submit(){
			var new_psw=document.getElementById('new_psw').value;
			xhr.open('POST','requestProcess.php?request=psw_reset&email='+resetMail+'&new_password='+new_psw,true);
			xhr.onreadystatechange=function(){
				if(this.readyState==4&&this.status==200)
				{
					if(this.responseText=="0")
					{
						alert("Couldn't reset password");
						fg_reset();
					}
					else
					{
						alert('Reset password successfully!');
						fg_reset();
					}
				}
			}
			xhr.send();
		}
	</script>
</body>
</html>