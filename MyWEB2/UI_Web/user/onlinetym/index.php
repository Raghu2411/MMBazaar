<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php');
include('includes/scripts.php');
include('warning.php');
?>


<!-- Begin Page Content -->
<!-- cover img -->


<style>
img {
  width:300px;
  height:168px;
  object-fit:cover;
}
</style>


<!-- cover img end -->



<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
  </div>

  <!-- Content Row -->
  <div class="row"><!--ahwowowowoahaha-->

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Registered Admin</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">


               <?php

                $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query = "SELECT id FROM register ORDER BY id";
                $query_run = mysqli_query($connection , $query);
                
                $row = mysqli_num_rows($query_run);
                echo '<h4> Total Admins: '.$row.'</h4>';

               ?>

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user-cog fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Number of Users</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">


               <?php

                $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query = "SELECT user_id FROM user ORDER BY user_id";
                $query_run = mysqli_query($connection , $query);
                
                $row = mysqli_num_rows($query_run);
                echo '<h4> Total Users: '.$row.'</h4>';

               ?>

              </div>
            </div>
            <div class="col-auto">
              <i class="  fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Number of Products</div>
              <div class="row no-gutters align-items-center">
                
                <div class="col">
                  <div class="h5 mb-0 font-weight-bold text-gray-800">


               <?php

                $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query = "SELECT prod_id FROM product ORDER BY prod_id";
                $query_run = mysqli_query($connection , $query);
                
                $row = mysqli_num_rows($query_run);
                echo '<h4> Total Product: '.$row.'</h4>';

               ?>

              </div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-shopping-basket fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Number of categories</div>
              <div class="row no-gutters align-items-center">
                
                <div class="col">
                  <div class="h5 mb-0 font-weight-bold text-gray-800">


               <?php

                $connection = mysqli_connect("localhost","root","","mmbazaar");
                $query = "SELECT main_cat_id FROM maincat ORDER BY main_cat_id";
                $query_run = mysqli_query($connection , $query);
                
                $row = mysqli_num_rows($query_run);
                echo '<h4> Total Category: '.$row.'</h4>';

               ?>

              </div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fa fa-list-alt fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>



  </div>
  <!-- I started show images here-->
  <div class="col-lg-9">
        <h5 class="text-center" id="textChange">All Product</h5>
        <hr>
        <div class="text-center">
          <img src="images/loader.gif" id="loader" width="200" style="display:none;">
        </div>
 </div>


  <div class="row" id="result"><!--Woo haha-->
          <?php 
            $connection = mysqli_connect("localhost","root","","mmbazaar");
            $sql="SELECT * FROM product";
            $result=mysqli_query($connection,$sql);
            if (!$result)
            {
                die('Invalid query: '.mysql_error());
            }
            while($row = $result->fetch_assoc())
            //fetch_assoc($result) or $result->fetch_assoc() ?
            {

           ?>

           <!--G for table here -->
           <div class="col-md-3 mb-2">
            <div class="card-deck">
              <div class="card border-secondary">
                <img src="images/<?php echo $row['prod_img']; ?>"  class="card-img-top" >
                <div style="margin:10px 5px 10px 5px; ">
                  <h6 class="text-light bg-info text-center rounded p-1"><?= $row['prod_name']; ?></h6>
                </div>
                <div class="card-body">
                  <h4 class="card-title text-danger">Price : <?= number_format($row['prod_price']); ?> Kyats</h4>
                  
                  <p>
                    <!-- start -->
                    <?php 
                    $userid=$row['user_id'];
                    $connection = mysqli_connect("localhost","root","","mmbazaar");
                    $query = "select user_name,user_gmail from user where user_id=".$userid;
                    $query_run = mysqli_query($connection, $query);
                    while($row1 = mysqli_fetch_assoc($query_run))
                    {

                      $warn_name=$row1['user_name'];$warn_mail=$row1['user_gmail'];
                          echo "Owner :".$row1['user_name']."<br>";
                        }
                    ?>
                    <!-- end -->
                    Owner_id: <?= $row['user_id']; ?><br>
                    Product Status : <?= $row['prod_status']; ?><br>
                    Product Brand : <?= $row['prod_brand']; ?><br>
                    Prefeered : <?= $row['preffered_method']; ?><br>
                    Number of reports : <?= $row['report_count']; ?><br>

                  </p>
                  <div class="btn btn-danger btn-block" onclick='warn("<?php echo $warn_mail;?>","<?php echo $warn_name;?>")'>Warn!</div>

                </div>
              </div>
            </div>
           </div>


          <?php } ?>
        </div>
  <!-- End of showing images-->

<!-- Jquery script starts-->
  <script type="text/javascript">
    function warn(email,name){
      var gmail=email;
      $("#warn-name").html(name);
      $("#warning-box").modal("show");
    }
    $(document).ready(function()
      {
        $(".product_check").click(function()
          {
            $("#loader").show();

            var action ='data';
            var brand =get_filter_text('brand');
            var loc =get_filter_text('loc');
            var status =get_filter_text('status');
            var catname=get_filter_text('catname');
            var reportcount =get_filter_text('reportcount');

            $.ajax(
              {
                url:'action.php',
                method:'POST',
                data:{action:action,prod_brand:brand,prod_loc:loc,prod_status:status,main_cat_name:catname,report_count:reportcount},
                success:function(response)
                {
                  $("#result").html(response);
                  $("#loader").hide();
                  $("#textChange").text("Filtered Products");
                }
              });

          });
        function get_filter_text(text_id)
        {
          var filterData = [];
          $('#'+text_id+':checked').each(function()
          {
            filterData.push($(this).val());
          });
          return filterData;
        }
      });
  </script>
  <!-- Jquery script ends-->



  <!-- Content Row -->

<?php
include('includes/footer.php');
?>