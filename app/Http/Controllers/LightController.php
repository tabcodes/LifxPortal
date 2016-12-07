<?php

namespace App\Http\Controllers;
use App\Libraries\LifxSwitch\LifxSwitch;
use Illuminate\Http\Request;
use Exception;

class LightController extends Controller
{
    public function __construct()
    {
        $this->homeKey = getenv('LIFX_HOME_KEY');
        $this->lifx = new LifxSwitch($this->homeKey);

    }

    public function listLifxLights(Request $req)
    {



      try {
        $list = $this->lifx->listLights();
      } catch(Exception $e) {

        abort(500);
      }

      return $list;

    }

    public function togglePowerAll(Request $req)
    {

      try {
        $list = $this->lifx->togglePowerAll();
      } catch(Exception $e) {

        abort(500);
      }

      return $list;
    }

    public function togglePowerSingle(Request $req) {

      try {
        $res = $this->lifx->togglePowerSingle($req['lightIndex']);
      } catch(Exception $e) {
        return $e->getMessage();
      }

      return $res;
    }




    public function setLifxState(Request $req) {

      $lightIndex = $req['lightIndex'];
      $brightness = $req['lightBrightness'];
      $temp = $req['lightTemp'];

      try {
        $res = $this->lifx->setState($lightIndex, $brightness, $temp);
      } catch(Exception $e) {
        abort(500);
      }

      return $res;

    }

}
