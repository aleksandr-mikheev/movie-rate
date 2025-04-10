<?php

declare(strict_types=1);

namespace MovieRate\Rating\UserMovieRate;

use MovieRate\ItOps\Aggregate\AggregateRoot;
use MovieRate\ItOps\Uuid\Uuid;

final class UserMovieRate extends AggregateRoot
{
    private function __construct(
        public Uuid $id,
        public Uuid $userId,
        public Uuid $movieId,
        public int $rate,
        public \DateTimeImmutable $createdAt,
    ) {}

    public static function create(CreateUserMovieRate $command): self
    {
        $entity = new self(
            id: $command->id,
            userId: $command->userId,
            movieId: $command->movieId,
            rate: $command->rate,
            createdAt: $command->at,
        );

        $entity->publish(new UserMovieRateCreated(
            id: $command->id,
            userId: $command->userId,
            movieId: $command->movieId,
            rate: $command->rate,
        ));

        return $entity;
    }
}
