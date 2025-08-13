<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCommissionRuleRequest;
use App\Http\Requests\StoreCommissionRuleRequest;
use App\Http\Requests\UpdateCommissionRuleRequest;
use App\Models\CommissionRule;
use App\Models\Vendor;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CommissionRuleController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('commission_rule_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $commissionRules = CommissionRule::with(['vendor'])->get();

        return view('admin.commissionRules.index', compact('commissionRules'));
    }

    public function create()
    {
        abort_if(Gate::denies('commission_rule_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vendors = Vendor::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.commissionRules.create', compact('vendors'));
    }

    public function store(StoreCommissionRuleRequest $request)
    {
        $commissionRule = CommissionRule::create($request->all());

        return redirect()->route('admin.commission-rules.index');
    }

    public function edit(CommissionRule $commissionRule)
    {
        abort_if(Gate::denies('commission_rule_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vendors = Vendor::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $commissionRule->load('vendor');

        return view('admin.commissionRules.edit', compact('commissionRule', 'vendors'));
    }

    public function update(UpdateCommissionRuleRequest $request, CommissionRule $commissionRule)
    {
        $commissionRule->update($request->all());

        return redirect()->route('admin.commission-rules.index');
    }

    public function show(CommissionRule $commissionRule)
    {
        abort_if(Gate::denies('commission_rule_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $commissionRule->load('vendor');

        return view('admin.commissionRules.show', compact('commissionRule'));
    }

    public function destroy(CommissionRule $commissionRule)
    {
        abort_if(Gate::denies('commission_rule_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $commissionRule->delete();

        return back();
    }

    public function massDestroy(MassDestroyCommissionRuleRequest $request)
    {
        $commissionRules = CommissionRule::find(request('ids'));

        foreach ($commissionRules as $commissionRule) {
            $commissionRule->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
