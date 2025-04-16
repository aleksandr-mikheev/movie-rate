<?php

declare(strict_types=1);

namespace MovieRate\User;

use MovieRate\ItOps\Uuid\Uuid;

final class User
{
    private function __construct(
        public Uuid $id,
        public string $firstName,
        public string $lastName,
        public string $email,
        public \DateTimeImmutable $createdAt,
    ) {}
}
