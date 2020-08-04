<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StorePondicheryapplicationRequest;
use App\Http\Requests\UpdatePondicheryapplicationRequest;
use App\Http\Resources\Admin\PondicheryapplicationResource;
use App\Models\Pondicheryapplication;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PondicheryapplicationsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('pondicheryapplication_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PondicheryapplicationResource(Pondicheryapplication::with(['categorypondichery', 'subcategorypondichery', 'subsubcategory', 'districtspondichery', 'pondicheryassemblys'])->get());
    }

    public function store(StorePondicheryapplicationRequest $request)
    {
        $pondicheryapplication = Pondicheryapplication::create($request->all());

        if ($request->input('photo', false)) {
            $pondicheryapplication->addMedia(storage_path('tmp/uploads/' . $request->input('photo')))->toMediaCollection('photo');
        }

        if ($request->input('payment_receipt', false)) {
            $pondicheryapplication->addMedia(storage_path('tmp/uploads/' . $request->input('payment_receipt')))->toMediaCollection('payment_receipt');
        }

        if ($request->input('documents', false)) {
            $pondicheryapplication->addMedia(storage_path('tmp/uploads/' . $request->input('documents')))->toMediaCollection('documents');
        }

        return (new PondicheryapplicationResource($pondicheryapplication))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Pondicheryapplication $pondicheryapplication)
    {
        abort_if(Gate::denies('pondicheryapplication_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PondicheryapplicationResource($pondicheryapplication->load(['categorypondichery', 'subcategorypondichery', 'subsubcategory', 'districtspondichery', 'pondicheryassemblys']));
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

        if ($request->input('payment_receipt', false)) {
            if (!$pondicheryapplication->payment_receipt || $request->input('payment_receipt') !== $pondicheryapplication->payment_receipt->file_name) {
                if ($pondicheryapplication->payment_receipt) {
                    $pondicheryapplication->payment_receipt->delete();
                }

                $pondicheryapplication->addMedia(storage_path('tmp/uploads/' . $request->input('payment_receipt')))->toMediaCollection('payment_receipt');
            }
        } elseif ($pondicheryapplication->payment_receipt) {
            $pondicheryapplication->payment_receipt->delete();
        }

        if ($request->input('documents', false)) {
            if (!$pondicheryapplication->documents || $request->input('documents') !== $pondicheryapplication->documents->file_name) {
                if ($pondicheryapplication->documents) {
                    $pondicheryapplication->documents->delete();
                }

                $pondicheryapplication->addMedia(storage_path('tmp/uploads/' . $request->input('documents')))->toMediaCollection('documents');
            }
        } elseif ($pondicheryapplication->documents) {
            $pondicheryapplication->documents->delete();
        }

        return (new PondicheryapplicationResource($pondicheryapplication))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Pondicheryapplication $pondicheryapplication)
    {
        abort_if(Gate::denies('pondicheryapplication_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pondicheryapplication->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
