<?php 
require_once(dirname(__FILE__).'/lib/common.inc.php');
$key = $_GET['tag'];
$posts = new Post();
$tags = new Tag();

$posts_data = array();
$tag_data  = $tags->get_tag($key);
foreach ($tag_data as $post_key) {
  $posts_data[$post_key] = $posts->get_post($post_key);
}

beginPage();
?>
<h1>Posts for <?php echo $key ?></h1>
<?php foreach (array_keys($posts_data) as $post_key) { 
  $post = $posts_data[$post_key];
?>
<h2><a href="viewPost.php?key=<?php echo $post_key?>"><?php echo $post['title']?></a></h2>
<div><?php echo $post['date']?></div>
<?php } ?>
<?php
endPage();
