<?php

declare(strict_types=1);

namespace MovieRate\Tests\Movie;

use MovieRate\ItOps\Uuid\Uuid;
use MovieRate\Movie\CreateMovie;
use MovieRate\Movie\Movie;
use MovieRate\Movie\MovieCreated;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Movie::class)]
final class MovieTest extends TestCase
{
    public function testCreateMovie(): void
    {
        $command = new CreateMovie(
            id: Uuid::v7(),
            title: 'The Matrix',
            description: 'A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.',
            releaseDate: new \DateTimeImmutable('1999-03-31'),
            duration: 136,
        );

        $movie = Movie::create($command);

        self::assertEquals(
            [
                new MovieCreated($command->id),
            ],
            $movie->popEvents(),
        );
    }
}
