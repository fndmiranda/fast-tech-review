<?php

namespace Modules\Beer\Services;

use Modules\Beer\Repositories\IngredientRepository;

class IngredientService
{

    /**
     * @var IngredientRepository
     */
    protected $repository;

    public function __construct(IngredientRepository $repository)
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
            return $query->orderBy('created_at', 'desc');
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