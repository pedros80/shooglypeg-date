<?php

namespace ShooglyPeg\Date\Tests\Domain;

use PHPUnit\Framework\TestCase;
use ShooglyPeg\Date\Domain\DateOfBirth;

final class DateOfBirthTest extends TestCase
{
    /**
     * @return void
     */
    public function testInstantiates(): void
    {
        $date = new DateOfBirth(date('Y-m-d'));

        $this->assertInstanceOf(DateOfBirth::class, $date);
    }

    /**
     * @return void
     */
    public function testAge(): void
    {
        $date = new DateOfBirth(date('Y-m-d', strtotime('-40 years')));

        $this->assertEquals(40, $date->age());
    }
}
