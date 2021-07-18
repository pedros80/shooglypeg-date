<?php

declare(strict_types=1);

namespace ShooglyPeg\Date\Domain;

use DateTimeImmutable;
use ShooglyPeg\Date\Domain\Date;

final class DateOfBirth extends Date
{
    /**
     * @param string $date
     * @return DateOfBirth
     */
    public static function fromFormat(string $date): DateOfBirth
    {
        return new DateOfBirth(DateTimeImmutable::createFromFormat('j F Y', $date)->format('Y-m-d'));
    }
}
