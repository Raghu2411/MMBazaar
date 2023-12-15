
<!-- // $connection=mysqli_connect("localhost","root","","mmbazaar");
// $output='';
// $sql="SELECT * FROM `subcat` `main_cat_id`='".$_POST["main_cat_id"]."' ORDER BY `sub_cat_name`";
// $result = mysqli_query($connection,$sql);
// $output = '<option value="">Select Sub-Category</option>';

// while($row =mysqli_fetch_array($result))
// {
// 	$output .='<option value="'.$row["sub_cat_id"].'">'.$row["sub_cat_name"].'</option>';
// }
// echo $output; -->


<?php

$q = intval($_GET['q']);

$con = mysqli_connect("localhost","root","");
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"mmbazaar");
$sql="SELECT * FROM `subcat` WHERE `main_cat_id` = '".$q."'";
$result = mysqli_query($con,$sql);


mysqli_close($con);
?>
<label for="zip-code">Select Sub-Category:</label>
 <select class="form-control" id="sub" name="subcat">
 	<?php 

 	while($row = mysqli_fetch_array($result)) 
 	{ ?>

    <option value="<?php echo $row['sub_cat_id'] ?>"><?php echo $row['sub_cat_name']; ?></option>;
    
	<?php }

?>
</select>
