<?php
/**
 * Created by PhpStorm.
 * User: hafiq
 * Date: 05/04/2018
 * Time: 10:21 AM
 */

namespace Afiqiqmal\library;

class Constant
{
    const WATER_PUSPEL_URL = "https://eapi.syabas.com.my/api/puspel/puspel_complaint/";
    const WATER_SCHEDULE_ENDPOINT = "scheduled.json";
    const WATER_UNSCHEDULE_ENDPOINT = "unschedule.json";
    const WATER_DISTRICT = [
        [
            'code_id' => '00',
            'name' => 'Kuala Lumpur',
            'data' => [],
        ],
        [
            'code_id' => '10',
            'name' => 'Gombak',
            'data' => [],
        ],
        [
            'code_id' => '20',
            'name' => 'Petaling',
            'data' => [],
        ],
        [
            'code_id' => '30',
            'name' => 'Klang',
            'data' => [],
        ],
        [
            'code_id' => '40',
            'name' => 'Hulu Langat',
            'data' => [],
        ],
        [
            'code_id' => '50',
            'name' => 'Kuala Langat',
            'data' => [],
        ],
        [
            'code_id' => '60',
            'name' => 'Hulu Selangor',
            'data' => [],
        ],
        [
            'code_id' => '70',
            'name' => 'Kuala Selangor',
            'data' => [],
        ],
        [
            'code_id' => '80',
            'name' => 'Sabak Bernam',
            'data' => [],
        ],
        [
            'code_id' => '90',
            'name' => 'Sepang',
            'data' => [],
        ],
    ];

    const IWRIMS_URL = "http://iwrims.luas.gov.my/data_info.cfm";
    const JBA_URL = "http://www.jba.gov.my/index.php/empangan-air-negeri-selangor";
}
