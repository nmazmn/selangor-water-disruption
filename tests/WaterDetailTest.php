<?php
namespace Tests;

require_once __DIR__ .'/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
/**
* RequestTest.php
* to test function in Request class
*/
class WaterDetailTest extends TestCase
{
    public function testDetailSuccess()
    {
        $response = air_selangor()->disruption()->detail("25603")->fetch();
        $this->assertFalse($response['error']);
        $this->assertEquals(200, $response['code']);

        $response = air_selangor()->disruption()->detail("25602")->fetch();
        $this->assertFalse($response['error']);
        $this->assertEquals(200, $response['code']);
    }

    public function testDetailFailed()
    {
        $response = air_selangor()->disruption()->fetch();
        $this->assertTrue($response['error']);
        $this->assertEquals(400, $response['code']);

        $response = air_selangor()->disruption()->detail('ABC')->fetch();
        $this->assertTrue($response['error']);
        $this->assertEquals(400, $response['code']);
    }
}