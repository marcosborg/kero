<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRefundRequest;
use App\Http\Requests\StoreRefundRequest;
use App\Http\Requests\UpdateRefundRequest;
use App\Models\Order;
use App\Models\Refund;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RefundController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('refund_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $refunds = Refund::with(['order'])->get();

        return view('admin.refunds.index', compact('refunds'));
    }

    public function create()
    {
        abort_if(Gate::denies('refund_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orders = Order::pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.refunds.create', compact('orders'));
    }

    public function store(StoreRefundRequest $request)
    {
        $refund = Refund::create($request->all());

        return redirect()->route('admin.refunds.index');
    }

    public function edit(Refund $refund)
    {
        abort_if(Gate::denies('refund_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orders = Order::pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $refund->load('order');

        return view('admin.refunds.edit', compact('orders', 'refund'));
    }

    public function update(UpdateRefundRequest $request, Refund $refund)
    {
        $refund->update($request->all());

        return redirect()->route('admin.refunds.index');
    }

    public function show(Refund $refund)
    {
        abort_if(Gate::denies('refund_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $refund->load('order');

        return view('admin.refunds.show', compact('refund'));
    }

    public function destroy(Refund $refund)
    {
        abort_if(Gate::denies('refund_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $refund->delete();

        return back();
    }

    public function massDestroy(MassDestroyRefundRequest $request)
    {
        $refunds = Refund::find(request('ids'));

        foreach ($refunds as $refund) {
            $refund->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
