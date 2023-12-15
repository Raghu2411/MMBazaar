<style type="text/css">
  	#login-btn{cursor:pointer;}
  </style>
  <?php
  	if(!isset($_SESSION))
  		session_start();
  ?>
<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-expand-sm navbar-light navigation">
					<a class="navbar-brand" href="index.php">
						<div class="media">
							<img src="./mmbazaar3.jpg" alt="" width="45" height="45">
							<div class="media-body ml-3">
								<h6 style="font-family: cursive;color:black;">MMBAZAAR</h6>
								<p style="color:grey;font-family: fantasy;">Online buy & sell</p>
							</div>
						</div>
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto main-nav ">
							<li class="nav-item">
								<a class="nav-link active" href="index.php"><i class="fa fa-home " style="font-size: 150%;color:black;"></i> Home</a>
							</li>
							<li class="nav-item dropdown dropdown-slide">
								<!-- Dropdown list -->
								<!-- color:#007bff; -->

							</li>
							<li class="nav-item ">
								<a class="nav-link active" href="contact-us.php" aria-haspopup="true" aria-expanded="false"><i class="fa fa-address-book" style="font-size: 120%;color:black;"></i> 
									Contact us
								</a>
							</li>
							<li class="nav-item ">
								<a class="nav-link active" href="about-us.php" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle" style="font-size: 130%;color:black;"></i> 
									About us 
								</a>
							</li>
						</ul>
						<ul class="navbar-nav ml-auto mt-10">
							<li class="nav-item">
								<a href="profile.php" id="profile" style="display: none;">
									<img width="40" height="40" class="img-circle" style="border-radius: 50%;" 
									id="profile-img" src="" style="max-height: 20px;max-width: 20px;"></a>
								<a class="nav-link active" data-target="#register-box" 
								data-toggle="modal" style="display: inline;font-size: 120%" id="login-btn"><i class="fa fa-user-circle-o" style="font-size: 150%;color:black;"></i> Login</a>
							</li>
							<li class="nav-item">
								<a class="nav-link "><i class="glyphicon glyphicon-envelope"></i></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</div>
	<form method="post" action="index.php" id="logout-form">
		<input type="hidden" value="yes" name="logout">
	</form>
</section>
<script type="text/javascript">
	function login_set(){
		document.getElementById("profile-img").src="images/<?php if(isset($_SESSION['user_img'])) echo $_SESSION['user_img']?>";
		document.getElementById("profile").style.display="inline";
		document.getElementById("login-btn").removeAttribute("data-target");
		document.getElementById("login-btn").setAttribute("data-target","#logout-alert");
		document.getElementById("login-btn").innerHTML="Log out";
	}
	function logout(){
		document.getElementById("logout-form").submit();
	}
</script>
<?php
if(isset($_SESSION['user_id']))
{
	echo "<script>login_set();</script>";
}
include_once("./login-logout.php");
include_once("logout_alert.php");
?>