<?php
namespace Tests;

require_once __DIR__ .'/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
/**
* RequestTest.php
* to test function in Request class
*/
class WaterUnScheduleTest extends TestCase
{
    public function testUnScheduleListSuccess()
    {
        $response = air_selangor()->disruption()->getList()->unscheduled()->fetch();
        $this->assertFalse($response['error']);
        $this->assertEquals(200, $response['code']);
    }

    public function testUnScheduleListFailed()
    {
        $response = air_selangor()->disruption()->unscheduled()->fetch();
        $this->assertTrue($response['error']);
        $this->assertEquals(400, $response['code']);
    }

    public function testUnScheduleListByDistrictSuccess()
    {
        $response = air_selangor()->disruption()->getList()->unscheduled()->byDistrict("00")->fetch();
        $this->assertFalse($response['error']);
        $this->assertEquals(200, $response['code']);
    }

    public function testUnScheduleListByDistrictFailed()
    {
        $response = air_selangor()->disruption()->getList()->unscheduled()->byDistrict("900")->fetch();
        $this->assertTrue($response['error']);
        $this->assertEquals(400, $response['code']);

        $response = air_selangor()->disruption()->unscheduled()->byDistrict("00")->fetch();
        $this->assertTrue($response['error']);
        $this->assertEquals(400, $response['code']);
    }
}