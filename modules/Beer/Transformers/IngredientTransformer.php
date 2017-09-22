<?php

namespace Modules\Beer\Transformers;

use League\Fractal\TransformerAbstract;
use Modules\Beer\Entities\Beer;
use League\Fractal\ParamBag;

class IngredientTransformer extends TransformerAbstract
{

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        'malt',
        'hop',
    ];

    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        'malt',
        'hop',
    ];

    /**
     * List of resources possible to include
     *
     * @var array
     */
    private $validParams = [
        'limit',
        'order',
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
            'yeast' => $model->yeast,
        ];
    }

    /**
     * Include malt
     *
     * @param Beer $model
     * @param ParamBag|null $params
     * @return \League\Fractal\Resource\Collection|mixed
     * @throws \Exception
     */
    public function includeMalt(Beer $model, ParamBag $params = null)
    {
        // Optional params validation
        $usedParams = array_keys(iterator_to_array($params));
        if ($invalidParams = array_diff($usedParams, $this->validParams)) {
            throw new \Exception(sprintf(
                'Invalid param(s): "%s". Valid param(s): "%s"',
                implode(',', $usedParams),
                implode(',', $this->validParams)
            ));
        }

        // Processing
        list($limit, $offset) = ($params->get('limit')) ?: [15, 0];
        list($orderCol, $orderBy) = ($params->get('order')) ?: ['created_at', 'desc'];

        $collection = $model->malt()
            ->take($limit)
            ->skip($offset)
            ->orderBy($orderCol, $orderBy)
            ->get();

        return $this->collection($collection, new MaltTransformer);
    }

    /**
     * Include hop
     *
     * @param Beer $model
     * @param ParamBag|null $params
     * @return \League\Fractal\Resource\Collection|mixed
     * @throws \Exception
     */
    public function includeHop(Beer $model, ParamBag $params = null)
    {
        // Optional params validation
        $usedParams = array_keys(iterator_to_array($params));
        if ($invalidParams = array_diff($usedParams, $this->validParams)) {
            throw new \Exception(sprintf(
                'Invalid param(s): "%s". Valid param(s): "%s"',
                implode(',', $usedParams),
                implode(',', $this->validParams)
            ));
        }

        // Processing
        list($limit, $offset) = ($params->get('limit')) ?: [15, 0];
        list($orderCol, $orderBy) = ($params->get('order')) ?: ['created_at', 'desc'];

        $collection = $model->hops()
            ->take($limit)
            ->skip($offset)
            ->orderBy($orderCol, $orderBy)
            ->get();

        return $this->collection($collection, new HopTransformer);
    }

}
