<?php

declare(strict_types=1);

namespace MovieRate\Movie\MovieGenreRate;

use MovieRate\ItOps\Uuid\Uuid;

final class CreateMovieGenreRate
{
    public function __construct(
        public Uuid $movieId,
        public Uuid $genreId,
        public int $rate,
    ) {}
}
