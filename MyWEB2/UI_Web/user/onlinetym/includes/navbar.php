   <!-- Sidebar -->
   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
  <div class="sidebar-brand-icon rotate-n-15">
    <i class="far fa-user"></i>
  </div>
  <div class="sidebar-brand-text mx-3">Admin<sup>MMBazaar</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
  <a class="nav-link" href="index.php">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Manage
</div>

<!-- Nav Item - Pages Collapse Menu -->

<li class="nav-item">
  <a class="nav-link" href="register.php">
    <i class="fas fa-user-tie"></i>
    <span>Manage Admin</span></a>
</li>


<li class="nav-item">
  <a class="nav-link" href="adminuser.php">
    <i class="fas fa-users"></i>
    <span>Manage Users</span></a>
</li>


<li class="nav-item">
  <a class="nav-link" href="requser.php">
    <i class="fas fa-info-circle"></i>
    <span>User Requests</span></a>
</li>

<li class="nav-item">
  <a class="nav-link" href="leftuser.php">
    <i class="fa fa-road"></i>
    <span>Left Users</span></a>
</li>


<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Filter Search
</div>

<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapse">
    <i class="fas fa-fw fa-cog"></i>
    <span>Filter Brand</span>
  </a>
  <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Select Brand:</h6>
      <div class="col-lg-11"> 
        <!--Start-->
        <ul class="list-group">
          <?php 
            $sql="SELECT DISTINCT prod_brand FROM product ORDER BY prod_brand";
            $result=$connection->query($sql);
            while($row=$result->fetch_assoc()){
           ?>
           <li class="list-group-item">
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input product_check"
                value="<?= $row['prod_brand']; ?>" id="brand">
                <?= $row['prod_brand']; ?>
              </label>
            </div>
           </li>
          <?php } ?>
        </ul>
        <!--END-->
      </div>
    </div>
  </div>
</li>
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapse">
    <i class="fas fa-fw fa-cog"></i>
    <span>Filter Location</span>
  </a>
  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Select Loc:</h6>
      <div class="col-lg-11"> 
        <!--Start-->
        <ul class="list-group">
          <?php 
            $sql="SELECT DISTINCT prod_loc FROM product ORDER BY prod_loc";
            $result=$connection->query($sql);
            while($row=$result->fetch_assoc()){
           ?>
           <li class="list-group-item">
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input product_check"
                value="<?= $row['prod_loc']; ?>" id="loc">
                <?= $row['prod_loc']; ?>
              </label>
            </div>
           </li>
          <?php } ?>
        </ul>
        <!--END-->
      </div>
    </div>
  </div>
</li>

<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapse">
    <i class="fas fa-fw fa-cog"></i>
    <span>Filter Product Status</span>
  </a>
  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Select Product Status:</h6>
      <div class="col-lg-11"> 
        <!--Start-->
        <ul class="list-group">
          <?php 
            $sql="SELECT DISTINCT prod_status FROM product ORDER BY prod_status";
            $result=$connection->query($sql);
            while($row=$result->fetch_assoc()){
           ?>
           <li class="list-group-item">
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input product_check"
                value="<?= $row['prod_status']; ?>" id="status">
                <?= $row['prod_status']; ?>
              </label>
            </div>
           </li>
          <?php } ?>
        </ul>
        <!--END-->
      </div>
    </div>
  </div>
</li>

<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapse">
    <i class="fas fa-fw fa-cog"></i>
    <span>Filter Category</span>
  </a>
  <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Select Category:</h6>
      <div class="col-lg-11"> 
        
        <ul class="list-group">
          <?php 
            $sql="SELECT DISTINCT main_cat_name FROM product ORDER BY main_cat_name";
            $result=$connection->query($sql);
            while($row=$result->fetch_assoc()){
           ?>
           <li class="list-group-item">
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input product_check"
                value="<?= $row['main_cat_name']; ?>" id="catname">
               <?php 

               $catid=$row['main_cat_name'];
               $connection = mysqli_connect("localhost","root","","mmbazaar");
               $query = "SELECT `main_cat_name` FROM `maincat` WHERE `main_cat_id`='$catid'";
               $query_run = mysqli_query($connection, $query);
               while($row1 = mysqli_fetch_assoc($query_run))
                {
                
                 echo $row1['main_cat_name'];
                 //<?= $row1['main_cat_name']; 
                
                }

                ?>


                




              </label>
            </div>
           </li>
          <?php } ?>
        </ul>
        
      </div>
    </div>
  </div>


<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapse">
    <i class="fas fa-fw fa-cog"></i>
    <span>Filter Reports</span>
  </a>
  <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Select Number of Reports:</h6>
      <div class="col-lg-11"> 
        <!--Start-->
        <ul class="list-group">
          <?php 
            $sql="SELECT DISTINCT report_count FROM product ORDER BY report_count";
            $result=$connection->query($sql);
            while($row=$result->fetch_assoc()){
           ?>
           <li class="list-group-item">
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input product_check"
                value="<?= $row['report_count']; ?>" id="reportcount">
                <?= $row['report_count']; ?>
              </label>
            </div>
           </li>
          <?php } ?>
        </ul>
        <!--END-->
      </div>
    </div>
  </div>
</li>

<!-- I started from here! -->

<!--I ended here-->

<!-- Nav Item - Pages Collapse Menu -->


<!-- Nav Item - Charts -->

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->


          <!-- Topbar Navbar -->

          <ul class="navbar-nav ml-auto">

              <li class="nav-item" style="margin-top:25px;">
                <a href="../index.php"><span style="color:#3380FF  ;font-weight:bold">Home</span></a>
              </li>
            
            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->

            <li class="nav-item dropdown no-arrow">


              <?php 

                $namee= $_SESSION['username'];
                $connection = mysqli_connect("localhost","root","","mmbazaar");
                  $query = "SELECT `image`, `username` FROM `register` WHERE email='$namee'";
                  $query_run = mysqli_query($connection, $query);
                  if(mysqli_num_rows($query_run) > 0)
                        {
                          while($row = mysqli_fetch_assoc($query_run))
                          {
                            ?>


              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                  
               <?php echo $row['username']; ?>
                  
                </span>
                <img class="img-profile rounded-circle" src="upload/<?php echo $row['image']; ?>">

              </a>

              <?php 
              }
                        }
                        else{
                          echo "No Record Found";
                        }

                 ?>

              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>
            <ul class="navbar-nav ml-auto mt-10">
              <li class="nav-item">
                <a class="nav-link login-button" href="login.php"><span style="color:#3380FF  ;font-weight:bold">Logout</span></a>
              </li>
            </ul>



          </ul>

        </nav>
        <!-- End of Topbar -->


  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  
  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

          <form action="logout.php" method="POST"> 
          
            <button type="submit" name="logout_btn" class="btn btn-primary">Logout</button>

          </form>


        </div>
      </div>
    </div>
  </div>