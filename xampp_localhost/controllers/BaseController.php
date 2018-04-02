<?php


class BaseController {



	public function serve($method, $post){

		if ($method == "GET") {
			$this->get();
		}else{
			$this->post($post);
		}
	}


}
