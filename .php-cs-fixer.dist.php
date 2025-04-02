<?php

declare(strict_types=1);

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$finder = (new Finder())
    ->in(__DIR__)
    ->exclude('var')
    ->exclude('vendor')
    ->append([
        __FILE__,
        __DIR__ . '/bin/console',
    ])
;

return (new Config())
    ->setRules([
        '@PhpCsFixer:risky' => true,
        '@PhpCsFixer' => true,
        '@DoctrineAnnotation' => true,
        '@PER-CS2.0' => true,
        '@PER-CS2.0:risky' => true,
        '@PHP80Migration:risky' => true,
        '@PHPUnit84Migration:risky' => true,
        '@PHP84Migration' => true,
        'concat_space' => ['spacing' => 'one'],
        'mb_str_functions' => true,
        'strict_comparison' => false,
        'date_time_immutable' => true,
        'final_class' => true,
        'final_public_method_for_abstract_class' => true,
        'yoda_style' => ['equal' => false, 'identical' => false, 'less_and_greater' => false],
        'php_unit_strict' => false,
        'php_unit_internal_class' => false,
    ])
    ->setRiskyAllowed(true)
    ->setCacheFile(__DIR__ . '/var/.php-cs-fixer.cache')
    ->setFinder($finder);
