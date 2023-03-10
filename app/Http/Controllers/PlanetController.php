<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlanetController extends Controller {


  public function all() {
    $response = $this->swapi->call('planets');
    return response()->json($response, 200);
  } //-


  public function getById($id) {
    $response = $this->swapi->call("planets/{$id}");
    return response()->json($response, 200);
  } //-


} //-
