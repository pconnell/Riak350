<?php 
require_once(dirname(__FILE__).'/lib/common.inc.php');

$posts = new Post();
$tags = new Tag();

$today = date('Y-m-d');
$keydate = date('Ymd');
$postKey = md5($_POST["title"]).'_'.$keydate;
$taglist = explode(" ", $_POST['tags']);

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
    $posts->store_post($postKey, array("title" => $_POST["title"], "body" => $_POST["body"], "date" => $today));

    foreach ($taglist as $tag) {
      $tags_data = $tags->get_tag($tag);
      $tags_data[] = $postKey;
      $tags->store_tag($tag, $tags_data);
    }
  }
  
}

beginPage();
?>
<h1>Add Post</h1>
<form method="POST" action="addPost.php">
Title: <input type="text" name="title" size="60" /><br/>
Body: <textarea name="body" rows="6" cols="60"></textarea><br/>
Tags: <input type="text" name = "tags" size="60"/><small>tag1 tag2 tag3</small><br/>
<input type="submit" name="Submit" value="Submit"/>
</form>
<?php
endPage();
