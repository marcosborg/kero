<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyShipmentRequest;
use App\Http\Requests\StoreShipmentRequest;
use App\Http\Requests\UpdateShipmentRequest;
use App\Models\Order;
use App\Models\Shipment;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ShipmentController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('shipment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shipments = Shipment::with(['order'])->get();

        return view('admin.shipments.index', compact('shipments'));
    }

    public function create()
    {
        abort_if(Gate::denies('shipment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orders = Order::pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.shipments.create', compact('orders'));
    }

    public function store(StoreShipmentRequest $request)
    {
        $shipment = Shipment::create($request->all());

        return redirect()->route('admin.shipments.index');
    }

    public function edit(Shipment $shipment)
    {
        abort_if(Gate::denies('shipment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orders = Order::pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $shipment->load('order');

        return view('admin.shipments.edit', compact('orders', 'shipment'));
    }

    public function update(UpdateShipmentRequest $request, Shipment $shipment)
    {
        $shipment->update($request->all());

        return redirect()->route('admin.shipments.index');
    }

    public function show(Shipment $shipment)
    {
        abort_if(Gate::denies('shipment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shipment->load('order');

        return view('admin.shipments.show', compact('shipment'));
    }

    public function destroy(Shipment $shipment)
    {
        abort_if(Gate::denies('shipment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shipment->delete();

        return back();
    }

    public function massDestroy(MassDestroyShipmentRequest $request)
    {
        $shipments = Shipment::find(request('ids'));

        foreach ($shipments as $shipment) {
            $shipment->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
