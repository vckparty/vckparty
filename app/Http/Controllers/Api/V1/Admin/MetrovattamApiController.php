<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMetrovattamRequest;
use App\Http\Requests\UpdateMetrovattamRequest;
use App\Http\Resources\Admin\MetrovattamResource;
use App\Models\Metrovattam;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MetrovattamApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('metrovattam_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MetrovattamResource(Metrovattam::with(['area'])->get());
    }

    public function store(StoreMetrovattamRequest $request)
    {
        $metrovattam = Metrovattam::create($request->all());

        return (new MetrovattamResource($metrovattam))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Metrovattam $metrovattam)
    {
        abort_if(Gate::denies('metrovattam_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MetrovattamResource($metrovattam->load(['area']));
    }

    public function update(UpdateMetrovattamRequest $request, Metrovattam $metrovattam)
    {
        $metrovattam->update($request->all());

        return (new MetrovattamResource($metrovattam))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Metrovattam $metrovattam)
    {
        abort_if(Gate::denies('metrovattam_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $metrovattam->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
