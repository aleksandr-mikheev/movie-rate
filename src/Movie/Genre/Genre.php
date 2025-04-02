<?php

declare(strict_types=1);

namespace MovieRate\Movie\Genre;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Id;
use MovieRate\ItOps\Uuid\Uuid;
use MovieRate\ItOps\UuidDoctrine\UuidType;

/**
 * @final
 */
#[Entity]
readonly class Genre
{
    private function __construct(
        #[Column(type: UuidType::class), Id]
        public Uuid $id,
        #[Column(type: Types::STRING)]
        public string $name,
        #[Column(type: Types::STRING, nullable: true)]
        public ?string $info,
        #[Column(type: Types::DATETIMETZ_IMMUTABLE)]
        public \DateTimeImmutable $createdAt,
    ) {}

    public static function create(CreateGenre $command): self
    {
        return new self(
            id: $command->id,
            name: $command->name,
            info: $command->info,
            createdAt: $command->at,
        );
    }
}
