<?php

namespace App\Http\Controllers;
use App\Libraries\LifxSwitch\LifxSwitch;
use Illuminate\Http\Request;

class LightController extends Controller
{
    public function __construct()
    {
        $this->homeKey = getenv('LIFX_HOME_KEY');
    }

    public function listLifxLights(Request $req)
    {

      $lifx = new LifxSwitch($this->homeKey);

      try {
        $list = $lifx->listLights();
      } catch(Exception $e) {

        abort(500);
      }

      return $list;

    }

    public function togglePower(Request $req)
    {
      $lifx = new LifxSwitch($this->homeKey);

      try {
        $list = $lifx->togglePowerAll();
      } catch(Exception $e) {

        abort(500);
      }

      return $list;
    }


    public function setLifxState(Request $req) {
      $lifx = new LifxSwitch($this->homeKey);

      $lightIndex = $req['lightIndex'];
      $brightness = $req['lightBrightness'];
      $temp = $req['lightTemp'];

      try {
        $res = $lifx->setState($lightIndex, $brightness, $temp);
      } catch(Exception $e) {
        abort(500);
      }

      return $res;

    }

}
