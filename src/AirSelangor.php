<?php

namespace Afiqiqmal\WaterDisruption;

/**
 * Class AirSelangor
 * @package Afiqiqmal\WaterDisruption
 */
class AirSelangor
{
    /**
     * @return WaterDisruption
     */
    public function disruption() : WaterDisruption
    {
        return new WaterDisruption();
    }

    /**
     * @return WaterDam
     */
    public function waterDam() : WaterDam
    {
        return new WaterDam();
    }
}
