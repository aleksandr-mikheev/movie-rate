<?php

declare(strict_types=1);

namespace MovieRate\Movie;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Id;
use MovieRate\ItOps\Aggregate\AggregateRoot;
use MovieRate\ItOps\Uuid\Uuid;
use MovieRate\ItOps\UuidDoctrine\UuidType;

/**
 * @final
 */
#[Entity]
class Movie extends AggregateRoot
{
    private function __construct(
        #[Column(type: UuidType::class), Id]
        public Uuid $id,
        #[Column()]
        public string $title,
        #[Column()]
        public string $description,
        #[Column(type: Types::DATETIMETZ_IMMUTABLE)]
        public \DateTimeImmutable $releaseDate,
        #[Column()]
        public int $duration,
        #[Column(type: Types::DATETIMETZ_IMMUTABLE)]
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
