<?php

//fetch_comment.php

$connect = new PDO('mysql:host=localhost;dbname=mmbazaar', 'root', '');
$comment_prod_id=$_REQUEST["comment_prod_id"];
//$comment_user_id=$_POST["comment_user_id"];
// $comment_user_img=$_POST["comment_user_img"];
$query = "
SELECT * FROM `comment` WHERE `prod_id`='$comment_prod_id' 

ORDER BY comment_id DESC
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();
$output = '';
foreach($result as $row)
{
 $output .= '
 <div class="media">
  
  <div class="media-body">
  <div class="name">By <b>'.$row["comment_sender_name"].'</b> </div>
  <div class="date"><i>'.$row["date"].'</i></div>
  <div class="review-comment">'.$row["comment"].'</div>
  </div>
</div>
 
 ';
 
}

echo $output;
// <div class="panel panel-default">
//   <div class="panel-heading">By <b>'.$row["comment_sender_name"].'</b> on <i>'.$row["date"].'</i></div>
//   <div class="panel-body">'.$row["comment"].'</div>
  
//  </div>


// 											<div class="name">
// 												<h5>Tun Ye Minn</h5>
// 											</div>
// 											<div class="date">
// 												<p>Jun 21, 2019</p>
// 											</div>
// 											<div class="review-comment">
// 												<p>
// 													Wow, Cool Product. Very Nice!
// 												</p>
// 											</div>

?>