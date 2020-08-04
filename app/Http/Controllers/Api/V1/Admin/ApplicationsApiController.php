<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;
use App\Http\Resources\Admin\ApplicationResource;
use App\Models\Application;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApplicationsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('application_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ApplicationResource(Application::with(['category', 'subcategory', 'applying_post', 'district', 'block', 'panchayat', 'townpanchayat', 'townvattam', 'municipality', 'municipalityvattam', 'metropolitan', 'area', 'metrovattam', 'assemblys'])->get());
    }

    public function store(StoreApplicationRequest $request)
    {
        $application = Application::create($request->all());

        if ($request->input('photo', false)) {
            $application->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        if ($request->input('payment_receipt', false)) {
            $application->addMedia(storage_path('tmp/uploads/' . $request->input('payment_receipt')))->toMediaCollection('payment_receipt');
        }

        if ($request->input('documents', false)) {
            $application->addMedia(storage_path('tmp/uploads/' . $request->input('documents')))->toMediaCollection('documents');
        }

        return (new ApplicationResource($application))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Application $application)
    {
        abort_if(Gate::denies('application_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ApplicationResource($application->load(['category', 'subcategory', 'applying_post', 'district', 'block', 'panchayat', 'townpanchayat', 'townvattam', 'municipality', 'municipalityvattam', 'metropolitan', 'area', 'metrovattam', 'assemblys']));
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

        if ($request->input('payment_receipt', false)) {
            if (!$application->payment_receipt || $request->input('payment_receipt') !== $application->payment_receipt->file_name) {
                if ($application->payment_receipt) {
                    $application->payment_receipt->delete();
                }

                $application->addMedia(storage_path('tmp/uploads/' . $request->input('payment_receipt')))->toMediaCollection('payment_receipt');
            }
        } elseif ($application->payment_receipt) {
            $application->payment_receipt->delete();
        }

        if ($request->input('documents', false)) {
            if (!$application->documents || $request->input('documents') !== $application->documents->file_name) {
                if ($application->documents) {
                    $application->documents->delete();
                }

                $application->addMedia(storage_path('tmp/uploads/' . $request->input('documents')))->toMediaCollection('documents');
            }
        } elseif ($application->documents) {
            $application->documents->delete();
        }

        return (new ApplicationResource($application))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Application $application)
    {
        abort_if(Gate::denies('application_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $application->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
