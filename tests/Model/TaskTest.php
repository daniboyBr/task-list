<?php

namespace DaniboyBr\TaskList\Model;

use PHPUnit\Framework\TestCase;
use DaniboyBr\TaskList\Model\Task;

class TaskTest extends TestCase
{
    private $task;

    protected function setUp(): void
    {
        $this->task = new Task(1, "Uma nova tarefa");
    }


    public function testShoudNewTaskCreationDateEqualToNow()
    {
        expect($this->task->getCreatedAt()->getTimestamp())
            ->toBe((new \DateTime("now"))->getTimestamp());
    }

    public function testShouldDateOfDoneTaskEqualToNow()
    {
        $this->task->setDoneTask();

        expect($this->task->getDoneDate()->getTimestamp())
            ->toBe((new \DateTime("now"))->getTimestamp());
    }

    public function testShouldATaskSetToDone()
    {
        $this->task->setDoneTask();

        expect($this->task->isDone())->toBe(true);
    }
}
