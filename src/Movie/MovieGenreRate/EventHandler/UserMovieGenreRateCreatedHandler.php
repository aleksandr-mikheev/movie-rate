<?php

declare(strict_types=1);

namespace MovieRate\Movie\MovieGenreRate\EventHandler;

use MovieRate\Movie\MovieGenreRate\CreateMovieGenreRate;
use MovieRate\Movie\MovieGenreRate\Exception\MovieGenreRateNotFoundException;
use MovieRate\Movie\MovieGenreRate\MovieGenreRate;
use MovieRate\Movie\MovieGenreRate\MovieGenreRateRepository;
use MovieRate\Rating\UserMovieGenreRate\UserMovieGenreRateCreated;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final readonly class UserMovieGenreRateCreatedHandler
{
    public function __construct(
        private MovieGenreRateRepository $repository,
    ) {}

    public function __invoke(UserMovieGenreRateCreated $event): void
    {
        try {
            $movieGenreRate = $this->repository->get($event->movieId, $event->genreId);
            $movieGenreRate->update($event->rate);
        } catch (MovieGenreRateNotFoundException) {
            $movieGenreRate = MovieGenreRate::create(new CreateMovieGenreRate(
                movieId: $event->movieId,
                genreId: $event->genreId,
                rate: $event->rate
            ));
        }

        $this->repository->save($movieGenreRate);
    }
}
