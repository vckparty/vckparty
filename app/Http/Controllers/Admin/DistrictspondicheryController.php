<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDistrictspondicheryRequest;
use App\Http\Requests\StoreDistrictspondicheryRequest;
use App\Http\Requests\UpdateDistrictspondicheryRequest;
use App\Models\Districtspondichery;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class DistrictspondicheryController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('districtspondichery_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Districtspondichery::query()->select(sprintf('%s.*', (new Districtspondichery)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'districtspondichery_show';
                $editGate      = 'districtspondichery_edit';
                $deleteGate    = 'districtspondichery_delete';
                $crudRoutePart = 'districtspondicheries';

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

        return view('admin.districtspondicheries.index');
    }

    public function create()
    {
        abort_if(Gate::denies('districtspondichery_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.districtspondicheries.create');
    }

    public function store(StoreDistrictspondicheryRequest $request)
    {
        $districtspondichery = Districtspondichery::create($request->all());

        return redirect()->route('admin.districtspondicheries.index');
    }

    public function edit(Districtspondichery $districtspondichery)
    {
        abort_if(Gate::denies('districtspondichery_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.districtspondicheries.edit', compact('districtspondichery'));
    }

    public function update(UpdateDistrictspondicheryRequest $request, Districtspondichery $districtspondichery)
    {
        $districtspondichery->update($request->all());

        return redirect()->route('admin.districtspondicheries.index');
    }

    public function show(Districtspondichery $districtspondichery)
    {
        abort_if(Gate::denies('districtspondichery_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.districtspondicheries.show', compact('districtspondichery'));
    }

    public function destroy(Districtspondichery $districtspondichery)
    {
        abort_if(Gate::denies('districtspondichery_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $districtspondichery->delete();

        return back();
    }

    public function massDestroy(MassDestroyDistrictspondicheryRequest $request)
    {
        Districtspondichery::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
