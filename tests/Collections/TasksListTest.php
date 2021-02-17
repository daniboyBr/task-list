<?php

namespace DaniboyBr\TaskList\Collections;

use PHPUnit\Framework\TestCase;
use DaniboyBr\TaskList\Collections\TaskList;

class TasksListTest extends TestCase
{
    public function testIfNewTaskListIsEmpty()
    {
        $tasks = new TasksList();

        $this->assertTrue($tasks->isEmpty());
        $this->assertCount(0, $tasks);
    }

    public function testShouldAddAnewTaskInTasksList()
    {
        $tasks = new TasksList();
        $task = new Task($title, $description);
        $tasks->add($task);
        $expected = 1;
        $this->assertCount(1, $tasks);
    }
}
