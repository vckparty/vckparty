<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StorePondicherypostingRequest;
use App\Http\Requests\UpdatePondicherypostingRequest;
use App\Http\Resources\Admin\PondicherypostingResource;
use App\Models\Pondicheryposting;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PondicherypostingsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('pondicheryposting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PondicherypostingResource(Pondicheryposting::with(['categorypondichery', 'subcategorypondichery', 'subsubcategory', 'districtspondichery', 'pondicheryassembly'])->get());
    }

    public function store(StorePondicherypostingRequest $request)
    {
        $pondicheryposting = Pondicheryposting::create($request->all());

        if ($request->input('photo', false)) {
            $pondicheryposting->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        return (new PondicherypostingResource($pondicheryposting))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Pondicheryposting $pondicheryposting)
    {
        abort_if(Gate::denies('pondicheryposting_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PondicherypostingResource($pondicheryposting->load(['categorypondichery', 'subcategorypondichery', 'subsubcategory', 'districtspondichery', 'pondicheryassembly']));
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

        return (new PondicherypostingResource($pondicheryposting))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Pondicheryposting $pondicheryposting)
    {
        abort_if(Gate::denies('pondicheryposting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pondicheryposting->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
