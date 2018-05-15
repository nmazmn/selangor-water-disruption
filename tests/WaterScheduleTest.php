<?php
namespace Tests;

require_once __DIR__ .'/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
/**
* RequestTest.php
* to test function in Request class
*/
class WaterScheduleTest extends TestCase
{
    public function testScheduleListSuccess()
    {
        $response = air_selangor()->disruption()->getList()->schedule()->fetch();
        $this->assertFalse($response['error']);
        $this->assertEquals(200, $response['code']);
    }

    public function testScheduleListFailed()
    {
        $response = air_selangor()->disruption()->schedule()->fetch();
        $this->assertTrue($response['error']);
        $this->assertEquals(400, $response['code']);
    }

    public function testScheduleListByDistrictSuccess()
    {
        $response = air_selangor()->disruption()->getList()->schedule()->byDistrict("00")->fetch();
        $this->assertFalse($response['error']);
        $this->assertEquals(200, $response['code']);
    }

    public function testScheduleListByDistrictFailed()
    {
        $response = air_selangor()->disruption()->getList()->schedule()->byDistrict("900")->fetch();
        $this->assertTrue($response['error']);
        $this->assertEquals(400, $response['code']);

        $response = air_selangor()->disruption()->schedule()->byDistrict("00")->fetch();
        $this->assertTrue($response['error']);
        $this->assertEquals(400, $response['code']);
    }
}