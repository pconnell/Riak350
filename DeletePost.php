<?php 
require_once(dirname(__FILE__).'/lib/common.inc.php');

$posts = new Post();

$posts->delete_post($_POST["key"]);
?>

<head>
<meta HTTP-EQUIV="REFRESH" content="0; url=index.php">
</head> 
