<?php

declare(strict_types=1);

namespace MovieRate\Movie\Query;

use Doctrine\DBAL\Connection;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

#[AsMessageHandler]
final readonly class GetMovieListHandler
{
    public function __construct(
        private Connection $connection,
        private DenormalizerInterface $denormalizer,
    ) {}

    /**
     * @return array<MovieListItem>
     */
    public function __invoke(GetMovieList $query): array
    {
        $rows = $this
            ->connection
            ->executeQuery(
                <<<'SQL'
                    select
                        movie.id,
                        movie.title,
                        movie.description,
                        movie.release_date,
                        rate.rating
                    from movie.movie movie
                    left join movie.movie_rate rate
                        on movie.movie.id = movie.movie_rate.movie_id
                    order by release_date desc
                    limit ?
                    SQL,
                [$query->limit],
            )
            ->fetchAssociative()
        ;

        if ($rows === false || $rows === []) {
            return [];
        }

        return $this->denormalizer->denormalize($rows, \sprintf('%s[]', MovieListItem::class));
    }
}
