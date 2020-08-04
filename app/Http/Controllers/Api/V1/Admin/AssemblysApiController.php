<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAssemblyRequest;
use App\Http\Requests\UpdateAssemblyRequest;
use App\Http\Resources\Admin\AssemblyResource;
use App\Models\Assembly;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AssemblysApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('assembly_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AssemblyResource(Assembly::all());
    }

    public function store(StoreAssemblyRequest $request)
    {
        $assembly = Assembly::create($request->all());

        return (new AssemblyResource($assembly))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Assembly $assembly)
    {
        abort_if(Gate::denies('assembly_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AssemblyResource($assembly);
    }

    public function update(UpdateAssemblyRequest $request, Assembly $assembly)
    {
        $assembly->update($request->all());

        return (new AssemblyResource($assembly))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Assembly $assembly)
    {
        abort_if(Gate::denies('assembly_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assembly->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
