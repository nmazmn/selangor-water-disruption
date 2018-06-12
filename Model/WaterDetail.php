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
        $data['title'] = isset($map['title']) ? $map['title']: 'No Title Available';
        $data['detail'] = isset($map['cause_by']) ? $map['cause_by'] : '-';
        $data['detail_plain'] = isset($map['cause_by']) ? water_utils()->strip_tag_replace($map['cause_by']) : '-';
        $data['location'] = isset($map['location']) ? $map['location'] : null;
        $data['affected_areas'] = isset($map['affected_area']) ? $map['affected_area'] : '-';
        $data['affected_areas_plain'] = isset($map['affected_area']) ? water_utils()->strip_tag_replace($map['affected_area']) : '-';
        $data['affected_areas_filtered'] = isset($map['affected_area']) ? water_utils()->splitWordNewLineToArray($data['affected_areas_plain']) : '-';
        $data['level_disruption'] = $object['Category']['name'];

        $event_date = water_utils()->isNotTBC($map['estimate_start']) ? Carbon::createFromFormat('d/m/Y h:i a', $map['estimate_start']) : null;
        $data['start_date'] = $event_date ? $event_date->timestamp : 0;
        $data['start_date_formatted'] = $event_date ? $event_date->format('M d Y, H:i'): 'To Be Confirmed';
        $data['start_date_actual'] = $map['estimate_start'];

        $event_date = water_utils()->isNotTBC($map['estimate_end']) ? Carbon::createFromFormat('d/m/Y h:i a', $map['estimate_end']) : null;
        $data['end_date'] = $event_date ? $event_date->timestamp : 0;
        $data['end_date_formatted'] =  $event_date ? $event_date->format('M d Y, H:i') : 'To Be Confirmed';
        $data['end_date_actual'] = $map['estimate_end'];

        $data['timeline'] = [];
        foreach ($object['Info'] as $info) {
            $timeline['info'] = isset($info['title']) ? $info['title'] : '-';
            $timeline['info_plain'] = isset($info['title']) ? water_utils()->strip_tag_replace($info['title']) : '-';
            $event_date = water_utils()->isNotTBC($info['info_time']) ? Carbon::createFromFormat('d/m/Y h:i a', $info['info_time']) : null;
            $timeline['info_time'] = $event_date ? $event_date->timestamp : 0;
            $timeline['info_time_formatted'] = $event_date ? $event_date->format('M d Y, H:i') : 'To Be Confirmed';
            $timeline['info_time_actual'] = $info['info_time'];
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