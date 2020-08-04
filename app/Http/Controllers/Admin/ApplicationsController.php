<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyApplicationRequest;
use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;
use App\Models\Application;
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
use App\Models\Subcategory;
use App\Models\Townpanchayat;
use App\Models\Townvattam;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ApplicationsController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('application_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Application::with(['category', 'subcategory', 'applying_post', 'district', 'block', 'panchayat', 'townpanchayat', 'townvattam', 'municipality', 'municipalityvattam', 'metropolitan', 'area', 'metrovattam', 'assemblys'])->select(sprintf('%s.*', (new Application)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'application_show';
                $editGate      = 'application_edit';
                $deleteGate    = 'application_delete';
                $crudRoutePart = 'applications';

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
            $table->addColumn('category_name', function ($row) {
                return $row->category ? $row->category->name : '';
            });

            $table->addColumn('subcategory_name', function ($row) {
                return $row->subcategory ? $row->subcategory->name : '';
            });

            $table->addColumn('applying_post_name', function ($row) {
                return $row->applying_post ? $row->applying_post->name : '';
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
            $table->editColumn('current_post', function ($row) {
                return $row->current_post ? $row->current_post : "";
            });

            $table->editColumn('profession', function ($row) {
                return $row->profession ? $row->profession : "";
            });
            $table->editColumn('join_date', function ($row) {
                return $row->join_date ? $row->join_date : "";
            });

            $table->rawColumns(['actions', 'placeholder', 'category', 'subcategory', 'applying_post', 'district', 'assemblys']);

            return $table->make(true);
        }

        return view('admin.applications.index');
    }

    public function create()
    {
        abort_if(Gate::denies('application_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $subcategories = Subcategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $applying_posts = Post::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

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

        return view('admin.applications.create', compact('categories', 'subcategories', 'applying_posts', 'districts', 'blocks', 'panchayats', 'townpanchayats', 'townvattams', 'municipalities', 'municipalityvattams', 'metropolitans', 'areas', 'metrovattams', 'assemblys'));
    }

    public function store(StoreApplicationRequest $request)
    {
        $application = Application::create($request->all());

        if ($request->input('photo', false)) {
            $application->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        foreach ($request->input('payment_receipt', []) as $file) {
            $application->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('payment_receipt');
        }

        foreach ($request->input('documents', []) as $file) {
            $application->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('documents');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $application->id]);
        }

        return redirect()->route('admin.applications.index');
    }

    public function edit(Application $application)
    {
        abort_if(Gate::denies('application_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $subcategories = Subcategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $applying_posts = Post::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

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

        $application->load('category', 'subcategory', 'applying_post', 'district', 'block', 'panchayat', 'townpanchayat', 'townvattam', 'municipality', 'municipalityvattam', 'metropolitan', 'area', 'metrovattam', 'assemblys');

        return view('admin.applications.edit', compact('categories', 'subcategories', 'applying_posts', 'districts', 'blocks', 'panchayats', 'townpanchayats', 'townvattams', 'municipalities', 'municipalityvattams', 'metropolitans', 'areas', 'metrovattams', 'assemblys', 'application'));
    }

    public function update(UpdateApplicationRequest $request, Application $application)
    {
        $application->update($request->all());

        if ($request->input('photo', false)) {
            if (!$application->photo || $request->input('photo') !== $application->photo->file_name) {
                if ($application->photo) {
                    $application->photo->delete();
                }

                $application->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
            }
        } elseif ($application->photo) {
            $application->photo->delete();
        }

        if (count($application->payment_receipt) > 0) {
            foreach ($application->payment_receipt as $media) {
                if (!in_array($media->file_name, $request->input('payment_receipt', []))) {
                    $media->delete();
                }
            }
        }

        $media = $application->payment_receipt->pluck('file_name')->toArray();

        foreach ($request->input('payment_receipt', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $application->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('payment_receipt');
            }
        }

        if (count($application->documents) > 0) {
            foreach ($application->documents as $media) {
                if (!in_array($media->file_name, $request->input('documents', []))) {
                    $media->delete();
                }
            }
        }

        $media = $application->documents->pluck('file_name')->toArray();

        foreach ($request->input('documents', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $application->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('documents');
            }
        }

        return redirect()->route('admin.applications.index');
    }

    public function show(Application $application)
    {
        abort_if(Gate::denies('application_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $application->load('category', 'subcategory', 'applying_post', 'district', 'block', 'panchayat', 'townpanchayat', 'townvattam', 'municipality', 'municipalityvattam', 'metropolitan', 'area', 'metrovattam', 'assemblys');

        return view('admin.applications.show', compact('application'));
    }

    public function destroy(Application $application)
    {
        abort_if(Gate::denies('application_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $application->delete();

        return back();
    }

    public function massDestroy(MassDestroyApplicationRequest $request)
    {
        Application::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('application_create') && Gate::denies('application_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Application();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
