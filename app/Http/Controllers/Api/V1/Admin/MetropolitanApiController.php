<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMetropolitanRequest;
use App\Http\Requests\UpdateMetropolitanRequest;
use App\Http\Resources\Admin\MetropolitanResource;
use App\Models\Metropolitan;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MetropolitanApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('metropolitan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MetropolitanResource(Metropolitan::with(['district'])->get());
    }

    public function store(StoreMetropolitanRequest $request)
    {
        $metropolitan = Metropolitan::create($request->all());

        return (new MetropolitanResource($metropolitan))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Metropolitan $metropolitan)
    {
        abort_if(Gate::denies('metropolitan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MetropolitanResource($metropolitan->load(['district']));
    }

    public function update(UpdateMetropolitanRequest $request, Metropolitan $metropolitan)
    {
        $metropolitan->update($request->all());

        return (new MetropolitanResource($metropolitan))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Metropolitan $metropolitan)
    {
        abort_if(Gate::denies('metropolitan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $metropolitan->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
