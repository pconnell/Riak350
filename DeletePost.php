<?php 
require_once(dirname(__FILE__).'/lib/common.inc.php');

$posts = new Post();

$posts->delete_post($_POST["key"]);


