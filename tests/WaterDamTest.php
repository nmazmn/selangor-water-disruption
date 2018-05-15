<?php
namespace Tests;

require_once __DIR__ .'/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
/**
* RequestTest.php
* to test function in Request class
*/
class WaterDamTest extends TestCase
{
    public function testUnScheduleListSuccess()
    {
        $response = air_selangor()->waterDam()->fetch();
        $this->assertFalse($response['error']);
        $this->assertEquals(200, $response['code']);
    }
}