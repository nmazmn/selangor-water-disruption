<?php

namespace afiqiqmal\Traits;

use afiqiqmal\Library\ApiRequest;
use afiqiqmal\Library\Constant;
use afiqiqmal\Model\Water;
use afiqiqmal\Model\WaterDetail;

trait WaterDisruptionTrait
{
    protected function getWhichList($type, $byDistrict = null)
    {
        try {
            if ($byDistrict) {
                $byDistrict = water_utils()->check_district($byDistrict);
                if (!$byDistrict) {
                    return die_response("Wrong format for district type or not listed as district code");
                }
            }

            if ($type == WATER_SCHEDULE) {
                return $this->getScheduleList($byDistrict);
            }

            if ($type == WATER_UNSCHEDULED) {
                return $this->getUnScheduleList($byDistrict);
            }

            if (!$type) {
                return $this->getAll($byDistrict);
            }

            return water_response([]);
        } catch (\Exception $exception) {
            return die_response($exception->getMessage());
        }
    }

    protected function getWaterDetail($id)
    {
        $disruption = $this->apiCall()->fetch("view/{$id}.json");
        if (!$disruption['error']) {
            return water_response((new WaterDetail($disruption['body']))->toArray());
        }

        return die_response('Detail Cannot be Fetch');
    }

    private function apiCall(): ApiRequest
    {
        return water_request()->baseUrl(Constant::WATER_PUSPEL_URL);
    }

    private function getScheduleList($byDistrict = null)
    {
        $schedules = $this->apiCall()->fetch(Constant::WATER_SCHEDULE_ENDPOINT);

        $result = (new Water($schedules['body'], 1))->toArray();
        $districts = Constant::WATER_DISTRICT;

        foreach ($districts as $key => $district) {
            $districts[$key]['data'] = [];
            foreach ($result as $item) {
                if ($district['code_id'] === $item['district_id']) {
                    $item['district_name'] = $district['name'];
                    $item['district_id'] = $district['code_id'];
                    $districts[$key]['data'][] = $item;
                }
            }

            //sort by start date
            $districts[$key]['count'] = isset($districts[$key]['data']) ? count($districts[$key]['data']) : 0;
            $districts[$key]['data'] = isset($districts[$key]['data']) ? water_utils()->sortByDate($districts[$key]['data']) : [];
        }

        if ($byDistrict) {
            $newDistrictList = [];
            foreach ($byDistrict as $item) {
                $key = array_search($item, array_column($districts, 'code_id'));
                $newDistrictList[] = $districts[$key];
            }

            return water_response($newDistrictList);
        }

        return water_response($districts);
    }

    private function getUnScheduleList($byDistrict = null)
    {
        $unscheduled = $this->apiCall()->fetch(Constant::WATER_UNSCHEDULE_ENDPOINT);

        $result = (new Water($unscheduled['body'], 2))->toArray();

        $districts = Constant::WATER_DISTRICT;
        foreach ($districts as $key => $district) {
            $districts[$key]['data'] = [];
            foreach ($result as $item) {
                if ($district['code_id'] === $item['district_id']) {
                    $item['district_name'] = $district['name'];
                    $item['district_id'] = $district['code_id'];
                    $districts[$key]['data'][] = $item;
                }
            }

            $districts[$key]['count'] = isset($districts[$key]['data']) ? count($districts[$key]['data']) : 0;
            $districts[$key]['data'] = isset($districts[$key]['data']) ? water_utils()->sortByDate($districts[$key]['data']) : [];
        }

        if ($byDistrict) {
            $newDistrictList = [];
            foreach ($byDistrict as $item) {
                $key = array_search($item, array_column($districts, 'code_id'));
                $newDistrictList[] = $districts[$key];
            }

            return water_response($newDistrictList);
        }

        return water_response($districts);
    }

    private function getAll($byDistrict)
    {
        $schedules = $this->apiCall()->fetch(Constant::WATER_SCHEDULE_ENDPOINT);
        $unscheduled = $this->apiCall()->fetch(Constant::WATER_UNSCHEDULE_ENDPOINT);

        $result1 = $result2 = [];

        if (!$schedules['error']) {
            $result1 = (new Water($schedules['body'], 1))->toArray();
        }

        if (!$unscheduled['error']) {
            $result2 = (new Water($unscheduled['body'], 2))->toArray();
        }

        $districts = Constant::WATER_DISTRICT;

        foreach ($districts as $key => $district) {
            $districts[$key]['data'] = [];

            foreach ($result1 as $item) {
                if ($district['code_id'] === $item['district_id']) {
                    $item['district_name'] = $district['name'];
                    $item['district_id'] = $district['code_id'];
                    $districts[$key]['data'][] = $item;
                }
            }

            foreach ($result2 as $item) {
                if ($district['code_id'] === $item['district_id']) {
                    $item['district_name'] = $district['name'];
                    $item['district_id'] = $district['code_id'];
                    $districts[$key]['data'][] = $item;
                }
            }

            $districts[$key]['count'] = isset($districts[$key]['data']) ? count($districts[$key]['data']) : 0;
            $districts[$key]['data'] = isset($districts[$key]['data']) ? water_utils()->sortByDate($districts[$key]['data']) : [];
        }

        if ($byDistrict) {
            $newDistrictList = [];
            foreach ($byDistrict as $item) {
                $key = array_search($item, array_column($districts, 'code_id'));
                $newDistrictList[] = $districts[$key];
            }

            return water_response($newDistrictList);
        }

        return water_response($districts);
    }
}
