<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTownvattamRequest;
use App\Http\Requests\UpdateTownvattamRequest;
use App\Http\Resources\Admin\TownvattamResource;
use App\Models\Townvattam;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TownvattamApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('townvattam_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TownvattamResource(Townvattam::with(['townpanchayat'])->get());
    }

    public function store(StoreTownvattamRequest $request)
    {
        $townvattam = Townvattam::create($request->all());

        return (new TownvattamResource($townvattam))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Townvattam $townvattam)
    {
        abort_if(Gate::denies('townvattam_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TownvattamResource($townvattam->load(['townpanchayat']));
    }

    public function update(UpdateTownvattamRequest $request, Townvattam $townvattam)
    {
        $townvattam->update($request->all());

        return (new TownvattamResource($townvattam))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Townvattam $townvattam)
    {
        abort_if(Gate::denies('townvattam_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $townvattam->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
