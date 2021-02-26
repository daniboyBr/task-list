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
        $taskMock = $this->getMockBuilder(Task::class)->disableOriginalConstructor()->getMock();
        $tasks->addTask($taskMock);
        $expected = 1;
        $this->assertCount(1, $tasks);
    }

    public function testShouldSelectATaskFromTaskList()
    {
        $taskMock = $this->getMockBuilder(Task::class)
                            ->onlyMethods(['getId'])
                            ->disableOriginalConstructor()
                            ->getMock();
        $taskMock->expects($this->once())->method('getId')->willReturn(1);

        $tasks = new TasksList();
        $tasks->addTask($taskMock);
        $taskFinded = $tasks->getTask(1);
        $this->assertEquals($taskMock, $taskFinded);
    }

    public function testSholdNotSelectATaskIfTasksListIsEmpty()
    {
        $this->expectException(EmptyTasksListException::class);

        $tasks = new TasksList();
        $taskFinded = $tasks->getTask(1);
    }

    public function testShoudNotSelectIfATaskIsNotInTasklist()
    {
        $this->expectException(TaskNotFoundException::class);

        $taskMock = $this->getMockBuilder(Task::class)
                            ->onlyMethods(['getId'])
                            ->disableOriginalConstructor()
                            ->getMock();
        $taskMock->expects($this->once())->method('getId')->willReturn(1);

        $tasks = new TasksList();
        $tasks->addTask($taskMock);
        $taskFinded = $tasks->getTask(2);
    }

    public function testShoudRemoveASelectedTaskFromTasksList()
    {
        $this->expectException(TaskNotFoundException::class);

        $taskMock = $this->getMockBuilder(Task::class)
                            ->onlyMethods(['getId'])
                            ->disableOriginalConstructor()
                            ->getMock();
        $taskMock->expects($this->atLeastOnce())->method('getId')->willReturn(1);

        $taskMock2 = $this->getMockBuilder(Task::class)
                            ->onlyMethods(['getId'])
                            ->disableOriginalConstructor()
                            ->getMock();
        $taskMock2->expects($this->atLeastOnce())->method('getId')->willReturn(2);

        $tasks = new TasksList();
        $tasks->addTask($taskMock);
        $tasks->addTask($taskMock2);

        $taskId = 1;
        $tasks->removeTask($tasks->getTask($taskId));
        $findedTask = $tasks->getTask($taskId);
    }
}
