<?php

declare(strict_types=1);

namespace MovieRate\ItOps\Aggregate;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\MappedSuperclass;
use Doctrine\ORM\Mapping\Version;

#[MappedSuperclass]
abstract class AggregateRoot
{
    #[Column(type: Types::INTEGER), Version]
    public int $version = 1;

    /**
     * @var list<object>
     */
    private array $commands = [];

    /**
     * @var list<object>
     */
    private array $events = [];

    /**
     * @return list<object>
     */
    final public function popCommands(): array
    {
        $commands = $this->commands;
        $this->commands = [];

        return $commands;
    }

    /**
     * @return list<object>
     */
    final public function popEvents(): array
    {
        $events = $this->events;
        $this->events = [];

        return $events;
    }

    /**
     * @no-named-arguments
     */
    final protected function send(object ...$commands): void
    {
        $this->commands = [...$this->commands, ...$commands];
    }

    /**
     * @no-named-arguments
     */
    final protected function publish(object ...$events): void
    {
        $this->events = [...$this->events, ...$events];
    }
}
