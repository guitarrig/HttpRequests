<?php


class DB  {

	

	public static function check($date){
		
		$connection = new PDO('mysql:host=localhost;dbname=money_db', 'root', '');

		$stmt = $connection->prepare('SELECT * FROM pb_currency WHERE daate = ? ');
		$stmt->execute([$date]);
		$result = $stmt->fetch(PDO::FETCH_ASSOC);

		return $result;

	}

	public static function put($json, $date){

		$connection = new PDO('mysql:host=localhost;dbname=money_db', 'root', '');

		$stmt = $connection->prepare('INSERT INTO pb_currency (json, daate) VALUES (?,?)');
		$stmt->execute([$json, $date]);
		
	}


	
}