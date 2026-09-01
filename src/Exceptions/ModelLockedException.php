<?php

namespace TestMonitor\Lockable\Exceptions;

use RuntimeException;
use TestMonitor\Lockable\Contracts\IsLockable;

class ModelLockedException extends RuntimeException
{
    /**
     * The affected lockable Eloquent model.
     *
     * @var IsLockable
     */
    protected $model;

    /**
     * Set the affected Eloquent model.
     *
     * @param IsLockable $model
     */
    public function setModel($model): static
    {
        $this->model = $model;

        $modelName = get_class($model);

        $this->message = "[{$modelName}] is locked and cannot be modified or deleted ({$model->getKey()})";

        return $this;
    }

    /**
     * Get the affected Eloquent model.
     *
     * @return null|IsLockable
     */
    public function getModel()
    {
        return $this->model;
    }
}
