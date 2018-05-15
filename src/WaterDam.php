<?php

namespace afiqiqmal\WaterDisruption;

use Afiqiqmal\library\ApiRequest;
use Afiqiqmal\library\Constant;

class WaterDam
{
    private function apiCall(): ApiRequest
    {
        return water_request()->baseUrl(Constant::IWRIMS_URL);
    }


}
