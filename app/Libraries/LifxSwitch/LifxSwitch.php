<?php

namespace App\Libraries\LifxSwitch;
use \Exception;

/*

LIFXSwitch - A small, somewhat-hastily-written library for interacting with the LIFX API. 

TBD
---

    - Refactor to use one function for triggering changes to single/multiple lights
    - Refactor to use with Guzzle
    - Refactor to be more Vue-friendly (React?)

*/

class LifxSwitch
{
    public $authtoken;
    public $lightList;
    public $locationList = [];
    public $groupList = [];
    private $baseUrl = "https://api.lifx.com/v1/lights/";


    public function __construct($token)
    {
        $this->authtoken = $token;

        try {
          $this->lightList = $this->loadList();
        } catch(Exception $e) {
          throw new Exception("Couldn't load list: {$e->getMessage()}");
        }


    }

    public function loadList() {
      $link = 'all/';

      try {
        $response = $this->makeLightCall($link, null, 'GET');
      } catch(Exception $e) {
        throw new Exception("Error: {$e->getMessage()}");
      }


      $this->lightList = json_decode($response, true);

      foreach($this->lightList as $item) {

        $location = $item["location"]["name"];

        if(!in_array($location, $this->locationList)) {
          $this->locationList[] = $location;
        }


        $group = $item["group"]["name"];
        if(!in_array($group, $this->groupList)) {

          $colorStatus = "";

          foreach($this->lightList as $light) {
            if($group != $light['group']['name']) {
              continue;
            }
            $hasColor = $light['product']['capabilities']['has_color'];

            if($hasColor == true) {
              $colorStatus = "color";
            } else {
              continue;
            }
          }

          if($colorStatus == "color") {
            $this->groupList[$group] = $colorStatus;
          } else {
            $this->groupList[$group] = "white";

          }
        }

      }



      return json_decode($response, true);
    }


    // To be deprecated!!
    public function togglePowerSingle($lightId) {

      // Trigger Error Here
      //$lightId = subStr($lightId, -3);

      $link = "{$lightId}/toggle";

      $headers = array('Authorization: Bearer ' . $this->authtoken);
      $ch = curl_init($link);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_POST, true);

      $response = curl_exec($ch);
      $res = json_decode($response, true);

      $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

      curl_close($ch);

      $resArr['responsecode'] = $httpCode;


      if($httpCode != 207) {
        abort(500);
      }

      if( isset($res["results"][0]["status"]) ) {
        $resArr['status'] = $res["results"][0]["status"];
      }


      sleep(1);

      $this->lightList = $this->loadList();

      foreach($this->lightList as $light) {
        if($light['id'] == $lightId) {
          $resArr['lightInfo'] = $light;
          break;
        }
      }

      return json_encode($resArr);
    }

    public function togglePowerAll()
    {

        $endpoint = 'all/toggle';
        $method = 'POST';

        $response = $this->makeLightCall($endpoint, null, $method);

        return response($response);
    }

    public function setState($lightId, $color, $brightness, $temp)
    {


        $data = array(
          'states' => array(
              array(
                  'selector' => "{$lightId}",
              ),
            ),
            'defaults' => array(
            'duration' => 1,
          ),
        );

        if($color) {
          $data['states'][0]['color'] = "hue:{$color['h']} saturation:{$color['s']}";
        }

        if($temp) {
          $data['states'][0]['kelvin'] = $temp;
        }

        if($brightness) {
          $data['states'][0]['brightness'] = $brightness;
        }


        $link = 'states';
        $method = 'PUT';

        $response = $this->makeLightCall($link, $data, $method);
        $this->lightList = $this->loadList();

        $resArr["response"] = $response;

        foreach($this->lightList as $light) {
          if($light['id'] == str_replace('id:', '', $lightId)) {
            $resArr['lightInfo'] = $light;
            break;
          }
        }

        return $resArr;
    }


    private function makeLightCall($endpoint, $data, $method) {

      if( (!$endpoint) || (strlen($endpoint) <=0) ) {
        throw new Exception("No light URL passed.");
      }

      $link = $this->baseUrl . $endpoint;

      $headers = array('Authorization: Bearer '.$this->authtoken);
      $headers[] = "Content-Type: application/json";


      $ch = curl_init($link);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

      switch($method) {
        case "GET":

          break;
        case "PUT":
          curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
          break;
        case "POST":
        default:
          curl_setopt($ch, CURLOPT_POST, true);
          break;
      }

      if($data) {
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
      }


      $response = curl_exec($ch);


      $info = curl_getinfo($ch);

      $httpcode = $info['http_code'];

      if(curl_error($ch)) {
        throw new Exception("cURL error: {curl_error($ch)}");
      }

      if( $httpcode > 207 ) {
        throw new Exception("Call was unsuccessful- HTTP Code {$httpcode}");
      }




      curl_close($ch);
      sleep(1);

      return $response;
    }


}
