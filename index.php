<?php

declare(strict_types=1);

date_default_timezone_set('America/Sao_Paulo');

require 'vendor/autoload.php';

use DaniboyBr\TaskList\Model\Task;
use DaniboyBr\TaskList\Collections\TasksList;
use DaniboyBr\TaskList\Filter\UndoneTasksFilter;
use DaniboyBr\TaskList\Filter\DoneTasksListFilter;
use DaniboyBr\TaskList\Validators\TaskValidator;

$faker = Faker\Factory::create();

$tasks = new TasksList();

foreach (range(0, 10) as $num) {
    $uuid = $faker->randomDigit;
    $tasks->addTask(new Task($uuid, $faker->text(150)));
    if ($faker->boolean) {
        $tasks->getTask($uuid)->setDoneTask();
    }
}

echo "<h3>Undone Taks</h3>";
foreach (UndoneTasksFilter::filterList($tasks) as $task) {
    echo $task . "<br>";
}


echo "<h3>Done Taks</h3>";
foreach (DoneTasksListFilter::filterList($tasks) as $task) {
    echo "<s>{$task}</s><br/>";
}
