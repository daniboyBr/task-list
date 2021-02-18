<?php

namespace DaniboyBr\TaskList\Filter;

use DaniboyBr\TaskList\Collections\TasksList;
use DaniboyBr\TaskList\Filter\FilterTasksListInterface;

class DoneTasksListFilter extends FilterTasksListInterface
{
    public static function filterTasks(TasksList $taskList): TasksList
    {
        $newList = new TasksList();
        foreach ($taskList as $task) {
            if ($task->isDone()) {
                $newList->addTask($task);
            }
        }
        return $newList;
    }
}
