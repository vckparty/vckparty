<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePondicheryassemblyRequest;
use App\Http\Requests\UpdatePondicheryassemblyRequest;
use App\Http\Resources\Admin\PondicheryassemblyResource;
use App\Models\Pondicheryassembly;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PondicheryassemblysApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pondicheryassembly_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PondicheryassemblyResource(Pondicheryassembly::all());
    }

    public function store(StorePondicheryassemblyRequest $request)
    {
        $pondicheryassembly = Pondicheryassembly::create($request->all());

        return (new PondicheryassemblyResource($pondicheryassembly))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Pondicheryassembly $pondicheryassembly)
    {
        abort_if(Gate::denies('pondicheryassembly_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PondicheryassemblyResource($pondicheryassembly);
    }

    public function update(UpdatePondicheryassemblyRequest $request, Pondicheryassembly $pondicheryassembly)
    {
        $pondicheryassembly->update($request->all());

        return (new PondicheryassemblyResource($pondicheryassembly))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Pondicheryassembly $pondicheryassembly)
    {
        abort_if(Gate::denies('pondicheryassembly_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pondicheryassembly->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
