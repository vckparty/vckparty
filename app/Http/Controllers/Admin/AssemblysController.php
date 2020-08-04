<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAssemblyRequest;
use App\Http\Requests\StoreAssemblyRequest;
use App\Http\Requests\UpdateAssemblyRequest;
use App\Models\Assembly;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AssemblysController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('assembly_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Assembly::query()->select(sprintf('%s.*', (new Assembly)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'assembly_show';
                $editGate      = 'assembly_edit';
                $deleteGate    = 'assembly_delete';
                $crudRoutePart = 'assemblies';

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

        return view('admin.assemblies.index');
    }

    public function create()
    {
        abort_if(Gate::denies('assembly_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.assemblies.create');
    }

    public function store(StoreAssemblyRequest $request)
    {
        $assembly = Assembly::create($request->all());

        return redirect()->route('admin.assemblies.index');
    }

    public function edit(Assembly $assembly)
    {
        abort_if(Gate::denies('assembly_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.assemblies.edit', compact('assembly'));
    }

    public function update(UpdateAssemblyRequest $request, Assembly $assembly)
    {
        $assembly->update($request->all());

        return redirect()->route('admin.assemblies.index');
    }

    public function show(Assembly $assembly)
    {
        abort_if(Gate::denies('assembly_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.assemblies.show', compact('assembly'));
    }

    public function destroy(Assembly $assembly)
    {
        abort_if(Gate::denies('assembly_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assembly->delete();

        return back();
    }

    public function massDestroy(MassDestroyAssemblyRequest $request)
    {
        Assembly::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
