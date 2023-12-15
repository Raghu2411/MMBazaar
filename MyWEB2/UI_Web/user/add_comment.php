<?php

//add_comment.php

$connect = new PDO('mysql:host=localhost;dbname=mmbazaar', 'root', '');

$error = '';
$comment_name = '';
$comment_content = '';

$comment_prod_id=$_POST["comment_prod_id"];
$comment_user_id=$_POST["comment_user_id"];
$comment_user_img=$_POST["comment_user_img"];



if(empty($_POST["comment_name"]))
{
 $error .= '<p class="text-danger">Name is required</p>';
}
else
{
 $comment_name = $_POST["comment_name"];
}

if(empty($_POST["comment_content"]))
{
 $error .= '<p class="text-danger">Comment is required</p>';
}
else
{
 $comment_content = $_POST["comment_content"];
}

if($error == '')
{
 $query = "
 INSERT INTO `comment`( `comment_sender_name`, `comment` , `prod_id`, `user_id`) VALUES ( :comment_sender_name,:comment,:prod_id,:user_id)
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   
   ':comment'    => $comment_content,
   ':comment_sender_name' => $comment_name,
   ':prod_id' => $comment_prod_id,
   ':user_id' => $comment_user_id
  )
 );
 header('location:single.php');
 $error = '<label class="text-success">Comment Added</label>';
}

$data = array(
 'error'  => $error
);

echo json_encode($data);

?>