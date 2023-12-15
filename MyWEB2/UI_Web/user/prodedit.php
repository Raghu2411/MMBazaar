<!DOCTYPE html>
<html lang="en">
<head>

  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User Favourite Products</title>
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
  <!-- FAVICON -->
  <link href="img/favicon.png" rel="shortcut icon">
  <!-- PLUGINS CSS STYLE -->
  <!-- <link href="plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet"> -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap-slider.css">
  <!-- Font Awesome -->
  <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- Owl Carousel -->
  <link href="plugins/slick-carousel/slick/slick.css" rel="stylesheet">
  <link href="plugins/slick-carousel/slick/slick-theme.css" rel="stylesheet">
  <!-- Fancy Box -->
  <link href="plugins/fancybox/jquery.fancybox.pack.css" rel="stylesheet">
  <link href="plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet">
  <!-- CUSTOM CSS -->
  <link href="css/style.css" rel="stylesheet">


  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->


  <script>
function showUser(str) {
  alert(str);
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","fetchCat.php?q="+str,true);
  xmlhttp.send();
}
</script>

</head>

<body class="body-wrapper">
<?php
session_start();
include_once("includes/header.php");
//$_SESSION['user_id']=$_POST['user_id'];
  $namegod=$_SESSION['user_name'];
  
  //$_SESSION['user_img']=$_POST['user_img'];
  //echo "<script>alert(\"".$namegod."\");</script>";

  $connection = mysqli_connect("localhost","root","","mmbazaar");
?>

<!--==================================
=            User Profile            =
===================================-->
<section class="dashboard section">

  <!-- Container Start -->
  <!-- Container Start -->
  <div class="container">
    <!-- Row Start -->
    <div class="row">
      <div class="col-md-10 offset-md-1 col-lg-4 offset-lg-0">
        <div class="sidebar">
          <!-- User Widget -->

            <?php 

                $query = "SELECT `user_img`, `user_gmail`, `user_loc`, `created_date` FROM `user` WHERE user_name='$namegod'";
                $query_run = mysqli_query($connection, $query);
                while($row = mysqli_fetch_assoc($query_run))
                {
            ?>
          <div class="widget user-dashboard-profile">
            <!-- User Image -->
            <div class="profile-thumb">
              <img src="images/<?php echo $row['user_img']; ?>" alt="Image" class="">
            </div>
            <!-- User Name -->
            <center>
            <h5 class="text-center">Name: <?php echo "$namegod"; ?></h5>
            </center>
            <a href="#"><strong>Gmail :</strong><?php echo $row['user_gmail']; ?></a></br>
            <strong >Location :</strong><?php echo $row['user_loc']; ?> </br></br>
            <center>
             <p>Joined On: <?php echo $row['created_date']; ?></p>
             </center>
          </div>
          <?php 
                 }

                 ?>
          <!-- Dashboard Links -->
          <div class="widget user-dashboard-menu">
            <ul>
              <li class="active"><a href="profile.php"><i class="fa fa-user"></i> Listing</a></li>
            <li><a href="edit-profile.php"><i class="fa fa-edit" ></i> Edit Profile</a></li>
              <li><a href="chat/chat.php"><i class="fas fa-comments"></i> Chat</a></li>
              <li><a href="index.php"><i class="fa fa-cog"></i> Logout</a></li>
              <li><a href="" data-toggle="modal" data-target="#deleteaccount"><i class="fa fa-power-off"></i>Delete
                  Account</a></li>
            </ul>
          </div>

          <!-- delete-account modal -->
                        <!-- delete account popup modal start-->
                <!-- Modal -->
                <div class="modal fade" id="deleteaccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <form action="cody.php" method="POST">
                      <?php 

              if(isset($_SESSION['success']) && $_SESSION['success'] !='')
              {
                echo '<h2 class="bg-primary text-white"> '.$_SESSION['success'].' </h2>';
                unset($_SESSION['success']);
              }

              if(isset($_SESSION['status']) && $_SESSION['status'] !='')
              {
                echo '<h2 class="bg-danger text-white"> '.$_SESSION['status'].' </h2>';
                unset($_SESSION['status']);

              }
            ?>
                      <div class="modal-header border-bottom-0">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body text-center">
                        <img src="images/account/Account1.png" class="img-fluid mb-2" alt="">
                        <h6 class="py-2">Are you sure you want to delete your account?</h6>
                        <p>Do you really want to delete these records? This process cannot be undone.</p>
                        <textarea name="message" id="" cols="40" rows="4" class="w-100 rounded"></textarea>
                      </div>
                      <div class="modal-footer border-top-0 mb-3 mx-5 justify-content-lg-between justify-content-center">



                        <input type="hidden" name="user_id_name" value="Aung Bo">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger" name="del_user_btn">Delete</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- delete account popup modal end-->
          <!-- delete-account modal -->

        </div>
      </div>
      <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-0">
        <!-- Recently Favorited -->
        <div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h3 class="w3-xxxlarge"><i class="fa fa-edit"></i> Edit Product Information(s)!</h3>
  </div>


  <!-- $query = "SELECT `prod_brand`, `prod_name`, `prod_price`, `prod_info`, `prod_count`, `prod_img`, `prod_type`, `prod_loc`, `prod_status`, `nego_status`, `preffered_method`, `main_cat_name`, `sub_cat_name` FROM `product` WHERE `prod_id`='$id'";
 -->

  <div class="card-body">
    <?php 

    $connection = mysqli_connect("localhost","root","","mmbazaar");
    if(isset($_POST['show_edit']))
    {
      $id = $_POST['edit_id'];
  
      $query = "SELECT `prod_id`,`prod_brand`, `prod_name`, `prod_price`, `prod_info`, `prod_img`, `prod_loc`, `prod_status`, `nego_status`, `preffered_method`, `main_cat_name`, `sub_cat_name` FROM `product` WHERE `prod_id`='$id'";
      $query_run= mysqli_query($connection, $query);

      foreach ($query_run as $row) 
      {
        ?>

        <form action="cody.php" method="POST" enctype="multipart/form-data">


<input type="hidden" name="prod_edit_id" value="<?php echo $row['prod_id'] ?>">

             


<div class="form-horizontal">

                        <div class="form-group">
                          <label>Name <input type="text" class="form-control" id="usr" name="ename" value="<?php echo $row['prod_name']; ?>"> </label>
                        </div>

                        <div class="form-group ">
                          <label for="last-name">Brand<input type="text"  class="form-control" value="<?php echo $row['prod_brand']; ?>" name="ebrand"  ></label>
                        </div>



                        <div class="form-group">

                        <label>Select Category:</label>
                        <select name="emain" class="form-control" onchange="showUser(this.value)">
                        <option value="">Select Category:</option>
                        <option value="1" 

                        <?php  
                        if ($row['main_cat_name']== '1')
                        {
                          echo "selected";
                        }
                        ?> 
                        >Electronic</option>
                        <option value="2"
                         <?php  
                        if ($row['main_cat_name']== '2')
                        {
                          echo "selected";
                        }
                        ?>
                        >Baby</option>
                        <option value="3"
                        <?php  
                        if ($row['main_cat_name']== '3')
                        {
                          echo "selected";
                        }
                        ?>
                        >Beauty</option>
                        <option value="4"
                        <?php  
                        if ($row['main_cat_name']== '4')
                        {
                          echo "selected";
                        }
                        ?>
                        >Decorations</option>
                        <option value="5"
                        <?php  
                        if ($row['main_cat_name']== '5')
                        {
                          echo "selected";
                        }
                        ?>
                        >Men Fashions</option>
                        <option value="6"
                        <?php  
                        if ($row['main_cat_name']== '6')
                        {
                          echo "selected";
                        }
                        ?>
                        >Woman Fashions</option>
                        <option value="7"
                        <?php  
                        if ($row['main_cat_name']== '7')
                        {
                          echo "selected";
                        }
                        ?>
                        >Music</option>
                        <option value="8"
                        <?php  
                        if ($row['main_cat_name']== '8')
                        {
                          echo "selected";
                        }
                        ?>
                        >Accessories</option>
                        </select>

                      </div>

                      <div class="form-group">
                        
                        <div id="txtHint">
                        </div>
                        
                      </div>






                        <div class="form-group ">
                        </div>

                        <div class="form-group ">
                          <label for="last-name">Price<input type="text" class="form-control" value="<?php echo $row['prod_price']; ?>" name="eprice"></label>
                        </div>

                        <div class="form-group ">
                          <label for="last-name">Information(s)<input type="text" class="form-control" value="<?php echo $row['prod_info']; ?>" name="einfo" ></label>
                        </div>

                        <div class="form-group">
                          <label for="last-name">Location<input type="text" class="form-control" value="<?php echo $row['prod_loc']; ?>" name="eloc"></label>
                        </div>

                        <div class="form-group">
                            <label>Initial Photo</label>
                            <br>
                            <img src="images/<?php echo $row['prod_img']; ?>" height=100 width=100>
                            <br>
                            <label>Change Image</label>
                            <input type="file" name="prod_images" id="prod_images" class="form-control" value="images/<?php echo $row['prod_img']; ?>">
                            
                        </div>


                        <div class="form-group">
                          <label for="last-name">Status<input type="text" class="form-control" value="<?php echo $row['prod_status']; ?>" name="estatus" ></label>
                        </div>

                        <div class="form-group">
                          <label for="last-name">Negotation Status<input type="text" class="form-control" value="<?php echo $row['nego_status']; ?>" name="enego" ></label>
                        </div>

                        <div class="form-group">
                          <label for="last-name">Preffered Method<input type="text" class="form-control" value="<?php echo $row['preffered_method']; ?>" name="epreffered" ></label>
                        </div>

</div>





              <a href="profile.php" class="btn btn-danger"> CANCEL </a>
              <button type="submit"  name="chg_edit_btn" class="btn btn-primary"> Update </button>

            </form>
            <?php
      }
    } 
     ?>
 

    </div>
  </div>
</div>

        <!-- pagination -->
        
        <!-- pagination -->

      </div>
    </div>
    <!-- Row End -->
  </div>
  <!-- Container End -->
</section>
<!--============================
=            Footer            =
=============================-->
<?php

include_once("includes/script.php");

 ?>