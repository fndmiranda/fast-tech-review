<?php

namespace App\Traits;

use Ramsey\Uuid\Uuid;

trait UuidTrait
{

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        /**
         * Register a creating model event with the dispatcher.
         *
         * @param  \Closure|string  $callback
         * @return void
         */
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Uuid::uuid1()->toString();
        });
    }
}