<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LightController extends Controller
{
    public function __construct()
    {
        $this->homeKey = getenv('LIFX_HOME_KEY');
    }

    public function listLifxLights(Request $req)
    {
        $link = 'https://api.lifx.com/v1/lights/all';
        $authToken = $this->homeKey;
        $ch = curl_init($link);
        $headers = array('Authorization: Bearer '.$authToken);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);

        return response()->json($response);
    }

    public function changeLifxState(Request $req)
    {
        $link = 'https://api.lifx.com/v1/lights/all/toggle';
        $authToken = $this->homeKey;

        $headers = array('Authorization: Bearer '.$authToken);

        $ch = curl_init($link);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        $response = curl_exec($ch);

        return response()->json($response);
    }

    public function breatheLifxLights(Request $req)
    {
        $link = 'https://api.lifx.com/v1/lights/all/effects/breathe';
        $authToken = $this->homeKey;

        $headers = array('Authorization: Bearer '.$authToken);
        $data = 'period=10&cycles=10&color=blue';

        $ch = curl_init($link);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);

        return response()->json($response);
    }
}
