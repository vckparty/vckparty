<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMunicipalityRequest;
use App\Http\Requests\StoreMunicipalityRequest;
use App\Http\Requests\UpdateMunicipalityRequest;
use App\Models\District;
use App\Models\Municipality;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class MunicipalityController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('municipality_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Municipality::with(['district'])->select(sprintf('%s.*', (new Municipality)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'municipality_show';
                $editGate      = 'municipality_edit';
                $deleteGate    = 'municipality_delete';
                $crudRoutePart = 'municipalities';

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
            $table->addColumn('district_name', function ($row) {
                return $row->district ? $row->district->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'district']);

            return $table->make(true);
        }

        return view('admin.municipalities.index');
    }

    public function create()
    {
        abort_if(Gate::denies('municipality_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $districts = District::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.municipalities.create', compact('districts'));
    }

    public function store(StoreMunicipalityRequest $request)
    {
        $municipality = Municipality::create($request->all());

        return redirect()->route('admin.municipalities.index');
    }

    public function edit(Municipality $municipality)
    {
        abort_if(Gate::denies('municipality_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $districts = District::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $municipality->load('district');

        return view('admin.municipalities.edit', compact('districts', 'municipality'));
    }

    public function update(UpdateMunicipalityRequest $request, Municipality $municipality)
    {
        $municipality->update($request->all());

        return redirect()->route('admin.municipalities.index');
    }

    public function show(Municipality $municipality)
    {
        abort_if(Gate::denies('municipality_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $municipality->load('district');

        return view('admin.municipalities.show', compact('municipality'));
    }

    public function destroy(Municipality $municipality)
    {
        abort_if(Gate::denies('municipality_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $municipality->delete();

        return back();
    }

    public function massDestroy(MassDestroyMunicipalityRequest $request)
    {
        Municipality::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
