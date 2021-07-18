<?php

namespace ShooglyPeg\Date\Tests\Domain;

use DateInterval;
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

    /**
     * @return void
     */
    public function testJsonSerialize(): void
    {
        $today = date('Y-m-d');
        $date = DateOfBirth::today();

        $this->assertEquals('"' . $today . '"', json_encode($date));
    }

    /**
     * @return void
     */
    public function testFromFormat(): void
    {
        $date = DateOfBirth::fromFormat('5 July 1971');

        $this->assertInstanceOf(DateOfBirth::class, $date);
        $this->assertEquals('1971-07-05', $date->date());
    }

    /**
     * @return void
     */
    public function testInterval(): void
    {
        $date = DateOfBirth::fromFormat('5 July 1971');

        $date2 = DateOfBirth::fromFormat('6 July 1971');

        $interval = $date2->interval($date);

        $this->assertInstanceOf(DateInterval::class, $interval);
        $this->assertEquals(1, (int) $interval->format('%d'));
    }
}
