<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTownpanchayatRequest;
use App\Http\Requests\UpdateTownpanchayatRequest;
use App\Http\Resources\Admin\TownpanchayatResource;
use App\Models\Townpanchayat;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TownpanchayatsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('townpanchayat_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TownpanchayatResource(Townpanchayat::with(['district'])->get());
    }

    public function store(StoreTownpanchayatRequest $request)
    {
        $townpanchayat = Townpanchayat::create($request->all());

        return (new TownpanchayatResource($townpanchayat))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Townpanchayat $townpanchayat)
    {
        abort_if(Gate::denies('townpanchayat_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TownpanchayatResource($townpanchayat->load(['district']));
    }

    public function update(UpdateTownpanchayatRequest $request, Townpanchayat $townpanchayat)
    {
        $townpanchayat->update($request->all());

        return (new TownpanchayatResource($townpanchayat))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Townpanchayat $townpanchayat)
    {
        abort_if(Gate::denies('townpanchayat_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $townpanchayat->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
