<?php 
require_once(dirname(__FILE__).'/lib/common.inc.php');

$tags = new Tag();

$tags_keys = $tags->get_tags();
foreach ($tags_keys as $key) {
  $tags_data[$key] = $tags->get_tag($key);
}

beginPage();
?>
<h1>Blog Site</h1>

<h2>Recent Posts</h2>
(Patrick)

<h2>Popular Tags</h2>
<?php foreach (array_keys($tags_data) as $tag_key) { ?>
<a href="viewTag.php?tag=<?php echo $tag_key?>"><?php echo $tag_key?></a><br/>
<?php } ?>
<?php
endPage();
