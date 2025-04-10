<?php

declare(strict_types=1);

namespace MovieRate\Movie\MovieGenreRate;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use MovieRate\ItOps\Uuid\Uuid;

final class DoctrineMovieGenreRateRepository extends MovieGenreRateRepository
{
    /**
     * @var EntityRepository<MovieGenreRate>
     */
    private readonly EntityRepository $repository;

    public function __construct(
        private readonly EntityManagerInterface $entityManager,
    ) {
        $this->repository = $this->entityManager->getRepository(MovieGenreRate::class);
    }

    public function find(Uuid $movieId, Uuid $genreId): ?MovieGenreRate
    {
        $result = $this->repository->findBy(['movieId' => $movieId, 'genreId' => $genreId]);

        return $result[0] ?? null;
    }

    public function save(MovieGenreRate $movieGenreRate): void
    {
        $this->entityManager->persist($movieGenreRate);
    }
}
