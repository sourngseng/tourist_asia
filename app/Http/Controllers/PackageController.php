<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Log;

class PackageController extends Controller
{
    public function index(){
        $data['packages']=Package::get();
        
        return view('admin.packages.list',$data);
    }
    public function create(){

        return view('admin.packages.create');
    }
    public function store(Request $request){

        // dd($request);
        $request->validate([
            'title'=>'required',
            'detail'=>'required',
            'location'=>'required',
            'duration'=>'required',
            'price'=>'required',
            'image'=>'required|image',            
        ]);

        try{            
           
            $imageName = Str::random().'.'.$request->image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('package', $request->image,$imageName);
            $AllData=[
                'title'=>$request->title,
                'slug'=>Str::slug($request->title),
                'detail'=>$request->detail,
                'location'=>$request->location,
                'duration'=>$request->duration,
                'guest'=>$request->guest,
                'price'=>$request->price,
                'status'=>$request->status=='on'?true:false,
                'photo' =>$imageName
            ];                  
            Package::create($AllData);            
         
            return redirect()->route('package.index')->with('success','Package has been created successfully.');
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json([
                // 'message'=>'Something goes wrong while creating a service!!'
                'message'=>$e->getMessage()
            ],500);
        }

    }
}
