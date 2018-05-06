<?php
/**
 * Created by PhpStorm.
 * User: hafiq
 * Date: 05/05/2018
 * Time: 11:50 PM
 */
namespace Afiqiqmal\Model;

use Carbon\Carbon;

class Schedule
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
        $data['type'] = 1;
        $data['type_name'] = "Scheduled";
        $data['title'] = $map['note'];
        $data['location'] = isset($map['location']) ? $map['location'] : null;
        $data['affected_areas'] = isset($map['affected_area']) ? $map['affected_area'] : null;
        $event_date = Carbon::createFromFormat('d/m/Y h:i a', $map['start']);
        $data['start_date'] = $event_date->timestamp;
        $data['start_date_formatted'] = $map['start'];
        $event_date = Carbon::createFromFormat('d/m/Y h:i a', $map['end']);
        $data['end_date'] = $event_date->timestamp;
        $data['end_date_formatted'] = $event_date->format('M d Y, H:i');
        $data['district_id'] = $object['DisruptionLocation'][0]['code'];

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