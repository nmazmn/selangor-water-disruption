<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once __DIR__ .'/../vendor/autoload.php';

$response = air_selangor()->disruption()->getList()->fetch();
//$response = air_selangor()->getList()->byDistrict("20")->fetch();

//$response = air_selangor()->getList()->schedule()->fetch();
//$response = air_selangor()->getList()->schedule()->byDistrict("00")->fetch();

//$response = air_selangor()->getList()->unscheduled()->fetch();
//$response = air_selangor()->getList()->unscheduled()->byDistrict("20")->fetch();
//
//$response = air_selangor()->schedule()->detail("5106")->fetch();

header('Content-type: application/json');
echo json_encode($response, JSON_PRETTY_PRINT);
