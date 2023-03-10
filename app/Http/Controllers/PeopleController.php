<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeopleController extends Controller {


  public function all() {
    $response = $this->swapi->call('people');
    return response()->json($response, 200);
  } //-


  public function getById($id) {
    $response = $this->swapi->call("people/{$id}");
    return response()->json($response, 200);
  } //-


} //-
