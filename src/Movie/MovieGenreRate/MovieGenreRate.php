<?php

declare(strict_types=1);

namespace MovieRate\Movie\MovieGenreRate;

use MovieRate\ItOps\Uuid\Uuid;

final class MovieGenreRate
{
    private function __construct(
        public Uuid $movieId,
        public Uuid $genreId,
        public float $rating,
        private int $userRateTotal,
        private int $userRateCount,
    ) {}

    public static function create(CreateMovieGenreRate $command): self
    {
        return new self(
            movieId: $command->movieId,
            genreId: $command->genreId,
            rating: $command->rate,
            userRateTotal: $command->rate,
            userRateCount: 1,
        );
    }

    public function update(int $rate): void
    {
        $this->userRateTotal += $rate;
        ++$this->userRateCount;

        $this->rating = round($this->userRateTotal / $this->userRateCount, 2);
    }
}
