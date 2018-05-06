<?php
/**
 * Created by PhpStorm.
 * User: hafiq
 * Date: 05/05/2018
 * Time: 11:50 PM
 */
namespace Afiqiqmal\Model;

use Carbon\Carbon;

class ScheduleDetail
{
    protected $object = null;

    public function __construct($object)
    {
        $this->object = $object;
    }

    private function model($object)
    {
        $map = $object['DisruptionDetail'];
        $data = [];
        $data['id'] = $map['id'];
        $data['title'] = $map['note'];
        $data['detail'] = $map['note_more'];
        $data['detail_plain'] = water_utils()->strip_tag_replace($map['note_more']);
        $data['remarks'] = $map['remarks'];
        $data['location'] = isset($map['location']) ? $map['location'] : null;
        $data['remarks_plain'] = water_utils()->strip_tag_replace($map['remarks']);
        $data['affected_areas'] = $map['affected'];
        $data['affected_areas_plain'] = water_utils()->strip_tag_replace($map['affected']);
        $event_date = Carbon::createFromFormat('d/m/Y h:i a', $map['start']);
        $data['start_date'] = $event_date->timestamp;
        $data['start_date_formatted'] = $event_date->format('M d Y, H:i');
        $event_date = Carbon::createFromFormat('d/m/Y h:i a', $map['end']);
        $data['end_date'] = $event_date->timestamp;
        $data['end_date_formatted'] = $event_date->format('M d Y, H:i');

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