<?php


class Router {

	private $route_array = [];
	private $server;
	private $get;
	private $post;

	public function __construct($server, $get, $post){
		$this->server = $server;
		$this->get = $get;
		$this->post = $post;
	}

	public function new_route($url, $page_class){
		$this->route_array[$url] = $page_class;
	}

	public function serve(){
		foreach ($this->route_array as $url => $page) {
			if ($url == $this->get['r']) {
				$page->serve($this->server['REQUEST_METHOD'],$this->post);
				return;
		} 
			 
		
		}
		header('location:?r=/');
		
	}
}