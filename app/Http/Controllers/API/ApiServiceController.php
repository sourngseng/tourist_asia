<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;
use Log;
use Illuminate\Support\Str;

class ApiServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Service::select('id','title','description','image','status')->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'image'=>'required|image'
        ]);

        try{
            $imageName = Str::random().'.'.$request->image->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('service', $request->image,$imageName);
            Service::create($request->post()+['image'=>$imageName]);

            return response()->json([
                'message'=>'Service Created Successfully!!'
            ]);
        }catch(\Exception $e){
            \Log::error($e->getMessage());
            return response()->json([
                'message'=>'Something goes wrong while creating a service!!'
            ],500);
        }
    }

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
        //
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

            $service->fill($request->post())->update();

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
                $service->image = $imageName;
                $service->save();
            }

            return response()->json([
                'message'=>'Service Updated Successfully!!'
            ]);

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

                return response()->json([
                    'message'=>'Service Deleted Successfully!!'
                ]);
                
            } catch (\Exception $e) {
                Log::error($e->getMessage());
                return response()->json([
                    'message'=>'Something goes wrong while deleting a service!!'
                ]);
            }
    }
}
