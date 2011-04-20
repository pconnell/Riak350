<?php 
require_once(dirname(__FILE__).'/lib/common.inc.php');


$comment = new Comment();
$today = date('Y-m-d');
$keydate = date('Ymd');
$commentKey = md5($_POST["comment"]).'_'.$keydate;
$postKey = $_POST["postKey"];
#Check the $_POST to take action
if($_POST){
  if (!isset($_POST["comment"]) OR empty($_POST["comment"])){
    $errors[] = "Comment body  wasn't submitted";
  }
}
#if there are no errors store the post data
if(!isset($errors)){
    $comment->store_comment($commentKey, array( "body" => $_POST["comment"], "date" => $today));
}
?>
<head>
<meta HTTP-EQUIV="REFRESH" content="0; url=viewPost.php">
</head>


