<?php

declare(strict_types=1);

namespace MovieRate\Movie\MovieRate;

use MovieRate\ItOps\Uuid\Uuid;

final readonly class CreateMovieRate
{
    public function __construct(
        public Uuid $movieId,
        public int $rate,
    ) {}
}
