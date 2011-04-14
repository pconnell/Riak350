<?php 
require_once(dirname(__FILE__).'/lib/common.inc.php');

$posts = new Post();

$today = date('Y-m-d');
$keydate = date('Ymd');

#Check the $_POST to take action
if($_POST){
  if (!isset($_POST["title"]) OR empty($_POST["title"])){
    $errors[] = "Post title wasn't submitted";
  }
  if (!isset($_POST["body"]) OR empty($_POST["body"])){
    $errors[] = "Post body wasn't submitted";
  }
   
  #if there are no errors store the post data
  if(!isset($errors)){
    $posts->store_post(md5($_POST["title"]).'_'.$keydate, array("title" => $_POST["title"], "body" => $_POST["body"], "date" => $today));
  }
  
}

beginPage();
?>
<h1>Add Post</h1>
<form method="POST" action="addPost.php">
Title: <input type="text" name="title" /><br/>
Body: <textarea name="body"></textarea><br/>
<input type="submit" name="Submit" value="Submit"/>
</form>
<?php
endPage();
