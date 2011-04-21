
<?php
class Comment {

	private $riak;

	public $bucket;
	public $key;
	public $comment;

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
		$this->comment = $this->bucket->get($key);
		return $this->comment->getData();	
	}
        function store_comment($key, $data){ 
	$this->comment = $this->bucket->newObject($key, $data);  
	$this->comment->store(); 
	$this->key = $this ->comment ->key; 
	} 
	function delete_comment($key){
		$comment = $this->bucket->get($key);
		$comment->delete();
	}

}
