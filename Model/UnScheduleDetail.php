<?php
/**
 * Created by PhpStorm.
 * User: hafiq
 * Date: 05/05/2018
 * Time: 11:50 PM
 */
namespace Afiqiqmal\Model;

use Carbon\Carbon;

class UnScheduleDetail
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
        $data['level_disruption'] = $object['Category']['name'];
        $event_date = Carbon::createFromFormat('d/m/Y h:i a', $map['estimate_start']);
        $data['start_date'] = $event_date->timestamp;
        $data['start_date_formatted'] = $event_date->format('M d Y, H:i');
        $event_date = Carbon::createFromFormat('d/m/Y h:i a', $map['estimate_end']);
        $data['end_date'] = $event_date->timestamp;
        $data['end_date_formatted'] = $event_date->format('M d Y, H:i');

        foreach ($object['Info'] as $info) {
            $timeline['info'] = $info['title'];
            $timeline['info_plain'] = water_utils()->strip_tag_replace($info['title']);
            $event_date = Carbon::createFromFormat('d/m/Y h:i a', $info['info_time']);
            $timeline['info_time'] = $event_date->timestamp;
            $timeline['info_time_formatted'] = $event_date->format('M d Y, H:i');
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