<?php

namespace App\Service;

class Zippopotamus
{
    public const URL = 'http://api.zippopotam.us/';

    private $defaultCountry;

    public function __construct(string $defaultCountry)
    {
        $this->defaultCountry = $defaultCountry;
    }

    public function getPostalInfos(string $postal, string $country = null): array
    {
        $country = $country ?? $this->defaultCountry;
        $curl = curl_init(self::URL.'/'.strtolower($country).'/'.$postal);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $return = curl_exec($curl);
        if (curl_error($curl)) {
            throw new \Exception("Impossible d'accéder à l'API Zippopotamus");
        }

        return json_decode($return, true);
    }
}
