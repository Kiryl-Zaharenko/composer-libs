<?php

namespace Zaharenko\CalcHelper\Api;

class ApiRequest
{

    public function __construct()
    {
    }

    public function getJson(): array
    {
        $json = json_encode(["MAIN" => ['ONE' => 1, 'TWO' => 2]]);

        return json_decode($json, true);
    }

}