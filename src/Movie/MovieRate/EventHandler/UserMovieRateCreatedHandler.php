<?php

declare(strict_types=1);

namespace MovieRate\Movie\MovieRate\EventHandler;

use MovieRate\Movie\MovieRate\CreateMovieRate;
use MovieRate\Movie\MovieRate\Exception\MovieRateNotFoundException;
use MovieRate\Movie\MovieRate\MovieRate;
use MovieRate\Movie\MovieRate\MovieRateRepository;
use MovieRate\Rating\UserMovieRate\UserMovieRateCreated;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
final readonly class UserMovieRateCreatedHandler
{
    public function __construct(
        private MovieRateRepository $repository,
    ) {}

    public function __invoke(UserMovieRateCreated $event): void
    {
        try {
            $movieGenreRate = $this->repository->get($event->movieId);
            $movieGenreRate->update($event->rate);
        } catch (MovieRateNotFoundException) {
            $movieGenreRate = MovieRate::create(new CreateMovieRate(
                movieId: $event->movieId,
                rate: $event->rate
            ));
        }

        $this->repository->save($movieGenreRate);
    }
}
