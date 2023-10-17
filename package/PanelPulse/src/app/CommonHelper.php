<?php

namespace Kartikey\PanelPulse\app;

use Kartikey\PanelPulse\Services\GetCountry;

class CommonHelper
{
    function getCountryList()
    {
        return $result = (new GetCountry)->countryList();
    }
}
