<?php 
use PhpAmqpLib\Connection\AMQPStreamConnection;
error_reporting(~E_NOTICE);




class RabbitMQ {

	public  $response;

	public  function getResponse(){

		require_once 'vendor/autoload.php';

		$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
		$channel = $connection->channel();
	
		$channel->queue_declare('Exchange', false, false, false, false);
		
		
		$callback = function($msg) {
	  			$this->response = $msg->body;
			};
	
		$channel->basic_consume('Exchange', '', false, true, false, false, $callback);
	
		while(count($channel->callbacks)) {
		   		$channel->wait();
	    		if (!($msg->body)) {
	    			break;
		    	}
		   	}

	   $channel->close();
	   $connection->close();

	   return $this->response;
	}



}