<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Auth;

class CategoryController extends Controller
{
    function getCategory(){
        $Categorys = Category::all();

        return view('category.indexv3',[
            'Categorys' => $Categorys
        ]);

    }
    function getAddCategory(){

        return view('category.addv3');
    }

    function postAddCategory(Request $request){
        //return dd($request);
        $validated= $request->validate([
            'name' => 'required',
        ]);

        if ($validated){
            $image = '';
            $create = Category::create([
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0,
                'created_id' => Auth::user()->id,
                'updated_id' => Auth::user()->id,
            ]);
            if ($create)
                return app(HelperController::class)->Positive('getCategory');
            else
                return app(HelperController::class)->Negative('getCategory');
        }
    }

    function getEditCategory(Request $request){
        $idCategory = $request->id;
        $Category = Category::find($idCategory);

        return view('category.editv3',[
            'Category' => $Category,
        ]);
    }

    function postEditCategory(Request $request){

        $validated= $request->validate([
            'name' => 'required',
        ]);
        
        $idCategory = $request->id;

        $updateData = Category::where('id', $idCategory)
            ->update([
                'name' => $request->name,
                'description' => $request->description,
                'status' => $request->status ? 1 : 0
            ]);

        if ($updateData){
            return app(HelperController::class)->Positive('getCategory');
        } else{
            return app(HelperController::class)->Warning('getCategory');
        }
    }
}
