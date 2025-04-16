<?php

declare(strict_types=1);

namespace MovieRate\Movie\Query;

use MovieRate\ItOps\Uuid\Uuid;

final readonly class MovieListItem
{
    public function __construct(
        public Uuid $movieId,
        public string $title,
        public string $description,
        public \DateTimeImmutable $releaseDate,
        public float $rating,
    ) {}
}
