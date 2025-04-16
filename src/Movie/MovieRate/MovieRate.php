<?php

declare(strict_types=1);

namespace MovieRate\Movie\MovieRate;

use MovieRate\ItOps\Uuid\Uuid;

final class MovieRate
{
    private function __construct(
        public Uuid $movieId,
        public float $rating,
        private int $userRateTotal,
        private int $userRateCount,
    ) {}

    public static function create(CreateMovieRate $command): self
    {
        return new self(
            movieId: $command->movieId,
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
