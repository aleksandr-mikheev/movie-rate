<?php

declare(strict_types=1);

namespace MovieRate\Movie\UserMovieGenreRate;

use MovieRate\ItOps\Uuid\Uuid;

final class CreateUserMovieGenreRate
{
    public function __construct(
        public Uuid $id,
        public Uuid $userId,
        public Uuid $genreId,
        public Uuid $movieId,
        public int $rate,
        public \DateTimeImmutable $at = new \DateTimeImmutable(),
    ) {}
}
