<?php
/**
 * Created by PhpStorm.
 * User: hafiq
 * Date: 05/05/2018
 * Time: 11:50 PM
 */
namespace Afiqiqmal\Model;

use Carbon\Carbon;

class WaterDetail
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
        $data['title'] = $map['title'];
        $data['detail'] = $map['cause_by'];
        $data['detail_plain'] = water_utils()->strip_tag_replace($map['cause_by']);
        $data['location'] = isset($map['location']) ? $map['location'] : null;
        $data['affected_areas'] = $map['affected_area'];
        $data['affected_areas_plain'] = water_utils()->strip_tag_replace($map['affected_area']);
        $data['affected_areas_filtered'] = water_utils()->splitWordNewLineToArray($data['affected_areas_plain']);
        $data['level_disruption'] = $object['Category']['name'];

        $event_date = isset($map['estimate_start']) ? Carbon::createFromFormat('d/m/Y h:i a', $map['estimate_start']) : null;
        $data['start_date'] = $event_date ? $event_date->timestamp : 0;
        $data['start_date_formatted'] = $event_date ? $event_date->format('M d Y, H:i'): null;

        $event_date = isset($map['estimate_end']) ? Carbon::createFromFormat('d/m/Y h:i a', $map['estimate_end']) : null;
        $data['end_date'] = $event_date ? $event_date->timestamp : 0;
        $data['end_date_formatted'] =  $event_date ? $event_date->format('M d Y, H:i') : 'To Be Confirmed';
        $data['timeline'] = [];
        foreach ($object['Info'] as $info) {
            $timeline['info'] = $info['title'];
            $timeline['info_plain'] = water_utils()->strip_tag_replace($info['title']);
            $event_date = isset($info['info_time']) ? Carbon::createFromFormat('d/m/Y h:i a', $info['info_time']) : null;
            $timeline['info_time'] = $event_date ? $event_date->timestamp : 0;
            $timeline['info_time_formatted'] = $event_date ? $event_date->format('M d Y, H:i') : 'To Be Confirmed';
            $data['timeline'][] = $timeline;
        }

        return $data;
    }

    public function toArray()
    {
        if ($this->object) {
            return $this->model($this->object);
        }

        return null;
    }
}