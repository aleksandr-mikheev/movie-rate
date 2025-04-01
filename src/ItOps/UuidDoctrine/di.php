<?php

declare(strict_types=1);

namespace MovieRate\ItOps\UuidDoctrine;

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $di): void {
    $di->extension('doctrine', [
        'dbal' => [
            'types' => [
                UuidType::class => UuidType::class,
            ],
        ],
    ]);
};
