<?php

namespace App\Libraries\LifxSwitch;
use Exception;


class LifxSwitch
{
    public $authtoken;
    public $lightList;

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

      return json_decode($response, true);
    }

    public function togglePowerSingle($lightId) {


      $link = "https://api.lifx.com/v1/lights/{$lightId}/toggle";

      $headers = array('Authorization: Bearer ' . $this->authtoken);
      $ch = curl_init($link);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_POST, true);

      $response = curl_exec($ch);

      $this->lightList = $this->loadList();


      return $response;
    }

    public function togglePowerAll()
    {

        $link = 'https://api.lifx.com/v1/lights/all/toggle';

        $headers = array('Authorization: Bearer '.$this->authtoken);

        $ch = curl_init($link);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        $response = curl_exec($ch);

        return response($response);
    }

    public function setState($lightIndex, $brightness, $temp)
    {
        if (array_key_exists($lightIndex - 1, $this->lightList)) {
            $lightId = $this->lightList[$lightIndex - 1]['id'];
        } else {
            throw new Exception("There is no light with an index of {$lightId}.");
        }

        $data = array(
          'states' => array(
              array(
                  'selector' => "id:{$lightId}",
                  'brightness' => $brightness,
                  'kelvin' => $temp,
                  'power' => 'on'
              ),
            ),
            'defaults' => array(
            'duration' => 1,
          ),
        );

        $link = 'https://api.lifx.com/v1/lights/states';

        $headers = array(
          'Authorization: Bearer '. $this->authtoken,
          'Content-Type: application/json',
        );


        $ch = curl_init($link);

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');

        $response = curl_exec($ch);

        return $response;
    }
}
