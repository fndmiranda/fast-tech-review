<?php

namespace Modules\Beer\Repositories;

use Modules\Beer\Presenters\BeerPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Modules\Beer\Entities\Beer;
use Modules\Beer\Validators\BeerValidator;

class BeerRepositoryEloquent extends BaseRepository implements BeerRepository
{

    /**
     * Searchable Fields
     *
     * @var array
     */
    protected $fieldSearchable = [
        'name'      => 'ilike',
        'tagline'   => 'ilike',
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Beer::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {
        return BeerValidator::class;
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
        return BeerPresenter::class;
    }
}
