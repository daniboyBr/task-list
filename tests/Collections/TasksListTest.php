<?php

namespace DaniboyBr\TaskList\Collections;

use PHPUnit\Framework\TestCase;
use DaniboyBr\TaskList\Model\Task;
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
        $taskMock = $this->getMockBuilder(Task::class)->getMock();
        $tasks->addTask($taskMock);
        $expected = 1;
        $this->assertCount(1, $tasks);
    }
}
