<?php

namespace Modules\Accredify\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $token = config('services.accredify.token');
        // dd($token);

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ])->get('https://dashboard.uat.accredify.io/api/v2/courses?per_page=100');

        $data = $response['data'];

        // get additional data of each course --> there is no additional data.
        // foreach($data as $key => $value){
        //     $response = Http::withHeaders([
        //         'Authorization' => 'Bearer ' . $token,
        //         'Accept' => 'application/json',
        //     ])->get('https://dashboard.uat.accredify.io/api/v2/courses/' . $value['id']);

        //     $data[$key]['detail'] = $response['data'];
        // }

        // dd($data);
        return view('accredify::course.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('accredify::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('accredify::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('accredify::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
