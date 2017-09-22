<?php

namespace Modules\Beer\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Ingredient extends Model implements Transformable
{

    use SoftDeletes, TransformableTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'beer_ingredients';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

}
