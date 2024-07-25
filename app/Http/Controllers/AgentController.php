<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\JdAgentPageConf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AgentController extends Controller
{
    // ########## start auth ##########
    function getLogin()
    {
        return view('jago-digital.pages.auth.login');
    }

    function postLogin(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();

            return redirect()->route('agent.getDashboard');
        } else {
            return back();
        }
    }

    function postLogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('agent.login');
    }
    // ########## end auth ##########

    // ########## start agent CRUD ##########
    public function getDashboard()
    {
        return view('jago-digital.pages.dashboard.index');
    }
    public function getContent()
    {
        $data = JdAgentPageConf::where('user_id', Auth::user()->id)->first();
        $content_data = json_decode($data->content_setting);
        // dd($content_data);
        return view('jago-digital.pages.content.edit', compact('content_data'));
    }
    public function postContent(Request $request)
    {
        // dd($request->all());

        $pageConfig  = JdAgentPageConf::where('user_id', Auth::user()->id)->first();
        if (!$pageConfig) {
            return redirect()->back()->with('error', 'user page config not found');
        }

        $data = json_decode($pageConfig->content_setting);

        // nested loop to find the index of array that needs to be changed
        foreach ($data as $d) {
            foreach ($request->all() as $key => $value) {
                if ($d->name == $key) { // if index name = input name
                    // if type is file, save the file with the same name as before (reducing storage usage)
                    if ($request->hasFile($key)) {
                        $file = $request->file($key);
                        $userId = Auth::id();
                        $fileName = $key . '.' . $file->getClientOriginalExtension();
                        $filePath = 'jago-digital/agent/' . $userId . '/img/' . $fileName;

                        // save the file
                        $file->move(public_path('jago-digital/agent/' . $userId . '/img'), $fileName);
                        $d->value = $fileName; // change data on array to new data filename
                    } else {
                        $d->value = $value; // change data on array to new data
                    }
                }
            }
        }
        // dd($data);

        $pageConfig->content_setting = json_encode($data);
        $pageConfig->updated_id = Auth::id();
        $pageConfig->updated_at = now();

        $update = $pageConfig->save();

        if ($update) {
            return redirect()->back()->with('success', 'user page config updated successfully.');
        } else {
            return redirect()->back()->with('error', 'failed to update user page config data');
        }
    }
    public function getTestimonial()
    {
        $data = JdAgentPageConf::where('user_id', Auth::user()->id)->first();
        $content_data = json_decode($data->testimonial_setting);
        // dd($content_data);
        return view('jago-digital.pages.testimonial.edit', compact('content_data'));
    }
    public function getColor()
    {

        return view('jago-digital.pages.dashboard.index');
    }
    public function getSetting()
    {
        return view('jago-digital.pages.dashboard.index');
    }
    // ########## end agent CRUD ##########
}
