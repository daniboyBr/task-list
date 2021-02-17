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
        $this->assertCont(0, $tasks);
    }
}
