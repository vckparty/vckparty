<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMetropolitanRequest;
use App\Http\Requests\StoreMetropolitanRequest;
use App\Http\Requests\UpdateMetropolitanRequest;
use App\Models\District;
use App\Models\Metropolitan;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class MetropolitanController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('metropolitan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Metropolitan::with(['district'])->select(sprintf('%s.*', (new Metropolitan)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'metropolitan_show';
                $editGate      = 'metropolitan_edit';
                $deleteGate    = 'metropolitan_delete';
                $crudRoutePart = 'metropolitans';

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

        return view('admin.metropolitans.index');
    }

    public function create()
    {
        abort_if(Gate::denies('metropolitan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $districts = District::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.metropolitans.create', compact('districts'));
    }

    public function store(StoreMetropolitanRequest $request)
    {
        $metropolitan = Metropolitan::create($request->all());

        return redirect()->route('admin.metropolitans.index');
    }

    public function edit(Metropolitan $metropolitan)
    {
        abort_if(Gate::denies('metropolitan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $districts = District::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $metropolitan->load('district');

        return view('admin.metropolitans.edit', compact('districts', 'metropolitan'));
    }

    public function update(UpdateMetropolitanRequest $request, Metropolitan $metropolitan)
    {
        $metropolitan->update($request->all());

        return redirect()->route('admin.metropolitans.index');
    }

    public function show(Metropolitan $metropolitan)
    {
        abort_if(Gate::denies('metropolitan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $metropolitan->load('district');

        return view('admin.metropolitans.show', compact('metropolitan'));
    }

    public function destroy(Metropolitan $metropolitan)
    {
        abort_if(Gate::denies('metropolitan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $metropolitan->delete();

        return back();
    }

    public function massDestroy(MassDestroyMetropolitanRequest $request)
    {
        Metropolitan::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
