<?php

namespace Modules\PageManagement\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\PageManagement\Entities\Page;
use Mews\Purifier\Facades\Purifier;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        // check if user is logged in
        if (!Auth::user()) {
            // redirect user to login page if session expired
            return redirect()->route('login');
        }

        try {
            // get data
            $data = Page::all();

            // return view with corresponding data
            return view('pagemanagement::m_page.index', compact('data'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function getAdd()
    {
        // check if user is logged in
        if (!Auth::user()) {
            // redirect user to login page if session expired
            return redirect()->route('login');
        }

        try {
            // return view
            return view('pagemanagement::m_page.manage');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function getEdit(Request $request)
    {
        // check if user is logged in
        if (!Auth::user()) {
            // redirect user to login page if session expired
            return redirect()->route('login');
        }

        try {
            // get data
            $data = Page::getPageDetailById($request->id);

            // return view with corresponding data
            return view('pagemanagement::m_page.manage', compact('data'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    public function postAdd(Request $request)
    {
        // check if user is logged in
        if (!Auth::user()) {
            // redirect user to login page if session expired
            return redirect()->route('login');
        }

        try {
            $data = new Page();

            // update data
            $data->name = Purifier::clean($request->name);
            $data->title = Purifier::clean($request->title);
            $data->url = Purifier::clean($request->url);
            $data->favicon_url = Purifier::clean($request->favicon_url, 'default');
            $data->gtm_header = Purifier::clean($request->gtm_header, 'default'); // Sanitize GTM Header
            $data->gtm_body = Purifier::clean($request->gtm_body, 'default'); // Sanitize GTM Body
            $data->ga_id = Purifier::clean($request->ga_id);
            $data->custom_css = Purifier::clean($request->custom_css, 'default'); // Allow safe CSS
            $data->header_code = Purifier::clean($request->header_code, 'default'); // Sanitize Header Code
            $data->footer_code = Purifier::clean($request->footer_code, 'default'); // Sanitize Footer Code
            $data->additional_script = Purifier::clean($request->additional_script, 'default'); // Sanitize Additional Scripts
            $data->social_image_url = Purifier::clean($request->social_image_url);
            $data->description = Purifier::clean($request->description);
            $data->status = $request->status ? 1 : 0;
            $data->created_id = Auth::user()->id;
            $data->updated_id = Auth::user()->id;

            // save the updated data to database
            $data->save();

            return redirect()->route('pageManagement.page.index')->with('success', 'Data created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to save data: ' . $e->getMessage());
        }
    }
    public function postEdit(Request $request)
    {
        // check if user is logged in
        if (!Auth::user()) {
            // redirect user to login page if session expired
            return redirect()->route('login');
        }

        try {
            $data = Page::find($request->id);

            // update data
            $data->name = Purifier::clean($request->name);
            $data->title = Purifier::clean($request->title);
            $data->url = Purifier::clean($request->url);
            $data->favicon_url = Purifier::clean($request->favicon_url, 'default');
            $data->gtm_header = $request->gtm_header; // Sanitize GTM Header
            $data->gtm_body = $request->gtm_body; // Sanitize GTM Body
            $data->ga_id = Purifier::clean($request->ga_id);
            $data->custom_css = $request->custom_css;
            $data->header_code = $request->header_code;
            $data->footer_code = $request->footer_code;
            $data->additional_script = $request->additional_script;
            $data->social_image_url = Purifier::clean($request->social_image_url);
            $data->description = Purifier::clean($request->description);
            $data->status = $request->status ? 1 : 0;
            $data->updated_id = Auth::user()->id;

            // save the updated data to database
            $data->save();

            return redirect()->route('pageManagement.page.index')->with('success', 'Data updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to save data: ' . $e->getMessage());
        }
    }
}
