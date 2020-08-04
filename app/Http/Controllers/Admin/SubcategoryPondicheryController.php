<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySubcategoryPondicheryRequest;
use App\Http\Requests\StoreSubcategoryPondicheryRequest;
use App\Http\Requests\UpdateSubcategoryPondicheryRequest;
use App\Models\CategoryPondichery;
use App\Models\SubcategoryPondichery;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SubcategoryPondicheryController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('subcategory_pondichery_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = SubcategoryPondichery::with(['categorypondichery'])->select(sprintf('%s.*', (new SubcategoryPondichery)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'subcategory_pondichery_show';
                $editGate      = 'subcategory_pondichery_edit';
                $deleteGate    = 'subcategory_pondichery_delete';
                $crudRoutePart = 'subcategory-pondicheries';

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
            $table->addColumn('categorypondichery_name', function ($row) {
                return $row->categorypondichery ? $row->categorypondichery->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'categorypondichery']);

            return $table->make(true);
        }

        return view('admin.subcategoryPondicheries.index');
    }

    public function create()
    {
        abort_if(Gate::denies('subcategory_pondichery_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categorypondicheries = CategoryPondichery::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.subcategoryPondicheries.create', compact('categorypondicheries'));
    }

    public function store(StoreSubcategoryPondicheryRequest $request)
    {
        $subcategoryPondichery = SubcategoryPondichery::create($request->all());

        return redirect()->route('admin.subcategory-pondicheries.index');
    }

    public function edit(SubcategoryPondichery $subcategoryPondichery)
    {
        abort_if(Gate::denies('subcategory_pondichery_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categorypondicheries = CategoryPondichery::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $subcategoryPondichery->load('categorypondichery');

        return view('admin.subcategoryPondicheries.edit', compact('categorypondicheries', 'subcategoryPondichery'));
    }

    public function update(UpdateSubcategoryPondicheryRequest $request, SubcategoryPondichery $subcategoryPondichery)
    {
        $subcategoryPondichery->update($request->all());

        return redirect()->route('admin.subcategory-pondicheries.index');
    }

    public function show(SubcategoryPondichery $subcategoryPondichery)
    {
        abort_if(Gate::denies('subcategory_pondichery_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subcategoryPondichery->load('categorypondichery');

        return view('admin.subcategoryPondicheries.show', compact('subcategoryPondichery'));
    }

    public function destroy(SubcategoryPondichery $subcategoryPondichery)
    {
        abort_if(Gate::denies('subcategory_pondichery_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subcategoryPondichery->delete();

        return back();
    }

    public function massDestroy(MassDestroySubcategoryPondicheryRequest $request)
    {
        SubcategoryPondichery::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
