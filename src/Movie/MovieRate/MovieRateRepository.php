<?php

declare(strict_types=1);

namespace MovieRate\Movie\MovieRate;

use MovieRate\ItOps\Uuid\Uuid;
use MovieRate\Movie\MovieRate\Exception\MovieRateNotFoundException;

abstract class MovieRateRepository
{
    final public function get(Uuid $movieId): MovieRate
    {
        return $this->find($movieId) ?? throw new MovieRateNotFoundException();
    }

    abstract public function find(Uuid $movieId): ?MovieRate;

    abstract public function save(MovieRate $movieRate): void;
}
