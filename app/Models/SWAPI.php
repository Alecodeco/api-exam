<?php

namespace App\Models;


class SWAPI {


  function __construct() {
    $this->client = $this->SetClient();
  } //-


  private function SetClient() {
    $client = new \GuzzleHttp\Client(
      [
        'base_uri' => env('API_SW'),
        'headers'  =>
          [
            'Accept' => 'application/json',
            'X-Requested-With' => 'XMLHttpRequest'
          ],
        'timeout'  => 60
      ]
    );

    return $client;
  } //-


  public function call($metodo) {
    $ejecutar = $this->client->request('GET', "/api/{$metodo}");
    return json_decode($ejecutar->getBody());
  } //-


} //-
