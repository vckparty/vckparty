<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPostingRequest;
use App\Http\Requests\StorePostingRequest;
use App\Http\Requests\UpdatePostingRequest;
use App\Models\Area;
use App\Models\Assembly;
use App\Models\Block;
use App\Models\Category;
use App\Models\District;
use App\Models\Metropolitan;
use App\Models\Metrovattam;
use App\Models\Municipality;
use App\Models\Municipalityvattam;
use App\Models\Panchayat;
use App\Models\Post;
use App\Models\Posting;
use App\Models\Subsubcategory;
use App\Models\Townpanchayat;
use App\Models\Townvattam;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PostingsController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('posting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Posting::with(['category', 'subcategory', 'posts', 'district', 'block', 'panchayat', 'townpanchayat', 'townvattam', 'municipality', 'municipalityvattam', 'metropolitan', 'area', 'metrovattam', 'assemblys'])->select(sprintf('%s.*', (new Posting)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'posting_show';
                $editGate      = 'posting_edit';
                $deleteGate    = 'posting_delete';
                $crudRoutePart = 'postings';

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
            $table->addColumn('posts_name', function ($row) {
                return $row->posts ? $row->posts->name : '';
            });

            $table->addColumn('district_name', function ($row) {
                return $row->district ? $row->district->name : '';
            });

            $table->addColumn('assemblys_name', function ($row) {
                return $row->assemblys ? $row->assemblys->name : '';
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

            $table->rawColumns(['actions', 'placeholder', 'posts', 'district', 'assemblys']);

            return $table->make(true);
        }

        return view('admin.postings.index');
    }

    public function create()
    {
        abort_if(Gate::denies('posting_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $subcategories = Subsubcategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $posts = Post::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $districts = District::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $blocks = Block::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $panchayats = Panchayat::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $townpanchayats = Townpanchayat::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $townvattams = Townvattam::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $municipalities = Municipality::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $municipalityvattams = Municipalityvattam::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $metropolitans = Metropolitan::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $areas = Area::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $metrovattams = Metrovattam::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $assemblys = Assembly::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.postings.create', compact('categories', 'subcategories', 'posts', 'districts', 'blocks', 'panchayats', 'townpanchayats', 'townvattams', 'municipalities', 'municipalityvattams', 'metropolitans', 'areas', 'metrovattams', 'assemblys'));
    }

    public function store(StorePostingRequest $request)
    {
        $posting = Posting::create($request->all());

        if ($request->input('photo', false)) {
            $posting->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $posting->id]);
        }

        return redirect()->route('admin.postings.index');
    }

    public function edit(Posting $posting)
    {
        abort_if(Gate::denies('posting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $subcategories = Subsubcategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $posts = Post::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $districts = District::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $blocks = Block::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $panchayats = Panchayat::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $townpanchayats = Townpanchayat::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $townvattams = Townvattam::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $municipalities = Municipality::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $municipalityvattams = Municipalityvattam::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $metropolitans = Metropolitan::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $areas = Area::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $metrovattams = Metrovattam::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $assemblys = Assembly::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $posting->load('category', 'subcategory', 'posts', 'district', 'block', 'panchayat', 'townpanchayat', 'townvattam', 'municipality', 'municipalityvattam', 'metropolitan', 'area', 'metrovattam', 'assemblys');

        return view('admin.postings.edit', compact('categories', 'subcategories', 'posts', 'districts', 'blocks', 'panchayats', 'townpanchayats', 'townvattams', 'municipalities', 'municipalityvattams', 'metropolitans', 'areas', 'metrovattams', 'assemblys', 'posting'));
    }

    public function update(UpdatePostingRequest $request, Posting $posting)
    {
        $posting->update($request->all());

        if ($request->input('photo', false)) {
            if (!$posting->photo || $request->input('photo') !== $posting->photo->file_name) {
                if ($posting->photo) {
                    $posting->photo->delete();
                }

                $posting->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($posting->photo) {
            $posting->photo->delete();
        }

        return redirect()->route('admin.postings.index');
    }

    public function show(Posting $posting)
    {
        abort_if(Gate::denies('posting_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $posting->load('category', 'subcategory', 'posts', 'district', 'block', 'panchayat', 'townpanchayat', 'townvattam', 'municipality', 'municipalityvattam', 'metropolitan', 'area', 'metrovattam', 'assemblys');

        return view('admin.postings.show', compact('posting'));
    }

    public function destroy(Posting $posting)
    {
        abort_if(Gate::denies('posting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $posting->delete();

        return back();
    }

    public function massDestroy(MassDestroyPostingRequest $request)
    {
        Posting::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('posting_create') && Gate::denies('posting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Posting();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
