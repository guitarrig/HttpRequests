<?php 

class HomeController extends BaseController{

	public function get(){

		require_once('view/form.php');
	}

	public function post($post){

		$date = explode('-', $post['date']);
		$date = $date[2] .'.'. $date[1] .'.'. $date[0];

		$result = DB::check($date);
		if($result){

			$currency = json_decode($result['json']);
			require_once('view/PB_currency.php');

		}else{

			Lumen::send($date);

			$response = new RabbitMQ;
			$result = $response->getResponse();

			// var_dump($result);

			$currency = json_decode($result);
			DB::put($result, $date);
			require_once('view/PB_currency.php');
		}


		

	}
}