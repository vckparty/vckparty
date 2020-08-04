<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCategoryPondicheryRequest;
use App\Http\Requests\StoreCategoryPondicheryRequest;
use App\Http\Requests\UpdateCategoryPondicheryRequest;
use App\Models\CategoryPondichery;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CategoryPondicheryController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('category_pondichery_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = CategoryPondichery::query()->select(sprintf('%s.*', (new CategoryPondichery)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'category_pondichery_show';
                $editGate      = 'category_pondichery_edit';
                $deleteGate    = 'category_pondichery_delete';
                $crudRoutePart = 'category-pondicheries';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : "";
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.categoryPondicheries.index');
    }

    public function create()
    {
        abort_if(Gate::denies('category_pondichery_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.categoryPondicheries.create');
    }

    public function store(StoreCategoryPondicheryRequest $request)
    {
        $categoryPondichery = CategoryPondichery::create($request->all());

        return redirect()->route('admin.category-pondicheries.index');
    }

    public function edit(CategoryPondichery $categoryPondichery)
    {
        abort_if(Gate::denies('category_pondichery_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.categoryPondicheries.edit', compact('categoryPondichery'));
    }

    public function update(UpdateCategoryPondicheryRequest $request, CategoryPondichery $categoryPondichery)
    {
        $categoryPondichery->update($request->all());

        return redirect()->route('admin.category-pondicheries.index');
    }

    public function show(CategoryPondichery $categoryPondichery)
    {
        abort_if(Gate::denies('category_pondichery_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.categoryPondicheries.show', compact('categoryPondichery'));
    }

    public function destroy(CategoryPondichery $categoryPondichery)
    {
        abort_if(Gate::denies('category_pondichery_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categoryPondichery->delete();

        return back();
    }

    public function massDestroy(MassDestroyCategoryPondicheryRequest $request)
    {
        CategoryPondichery::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
