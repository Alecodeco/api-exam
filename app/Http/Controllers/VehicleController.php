<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VehicleController extends Controller {


  public function all() {
    $response = $this->swapi->call('vehicles');
    return response()->json($response, 200);
  } //-


  public function getById($id) {
    $response = $this->swapi->call("vehicles/{$id}");
    return response()->json($response, 200);
  } //-


} //-
