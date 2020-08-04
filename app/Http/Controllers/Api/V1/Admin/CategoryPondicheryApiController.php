<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryPondicheryRequest;
use App\Http\Requests\UpdateCategoryPondicheryRequest;
use App\Http\Resources\Admin\CategoryPondicheryResource;
use App\Models\CategoryPondichery;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryPondicheryApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('category_pondichery_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CategoryPondicheryResource(CategoryPondichery::all());
    }

    public function store(StoreCategoryPondicheryRequest $request)
    {
        $categoryPondichery = CategoryPondichery::create($request->all());

        return (new CategoryPondicheryResource($categoryPondichery))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CategoryPondichery $categoryPondichery)
    {
        abort_if(Gate::denies('category_pondichery_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CategoryPondicheryResource($categoryPondichery);
    }

    public function update(UpdateCategoryPondicheryRequest $request, CategoryPondichery $categoryPondichery)
    {
        $categoryPondichery->update($request->all());

        return (new CategoryPondicheryResource($categoryPondichery))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CategoryPondichery $categoryPondichery)
    {
        abort_if(Gate::denies('category_pondichery_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categoryPondichery->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
