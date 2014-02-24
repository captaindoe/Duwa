<?php
/**
 * Created by PhpStorm.
 * User: davidwibergh
 * Date: 2014-02-24
 * Time: 08:51
 */

namespace Captaindoe;


use Unirest;

class Duwa {

    public static $apiKey;
    public static $testmode;
    public static $grayscale;
    public static $apiBase    = 'https://duwa.io';
    public static $apiVersion = 1;

    /**
     * @param string $apikey API-nyckel
     */
    public static function setApiKey($apikey)
    {
        self::$apiKey = $apikey;
    }

    public static function setTestMode()
    {
        self::$testmode = true;
    }

    public static function setColor()
    {
        self::$grayscale = false;
    }

    public static function send($params)
    {

        /*if(!is_array($params)) {
            throw new \Exception("send() kräver en array som parameter.");
        }*/

        $apiKey    = self::$apiKey;
        $testMode  = self::$testmode;
        $grayscale = self::$grayscale;

        // Verifiera att API-nyckel har angivits
        if(is_null($apiKey)) {
            throw new \Exception("Du måste ange din API-nyckel innan send() körs.");
        }

        // Verifiera att namn alternativt företag har angivits.
        if(empty($params['recipient']['name']) && empty($params['recipient']['company'])) {
            throw new \Exception("Du måste ange mottagarens namn eller företag.");
        }

        // Verifiera att mottagarens paramtrar finns.
        if(empty($params['recipient']['address']) ||
            empty($params['recipient']['zipcode']) ||
            empty($params['recipient']['district'])
        ) {
            throw new \Exception("Du måste ange mottagarens adress, postnummer och ort.");
        }

        // Verifiera att HTML kod finns
        if(empty($params['letter'])) {
            throw new \Exception("Du måste ange HTML kod för att skapa ett utskick.");
        }

        // Lägg till parametrar
        $params['api_key'] = $apiKey;

        if(!is_null($testMode)) {
            $params['testmode'] = true;
        }

        if(!is_null($grayscale)) {
            $params['grayscale'] = false;
        }

        $response = Unirest::post( self::$apiBase . "/v" . self::$apiVersion . "/letter/send",
            array( "Accept" => "application/json" ),
            $params
        );

        // Validera
        if($response->code != 200) {
            throw new \Exception($response->body->error);
        }

        return $response->body;
    }
}