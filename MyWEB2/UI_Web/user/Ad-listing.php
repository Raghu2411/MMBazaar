<!DOCTYPE html>
<html lang="en">
<head>

  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add Product</title>
  
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

</head>

<body class="body-wrapper">

<?php
  include_once("includes/header.php");
?>
<section class="ad-post bg-gray py-5">
    <div class="container">
        <form action="#">
            <!-- Post Your ad start -->
            <fieldset class="border border-gary p-4 mb-5">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3>Post Your Product</h3>
                        </div>
                        <div class="col-lg-6">
                            <h6 class="font-weight-bold pt-4 pb-1">Title Of Product:</h6>
                            <input type="text" class="border w-100 p-2 bg-white text-capitalize" placeholder="Product title go There">
                            <h6 class="font-weight-bold pt-4 pb-1">Product Type:</h6>
                            <div class="row px-3">
                                <div class="col-lg-4 mr-lg-4 my-2 rounded bg-white">
                                    <input type="radio" name="itemName" value="personal" id="personal">
                                    <label for="personal" class="py-2">Personal</label>
                                </div>
                                <div class="col-lg-4 mr-lg-4 my-2 rounded bg-white ">
                                    <input type="radio" name="itemName" value="business" id="business">
                                    <label for="business" class="py-2">Business</label>
                                </div>
                            </div>
                            <h6 class="font-weight-bold pt-4 pb-1">Description:</h6>
                            <textarea name="" id="" class="border p-3 w-100" rows="7" placeholder="Write details about your product"></textarea>
                        </div>
                        <div class="col-lg-6">
                            <h6 class="font-weight-bold pt-4 pb-1">Select Product Category:</h6>
                            <select name="" id="inputGroupSelect" class="w-100">
                                <option value="1">Select category</option>
                                <option value="2">Electronics</option>
                                <option value="3">Men_Fashion</option>
                                <option value="4">Women_Fashion</option>
                                <option value="5">Fitness</option>
                            </select>
                            <div class="price">
                                <h6 class="font-weight-bold pt-4 pb-1">Item Price [ MMK(Kyats) ] :</h6>
                                <div class="row px-3">
                                    <div class="col-lg-4 mr-lg-4 rounded bg-white my-2 ">
                                        <input type="text" name="price" class="border-0 py-2 w-100 price" placeholder="Price"
                                            id="price">
                                    </div>
                                    <div class="col-lg-4 mrx-4 rounded bg-white my-2 ">
                                        <input type="checkbox" value="Negotiable" id="Negotiable">
                                        <label for="Negotiable" class="py-2">Negotiable</label>
                                    </div>
                                </div>
                            </div>
                            <div class="choose-file text-center my-4 py-4 rounded">
                                <label for="file-upload">
                                    <span class="d-block font-weight-bold text-dark">Drop files anywhere to upload</span>
                                    <span class="d-block">or</span>
                                    <span class="d-block btn bg-primary text-white my-3 select-files">Select files</span>
                                    <span class="d-block">Maximum upload file size: 500 KB</span>
                                    <input type="file" class="form-control-file d-none" id="file-upload" name="file">
                                </label>
                            </div>
                        </div>
                    </div>
            </fieldset>
            <!-- Post Your ad end -->

            <!-- seller-information start -->
            <fieldset class="border p-4 my-5 seller-information bg-gray">
                <div class="row">
                    <div class="col-lg-12">
                        <h3>Seller Information</h3>
                    </div>
                    <div class="col-lg-6">
                        <h6 class="font-weight-bold pt-4 pb-1">Contact Name:</h6>
                        <input type="text" placeholder="Contact name" class="border w-100 p-2">
                        <h6 class="font-weight-bold pt-4 pb-1">Contact Number:</h6>
                        <input type="text" placeholder="Contact Number" class="border w-100 p-2">
                    </div>
                    <div class="col-lg-6">
                        <h6 class="font-weight-bold pt-4 pb-1">Contact Name:</h6>
                        <input type="email" placeholder="name@yourmail.com" class="border w-100 p-2">
                        <h6 class="font-weight-bold pt-4 pb-1">Contact Name:</h6>
                        <input type="text" placeholder="Your address" class="border w-100 p-2">
                    </div>
                </div>
            </fieldset>
            <!-- seller-information end-->

            <!-- ad-feature start -->
            <fieldset class="border bg-white p-4 my-5 ad-feature bg-gray">
                <div class="row">
                    <div class="col-lg-12">

                        <h3 class="pb-3">Make Your Product Featured</h3>

                    </div>
                    <div class="col-lg-6 my-3">
                        <span class="mb-3 d-block">Please select the preferred payment method:</span>
                        <ul>
                            <li>
                                <input type="radio" id="bank-transfer" name="adfeature">
                                <label for="bank-transfer" class="font-weight-bold text-dark py-1">Direct Bank Transfer</label>
                            </li>
                            <li>
                                <input type="radio" id="Cheque-Payment" name="adfeature">
                                <label for="Cheque-Payment" class="font-weight-bold text-dark py-1">Cheque Payment</label>
                            </li>
                            <li>
                                <input type="radio" id="Credit-Card" name="adfeature">
                                <label for="Credit-Card" class="font-weight-bold text-dark py-1">Credit Card</label>
                            </li>
                            <li>
                                <input type="radio" id="Face-To-Face" name="adfeature">
                                <label for="Face To Face" class="font-weight-bold text-dark py-1">Face To Face</label>
                            </li>
                        </ul>
                    </div>
                </div>
            </fieldset>
            <!-- ad-feature start -->

            <!-- submit button -->
            <div class="checkbox d-inline-flex">
                <input type="checkbox" id="terms-&-condition" class="mt-1">
                <label for="terms-&-condition" class="ml-2">By click you must agree with our
                    <span> <a class="text-success" href="terms-condition.php">Terms & Condition and Posting Rules.</a></span>
                </label>
            </div>
            <button type="submit" class="btn btn-primary d-block mt-2">Post Your Product</button>
        </form>
    </div>
</section>
<!--============================
=            Footer            =
=============================-->

<?php
include_once("includes/script.php");
include_once("includes/footer.php");
?>