<?php

declare(strict_types=1);

namespace MovieRate\Rating\UserMovieRate;

use MovieRate\ItOps\Uuid\Uuid;

final readonly class CreateUserMovieRate
{
    public function __construct(
        public Uuid $id,
        public Uuid $userId,
        public Uuid $movieId,
        public int $rate,
        public \DateTimeImmutable $at = new \DateTimeImmutable(),
    ) {}
}
