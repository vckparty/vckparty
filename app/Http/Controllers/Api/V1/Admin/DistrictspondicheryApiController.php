<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDistrictspondicheryRequest;
use App\Http\Requests\UpdateDistrictspondicheryRequest;
use App\Http\Resources\Admin\DistrictspondicheryResource;
use App\Models\Districtspondichery;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DistrictspondicheryApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('districtspondichery_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DistrictspondicheryResource(Districtspondichery::all());
    }

    public function store(StoreDistrictspondicheryRequest $request)
    {
        $districtspondichery = Districtspondichery::create($request->all());

        return (new DistrictspondicheryResource($districtspondichery))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Districtspondichery $districtspondichery)
    {
        abort_if(Gate::denies('districtspondichery_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DistrictspondicheryResource($districtspondichery);
    }

    public function update(UpdateDistrictspondicheryRequest $request, Districtspondichery $districtspondichery)
    {
        $districtspondichery->update($request->all());

        return (new DistrictspondicheryResource($districtspondichery))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Districtspondichery $districtspondichery)
    {
        abort_if(Gate::denies('districtspondichery_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $districtspondichery->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
