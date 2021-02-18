<?php

namespace DaniboyBr\TaskList\Collections;

use PHPUnit\Framework\TestCase;
use DaniboyBr\TaskList\Model\Task;
use DaniboyBr\TaskList\Collections\TasksList;
use DaniboyBr\TaskList\Exceptions\EmptyTasksListException;
use DaniboyBr\TaskList\Exceptions\TaskNotFoundException;

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

    public function testShouldSelectAtaskFromTaskList()
    {
        $taskMock = $this->getMockBuilder(Task::class)
                            ->addMethods(['getId'])
                            ->getMock();
        $taskMock->expects($this->once())->method('getId')->willReturn(1);

        $tasks = new TasksList();
        $tasks->addTask($taskMock);
        $taskFinded = $tasks->getTask(1);
        $this->assertEquals($taskMock, $taskFinded);
    }

    public function testSholdNotSelectAtaskIfTasksListIsEmpty()
    {
        $tasks = new TasksList();
        $taskFinded = $tasks->getTask(1);
        $this->expectException(EmptyTasksListException::class);
    }

    public function testShoudNotSelectIfAtaskIsNotInTasklist()
    {

        $taskMock = $this->getMockBuilder(Task::class)
                            ->addMethods(['getId'])
                            ->getMock();
        $taskMock->expects($this->once())->method('getId')->willReturn(1);

        $tasks = new TasksList();
        $tasks->addTask($taskMock);
        $taskFinded = $tasks->getTask(2);
        $this->expectException(TaskNotFoundException::class);
    }
}
