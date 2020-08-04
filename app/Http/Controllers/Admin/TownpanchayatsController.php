<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTownpanchayatRequest;
use App\Http\Requests\StoreTownpanchayatRequest;
use App\Http\Requests\UpdateTownpanchayatRequest;
use App\Models\District;
use App\Models\Townpanchayat;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class TownpanchayatsController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('townpanchayat_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Townpanchayat::with(['district'])->select(sprintf('%s.*', (new Townpanchayat)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'townpanchayat_show';
                $editGate      = 'townpanchayat_edit';
                $deleteGate    = 'townpanchayat_delete';
                $crudRoutePart = 'townpanchayats';

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

        return view('admin.townpanchayats.index');
    }

    public function create()
    {
        abort_if(Gate::denies('townpanchayat_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $districts = District::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.townpanchayats.create', compact('districts'));
    }

    public function store(StoreTownpanchayatRequest $request)
    {
        $townpanchayat = Townpanchayat::create($request->all());

        return redirect()->route('admin.townpanchayats.index');
    }

    public function edit(Townpanchayat $townpanchayat)
    {
        abort_if(Gate::denies('townpanchayat_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $districts = District::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $townpanchayat->load('district');

        return view('admin.townpanchayats.edit', compact('districts', 'townpanchayat'));
    }

    public function update(UpdateTownpanchayatRequest $request, Townpanchayat $townpanchayat)
    {
        $townpanchayat->update($request->all());

        return redirect()->route('admin.townpanchayats.index');
    }

    public function show(Townpanchayat $townpanchayat)
    {
        abort_if(Gate::denies('townpanchayat_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $townpanchayat->load('district');

        return view('admin.townpanchayats.show', compact('townpanchayat'));
    }

    public function destroy(Townpanchayat $townpanchayat)
    {
        abort_if(Gate::denies('townpanchayat_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $townpanchayat->delete();

        return back();
    }

    public function massDestroy(MassDestroyTownpanchayatRequest $request)
    {
        Townpanchayat::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
