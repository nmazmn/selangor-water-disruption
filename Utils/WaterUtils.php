<?php

namespace Afiqiqmal\Utils;

use Afiqiqmal\Library\Constant;
use Carbon\Carbon;

class WaterUtils
{
    function strip_tag_replace($words)
    {
        $words = preg_replace('/<br(\s+)?\/?>/i', "\n", $words);
        $words = str_replace('&nbsp;', '', $words);
        $words = trim_spaces($words);

        return html_entity_decode($words);
    }

    function isNotTBC($input)
    {
        $date_check_start = trim($input);
        if (isset($date_check_start)) {
            $date_check_start = strtolower($date_check_start);
            if ($date_check_start == 'to be confirmed' || $date_check_start == 'tbc' || $date_check_start == 'sementara' || $date_check_start = "to be update") {
                return false;
            }

            return true;
        }

        return false;
    }

    function check_district($district)
    {
        $districts = (!is_array($district)) ? explode(',', $district) : $district;
        $actual_district = [];
        foreach ($districts as $district) {
            foreach (Constant::WATER_DISTRICT as $item) {
                if ($item['code_id'] == $district) {
                    $actual_district[] = $item['code_id'];
                    break;
                }
            }
        }

        return $actual_district;
    }

    function splitWordNewLineToArray($word)
    {
        return $this->removeAllNullInArray(array_map('trim', preg_split('/\r\n|\r|\n|,/', $word)));
    }

    function removeAllNullInArray($array)
    {
        $newData = [];
        foreach ($array as $item) {
            if ($item != null) {
                $newData[] = $item;
            }
        }

        return $newData;
    }

    function sortByDate($data, $column = 'start_date', $sort = 'desc')
    {
        usort($data, function ($a, $b) use ($column, $sort) {
            $a = $a[$column];
            $b = $b[$column];

            if ($a == $b) return 0;
            if ($sort == 'asc')
                return ($a > $b) ? 1 : -1;
            return ($a < $b) ? 1 : -1;
        });

        return $data;
    }
}
