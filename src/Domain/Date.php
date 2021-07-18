<?php

declare(strict_types=1);

namespace ShooglyPeg\Date\Domain;

use DateInterval;
use DateTimeImmutable;
use JsonSerializable;

abstract class Date implements JsonSerializable
{
    /**
     * @param string $date
     * @return static
     */
    public function __construct(private string $date) {}

    /**
     * @param string $format
     * @return string
     */
    public function format(string $format): string
    {
        return (new DateTimeImmutable($this->date))->format($format);
    }

    /**
     * @return DateInterval
     */
    public function interval(?Date $end = null): DateInterval
    {
        if ($end) {
            return (new DateTimeImmutable($this->date))->diff(new DateTimeImmutable($end->format('Y-m-d')));
        }

        return (new DateTimeImmutable($this->date))->diff(new DateTimeImmutable());
    }

    /**
     * @return int
     */
    public function age(): int
    {
        return (int) $this->interval()->format('%y');
    }

    /**
     * @return string
     */
    public function dateAndTime(): string
    {
        return $this->format('Y-m-d H:i:s');
    }

    /**
     * @return string
     */
    public function human(): string
    {
        return $this->format('d/m/Y');
    }

    /**
     * @return string
     */
    public function date(): string
    {
        return $this->format('Y-m-d');
    }

    /**
     * @return string
     */
    public function jsonSerialize(): string
    {
        return $this->date();
    }

    /**
     * @return static
     */
    public static function now(): self
    {
        return new static(date('Y-m-d H:i:s'));
    }

    /**
     * @return static
     */
    public static function today(): self
    {
        return new static(date('Y-m-d'));
    }
}
