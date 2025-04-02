<?php

declare(strict_types=1);

namespace MovieRate\Movie\UserMovieGenreRate;

final class CreateMovieGenreRate
{
    public function __construct(
        public string $movieId,
        public string $genreId,
        public int $rate,
    ) {}
}
