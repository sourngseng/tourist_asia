<?php

namespace App\Http\Controllers;

use App\Models\Guide;
use App\Models\Province;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Ramsey\Uuid\Guid\Guid;

class GuideController extends Controller
{
    public function index(){
        // $data['guides']=Guide::get();
        $data['guides']=Guide::join('users', 'users.id', '=', 'guides.user_id')
        // ->join('city', 'city.state_id', '=', 'state.state_id')
        ->get(['users.type','users.name as uname','users.email as uemail','guides.*']);
        // $package=Guide::get();
        
        // return view('admin.teams.list',compact('guides'));
        return view('admin.teams.list',$data);
    }
    public function create(){
        $data['users']=User::get();
        $data['provinces']=Province::get();
        return view('admin.teams.create',$data);
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
                'province_id'=>$request->location,
                'location'=>$request->location,
                'duration'=>$request->duration,
                'guest'=>$request->guest,
                'price'=>$request->price,
                'status'=>$request->status=='on'?true:false,
                'photo' =>$imageName
            ];                  
            Guide::create($AllData);            
         
            return redirect()->route('package.index')->with('success','Guide has been created successfully.');
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json([
                // 'message'=>'Something goes wrong while creating a package!!'
                'message'=>$e->getMessage()
            ],500);
        }

    }

    public function edit(Guide $package)
    {
        // dd($package->id);
        $data['package']=Guide::findOrFail($package->id);  
        $data['users']=User::get();   
        return view('admin.teams.edit',$data);
    }
    public function show(Guide $guide)
    {
        // dd($guide->id);
        $data['guide']=Guide::findOrFail($guide->id);
        return view('admin.teams.show',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guide $package)
    {
        // $request->validate([
        //     'title'=>'required',
        //     'detail'=>'required',
        //     // 'image'=>'nullable'
        // ]);

        try{          
            $package=Guide::findOrFail($package->id);
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
                $package->location=$request->province_id;
                $package->province_id=$request->province_id;
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
                $package->location=$request->province_id;
                $package->province_id=$request->province_id;
                $package->duration=$request->duration;
                $package->guest=$request->guest;
                $package->price=$request->price;
                $package->status=$request->status=='on'?true:false;
                $package->photo = $request->old_image;
                $package->save();
            }           
            return redirect()->route('package.index')->with('success','Guide updated successfully');
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json([
                // 'message'=>'Something goes wrong while updating a package!!'
                'message'=>$e->getMessage()
            ],500);
        }
    }

    public function destroy(Guide $package)
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
                Log::error($e->getMessage());
                return response()->json([
                    'message'=>'Something goes wrong while deleting a package!!'
                ]);
            }
    }
}
