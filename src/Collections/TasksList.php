<?php

namespace DaniboyBr\TaskList\Collections;

use Traversable;
use ArrayIterator;
use Ds\Collection;

class TasksList implements Collection
{
    private array $tasks;

    public function __construct()
    {
        $this->tasks = [];
    }

    public function isEmpty(): bool
    {
        return empty($this->tasks);
    }

    public function clear()
    {
        $this->tasks = [];
    }

    public function toArray(): array
    {
        return $this->tasks;
    }

    public function copy()
    {
        return clone $this;
    }

    public function count(): int
    {
        return count($this->tasks);
    }

    public function jsonSerialize()
    {
        return json_encode($this->tasks);
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this);
    }
}
