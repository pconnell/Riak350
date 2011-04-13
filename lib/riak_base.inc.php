<?php

class Riak {
  
  public $client;
  
  function __construct(){
    
    #parse the config file
    if(!$config = parse_ini_file(dirname(__FILE__)."/../config/app.conf")){
      echo "Config file not found or failed to parse";
      exit;
    }
    
    #define the client
    $this->client = new RiakClient($config["riak_server"], $config["riak_port"]);

  }

}

