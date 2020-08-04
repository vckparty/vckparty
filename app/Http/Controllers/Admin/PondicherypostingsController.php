<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPondicherypostingRequest;
use App\Http\Requests\StorePondicherypostingRequest;
use App\Http\Requests\UpdatePondicherypostingRequest;
use App\Models\CategoryPondichery;
use App\Models\Districtspondichery;
use App\Models\Pondicheryassembly;
use App\Models\Pondicheryposting;
use App\Models\SubcategoryPondichery;
use App\Models\Subsubcategory;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PondicherypostingsController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('pondicheryposting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Pondicheryposting::with(['categorypondichery', 'subcategorypondichery', 'subsubcategory', 'districtspondichery', 'pondicheryassembly'])->select(sprintf('%s.*', (new Pondicheryposting)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'pondicheryposting_show';
                $editGate      = 'pondicheryposting_edit';
                $deleteGate    = 'pondicheryposting_delete';
                $crudRoutePart = 'pondicherypostings';

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
            $table->addColumn('categorypondichery_name', function ($row) {
                return $row->categorypondichery ? $row->categorypondichery->name : '';
            });

            $table->addColumn('districtspondichery_name', function ($row) {
                return $row->districtspondichery ? $row->districtspondichery->name : '';
            });

            $table->addColumn('pondicheryassembly_name', function ($row) {
                return $row->pondicheryassembly ? $row->pondicheryassembly->name : '';
            });

            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : "";
            });

            $table->editColumn('profession', function ($row) {
                return $row->profession ? $row->profession : "";
            });
            $table->editColumn('join_date', function ($row) {
                return $row->join_date ? $row->join_date : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'categorypondichery', 'districtspondichery', 'pondicheryassembly']);

            return $table->make(true);
        }

        return view('admin.pondicherypostings.index');
    }

    public function create()
    {
        abort_if(Gate::denies('pondicheryposting_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categorypondicheries = CategoryPondichery::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $subcategorypondicheries = SubcategoryPondichery::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $subsubcategories = Subsubcategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $districtspondicheries = Districtspondichery::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pondicheryassemblies = Pondicheryassembly::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.pondicherypostings.create', compact('categorypondicheries', 'subcategorypondicheries', 'subsubcategories', 'districtspondicheries', 'pondicheryassemblies'));
    }

    public function store(StorePondicherypostingRequest $request)
    {
        $pondicheryposting = Pondicheryposting::create($request->all());

        if ($request->input('photo', false)) {
            $pondicheryposting->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $pondicheryposting->id]);
        }

        return redirect()->route('admin.pondicherypostings.index');
    }

    public function edit(Pondicheryposting $pondicheryposting)
    {
        abort_if(Gate::denies('pondicheryposting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categorypondicheries = CategoryPondichery::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $subcategorypondicheries = SubcategoryPondichery::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $subsubcategories = Subsubcategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $districtspondicheries = Districtspondichery::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pondicheryassemblies = Pondicheryassembly::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pondicheryposting->load('categorypondichery', 'subcategorypondichery', 'subsubcategory', 'districtspondichery', 'pondicheryassembly');

        return view('admin.pondicherypostings.edit', compact('categorypondicheries', 'subcategorypondicheries', 'subsubcategories', 'districtspondicheries', 'pondicheryassemblies', 'pondicheryposting'));
    }

    public function update(UpdatePondicherypostingRequest $request, Pondicheryposting $pondicheryposting)
    {
        $pondicheryposting->update($request->all());

        if ($request->input('photo', false)) {
            if (!$pondicheryposting->photo || $request->input('photo') !== $pondicheryposting->photo->file_name) {
                if ($pondicheryposting->photo) {
                    $pondicheryposting->photo->delete();
                }

                $pondicheryposting->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($pondicheryposting->photo) {
            $pondicheryposting->photo->delete();
        }

        return redirect()->route('admin.pondicherypostings.index');
    }

    public function show(Pondicheryposting $pondicheryposting)
    {
        abort_if(Gate::denies('pondicheryposting_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pondicheryposting->load('categorypondichery', 'subcategorypondichery', 'subsubcategory', 'districtspondichery', 'pondicheryassembly');

        return view('admin.pondicherypostings.show', compact('pondicheryposting'));
    }

    public function destroy(Pondicheryposting $pondicheryposting)
    {
        abort_if(Gate::denies('pondicheryposting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pondicheryposting->delete();

        return back();
    }

    public function massDestroy(MassDestroyPondicherypostingRequest $request)
    {
        Pondicheryposting::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('pondicheryposting_create') && Gate::denies('pondicheryposting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Pondicheryposting();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
