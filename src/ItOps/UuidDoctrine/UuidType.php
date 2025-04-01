<?php

declare(strict_types=1);

namespace MovieRate\ItOps\UuidDoctrine;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Exception\InvalidType;
use Doctrine\DBAL\Types\Type;
use MovieRate\ItOps\Uuid\Uuid;

final class UuidType extends Type
{
    public function getName(): string
    {
        return self::class;
    }

    public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
    {
        return $platform->getGuidTypeDeclarationSQL($column);
    }

    public function convertToPHPValue(mixed $value, AbstractPlatform $platform): ?Uuid
    {
        if ($value === null) {
            return null;
        }

        if ($value instanceof Uuid) {
            return $value;
        }

        if (!\is_string($value)) {
            throw InvalidType::new(
                $value,
                $this->getName(),
                ['null', 'string', Uuid::class],
            );
        }

        try {
            return Uuid::fromString($value);
        } catch (\InvalidArgumentException $exception) {
            throw InvalidType::new($value, $this->getName(), [], $exception);
        }
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform): ?string
    {
        if ($value === null) {
            return null;
        }

        if ($value instanceof Uuid) {
            return $value->toString();
        }

        if (!\is_string($value) || !Uuid::isUuid($value)) {
            throw InvalidType::new(
                $value,
                $this->getName(),
                ['null', 'uuid-string', Uuid::class],
            );
        }

        return $value;
    }

    public function requiresSQLCommentHint(AbstractPlatform $platform): bool
    {
        return true;
    }
}
