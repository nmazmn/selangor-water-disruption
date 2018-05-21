<?php
/**
 * Created by PhpStorm.
 * User: hafiq
 * Date: 05/05/2018
 * Time: 11:50 PM
 */
namespace Afiqiqmal\Model;

use Carbon\Carbon;

class Water
{
    protected $object = null;
    protected $type = 1;

    public function __construct($object, $type = 1)
    {
        $this->object = $object;
        $this->type = $type;
    }

    private function model($object)
    {
        $map = $object['Disruption'];
        $data = [];
        $data['id'] = $map['id'];
        $data['type'] = $this->type;
        $data['type_name'] = $this->type == 1? "Scheduled" : "UnSchedule";
        $data['title'] = $map['title'];
        $data['location'] = isset($map['location']) ? $map['location'] : null;
        $data['affected_areas'] = isset($map['affected_area']) ? water_utils()->strip_tag_replace($map['affected_area']) : null;
        $data['affected_areas_filtered'] = isset($map['affected_area']) ? water_utils()->splitWordNewLineToArray($map['affected_area']) : null;

        $event_date = isset($map['estimate_start']) ? Carbon::parse($map['estimate_start']) : null;
        $data['start_date'] = $event_date? $event_date->timestamp : 0;
        $data['start_date_formatted'] = $event_date ?  $map['estimate_start']: null;

        $event_date = isset($map['estimate_end']) ? Carbon::parse($map['estimate_end']) : null;
        $data['end_date'] = $event_date ? $event_date->timestamp : 0;
        $data['end_date_formatted'] =  $event_date ? $map['estimate_end'] : 'To Be Confirmed';

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