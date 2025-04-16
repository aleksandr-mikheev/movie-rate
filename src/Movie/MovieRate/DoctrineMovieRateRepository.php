<?php

declare(strict_types=1);

namespace MovieRate\Movie\MovieRate;

use Doctrine\ORM\EntityManagerInterface;
use MovieRate\ItOps\Uuid\Uuid;
use Doctrine\ORM\EntityRepository;

final class DoctrineMovieRateRepository extends MovieRateRepository
{
    /**
     * @var EntityRepository<MovieRate>
     */
    private readonly EntityRepository $repository;

    public function __construct(
        private readonly EntityManagerInterface $entityManager,
    ) {
        $this->repository = $this->entityManager->getRepository(MovieRate::class);
    }

    public function find(Uuid $movieId): ?MovieRate
    {
        $result = $this->repository->findBy(['movieId' => $movieId]);

        return $result[0] ?? null;
    }

    public function save(MovieRate $movieRate): void
    {
        $this->entityManager->persist($movieRate);
    }
}
