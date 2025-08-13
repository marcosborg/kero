<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySiteSettingRequest;
use App\Http\Requests\StoreSiteSettingRequest;
use App\Http\Requests\UpdateSiteSettingRequest;
use App\Models\SiteSetting;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SiteSettingController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('site_setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $siteSettings = SiteSetting::all();

        return view('admin.siteSettings.index', compact('siteSettings'));
    }

    public function create()
    {
        abort_if(Gate::denies('site_setting_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.siteSettings.create');
    }

    public function store(StoreSiteSettingRequest $request)
    {
        $siteSetting = SiteSetting::create($request->all());

        return redirect()->route('admin.site-settings.index');
    }

    public function edit(SiteSetting $siteSetting)
    {
        abort_if(Gate::denies('site_setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.siteSettings.edit', compact('siteSetting'));
    }

    public function update(UpdateSiteSettingRequest $request, SiteSetting $siteSetting)
    {
        $siteSetting->update($request->all());

        return redirect()->route('admin.site-settings.index');
    }

    public function show(SiteSetting $siteSetting)
    {
        abort_if(Gate::denies('site_setting_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.siteSettings.show', compact('siteSetting'));
    }

    public function destroy(SiteSetting $siteSetting)
    {
        abort_if(Gate::denies('site_setting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $siteSetting->delete();

        return back();
    }

    public function massDestroy(MassDestroySiteSettingRequest $request)
    {
        $siteSettings = SiteSetting::find(request('ids'));

        foreach ($siteSettings as $siteSetting) {
            $siteSetting->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
