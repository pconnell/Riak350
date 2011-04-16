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
<form name="input" action="DeletePost.php" method="post">
<input type="hidden" name="key" value="<?php echo $key ?>" />
<input type="submit" name="Delete Post" value="Delete" />
</form>

<h2>Comments</h2>
<form name = "input" action = "addComment.php" method="post">
<input type = "textbox" name = "comment" style="width:200px; height:75px;";
</br></br><input type = "submit" name="Submit Comment" Value = "Submit Your Comment" />
</form>
<?php
endPage();
