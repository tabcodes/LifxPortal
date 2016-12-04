<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{


    public function indexPage(Request $req) {
        return view('index');
    }

}
