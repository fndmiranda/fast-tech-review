<?php

namespace Modules\Beer\Transformers;

use League\Fractal\TransformerAbstract;
use Modules\Beer\Entities\Ingredient;

class HopTransformer extends TransformerAbstract
{

    /**
     * Transform the entity
     *
     * @param Ingredient $model
     * @return array
     */
    public function transform(Ingredient $model)
    {
        return [
            'id'                => $model->id,
            'name'              => $model->name,
            'amount'            => json_decode($model->pivot->amount),
            'add'               => $model->pivot->add,
            'attribute'         => $model->pivot->attribute,
        ];
    }

}
