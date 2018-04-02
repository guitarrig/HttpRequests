<?php

namespace App\Api;
use GuzzleHttp\Client;

class PrivatExchangeRates {

  private $client;
  private $url;

  private function __construct($url){
    $this->client = new Client();
    $this->url = $url;
  }

  public static function currency(){
    return new self('https://api.privatbank.ua/p24api/exchange_rates?');
  }

  public function format($format){
    $this->url .= $format . '&';
    return $this;
  }

  public function date($date){
    $this->url .= 'date=' . $date;
    return $this;
  }

  public function send(){
    $result = $this->client->request('GET', $this->url);

    return ((string)$result->getBody());
  }
}
