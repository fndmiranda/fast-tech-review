<?php

namespace Modules\Beer\Services;

use Illuminate\Support\Facades\Input;
use Modules\Beer\Repositories\BeerRepository;

class BeerService
{

    /**
     * @var BeerRepository
     */
    protected $repository;

    public function __construct(BeerRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index()
    {
        $query = $this->repository->scopeQuery(function ($query) {
            return $query->where(function ($where) {
                if (Input::get('abv_gt', false)) {
                    return $where->where('abv', '>', Input::get('abv_gt'));
                }

                if (Input::get('abv_lt', false)) {
                    return $where->where('abv', '<', Input::get('abv_lt'));
                }

                if (Input::get('ibu_gt', false)) {
                    return $where->where('ibu', '>', Input::get('ibu_gt'));
                }

                if (Input::get('ibu_lt', false)) {
                    return $where->where('ibu', '<', Input::get('ibu_lt'));
                }

                if (Input::get('ebc_gt', false)) {
                    return $where->where('ebc', '>', Input::get('ebc_gt'));
                }

                if (Input::get('ebc_lt', false)) {
                    return $where->where('ebc', '<', Input::get('ebc_lt'));
                }

                if (Input::get('beer_name', false)) {
                    return $where->where('name', 'ilike', Input::get('beer_name'));
                }
                return $where;
            })->orderBy('created_at', 'desc');
        });

        return $query->paginate();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param array $attributes
     * @return mixed
     */
    public function store(array $attributes)
    {
        try {
            $entity = $this->repository->skipPresenter(true)->create($attributes);
            return $this->repository->skipPresenter(false)->find($entity->id);
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param array $attributes
     * @param string $id
     * @return mixed
     */
    public function update(array $attributes, $id)
    {
        try {
            $entity = $this->repository->skipPresenter(true)->find($id);
            $entity->update($attributes);
            return $this->repository->skipPresenter(false)->find($entity->id);
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    /**
     * Show the specified resource.
     *
     * @param string $id
     * @return mixed
     */
    public function show($id)
    {
        return $this->repository->find($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->repository->delete($id);
    }

}