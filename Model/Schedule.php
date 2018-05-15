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
        $data['affected_areas'] = isset($map['affected']) ? $map['affected'] : null;
        $data['affected_areas_filtered'] = isset($map['affected']) ? water_utils()->splitWordNewLineToArray($map['affected']) : null;

        $event_date = isset($map['start']) ? Carbon::createFromFormat('d/m/Y h:i a', $map['start']) : null;
        $data['start_date'] = isset($map['start']) ? $event_date->timestamp : 0;
        $data['start_date_formatted'] = isset($map['start']) ?  $map['start']: null;

        $event_date = isset($map['end']) ? Carbon::createFromFormat('d/m/Y h:i a', $map['end']) : null;
        $data['end_date'] = isset($map['end']) ? $event_date->timestamp : 0;
        $data['end_date_formatted'] =  isset($map['end']) ? $map['end'] : null;

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