<?php

declare(strict_types=1);

namespace MovieRate\Movie;

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $di): void {
    $services = $di->services()
        ->defaults()
        ->autowire()
        ->autoconfigure()
    ;

    // $services->load(__NAMESPACE__ . '\\', __DIR__ . '/');
};
