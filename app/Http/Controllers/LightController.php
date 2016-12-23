<?php

namespace App\Http\Controllers;
use App\Libraries\LifxSwitch\LifxSwitch;
use Illuminate\Http\Request;
use Exception;
use View;

class LightController extends Controller
{
    public function __construct()
    {
        $this->homeKey = getenv('LIFX_HOME_KEY');
        $this->lifx = new LifxSwitch($this->homeKey);

    }

    public function setStateSingle($id, Request $req) {

      $lightId = $id;
      $color = $req['color'];
      $brightness = ($req['brightness'] / 100);
      $temp = $req['temp'];



      try {
        $response = $this->lifx->setState($lightId, $color, $brightness, $temp);
      } catch(Exception $e) {
        var_dump($e->getMessage());
        abort(500);
      }

      $returnedLight = $response["lightInfo"];

      $composedView = View::make('partials.singlelight')
      ->with('light', $returnedLight)
      ->with('reload', true)
      ->render();

      $response["composedView"] = $composedView;

      return $response;

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

    public function setStateGroup($id, Request $req) {

      $brightness = $req['brightness'];
      $lightId = $id;

      try {
        $response = $this->lifx->setState($lightId, null, $brightness, null);
      } catch(Exception $e) {

        abort(500);
      }

      $indexView = View::make('index')
      ->with("locations", $this->lifx->locationList)
      ->with("groups", $this->lifx->groupList)
      ->with("lights", $this->lifx->lightList)
      ->render();

      $resArr["composedView"] = $indexView;

      return $resArr;
    }

    public function togglePowerGroup($id)
    {

      try {
        $response = $this->lifx->togglePowerSingle($id);
      } catch(Exception $e) {

        abort(500);
      }

      $indexView = View::make('index')
      ->with("locations", $this->lifx->locationList)
      ->with("groups", $this->lifx->groupList)
      ->with("lights", $this->lifx->lightList)
      ->render();

      $resArr["composedView"] = $indexView;

      return $resArr;
    }

    public function togglePowerSingle($id) {

      try {
        $res = $this->lifx->togglePowerSingle($id);
      } catch(Exception $e) {
        $resJson['status'] = "error";
        return response()->json($resJson);
      }

        $res = json_decode($res, true);
        $returnedLight = $res["lightInfo"];

        $composedView = View::make('partials.singlelight')
        ->with('light', $returnedLight)
        ->with('reload', true)
        ->render();

        $res["composedView"] = $composedView;

        return response()->json($res);

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
