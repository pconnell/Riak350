<?php
class Tag {
  
  private $riak;
  
  public $bucket;
  public $tag;

  function __construct(){
    $riak_connection = new Riak();
    $this->riak = $riak_connection->client;
    $this->bucket = $this->riak->bucket('tags');
  }

  #this is a list keys function, not good for a lot of data
  function get_tags(){
    $keys = $this->bucket->getKeys();
    return $keys;
  }
  
  #Get Data for a given tag 
  function get_tag($k){
    #get the tag object
    $this->tag = $this->bucket->get($k);
    
    return $this->tag->getData();
  }

  function store_tag($k, $data){
    $tag = $this->bucket->newObject($k, $data);
    $tag ->store();
  }

  function get_tags_for_post($k) {
    $result = $this->riak->add("tags")->
      map("function (v) { " .
      " vals = JSON.parse(v.values[0].data); " .
      " for (i = 0; i < vals.length; i++) { " .
      "   if (vals[i] == '" . $k . "') {" .
      "     return [v.key] " .
      "   } } return [] } ") -> 
      run();
    return $result;
  }
}
