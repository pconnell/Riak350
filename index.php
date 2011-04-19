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
<?php
        $posts = new Post();
        $post_keys = $posts->get_posts();
        $posts_data = array();
        foreach($post_keys as $key){
                $posts_data[$key] = $posts->get_post($key);
        }
        echo "<form method = 'get' action = 'viewPost.php'>";
        foreach ($posts_data as $key => $post){
                $title = $post['title'];
                $date = $post['date'];
                if ($title == null){
                        $title = "No Title given";
                }
                if ($date == null){
                        $date = "no date assigned";
                }
                echo "<a href = 'viewPost.php?key=$key'>
                        <strong><big>$title</big></strong><br/>
                        on: <em>$date</em><br/><br/>
                      </a>";
        }
        echo "</form>";
?>
<h2>Popular Tags</h2>
<?php foreach (array_keys($tags_data) as $tag_key) { ?>
<a href="viewTag.php?tag=<?php echo $tag_key?>"><?php echo $tag_key?></a><br/>
<?php } ?>
<?php
endPage();
