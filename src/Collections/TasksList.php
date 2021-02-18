<?php

namespace DaniboyBr\TaskList\Collections;

use Traversable;
use ArrayIterator;
use Ds\Collection;
use DaniboyBr\TaskList\Model\Task;
use DaniboyBr\TaskList\Exceptions\TaskNotFoundException;
use DaniboyBr\TaskList\Exceptions\EmptyTasksListException;

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
        return new ArrayIterator($this->tasks);
    }

    public function addTask(Task $task): void
    {
        array_push($this->tasks, $task);
    }

    public function getTask(int $taskId): Task
    {
        if ($this->isEmpty()) {
            throw new EmptyTasksListException("Lista de tarefas vazia.");
        }

        foreach ($this->tasks as $task) {
            if ($taskId == $task->getId()) {
                return $task;
            }
        }

        throw new TaskNotFoundException("Tarefa não encontrada");
    }
}
