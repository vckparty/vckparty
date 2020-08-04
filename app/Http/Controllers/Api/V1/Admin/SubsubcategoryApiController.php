<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubsubcategoryRequest;
use App\Http\Requests\UpdateSubsubcategoryRequest;
use App\Http\Resources\Admin\SubsubcategoryResource;
use App\Models\Subsubcategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SubsubcategoryApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('subsubcategory_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SubsubcategoryResource(Subsubcategory::with(['subcategorypondichery'])->get());
    }

    public function store(StoreSubsubcategoryRequest $request)
    {
        $subsubcategory = Subsubcategory::create($request->all());

        return (new SubsubcategoryResource($subsubcategory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Subsubcategory $subsubcategory)
    {
        abort_if(Gate::denies('subsubcategory_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SubsubcategoryResource($subsubcategory->load(['subcategorypondichery']));
    }

    public function update(UpdateSubsubcategoryRequest $request, Subsubcategory $subsubcategory)
    {
        $subsubcategory->update($request->all());

        return (new SubsubcategoryResource($subsubcategory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Subsubcategory $subsubcategory)
    {
        abort_if(Gate::denies('subsubcategory_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subsubcategory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
