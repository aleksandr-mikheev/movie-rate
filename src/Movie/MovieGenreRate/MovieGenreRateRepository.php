<?php

declare(strict_types=1);

namespace MovieRate\Movie\MovieGenreRate;

use MovieRate\ItOps\Uuid\Uuid;
use MovieRate\Movie\MovieGenreRate\Exception\MovieGenreRateNotFoundException;

abstract class MovieGenreRateRepository
{
    final public function get(Uuid $movieId, Uuid $genreId): MovieGenreRate
    {
        return $this->find($movieId, $genreId) ?? throw new MovieGenreRateNotFoundException();
    }

    abstract public function find(Uuid $movieId, Uuid $genreId): ?MovieGenreRate;

    abstract public function save(MovieGenreRate $movieGenreRate): void;
}
