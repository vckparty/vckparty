<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTownvattamRequest;
use App\Http\Requests\StoreTownvattamRequest;
use App\Http\Requests\UpdateTownvattamRequest;
use App\Models\Townpanchayat;
use App\Models\Townvattam;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class TownvattamController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('townvattam_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Townvattam::with(['townpanchayat'])->select(sprintf('%s.*', (new Townvattam)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'townvattam_show';
                $editGate      = 'townvattam_edit';
                $deleteGate    = 'townvattam_delete';
                $crudRoutePart = 'townvattams';

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
            $table->addColumn('townpanchayat_name', function ($row) {
                return $row->townpanchayat ? $row->townpanchayat->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'townpanchayat']);

            return $table->make(true);
        }

        return view('admin.townvattams.index');
    }

    public function create()
    {
        abort_if(Gate::denies('townvattam_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $townpanchayats = Townpanchayat::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.townvattams.create', compact('townpanchayats'));
    }

    public function store(StoreTownvattamRequest $request)
    {
        $townvattam = Townvattam::create($request->all());

        return redirect()->route('admin.townvattams.index');
    }

    public function edit(Townvattam $townvattam)
    {
        abort_if(Gate::denies('townvattam_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $townpanchayats = Townpanchayat::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $townvattam->load('townpanchayat');

        return view('admin.townvattams.edit', compact('townpanchayats', 'townvattam'));
    }

    public function update(UpdateTownvattamRequest $request, Townvattam $townvattam)
    {
        $townvattam->update($request->all());

        return redirect()->route('admin.townvattams.index');
    }

    public function show(Townvattam $townvattam)
    {
        abort_if(Gate::denies('townvattam_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $townvattam->load('townpanchayat');

        return view('admin.townvattams.show', compact('townvattam'));
    }

    public function destroy(Townvattam $townvattam)
    {
        abort_if(Gate::denies('townvattam_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $townvattam->delete();

        return back();
    }

    public function massDestroy(MassDestroyTownvattamRequest $request)
    {
        Townvattam::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
