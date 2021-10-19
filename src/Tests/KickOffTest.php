<?php

namespace ShooglyPeg\Date\Tests;

use PHPUnit\Framework\TestCase;
use ShooglyPeg\Date\KickOff;

final class KickOffTest extends TestCase
{
    /**
     * @return void
     */
    public function testInstantiates(): void
    {
        $date = new KickOff(date('Y-m-d H:i:s'));

        $this->assertInstanceOf(KickOff::class, $date);
    }

    /**
     * @return void
     */
    public function testStaticConstructor(): void
    {
        $date = KickOff::now();
        $this->assertInstanceOf(KickOff::class, $date);
        $this->assertEquals(date('Y-m-d'), $date->date());
        $this->assertEquals(date('d/m/Y'), $date->human());
    }

    /**
     * @return void
     */
    public function testPrecisionFormatting(): void
    {
        $past = '1980-08-28 21:22:23';
        $date = new KickOff($past);

        $this->assertEquals('1980-08-28 21:22:23', $date->dateAndTime());
        $this->assertEquals('"1980-08-28 21:22:23"', json_encode($date));
        $this->assertEquals(336345743, $date->timestamp());
    }
}
