<?php

namespace Afiqiqmal\WaterDisruption;

use afiqiqmal\Library\Constant;

class WaterUtils
{
    function strip_tag_replace($words)
    {
        $words = preg_replace('/<br(\s+)?\/?>/i', "\n", $words);
        $words = str_replace('&nbsp;', '', $words);
        $words = htmlspecialchars_decode($words, ENT_QUOTES);

        return strip_tags($words);
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
        return $this->removeAllNullInArray(array_map('trim', preg_split('/\r\n|\r|\n/', $word)));
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

    function sortByDate($data, $column = 'start_date')
    {
        usort($data, function ($a, $b) use ($column) {
            $a = $a[$column];
            $b = $b[$column];

            if ($a == $b) return 0;
            return ($a < $b) ? 1 : -1;
        });

        return $data;
    }
}
