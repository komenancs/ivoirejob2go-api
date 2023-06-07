<?php

namespace App\Traits;

trait CreatedUpdatedBy
{
    public static function bootCreatedUpdatedBy()
    {
        // updating user_create_id and user_update_id when model is created
        static::creating(function ($model) {
            if (!$model->isDirty('user_create_id')) {
                if (auth()->user()) {
                    $model->user_create_id = auth()->user()->id;
                } else {
                    $model->user_create_id = null;
                }
            }
            if (!$model->isDirty('user_update_id')) {
                if (auth()->user()) {
                    $model->user_update_id = auth()->user()->id;
                } else {
                    $model->user_update_id = null;
                }
            }
        });

        // updating user_update_id when model is updated
        static::updating(function ($model) {
            if (!$model->isDirty('user_update_id')) {
                if (auth()->user()) {
                    $model->user_update_id = auth()->user()->id;
                } else {
                    $model->user_update_id = null;
                }
            }
        });
    }
}
