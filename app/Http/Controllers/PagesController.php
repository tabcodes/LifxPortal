<?php

namespace App\Http\Controllers;
use App\Libraries\LifxSwitch\LifxSwitch;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->homeKey = getenv('LIFX_HOME_KEY');

        $this->Lifx = new LifxSwitch($this->homeKey);

    }

    public function indexPage(Request $req)
    {


        // try {
        //   $this->Lifx->togglePowerAll();
        // } catch(Exception $e) {
        //   abort(500);
        // }

        $lightList = $this->Lifx->lightList;

        return view('index')
        ->with("lights", $lightList);
    }
}
