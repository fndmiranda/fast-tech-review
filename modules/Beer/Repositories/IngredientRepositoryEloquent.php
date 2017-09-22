<?php

namespace Modules\Beer\Repositories;

use Modules\Beer\Presenters\IngredientPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Modules\Beer\Entities\Ingredient;
use Modules\Beer\Validators\IngredientValidator;

class IngredientRepositoryEloquent extends BaseRepository implements IngredientRepository
{

    /**
     * Searchable Fields
     *
     * @var array
     */
    protected $fieldSearchable = [
        'name'      => 'ilike',
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Ingredient::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {
        return IngredientValidator::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * Specify Presenter class name
     *
     * @return string
     */
    public function presenter()
    {
        return IngredientPresenter::class;
    }
}
