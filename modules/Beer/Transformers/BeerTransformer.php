<?php

namespace Modules\Beer\Transformers;

use League\Fractal\TransformerAbstract;
use Modules\Beer\Entities\Beer;

class BeerTransformer extends TransformerAbstract
{

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        'ingredients',
    ];

    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        'ingredients',
    ];

    /**
     * Transform the entity
     *
     * @param Beer $model
     * @return array
     */
    public function transform(Beer $model)
    {
        return [
            'id'                => $model->id,
            'name'              => $model->name,
            'tagline'           => $model->tagline,
            'first_brewed'      => $model->first_brewed->format('m/Y'),
            'description'       => $model->description,
            'image_url'         => $model->image_url,
            'abv'               => $model->abv,
            'ibu'               => $model->ibu,
            'target_fg'         => $model->target_fg,
            'target_og'         => $model->target_og,
            'ebc'               => $model->ebc,
            'srm'               => $model->srm,
            'ph'                => $model->ph,
            'attenuation_level' => $model->attenuation_level,
            'volume'            => $model->volume,
            'boil_volume'       => $model->boil_volume,
            'method'            => $model->method,
            'created_at'        => ($model->created_at) ? $model->created_at->toIso8601String() : null,
            'updated_at'        => ($model->updated_at) ? $model->updated_at->toIso8601String() : null,
        ];
    }

    /**
     * Include ingredients
     *
     * @param Beer $model
     * @return \League\Fractal\Resource\Item
     * @throws \Exception
     */
    public function includeIngredients(Beer $model)
    {
        return $this->item($model, new IngredientTransformer);
    }

}
