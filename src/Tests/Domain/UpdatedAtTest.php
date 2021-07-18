<?php

namespace ShooglyPeg\Date\Tests\Domain;

use PHPUnit\Framework\TestCase;
use ShooglyPeg\Date\Domain\UpdatedAt;

final class UpdatedAtTest extends TestCase
{
    /**
     * @return void
     */
    public function testInstantiates(): void
    {
        $date = new UpdatedAt(date('Y-m-d H:i:s'));

        $this->assertInstanceOf(UpdatedAt::class, $date);
    }

    /**
     * @return void
     */
    public function testStaticConstructor(): void
    {
        $date = UpdatedAt::now();
        $this->assertInstanceOf(UpdatedAt::class, $date);
        $this->assertEquals(date('Y-m-d'), $date->date());
        $this->assertEquals(date('d/m/Y'), $date->human());
    }

    /**
     * @return void
     */
    public function testPrecisionFormatting(): void
    {
        $past = '1980-08-28 21:22:23';
        $date = new UpdatedAt($past);

        $this->assertEquals('1980-08-28 21:22:23', $date->dateAndTime());
        $this->assertEquals('"1980-08-28 21:22:23"', json_encode($date));
    }
}
