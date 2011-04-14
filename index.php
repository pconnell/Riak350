<?php 
require_once(dirname(__FILE__).'/lib/common.inc.php');

$posts = new Post();
$tags = new Tag();

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
    $posts->store_post("foobar", array("title" => $_POST["title"], "body" => $_POST["body"], "date" => "2011-05-14"));
  }
  
}

$posts_keys = $posts->get_posts();
foreach ($posts_keys as $key) {
  $posts_data[$key] = $posts->get_post($key);
}

$tags_keys = $tags->get_tags();
foreach ($tags_keys as $key) {
  $tags_data[$key] = $tags->get_tag($key);
}


beginPage();
print_r($posts_data);
echo "<p>";
print_r($tags_data);
?>

<form method="POST" action="index.php">
Title: <input type="text" name="title" /><br/>
Body: <textarea name="body"></textarea><br/>
<input type="submit" name="Submit" value="Submit"/>
</form>
<?php
endPage();
