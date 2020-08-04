<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySubsubcategoryRequest;
use App\Http\Requests\StoreSubsubcategoryRequest;
use App\Http\Requests\UpdateSubsubcategoryRequest;
use App\Models\SubcategoryPondichery;
use App\Models\Subsubcategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SubsubcategoryController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('subsubcategory_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Subsubcategory::with(['subcategorypondichery'])->select(sprintf('%s.*', (new Subsubcategory)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'subsubcategory_show';
                $editGate      = 'subsubcategory_edit';
                $deleteGate    = 'subsubcategory_delete';
                $crudRoutePart = 'subsubcategories';

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
            $table->addColumn('subcategorypondichery_name', function ($row) {
                return $row->subcategorypondichery ? $row->subcategorypondichery->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'subcategorypondichery']);

            return $table->make(true);
        }

        return view('admin.subsubcategories.index');
    }

    public function create()
    {
        abort_if(Gate::denies('subsubcategory_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subcategorypondicheries = SubcategoryPondichery::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.subsubcategories.create', compact('subcategorypondicheries'));
    }

    public function store(StoreSubsubcategoryRequest $request)
    {
        $subsubcategory = Subsubcategory::create($request->all());

        return redirect()->route('admin.subsubcategories.index');
    }

    public function edit(Subsubcategory $subsubcategory)
    {
        abort_if(Gate::denies('subsubcategory_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subcategorypondicheries = SubcategoryPondichery::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $subsubcategory->load('subcategorypondichery');

        return view('admin.subsubcategories.edit', compact('subcategorypondicheries', 'subsubcategory'));
    }

    public function update(UpdateSubsubcategoryRequest $request, Subsubcategory $subsubcategory)
    {
        $subsubcategory->update($request->all());

        return redirect()->route('admin.subsubcategories.index');
    }

    public function show(Subsubcategory $subsubcategory)
    {
        abort_if(Gate::denies('subsubcategory_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subsubcategory->load('subcategorypondichery');

        return view('admin.subsubcategories.show', compact('subsubcategory'));
    }

    public function destroy(Subsubcategory $subsubcategory)
    {
        abort_if(Gate::denies('subsubcategory_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $subsubcategory->delete();

        return back();
    }

    public function massDestroy(MassDestroySubsubcategoryRequest $request)
    {
        Subsubcategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
