<?php 
require_once(dirname(__FILE__).'/lib/common.inc.php');

$comment = new Comment();
$today = date('Y-m-d');
$keydate = date('Ymd');
$postKey = md5($_POST["comment"]).'_'.$keydate;

#Check the $_POST to take action
if($_POST){
  if (!isset($_POST["comment"]) OR empty($_POST["comment"])){
    $errors[] = "Comment body  wasn't submitted";
  }
#if there are no errors store the post data
if(!isset($errors)){
    
}

?>
