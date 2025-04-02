<?php

declare(strict_types=1);

namespace MovieRate\Movie\Genre\fixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use MovieRate\ItOps\Uuid\Uuid;
use MovieRate\Movie\Genre\CreateGenre;
use MovieRate\Movie\Genre\Genre;

final class GenreFixtures extends Fixture
{
    private const array GENRES = [
        ['боевик', 'экшен'],
        ['приключения'],
        ['комедия'],
        ['драма'],
        ['ужасы', 'хоррор'],
        ['фантастика', 'научная фантастика, Sci-Fi'],
        ['фэнтези'],
        ['триллер'],
        ['детектив'],
        ['криминал'],
        ['вестерн'],
        ['военный'],
        ['исторический'],
        ['биография'],
        ['спорт'],
        ['музыка'],
        ['мюзикл'],
        ['мелодрама'],
        ['нуар', 'нео-нуар'],
        ['документальный'],
        ['короткометражка'],
        ['анимация', 'мультфильм'],
        ['семейный'],
        ['спортивный'],
        ['детский'],
        ['эротика'],
        ['артхаус'],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::GENRES as $genre) {
            $genre = Genre::create(new CreateGenre(
                id: Uuid::v7(),
                name: $genre[0],
                info: $genre[1] ?? null,
            ));

            $manager->persist($genre);
        }

        $manager->flush();
    }
}
