<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMunicipalityvattamRequest;
use App\Http\Requests\StoreMunicipalityvattamRequest;
use App\Http\Requests\UpdateMunicipalityvattamRequest;
use App\Models\Municipality;
use App\Models\Municipalityvattam;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class MunicipalityvattamController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('municipalityvattam_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Municipalityvattam::with(['municipality'])->select(sprintf('%s.*', (new Municipalityvattam)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'municipalityvattam_show';
                $editGate      = 'municipalityvattam_edit';
                $deleteGate    = 'municipalityvattam_delete';
                $crudRoutePart = 'municipalityvattams';

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
            $table->addColumn('municipality_name', function ($row) {
                return $row->municipality ? $row->municipality->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'municipality']);

            return $table->make(true);
        }

        return view('admin.municipalityvattams.index');
    }

    public function create()
    {
        abort_if(Gate::denies('municipalityvattam_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $municipalities = Municipality::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.municipalityvattams.create', compact('municipalities'));
    }

    public function store(StoreMunicipalityvattamRequest $request)
    {
        $municipalityvattam = Municipalityvattam::create($request->all());

        return redirect()->route('admin.municipalityvattams.index');
    }

    public function edit(Municipalityvattam $municipalityvattam)
    {
        abort_if(Gate::denies('municipalityvattam_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $municipalities = Municipality::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $municipalityvattam->load('municipality');

        return view('admin.municipalityvattams.edit', compact('municipalities', 'municipalityvattam'));
    }

    public function update(UpdateMunicipalityvattamRequest $request, Municipalityvattam $municipalityvattam)
    {
        $municipalityvattam->update($request->all());

        return redirect()->route('admin.municipalityvattams.index');
    }

    public function show(Municipalityvattam $municipalityvattam)
    {
        abort_if(Gate::denies('municipalityvattam_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $municipalityvattam->load('municipality');

        return view('admin.municipalityvattams.show', compact('municipalityvattam'));
    }

    public function destroy(Municipalityvattam $municipalityvattam)
    {
        abort_if(Gate::denies('municipalityvattam_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $municipalityvattam->delete();

        return back();
    }

    public function massDestroy(MassDestroyMunicipalityvattamRequest $request)
    {
        Municipalityvattam::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
