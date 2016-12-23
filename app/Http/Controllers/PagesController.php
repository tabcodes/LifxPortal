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

        $lightList = $this->Lifx->lightList;
        $locationList = $this->Lifx->locationList;
        $groupList = $this->Lifx->groupList;


        return view('index')
        ->with("locations", $locationList)
        ->with("groups", $groupList)
        ->with("lights", $lightList);
    }
}
