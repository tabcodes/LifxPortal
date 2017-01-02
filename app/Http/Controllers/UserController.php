<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{


  public function setCloudKey(Request $request) {

    $user = Auth::user();

    $cloudKey = $request->input('newapikey');

    $user->cloudkey = encrypt($cloudKey);

    $user->save();

    return redirect("/setCloudKey/{$user->id}")->withStatus('Cloud key set');

  }

  public function updateAccount(Request $request) {

    $user = Auth::user();

    $user->email = $request->input('email');

    $user->save();

    return view('user.update');

  }

}
