<?php

namespace Modules\Beer\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Beer\Services\IngredientService;
use Prettus\Validator\Exceptions\ValidatorException;

class IngredientController extends Controller
{
    /**
     * @var IngredientService
     */
    protected $service;

    public function __construct(IngredientService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return response()->json($this->service->index());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $response = $this->service->store($request->all());

        if ($response instanceof ValidatorException) {
            return response()->json($response->getMessageBag(), 422);
        }

        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param string $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $response = $this->service->update($request->all(), $id);

        if ($response instanceof ValidatorException) {
            return response()->json($response->getMessageBag(), 422);
        }

        return response()->json($response);
    }

    /**
     * Show the specified resource.
     *
     * @param string $id
     * @return Response
     */
    public function show($id)
    {
        return response()->json($this->service->show($id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return Response
     */
    public function destroy($id)
    {
        return response()->json($this->service->destroy($id));
    }
}
