<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPondicheryassemblyRequest;
use App\Http\Requests\StorePondicheryassemblyRequest;
use App\Http\Requests\UpdatePondicheryassemblyRequest;
use App\Models\Pondicheryassembly;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PondicheryassemblysController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('pondicheryassembly_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Pondicheryassembly::query()->select(sprintf('%s.*', (new Pondicheryassembly)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'pondicheryassembly_show';
                $editGate      = 'pondicheryassembly_edit';
                $deleteGate    = 'pondicheryassembly_delete';
                $crudRoutePart = 'pondicheryassemblies';

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

        return view('admin.pondicheryassemblies.index');
    }

    public function create()
    {
        abort_if(Gate::denies('pondicheryassembly_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pondicheryassemblies.create');
    }

    public function store(StorePondicheryassemblyRequest $request)
    {
        $pondicheryassembly = Pondicheryassembly::create($request->all());

        return redirect()->route('admin.pondicheryassemblies.index');
    }

    public function edit(Pondicheryassembly $pondicheryassembly)
    {
        abort_if(Gate::denies('pondicheryassembly_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pondicheryassemblies.edit', compact('pondicheryassembly'));
    }

    public function update(UpdatePondicheryassemblyRequest $request, Pondicheryassembly $pondicheryassembly)
    {
        $pondicheryassembly->update($request->all());

        return redirect()->route('admin.pondicheryassemblies.index');
    }

    public function show(Pondicheryassembly $pondicheryassembly)
    {
        abort_if(Gate::denies('pondicheryassembly_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pondicheryassemblies.show', compact('pondicheryassembly'));
    }

    public function destroy(Pondicheryassembly $pondicheryassembly)
    {
        abort_if(Gate::denies('pondicheryassembly_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pondicheryassembly->delete();

        return back();
    }

    public function massDestroy(MassDestroyPondicheryassemblyRequest $request)
    {
        Pondicheryassembly::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
