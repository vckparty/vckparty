<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPondicheryapplicationRequest;
use App\Http\Requests\StorePondicheryapplicationRequest;
use App\Http\Requests\UpdatePondicheryapplicationRequest;
use App\Models\CategoryPondichery;
use App\Models\Districtspondichery;
use App\Models\Pondicheryapplication;
use App\Models\Pondicheryassembly;
use App\Models\SubcategoryPondichery;
use App\Models\Subsubcategory;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PondicheryapplicationsController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('pondicheryapplication_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Pondicheryapplication::with(['categorypondichery', 'subcategorypondichery', 'subsubcategory', 'districtspondichery', 'pondicheryassemblys'])->select(sprintf('%s.*', (new Pondicheryapplication)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'pondicheryapplication_show';
                $editGate      = 'pondicheryapplication_edit';
                $deleteGate    = 'pondicheryapplication_delete';
                $crudRoutePart = 'pondicheryapplications';

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
            $table->addColumn('subsubcategory_name', function ($row) {
                return $row->subsubcategory ? $row->subsubcategory->name : '';
            });

            $table->addColumn('districtspondichery_name', function ($row) {
                return $row->districtspondichery ? $row->districtspondichery->name : '';
            });

            $table->addColumn('pondicheryassemblys_name', function ($row) {
                return $row->pondicheryassemblys ? $row->pondicheryassemblys->name : '';
            });

            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : "";
            });
            $table->editColumn('current_post', function ($row) {
                return $row->current_post ? $row->current_post : "";
            });

            $table->editColumn('profession', function ($row) {
                return $row->profession ? $row->profession : "";
            });
            $table->editColumn('join_date', function ($row) {
                return $row->join_date ? $row->join_date : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'subsubcategory', 'districtspondichery', 'pondicheryassemblys']);

            return $table->make(true);
        }

        return view('admin.pondicheryapplications.index');
    }

    public function create()
    {
        abort_if(Gate::denies('pondicheryapplication_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categorypondicheries = CategoryPondichery::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $subcategorypondicheries = SubcategoryPondichery::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $subsubcategories = Subsubcategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $districtspondicheries = Districtspondichery::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pondicheryassemblys = Pondicheryassembly::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.pondicheryapplications.create', compact('categorypondicheries', 'subcategorypondicheries', 'subsubcategories', 'districtspondicheries', 'pondicheryassemblys'));
    }

    public function store(StorePondicheryapplicationRequest $request)
    {
        $pondicheryapplication = Pondicheryapplication::create($request->all());

        if ($request->input('photo', false)) {
            $pondicheryapplication->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        foreach ($request->input('payment_receipt', []) as $file) {
            $pondicheryapplication->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('payment_receipt');
        }

        foreach ($request->input('documents', []) as $file) {
            $pondicheryapplication->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('documents');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $pondicheryapplication->id]);
        }

        return redirect()->route('admin.pondicheryapplications.index');
    }

    public function edit(Pondicheryapplication $pondicheryapplication)
    {
        abort_if(Gate::denies('pondicheryapplication_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categorypondicheries = CategoryPondichery::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $subcategorypondicheries = SubcategoryPondichery::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $subsubcategories = Subsubcategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $districtspondicheries = Districtspondichery::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pondicheryassemblys = Pondicheryassembly::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pondicheryapplication->load('categorypondichery', 'subcategorypondichery', 'subsubcategory', 'districtspondichery', 'pondicheryassemblys');

        return view('admin.pondicheryapplications.edit', compact('categorypondicheries', 'subcategorypondicheries', 'subsubcategories', 'districtspondicheries', 'pondicheryassemblys', 'pondicheryapplication'));
    }

    public function update(UpdatePondicheryapplicationRequest $request, Pondicheryapplication $pondicheryapplication)
    {
        $pondicheryapplication->update($request->all());

        if ($request->input('photo', false)) {
            if (!$pondicheryapplication->photo || $request->input('photo') !== $pondicheryapplication->photo->file_name) {
                if ($pondicheryapplication->photo) {
                    $pondicheryapplication->photo->delete();
                }

                $pondicheryapplication->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($pondicheryapplication->photo) {
            $pondicheryapplication->photo->delete();
        }

        if (count($pondicheryapplication->payment_receipt) > 0) {
            foreach ($pondicheryapplication->payment_receipt as $media) {
                if (!in_array($media->file_name, $request->input('payment_receipt', []))) {
                    $media->delete();
                }
            }
        }

        $media = $pondicheryapplication->payment_receipt->pluck('file_name')->toArray();

        foreach ($request->input('payment_receipt', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $pondicheryapplication->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('payment_receipt');
            }
        }

        if (count($pondicheryapplication->documents) > 0) {
            foreach ($pondicheryapplication->documents as $media) {
                if (!in_array($media->file_name, $request->input('documents', []))) {
                    $media->delete();
                }
            }
        }

        $media = $pondicheryapplication->documents->pluck('file_name')->toArray();

        foreach ($request->input('documents', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $pondicheryapplication->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('documents');
            }
        }

        return redirect()->route('admin.pondicheryapplications.index');
    }

    public function show(Pondicheryapplication $pondicheryapplication)
    {
        abort_if(Gate::denies('pondicheryapplication_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pondicheryapplication->load('categorypondichery', 'subcategorypondichery', 'subsubcategory', 'districtspondichery', 'pondicheryassemblys');

        return view('admin.pondicheryapplications.show', compact('pondicheryapplication'));
    }

    public function destroy(Pondicheryapplication $pondicheryapplication)
    {
        abort_if(Gate::denies('pondicheryapplication_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pondicheryapplication->delete();

        return back();
    }

    public function massDestroy(MassDestroyPondicheryapplicationRequest $request)
    {
        Pondicheryapplication::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('pondicheryapplication_create') && Gate::denies('pondicheryapplication_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Pondicheryapplication();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
