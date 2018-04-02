<?php

namespace App\Api;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;


class RabbitMQ {

	public static function sendMessage($currency, $channelName){

	$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
	$channel = $connection->channel();

	$channel->queue_declare($channelName, false, false, false, false);
	$msg = new AMQPMessage($currency);
	
	$channel->basic_publish($msg, '', $channelName);
	
	$channel->close();
	$connection->close();


	}




}