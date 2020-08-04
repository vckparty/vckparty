<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDistrictpostingRequest;
use App\Http\Requests\StoreDistrictpostingRequest;
use App\Http\Requests\UpdateDistrictpostingRequest;
use App\Models\Districtposting;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class DistrictpostingController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('districtposting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Districtposting::query()->select(sprintf('%s.*', (new Districtposting)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'districtposting_show';
                $editGate      = 'districtposting_edit';
                $deleteGate    = 'districtposting_delete';
                $crudRoutePart = 'districtpostings';

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
            $table->editColumn('applied_post', function ($row) {
                return $row->applied_post ? $row->applied_post : "";
            });
            $table->editColumn('current_post', function ($row) {
                return $row->current_post ? $row->current_post : "";
            });
            $table->editColumn('district', function ($row) {
                return $row->district ? $row->district : "";
            });
            $table->editColumn('assembly_name', function ($row) {
                return $row->assembly_name ? $row->assembly_name : "";
            });
            $table->editColumn('social_division', function ($row) {
                return $row->social_division ? $row->social_division : "";
            });
            $table->editColumn('education', function ($row) {
                return $row->education ? $row->education : "";
            });
            $table->editColumn('profession', function ($row) {
                return $row->profession ? $row->profession : "";
            });
            $table->editColumn('join_year', function ($row) {
                return $row->join_year ? $row->join_year : "";
            });
            $table->editColumn('selected', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->selected ? 'checked' : null) . '>';
            });
            $table->editColumn('selected_post', function ($row) {
                return $row->selected_post ? $row->selected_post : "";
            });
            $table->editColumn('notes', function ($row) {
                return $row->notes ? $row->notes : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'selected']);

            return $table->make(true);
        }

        return view('admin.districtpostings.index');
    }

    public function create()
    {
        abort_if(Gate::denies('districtposting_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.districtpostings.create');
    }

    public function store(StoreDistrictpostingRequest $request)
    {
        $districtposting = Districtposting::create($request->all());

        if ($request->input('photo', false)) {
            $districtposting->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        foreach ($request->input('documentation', []) as $file) {
            $districtposting->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('documentation');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $districtposting->id]);
        }

        return redirect()->route('admin.districtpostings.index');
    }

    public function edit(Districtposting $districtposting)
    {
        abort_if(Gate::denies('districtposting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.districtpostings.edit', compact('districtposting'));
    }

    public function update(UpdateDistrictpostingRequest $request, Districtposting $districtposting)
    {
        $districtposting->update($request->all());

        if ($request->input('photo', false)) {
            if (!$districtposting->photo || $request->input('photo') !== $districtposting->photo->file_name) {
                if ($districtposting->photo) {
                    $districtposting->photo->delete();
                }

                $districtposting->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($districtposting->photo) {
            $districtposting->photo->delete();
        }

        if (count($districtposting->documentation) > 0) {
            foreach ($districtposting->documentation as $media) {
                if (!in_array($media->file_name, $request->input('documentation', []))) {
                    $media->delete();
                }
            }
        }

        $media = $districtposting->documentation->pluck('file_name')->toArray();

        foreach ($request->input('documentation', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $districtposting->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('documentation');
            }
        }

        return redirect()->route('admin.districtpostings.index');
    }

    public function show(Districtposting $districtposting)
    {
        abort_if(Gate::denies('districtposting_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.districtpostings.show', compact('districtposting'));
    }

    public function destroy(Districtposting $districtposting)
    {
        abort_if(Gate::denies('districtposting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $districtposting->delete();

        return back();
    }

    public function massDestroy(MassDestroyDistrictpostingRequest $request)
    {
        Districtposting::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('districtposting_create') && Gate::denies('districtposting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Districtposting();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
