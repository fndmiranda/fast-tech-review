<?php

namespace Modules\Beer\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Beer extends Model implements Transformable
{

    use SoftDeletes, TransformableTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'beer_beers';

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'volume'            => 'array',
        'boil_volume'       => 'array',
        'method'            => 'array',
        'first_brewed'      => 'date',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'tagline',
        'first_brewed',
        'description',
        'image_url',
        'yeast',
        'abv',
        'ibu',
        'target_fg',
        'target_og',
        'ebc',
        'srm',
        'ph',
        'attenuation_level',
        'boil_volume',
    ];

    /**
     * The malt that belong to the entity.
     */
    public function malt()
    {
        return $this->belongsToMany(Ingredient::class, 'beer_beers_malt', 'beer_id', 'ingredient_id')->withPivot(['amount']);
    }

    /**
     * The hops that belong to the entity.
     */
    public function hops()
    {
        return $this->belongsToMany(Ingredient::class, 'beer_beers_hops', 'beer_id', 'ingredient_id')->withPivot(['amount', 'add', 'attribute']);
    }

}
