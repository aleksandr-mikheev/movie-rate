<?php

declare(strict_types=1);

namespace MovieRate\Movie\Genre;

use MovieRate\ItOps\Uuid\Uuid;

final readonly class CreateGenre
{
    public function __construct(
        public Uuid $id,
        public string $name,
        public ?string $info,
        public \DateTimeImmutable $at = new \DateTimeImmutable(),
    ) {}
}
