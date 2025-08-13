<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOrderItemRequest;
use App\Http\Requests\StoreOrderItemRequest;
use App\Http\Requests\UpdateOrderItemRequest;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Vendor;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderItemController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('order_item_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orderItems = OrderItem::with(['order', 'vendor', 'product'])->get();

        return view('admin.orderItems.index', compact('orderItems'));
    }

    public function create()
    {
        abort_if(Gate::denies('order_item_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orders = Order::pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $vendors = Vendor::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.orderItems.create', compact('orders', 'products', 'vendors'));
    }

    public function store(StoreOrderItemRequest $request)
    {
        $orderItem = OrderItem::create($request->all());

        return redirect()->route('admin.order-items.index');
    }

    public function edit(OrderItem $orderItem)
    {
        abort_if(Gate::denies('order_item_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orders = Order::pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $vendors = Vendor::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $orderItem->load('order', 'vendor', 'product');

        return view('admin.orderItems.edit', compact('orderItem', 'orders', 'products', 'vendors'));
    }

    public function update(UpdateOrderItemRequest $request, OrderItem $orderItem)
    {
        $orderItem->update($request->all());

        return redirect()->route('admin.order-items.index');
    }

    public function show(OrderItem $orderItem)
    {
        abort_if(Gate::denies('order_item_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orderItem->load('order', 'vendor', 'product');

        return view('admin.orderItems.show', compact('orderItem'));
    }

    public function destroy(OrderItem $orderItem)
    {
        abort_if(Gate::denies('order_item_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orderItem->delete();

        return back();
    }

    public function massDestroy(MassDestroyOrderItemRequest $request)
    {
        $orderItems = OrderItem::find(request('ids'));

        foreach ($orderItems as $orderItem) {
            $orderItem->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
