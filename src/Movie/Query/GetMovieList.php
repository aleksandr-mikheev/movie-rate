<?php

declare(strict_types=1);

namespace MovieRate\Movie\Query;

final readonly class GetMovieList
{
    public function __construct(
        public int $limit
    ) {}
}
