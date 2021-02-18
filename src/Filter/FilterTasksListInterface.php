<?php

namespace DaniboyBr\TaskList\Filter;

use DaniboyBr\TaskList\Collections\TasksList;

interface FilterTasksListInterface
{
    public static function filterList(TasksList $tasks): TasksList;
}
