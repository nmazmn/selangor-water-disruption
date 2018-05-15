<?php

namespace afiqiqmal\WaterDisruption;

use afiqiqmal\Traits\WaterDisruptionTrait;

class WaterDisruption
{
    use WaterDisruptionTrait;

    private $isList = false;
    private $whichType = null;
    private $byDistrict = null;
    private $detailId = null;

    public function getList()
    {
        $this->isList = true;
        return $this;
    }

    public function schedule()
    {
        $this->whichType = WATER_SCHEDULE;
        return $this;
    }

    public function unscheduled()
    {
        $this->whichType = WATER_UNSCHEDULED;
        return $this;
    }

    public function byDistrict($district_code)
    {
        $this->byDistrict = $district_code;
        return $this;
    }

    public function detail($id)
    {
        $this->detailId = $id;
        return $this;
    }

    public function fetch()
    {
        if ($this->isList) {
            return $this->getWhichList($this->whichType, $this->byDistrict);
        }

        if ($this->detailId) {
            return $this->getWaterDetail($this->detailId);
        }

        return die_response('Wrong method chaining is used. Please see docs properly');
    }
}
