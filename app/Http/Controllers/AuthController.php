<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller {


  public function signup(Request $request) {
    // dd($request);

    $request->validate([
        'name'     => 'required|string|max:255',
        'email'    => 'required|string|email|unique:users|max:255',
        'password' => 'required|min:6',
    ]);


    $user = new User(
      [
        'name'     => $request->name,
        'email'    => $request->email,
        'password' => Hash::make($request->password),
      ]
    );

    $user->save();

    return response()->json(['message' => 'User created successfully!'], 201);
  } //-


  public function login(Request $request) {
    $request->validate(
      [
        'name'     => 'required|string',
        'email'    => 'required|string|email',
        'password' => 'required|min:6'
      ]
    );

    $credentials = request(['email', 'password']);

    $token = Auth::attempt($credentials);

    if (!$token) {
      return response()->json(['message' => 'Unauthorized'], 401);
    }

    $user = Auth::user();

    return response()->json(
      [
        'user' => $user,
        'authorisation' => [
            'token' => $token,
            'type' => 'Bearer',
        ]
      ]
    );

  } //-


  public function logout(Request $request) {
    Auth::logout();

    return response()->json(['message' => 'Logged Out']);
  } //-


  public function profile(Request $request) {
    return response()->json($request->user());
  } //-


} //-
