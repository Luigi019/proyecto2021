<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\VideoGrant;

class AccsessTokenController extends Controller
{
    private $sid = 'AC28e0ec0da9f7c6035003389ad7bb6052';
    private $authToken = '9bca3372751b032dd4cd4e75e36da8f4';
    private $apiSid = 'SK1a81458977b87be08d3617de75a2646f';
    private $apiSecret = 'y3UO5PSf4nPjTkTF4dRjgmnjRbFZP8Wb';
    private $apiType = 'Standard';

    public function generateToken()
    {
        $identity = Str::random(36);

        $token = new AccessToken($this->sid ,$this->apiSid, $this->apiSecret, 3600 , $identity);

        $grant = new VideoGrant();
        $grant->setRoom('Coor room');
        $token->addGrant($grant);

        echo $token->toJWT();
    }

}
