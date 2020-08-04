<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMunicipalityvattamRequest;
use App\Http\Requests\UpdateMunicipalityvattamRequest;
use App\Http\Resources\Admin\MunicipalityvattamResource;
use App\Models\Municipalityvattam;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MunicipalityvattamApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('municipalityvattam_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MunicipalityvattamResource(Municipalityvattam::with(['municipality'])->get());
    }

    public function store(StoreMunicipalityvattamRequest $request)
    {
        $municipalityvattam = Municipalityvattam::create($request->all());

        return (new MunicipalityvattamResource($municipalityvattam))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Municipalityvattam $municipalityvattam)
    {
        abort_if(Gate::denies('municipalityvattam_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MunicipalityvattamResource($municipalityvattam->load(['municipality']));
    }

    public function update(UpdateMunicipalityvattamRequest $request, Municipalityvattam $municipalityvattam)
    {
        $municipalityvattam->update($request->all());

        return (new MunicipalityvattamResource($municipalityvattam))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Municipalityvattam $municipalityvattam)
    {
        abort_if(Gate::denies('municipalityvattam_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $municipalityvattam->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
