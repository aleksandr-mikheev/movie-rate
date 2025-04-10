<?php

declare(strict_types=1);

namespace MovieRate\Rating\UserMovieGenreRate;

use MovieRate\ItOps\Uuid\Uuid;

final readonly class UserMovieGenreRateCreated
{
    public function __construct(
        public Uuid $id,
        public Uuid $userId,
        public Uuid $genreId,
        public Uuid $movieId,
        public int $rate,
    ) {}
}
