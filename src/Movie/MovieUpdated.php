<?php

declare(strict_types=1);

namespace MovieRate\Movie;

use MovieRate\ItOps\Uuid\Uuid;

final class MovieUpdated
{
    public function __construct(
        public Uuid $id,
    ) {}
}
