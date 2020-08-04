<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubcategoryPondicheryRequest;
use App\Http\Requests\UpdateSubcategoryPondicheryRequest;
use App\Http\Resources\Admin\SubcategoryPondicheryResource;
use App\Models\SubcategoryPondichery;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SubcategoryPondicheryApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('subcategory_pondichery_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SubcategoryPondicheryResource(SubcategoryPondichery::with(['categorypondichery'])->get());
    }

    public function store(StoreSubcategoryPondicheryRequest $request)
    {
        $subcategoryPondichery = SubcategoryPondichery::create($request->all());

        return (new SubcategoryPondicheryResource($subcategoryPondichery))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SubcategoryPondichery $subcategoryPondichery)
    {
        abort_if(Gate::denies('subcategory_pondichery_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SubcategoryPondicheryResource($subcategoryPondichery->load(['categorypondichery']));
    }

    public function update(UpdateSubcategoryPondicheryRequest $request, SubcategoryPondichery $subcategoryPondichery)
    {
        $subcategoryPondichery->update($request->all());

        return (new SubcategoryPondicheryResource($subcategoryPondichery))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SubcategoryPondichery $subcategoryPondichery)
    {
        abort_if(Gate::denies('subcategory_pondichery_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subcategoryPondichery->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
