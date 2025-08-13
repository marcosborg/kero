<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPayoutRequest;
use App\Http\Requests\StorePayoutRequest;
use App\Http\Requests\UpdatePayoutRequest;
use App\Models\Payout;
use App\Models\Vendor;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PayoutController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('payout_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $payouts = Payout::with(['vendor'])->get();

        return view('admin.payouts.index', compact('payouts'));
    }

    public function create()
    {
        abort_if(Gate::denies('payout_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vendors = Vendor::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.payouts.create', compact('vendors'));
    }

    public function store(StorePayoutRequest $request)
    {
        $payout = Payout::create($request->all());

        return redirect()->route('admin.payouts.index');
    }

    public function edit(Payout $payout)
    {
        abort_if(Gate::denies('payout_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vendors = Vendor::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $payout->load('vendor');

        return view('admin.payouts.edit', compact('payout', 'vendors'));
    }

    public function update(UpdatePayoutRequest $request, Payout $payout)
    {
        $payout->update($request->all());

        return redirect()->route('admin.payouts.index');
    }

    public function show(Payout $payout)
    {
        abort_if(Gate::denies('payout_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $payout->load('vendor');

        return view('admin.payouts.show', compact('payout'));
    }

    public function destroy(Payout $payout)
    {
        abort_if(Gate::denies('payout_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $payout->delete();

        return back();
    }

    public function massDestroy(MassDestroyPayoutRequest $request)
    {
        $payouts = Payout::find(request('ids'));

        foreach ($payouts as $payout) {
            $payout->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
