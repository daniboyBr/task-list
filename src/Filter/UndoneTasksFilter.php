<?php

namespace DaniboyBr\TaskList\Filter;

use DaniboyBr\TaskList\Collections\TasksList;
use DaniboyBr\TaskList\Filter\FilterTasksListInterface;

class UndoneTasksFilter implements FilterTasksListInterface
{
    public static function filterList(TasksList $tasksList): TasksList
    {
        $newList = new TasksList();
        foreach ($tasksList as $task) {
            if (!$task->isDone()) {
                $newList->addTask($task);
            }
        }

        return $newList;
    }
}
