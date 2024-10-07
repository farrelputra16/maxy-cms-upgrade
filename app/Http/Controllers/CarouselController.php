<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carousel;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Auth;

class CarouselController extends Controller
{
    function getCarousel(){
        $carousels = Carousel::all();

        return view('carousel.indexv3',[
            'carousels' => $carousels
        ]);

    }
    function getAddCarousel(){

        return view('carousel.addv3');
    }

    function postAddCarousel(Request $request){
        //return dd($request);
        $validated= $request->validate([
            'name' => 'required',
            'short_desc' => 'required',
            'date' => 'required',
        ]);

        if ($validated){
            $image = '';
            $create = Carousel::create([
                'name' => $request->name,
                'short_desc' => $request->short_desc,
                'date' => date('Y-m-d', strtotime($request->date)),
                'image' => $image,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id,
            ]);
            if ($create){
                if ($request->hasFile('image')) {
                    $file = $request->file('image');
                    $image = $create->id;
                    $destinationPath = public_path('/uploads/carousel/about-us');
                    if (!File::exists($destinationPath)) { // create folder jika blm ada
                        File::makeDirectory($destinationPath, 0777, true, true);
                    }
                    $file->move($destinationPath, $image);
                }
                $updateData = Carousel::where('id', $create->id)->update([ 'image' => $image ]);
                if ($updateData){
                    return app(HelperController::class)->Positive('getCarousel');
                } else{
                    return app(HelperController::class)->Warning('getCarousel');
                }
            }
            return app(HelperController::class)->Negative('getCarousel');
        }
    }

    function getEditCarousel(Request $request){
        $idcarousel = $request->id;
        $carousel = Carousel::find($idcarousel);

        return view('carousel.editv3',[
            'carousel' => $carousel,
        ]);
    }

    function postEditCarousel(Request $request){
        $idcarousel = $request->id;

        $updateData = Carousel::where('id', $idcarousel)
            ->update([
                'name' => $request->name,
                'short_desc' => $request->short_desc,
                'date' => date('Y-m-d', strtotime($request->date)),
                'description' => $request->description,
                'status' => $request->status ? 1 : 0
            ]);

        if ($updateData){
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $image = $idcarousel;
                $destinationPath = public_path('/uploads/carousel/about-us');
                if (!File::exists($destinationPath)) { // create folder jika blm ada
                    File::makeDirectory($destinationPath, 0777, true, true);
                }
                $file->move($destinationPath, $image);
            }
            return app(HelperController::class)->Positive('getCarousel');
        } else{
            return app(HelperController::class)->Warning('getCarousel');
        }
    }
}
