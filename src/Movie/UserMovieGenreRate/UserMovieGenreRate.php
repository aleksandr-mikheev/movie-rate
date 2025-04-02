<?php

declare(strict_types=1);

namespace MovieRate\Movie\UserMovieGenreRate;

use MovieRate\ItOps\Aggregate\AggregateRoot;
use MovieRate\ItOps\Uuid\Uuid;

final class UserMovieGenreRate extends AggregateRoot
{
    private function __construct(
        public Uuid $id,
        public Uuid $userId,
        public Uuid $genreId,
        public Uuid $movieId,
        public int $rate,
        public \DateTimeImmutable $createdAt,
    ) {}

    public static function create(CreateUserMovieGenreRate $command): self
    {
        $entity = new self(
            id: $command->id,
            userId: $command->userId,
            genreId: $command->genreId,
            movieId: $command->movieId,
            rate: $command->rate,
            createdAt: $command->at,
        );

        $entity->publish(new UserMovieGenreRateCreated(
            id: $command->id,
            userId: $command->userId,
            genreId: $command->genreId,
            movieId: $command->movieId,
            rate: $command->rate,
        ));

        return $entity;
    }
}
