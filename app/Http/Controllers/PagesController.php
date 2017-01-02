<?php

namespace App\Http\Controllers;

use App\Libraries\LifxSwitch\LifxSwitch;
use Auth;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function __construct()
    {
        // $this->homeKey = getenv('LIFX_HOME_KEY');

        // $this->Lifx = new LifxSwitch($this->homeKey);

        $this->middleware('auth', ['except' => ['indexPage']]);
    }

    public function indexPage(Request $req)
    {
        return view('index');
    }

    public function lightController(Request $req)
    {
        $userkey = Auth::user()->cloudkey;

        if($userkey == "none") {
          $ret = [
            'message' => 'It seems you haven\'t set your LIFX Cloud key just yet- when you set the key, you\'ll be able to start using LightPortal!'
          ];

          return view("errors.keyerror")
          ->with('error', $ret);

        }


        $trueKey = decrypt($userkey);

        try {
          $Lifx = new LifxSwitch($trueKey);
        } catch(Exception $e) {



        }

        $lightList = $Lifx->lightList;
        $locationList = $Lifx->locationList;
        $groupList = $Lifx->groupList;

        return view('lightcontrol')
       ->with('locations', $locationList)
       ->with('groups', $groupList)
       ->with('lights', $lightList);
    }
}
