<?php

namespace App\Http\Controllers;

use App\Models\Catagory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\returnValueMap;

class CatagoryController extends Controller
{

    public function index(){
        $categories = Catagory::all();
        return view('welcome', compact('categories'));
    }
    public function upload(Request $request){
        $request->validate([
            'name'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $name = $request->name;
        $file = $request->file('image');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('images', $fileName);
        Catagory::query()->create([
            'name'=>$name,
            'image'=>$filePath,
        ]);
        return redirect()->back();
    }
}
