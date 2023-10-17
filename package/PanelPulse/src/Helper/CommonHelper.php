<?php

use Kartikey\PanelPulse\Services\GetCountry;

function getCountryList()
{
    return $result = (new GetCountry)->countryList();
}