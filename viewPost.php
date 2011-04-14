<?php 
require_once(dirname(__FILE__).'/lib/common.inc.php');

$key = $_GET['key'];

$posts = new Post();
$posts_data = $posts->get_post($key);

beginPage();
?>
<h1><?php echo $posts_data['title'] ?></h1>
<div class="date"><?php echo $posts_data['date'] ?></div>
<div class="body">
<?php echo $posts_data['body']?>
</div>

<h2>Comments</h2>
blah blah chris chris
<?php
endPage();
