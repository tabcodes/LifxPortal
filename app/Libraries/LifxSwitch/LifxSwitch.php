<?php

namespace App\Libraries\LifxSwitch;
use Exception;


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
        $this->lightList = $this->loadList();


    }

    public function loadList() {
      $link = 'https://api.lifx.com/v1/lights/all';
      $authToken = $this->authtoken;
      $ch = curl_init($link);
      $headers = array('Authorization: Bearer '.$authToken);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $response = curl_exec($ch);
      $this->lightList = json_decode($response, true);

      foreach($this->lightList as $item) {

        $location = $item["location"]["name"];

        if(!in_array($location, $this->locationList)) {
          $this->locationList[] = $location;
        }


        $group = $item["group"]["name"];
        if(!in_array($group, $this->groupList)) {
          $this->groupList[$group] = $item["group"]["id"];
        }

      }



      return json_decode($response, true);
    }


    // To be deprecated!!
    public function togglePowerSingle($lightId) {

      // Trigger Error Hurr
      //$lightId = subStr($lightId, 3);

      $link = "https://api.lifx.com/v1/lights/{$lightId}/toggle";

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
          return json_encode($resArr);
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
                  'kelvin' => $temp,
                  'brightness' => "{$brightness}"
              ),
            ),
            'defaults' => array(
            'duration' => 1,
          ),
        );

        if($color) {
          $data['states'][0]['color'] = "hue:{$color['h']} saturation:{$color['s']}";
        }


        $link = 'states';
        $method = 'PUT';

        $response = $this->makeLightCall($link, $data, $method);

        $this->lightList = $this->loadList();

        $resArr["response"] = $response;

        foreach($this->lightList as $light) {
          if($light['id'] == $lightId) {
            $resArr['lightInfo'] = $light;
            break;
          }
        }

        return $resArr;
    }


    private function makeLightCall(String $endpoint, Array $data, String $method) {

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
      sleep(1);

      return $response;
    }


}
