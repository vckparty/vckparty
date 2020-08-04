<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreDistrictpostingRequest;
use App\Http\Requests\UpdateDistrictpostingRequest;
use App\Http\Resources\Admin\DistrictpostingResource;
use App\Models\Districtposting;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DistrictpostingApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('districtposting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DistrictpostingResource(Districtposting::all());
    }

    public function store(StoreDistrictpostingRequest $request)
    {
        $districtposting = Districtposting::create($request->all());

        if ($request->input('photo', false)) {
            $districtposting->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        if ($request->input('documentation', false)) {
            $districtposting->addMedia(storage_path('tmp/uploads/' . $request->input('documentation')))->toMediaCollection('documentation');
        }

        return (new DistrictpostingResource($districtposting))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Districtposting $districtposting)
    {
        abort_if(Gate::denies('districtposting_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DistrictpostingResource($districtposting);
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

        if ($request->input('documentation', false)) {
            if (!$districtposting->documentation || $request->input('documentation') !== $districtposting->documentation->file_name) {
                if ($districtposting->documentation) {
                    $districtposting->documentation->delete();
                }

                $districtposting->addMedia(storage_path('tmp/uploads/' . $request->input('documentation')))->toMediaCollection('documentation');
            }
        } elseif ($districtposting->documentation) {
            $districtposting->documentation->delete();
        }

        return (new DistrictpostingResource($districtposting))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Districtposting $districtposting)
    {
        abort_if(Gate::denies('districtposting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $districtposting->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
