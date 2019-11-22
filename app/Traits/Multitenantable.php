<?php

namespace App\Traits;
use App\Models\User;
use Auth;

use Illuminate\Database\Eloquent\Builder;

trait Multitenantable {

    protected static function bootMultitenantable()
    {

        static::creating(function ($model) {
            $model->user_id = auth()->id();
        });

        static::addGlobalScope('user_id', function (Builder $builder) {
            $builder->where('user_id', auth()->id());
        });
    }

}