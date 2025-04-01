<?php

declare(strict_types=1);

namespace MovieRate\Movie;

use MovieRate\ItOps\Uuid\Uuid;

final readonly class MovieCreated
{
    public function __construct(
        public Uuid $id,
    ) {}
}
