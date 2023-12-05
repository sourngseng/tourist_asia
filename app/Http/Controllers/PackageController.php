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
                // 'message'=>'Something goes wrong while creating a package!!'
                'message'=>$e->getMessage()
            ],500);
        }

    }

    public function edit(Package $package)
    {
        // dd($package->id);
        $data['package']=Package::findOrFail($package->id);
        return view('admin.packages.edit',$data);
    }
    public function show(Package $package)
    {
        // dd($package->id);
        $data['package']=Package::findOrFail($package->id);
        return view('admin.packages.show',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Package $package)
    {
        // $request->validate([
        //     'title'=>'required',
        //     'detail'=>'required',
        //     // 'image'=>'nullable'
        // ]);

        try{          
            $package=Package::findOrFail($package->id);
            if($request->hasFile('image')){
                // remove old image
                if($package->image){
                    $exists = Storage::disk('public')->exists("package/{$package->image}");
                    if($exists){
                        Storage::disk('public')->delete("package/{$package->image}");
                    }
                }

                $imageName = Str::random().'.'.$request->image->getClientOriginalExtension();
                Storage::disk('public')->putFileAs('package', $request->image,$imageName);
                $package->title=$request->title;
                $package->slug=Str::slug($request->title);                
                $package->detail=$request->detail;
                $package->location=$request->location;
                $package->duration=$request->duration;
                $package->guest=$request->guest;
                $package->price=$request->price;
                $package->status=$request->status=='on'?true:false;
                $package->photo = $imageName;
                $package->save();
            }else{
                $package->title=$request->title;
                $package->slug=Str::slug($request->title);                
                $package->detail=$request->detail;
                $package->location=$request->location;
                $package->duration=$request->duration;
                $package->guest=$request->guest;
                $package->price=$request->price;
                $package->status=$request->status=='on'?true:false;
                $package->photo = $request->old_image;
                $package->save();
            }           
            return redirect()->route('package.index')->with('success','Package updated successfully');
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json([
                // 'message'=>'Something goes wrong while updating a package!!'
                'message'=>$e->getMessage()
            ],500);
        }
    }

    public function destroy(Package $package)
    {
        try {
                if($package->image){
                    $exists = Storage::disk('public')->exists("package/{$package->image}");
                    if($exists){
                        Storage::disk('public')->delete("package/{$package->image}");
                    }
                }

                $package->delete();

                // return response()->json([
                //     'message'=>'package Deleted Successfully!!'
                // ]);

                return redirect()->route('package.index')->with('success','package delete successfully');
                
            } catch (\Exception $e) {
                \Log::error($e->getMessage());
                return response()->json([
                    'message'=>'Something goes wrong while deleting a package!!'
                ]);
            }
    }
}
