<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StorePostingRequest;
use App\Http\Requests\UpdatePostingRequest;
use App\Http\Resources\Admin\PostingResource;
use App\Models\Posting;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PostingsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('posting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PostingResource(Posting::with(['category', 'subcategory', 'posts', 'district', 'block', 'panchayat', 'townpanchayat', 'townvattam', 'municipality', 'municipalityvattam', 'metropolitan', 'area', 'metrovattam', 'assemblys'])->get());
    }

    public function store(StorePostingRequest $request)
    {
        $posting = Posting::create($request->all());

        if ($request->input('photo', false)) {
            $posting->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        return (new PostingResource($posting))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Posting $posting)
    {
        abort_if(Gate::denies('posting_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PostingResource($posting->load(['category', 'subcategory', 'posts', 'district', 'block', 'panchayat', 'townpanchayat', 'townvattam', 'municipality', 'municipalityvattam', 'metropolitan', 'area', 'metrovattam', 'assemblys']));
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

        return (new PostingResource($posting))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Posting $posting)
    {
        abort_if(Gate::denies('posting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $posting->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
