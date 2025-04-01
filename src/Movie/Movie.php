<?php

declare(strict_types=1);

namespace MovieRate\Movie;

use MovieRate\ItOps\Aggregate\AggregateRoot;
use MovieRate\ItOps\Uuid\Uuid;

/**
 * @final
 */
class Movie extends AggregateRoot
{
    private function __construct(
        public Uuid $id,
        public string $title,
        public string $description,
        public \DateTimeImmutable $releaseDate,
        public int $duration,
        public \DateTimeImmutable $createdAt,
    ) {}

    public static function create(CreateMovie $command): self
    {
        $movie = new self(
            $command->id,
            $command->title,
            $command->description,
            $command->releaseDate,
            $command->duration,
            $command->at,
        );

        $movie->publish(new MovieCreated($movie->id));

        return $movie;
    }

    public function update(): void {}
}
