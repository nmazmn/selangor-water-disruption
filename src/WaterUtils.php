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
            foreach (Constant::DISTRICT as $item) {
                if ($item['code_id'] == $district) {
                    $actual_district[] = $item['code_id'];
                    break;
                }
            }
        }

        return $actual_district;
    }
}
