<?php

declare(strict_types=1);

namespace MovieRate\Movie;

use MovieRate\ItOps\Uuid\Uuid;

final readonly class CreateMovie
{
    public function __construct(
        public Uuid $id,
        public string $title,
        public string $description,
        public \DateTimeImmutable $releaseDate,
        public int $duration,
        public \DateTimeImmutable $at = new \DateTimeImmutable(),
    ) {}
}
