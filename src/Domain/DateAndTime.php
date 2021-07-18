<?php

declare(strict_types=1);

namespace ShooglyPeg\Date\Domain;

use ShooglyPeg\Date\Domain\Date;

abstract class DateAndTime extends Date
{
    /**
     * @return string
     */
    public function jsonSerialize(): string
    {
        return $this->dateAndTime();
    }
}
