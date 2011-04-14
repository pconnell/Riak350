<?php

$load_libs = array(
               "riak.php",
               "riak_base.inc.php",
               "posts.inc.php",
               "tags.inc.php"
             );

foreach($load_libs as $lib){
  require_once(dirname(__FILE__)."/".$lib);
}


$SITE_TITLE = "Riak Blog";

function beginPage() {
  ob_start(); 
}

function endPage(){
  global $SITE_TITLE;
  global $SITE_PAGE_TITLE;

  $SITE_MAIN = ob_get_contents();
  ob_end_clean();
  include(dirname(__FILE__)."/master.php");
}

