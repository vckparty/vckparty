<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMetrovattamRequest;
use App\Http\Requests\StoreMetrovattamRequest;
use App\Http\Requests\UpdateMetrovattamRequest;
use App\Models\Area;
use App\Models\Metrovattam;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class MetrovattamController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('metrovattam_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Metrovattam::with(['area'])->select(sprintf('%s.*', (new Metrovattam)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'metrovattam_show';
                $editGate      = 'metrovattam_edit';
                $deleteGate    = 'metrovattam_delete';
                $crudRoutePart = 'metrovattams';

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
            $table->addColumn('area_name', function ($row) {
                return $row->area ? $row->area->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'area']);

            return $table->make(true);
        }

        return view('admin.metrovattams.index');
    }

    public function create()
    {
        abort_if(Gate::denies('metrovattam_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $areas = Area::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.metrovattams.create', compact('areas'));
    }

    public function store(StoreMetrovattamRequest $request)
    {
        $metrovattam = Metrovattam::create($request->all());

        return redirect()->route('admin.metrovattams.index');
    }

    public function edit(Metrovattam $metrovattam)
    {
        abort_if(Gate::denies('metrovattam_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $areas = Area::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $metrovattam->load('area');

        return view('admin.metrovattams.edit', compact('areas', 'metrovattam'));
    }

    public function update(UpdateMetrovattamRequest $request, Metrovattam $metrovattam)
    {
        $metrovattam->update($request->all());

        return redirect()->route('admin.metrovattams.index');
    }

    public function show(Metrovattam $metrovattam)
    {
        abort_if(Gate::denies('metrovattam_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $metrovattam->load('area');

        return view('admin.metrovattams.show', compact('metrovattam'));
    }

    public function destroy(Metrovattam $metrovattam)
    {
        abort_if(Gate::denies('metrovattam_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $metrovattam->delete();

        return back();
    }

    public function massDestroy(MassDestroyMetrovattamRequest $request)
    {
        Metrovattam::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
