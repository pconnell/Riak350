<?php
class Comment {

	private $riak;

	public $bucket;
	public $post;

	function __construct(){
		$riak_connection = new Riak();
		$this->riak = $riak_connection->client;
		$this->bucket = $this->riak->bucket('comments');
	}

	function get_comments(){
		$keys = $this->bucket->getKeys();
		return $keys;
	}
	function get_comment($key){
		$this->post = $this->bucket->get($key);
		return $this->post->getData();
	}
	function store_comment($key, $data){
		$post = $this->bucket->newObject($key, $data);
		$post -> store();
	}
	function delete_comment($key){
		$post = $this->bucket->get($key);
		$post->delete();
	}

}
