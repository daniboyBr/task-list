<?php

namespace DaniboyBr\TaskList\Model;

use DateTime;

class Task
{

    private $taskDescription;
    private $taskId;
    private $doneTask;
    private $doneDate;
    private $createdAt;
    private $dateToEnd;

    public function __construct(int $taskId, string $taskDescription, ?DateTime $dateToEnd = null)
    {
        $this->setTaskDescription($taskDescription);
        $this->taskId = $taskId;
        $this->dateToEnd = $dateToEnd;
        $this->doneTask = false;
        $this->createdAt = new DateTime();
    }


    /**
     * Get the value of taskDescription
     */
    public function getTaskDescription(): string
    {
        return $this->taskDescription;
    }

    /**
     * Set the value of taskDescription
     *
     * @return  self
     */
    public function setTaskDescription(string $taskDescription): Task
    {
        $this->taskDescription = $taskDescription;

        return $this;
    }

    /**
     * Get the value of dateToEnd
     */
    public function getDateToEnd(): DateTime
    {
        return $this->dateToEnd;
    }

    /**
     * Set the value of dateToEnd
     *
     * @return  self
     */
    public function setDateToEnd(?DateTime $dateToEnd): Task
    {
        $this->dateToEnd = $dateToEnd;

        return $this;
    }

    /**
     * Get the value of createdAt
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * Get the value of doneDate
     */
    public function getDoneDate(): DateTime
    {
        return $this->doneDate;
    }

    /**
     * Set the value of doneDate
     *
     * @return  self
     */
    private function setDoneDate(): Task
    {
        $this->doneDate = new DateTime();

        return $this;
    }

    /**
     * Set the value of doneTask
     *
     * @return  self
     */
    public function setDoneTask(): Task
    {
        if (!$this->doneTask) {
            $this->doneTask = true;

            $this->setDoneDate();
        }

        return $this;
    }


    /**
     * Get the value of doneTask
     */
    public function isDone(): bool
    {
        return $this->doneTask;
    }

    /**
     * Set the value of taskId
     *
     * @return  self
     */
    public function setId(int $taskId): Task
    {
        $this->taskId = $taskId;

        return $this;
    }

    /**
     * Get the value of taskId
     */
    public function getId(): int
    {
        return $this->taskId;
    }

    public function __toString(): string
    {
        return $this->taskDescription;
    }
}
