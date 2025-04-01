<?php

declare(strict_types=1);

namespace MovieRate\Actor;

/**
 * @final
 */
class Actor
{
    private function __construct(
        public string $firstName,
        public string $lastName,
    ) {}
}
