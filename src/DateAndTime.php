<?php

declare(strict_types=1);

namespace ShooglyPeg\Date;

use ShooglyPeg\Date\Date;

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
