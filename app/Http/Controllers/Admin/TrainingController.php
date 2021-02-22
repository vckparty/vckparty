<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyTrainingRequest;
use App\Http\Requests\StoreTrainingRequest;
use App\Http\Requests\UpdateTrainingRequest;
use App\Models\Training;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class TrainingController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('training_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Training::query()->select(sprintf('%s.*', (new Training)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'training_show';
                $editGate      = 'training_edit';
                $deleteGate    = 'training_delete';
                $crudRoutePart = 'trainings';

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
            $table->editColumn('district', function ($row) {
                return $row->district ? $row->district : "";
            });
            $table->editColumn('assembly', function ($row) {
                return $row->assembly ? $row->assembly : "";
            });

            $table->editColumn('father_name', function ($row) {
                return $row->father_name ? $row->father_name : "";
            });
            $table->editColumn('gender', function ($row) {
                return $row->gender ? Training::GENDER_RADIO[$row->gender] : '';
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : "";
            });
            $table->editColumn('facebook', function ($row) {
                return $row->facebook ? $row->facebook : "";
            });
            $table->editColumn('twitter', function ($row) {
                return $row->twitter ? $row->twitter : "";
            });
            $table->editColumn('whatsapp_number', function ($row) {
                return $row->whatsapp_number ? $row->whatsapp_number : "";
            });
            $table->editColumn('youtube_channel', function ($row) {
                return $row->youtube_channel ? $row->youtube_channel : "";
            });
            $table->editColumn('instagram', function ($row) {
                return $row->instagram ? $row->instagram : "";
            });
            $table->editColumn('interested_in', function ($row) {
                return $row->interested_in ? Training::INTERESTED_IN_SELECT[$row->interested_in] : '';
            });
            $table->editColumn('education', function ($row) {
                return $row->education ? $row->education : "";
            });
            $table->editColumn('profession', function ($row) {
                return $row->profession ? $row->profession : "";
            });
            $table->editColumn('address', function ($row) {
                return $row->address ? $row->address : "";
            });
            $table->editColumn('photo', function ($row) {
                if ($photo = $row->photo) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });

            $table->rawColumns(['actions', 'placeholder', 'photo']);

            return $table->make(true);
        }

        return view('admin.trainings.index');
    }

    public function create()
    {
        abort_if(Gate::denies('training_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.trainings.create');
    }

    public function store(StoreTrainingRequest $request)
    {
        $training = Training::create($request->all());

        if ($request->input('photo', false)) {
            $training->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $training->id]);
        }

        return redirect()->route('admin.trainings.index');
    }

    public function edit(Training $training)
    {
        abort_if(Gate::denies('training_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.trainings.edit', compact('training'));
    }

    public function update(UpdateTrainingRequest $request, Training $training)
    {
        $training->update($request->all());

        if ($request->input('photo', false)) {
            if (!$training->photo || $request->input('photo') !== $training->photo->file_name) {
                if ($training->photo) {
                    $training->photo->delete();
                }

                $training->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($training->photo) {
            $training->photo->delete();
        }

        return redirect()->route('admin.trainings.index');
    }

    public function show(Training $training)
    {
        abort_if(Gate::denies('training_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.trainings.show', compact('training'));
    }

    public function destroy(Training $training)
    {
        abort_if(Gate::denies('training_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $training->delete();

        return back();
    }

    public function massDestroy(MassDestroyTrainingRequest $request)
    {
        Training::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('training_create') && Gate::denies('training_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Training();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
