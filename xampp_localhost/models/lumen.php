<?php 


class Lumen {

	public static function send($date){

		$url = 'http://localhost:8000/currency?date=' . $date;
		$request = \Httpful\Request::get($url)->send();
		
	}
}