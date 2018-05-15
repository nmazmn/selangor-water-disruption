<?php
namespace Tests;

require_once __DIR__ .'/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
/**
* RequestTest.php
* to test function in Request class
*/
class WaterTest extends TestCase
{
    public function testAllSuccess()
    {
        $response = air_selangor()->disruption()->getList()->fetch();
        $this->assertFalse($response['error']);
        $this->assertEquals(200, $response['code']);
    }

    public function testAllFailed()
    {
        $response = air_selangor()->disruption()->fetch();
        $this->assertTrue($response['error']);
        $this->assertEquals(400, $response['code']);
    }

    public function testAllByDistrictSuccess()
    {
        $response = air_selangor()->disruption()->getList()->byDistrict(null)->fetch();
        $this->assertFalse($response['error']);
        $this->assertEquals(200, $response['code']);

        $response = air_selangor()->disruption()->getList()->byDistrict("00")->fetch();
        $this->assertFalse($response['error']);
        $this->assertEquals(200, $response['code']);

        $response = air_selangor()->disruption()->getList()->byDistrict(["20", "00", "12"])->fetch();
        $this->assertFalse($response['error']);
        $this->assertEquals(200, $response['code']);

        $response = air_selangor()->disruption()->getList()->byDistrict("00,20,12")->fetch();
        $this->assertFalse($response['error']);
        $this->assertEquals(200, $response['code']);
    }

    public function testAllByDistrictFailed()
    {
        $response = air_selangor()->disruption()->getList()->byDistrict("00|00")->fetch();
        $this->assertTrue($response['error']);
        $this->assertEquals(400, $response['code']);

        $response = air_selangor()->disruption()->getList()->byDistrict(["00|00"])->fetch();
        $this->assertTrue($response['error']);
        $this->assertEquals(400, $response['code']);

        $response = air_selangor()->disruption()->getList()->byDistrict([700, "900"])->fetch();
        $this->assertTrue($response['error']);
        $this->assertEquals(400, $response['code']);
    }
}