<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyVendorRequest;
use App\Http\Requests\StoreVendorRequest;
use App\Http\Requests\UpdateVendorRequest;
use App\Models\User;
use App\Models\Vendor;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class VendorController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('vendor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vendors = Vendor::with(['user'])->get();

        return view('admin.vendors.index', compact('vendors'));
    }

    public function create()
    {
        abort_if(Gate::denies('vendor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.vendors.create', compact('users'));
    }

    public function store(StoreVendorRequest $request)
    {
        $vendor = Vendor::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $vendor->id]);
        }

        return redirect()->route('admin.vendors.index');
    }

    public function edit(Vendor $vendor)
    {
        abort_if(Gate::denies('vendor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $vendor->load('user');

        return view('admin.vendors.edit', compact('users', 'vendor'));
    }

    public function update(UpdateVendorRequest $request, Vendor $vendor)
    {
        $vendor->update($request->all());

        return redirect()->route('admin.vendors.index');
    }

    public function show(Vendor $vendor)
    {
        abort_if(Gate::denies('vendor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vendor->load('user');

        return view('admin.vendors.show', compact('vendor'));
    }

    public function destroy(Vendor $vendor)
    {
        abort_if(Gate::denies('vendor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vendor->delete();

        return back();
    }

    public function massDestroy(MassDestroyVendorRequest $request)
    {
        $vendors = Vendor::find(request('ids'));

        foreach ($vendors as $vendor) {
            $vendor->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('vendor_create') && Gate::denies('vendor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Vendor();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
