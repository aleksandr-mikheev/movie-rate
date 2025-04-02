<?php

declare(strict_types=1);

namespace MovieRate\Movie\UserMovieGenreRate\EventHandler;

use MovieRate\Movie\UserMovieGenreRate\UserMovieGenreRateCreated;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final class UserMovieGenreRateCreatedHandler
{
    public function __invoke(UserMovieGenreRateCreated $event): void {}
}
