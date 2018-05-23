<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once __DIR__ .'/../vendor/autoload.php';

$response = air_selangor()->disruption()->getList()->fetch();
//$response = air_selangor()->disruption()->getList()->byDistrict("00")->fetch();

//$response = air_selangor()->disruption()->getList()->schedule()->fetch();
//$response = air_selangor()->disruption()->getList()->schedule()->byDistrict("00")->fetch();

//$response = air_selangor()->disruption()->getList()->unscheduled()->fetch();
//$response = air_selangor()->disruption()->getList()->unscheduled()->byDistrict("20")->fetch();
//
//$response = air_selangor()->disruption()->schedule()->detail("25603")->fetch();

//$response = air_selangor()->waterDam()->fetch();

header('Content-type: application/json');
echo json_encode($response, JSON_PRETTY_PRINT);
