<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Log;

class ServiceController extends Controller
{
    public function index()
    {
        // return Service::select('id','title','description','image','status')->get();
        $data['services']=Service::get();

        return view('admin.services.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'image'=>'required|image',            
        ]);
       
        try{            
            
            $imageName = Str::random().'.'.$request->image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('service', $request->image,$imageName);
            $AllData=[
                'title'=>$request->title,
                'description'=>$request->description,
                'status'=>$request->status=='on'?true:false,
                'image' =>$imageName
            ];                  
            Service::create($AllData);            
         
            return redirect()->route('service.index')->with('success','Service has been created successfully.');
        }catch(\Exception $e){
            \Log::error($e->getMessage());
            return response()->json([
                // 'message'=>'Something goes wrong while creating a service!!'
                'message'=>$e->getMessage()
            ],500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        return response()->json([
            'service'=>$service
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        // dd($service->id);
        $data['service']=Service::findOrFail($service->id);
        return view('admin.services.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'image'=>'nullable'
        ]);

        try{          
            $service=Service::findOrFail($service->id);
            if($request->hasFile('image')){
                // remove old image
                if($service->image){
                    $exists = Storage::disk('public')->exists("service/{$service->image}");
                    if($exists){
                        Storage::disk('public')->delete("service/{$service->image}");
                    }
                }

                $imageName = Str::random().'.'.$request->image->getClientOriginalExtension();
                Storage::disk('public')->putFileAs('service', $request->image,$imageName);
                $service->title=$request->title;
                $service->description=$request->description;
                $service->status=$request->status=='on'?true:false;
                $service->image = $imageName;
                $service->save();
            }else{
                $service->title=$request->title;
                $service->description=$request->description;
                $service->status=$request->status=='on'?true:false;
                $service->image = $request->old_image;
                $service->save();
            }           
            return redirect()->route('service.index')->with('success','Service updated successfully');
        }catch(\Exception $e){
            Log::error($e->getMessage());
            return response()->json([
                'message'=>'Something goes wrong while updating a service!!'
            ],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        try {
                if($service->image){
                    $exists = Storage::disk('public')->exists("service/{$service->image}");
                    if($exists){
                        Storage::disk('public')->delete("service/{$service->image}");
                    }
                }

                $service->delete();

                // return response()->json([
                //     'message'=>'Service Deleted Successfully!!'
                // ]);

                return redirect()->route('service.index')->with('success','Service updated successfully');
                
            } catch (\Exception $e) {
                \Log::error($e->getMessage());
                return response()->json([
                    'message'=>'Something goes wrong while deleting a service!!'
                ]);
            }
    }
}
