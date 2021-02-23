<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\UpdatePageRequest;
use App\Http\Requests\Admin\UpdateSocialLinksRequest;
use App\Models\Page;
use App\Models\WebSocialLink;

class PagesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function GetPage(Request $request, $type)
    {
        $page = Page::firstOrNew(['type' => $type]);
        $page->type = $type;
        $page->save();

        return view('admin.pages.form', ['page' => $page, 'page_type' => $type])
            ->with('success', \Lang::get('toaster.created_successfully'));
    }

    public function savePage(UpdatePageRequest $request)
    {
        $page = $request->handle();
        return redirect()->route('admin.edit_page',$page->type)->with('success', \Lang::get('toaster.updated_successfully'));;
    }

    public function getWebSocial()
    {
        $social_media = WebSocialLink::whereNull('vendor_id')->first();
        return view('admin.web_social_links', compact('social_media'));
    }

    public function saveWebSocial(UpdateSocialLinksRequest $request)
    {
        $request->handle();
        return redirect()->route('admin.web_social_links')->withSuccess(trans('toaster.updated_successfully'));
    }

}
