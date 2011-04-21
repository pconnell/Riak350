<?php
class Post {
  
  private $riak;
  public $comments;
  public $bucket;
  public $post;

  function __construct(){
    $riak_connection = new Riak();
    $this->riak = $riak_connection->client;
    $this->bucket = $this->riak->bucket('posts');
  }

  #this is a list keys function, not good for a lot of data
  function get_posts(){
    $keys = $this->bucket->getKeys();
    return $keys;
  }
  
  #Get Data for a given post
  function get_post($k){
    #get the post object
    $this->post = $this->bucket->get($k);
    $this->comments = $this->post->link("comments")->run();
    #eager load the album data
    #$this->albums = $this->artist->link("albums")->run();

    return $this->post->getData();
  }

  function store_post($k, $data){
    $post = $this->bucket->newObject($k, $data);
    $post->store();
  }

  function delete_post($k){
   $post = $this->bucket->get($k);
   $post->delete();		
  }
  
  function link_comment($comment){
   $this->post->addLink($comment);
   $this->post->store();
  }

 
}
