<?php
/**
 * Created by PhpStorm.
 * User: hafiq
 * Date: 05/05/2018
 * Time: 11:50 PM
 */
namespace Afiqiqmal\Model;

use Carbon\Carbon;

class UnSchedule
{
    protected $object = null;

    public function __construct($object)
    {
        $this->object = $object;
    }

    private function model($object)
    {
        $map = $object['Disruption'];
        $data = [];
        $data['id'] = $map['id'];
        $data['type'] = 2;
        $data['type_name'] = "Unscheduled";
        $data['title'] = $map['title'];
        $data['location'] = isset($map['location']) ? $map['location'] : null;
        $data['affected_areas'] = isset($map['affected_area']) ? water_utils()->strip_tag_replace($map['affected_area']) : null;
        $data['affected_areas_filtered'] = isset($map['affected_area']) ? water_utils()->splitWordNewLineToArray($map['affected_area']) : null;

        $event_date = isset($map['created']) ? Carbon::createFromFormat('d/m/Y h:i a', $map['created']) : null;
        $data['start_date'] = $event_date ? $event_date->timestamp : 0;
        $data['start_date_formatted'] = $map['created'];

        $data['end_date'] = 0;
        $data['end_date_formatted'] = null;
        $data['district_id'] = $object['District']['code'];

        return $data;
    }

    public function toArray()
    {
        if ($this->object) {
            $data = [];
            if (is_array($this->object)) {
                foreach ($this->object as $item) {
                    $data[] = $this->model($item);
                }
            } else {
                $data[] = $this->model($this->object);
            }

            return $data;
        }

        return [];
    }
}