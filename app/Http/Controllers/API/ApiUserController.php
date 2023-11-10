<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ApiUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return Service::select('id','title','description','image','status')->get();
        return User::select('id','name','email','created_at')->get();
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
        // $request->validate([
        //     'title'=>'required',
        //     'description'=>'required',
        //     'image'=>'required|image'
        // ]);

        // try{
        //     $imageName = Str::random().'.'.$request->image->getClientOriginalExtension();
        //     Storage::disk('public')->putFileAs('service', $request->image,$imageName);
        //     Service::create($request->post()+['image'=>$imageName]);

        //     return response()->json([
        //         'message'=>'Service Created Successfully!!'
        //     ]);
        // }catch(\Exception $e){
        //     \Log::error($e->getMessage());
        //     return response()->json([
        //         'message'=>'Something goes wrong while creating a service!!'
        //     ],500);
        // }
    }

    public function show(User $user)
    {
        return response()->json([
            'user'=>$user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required'
            // 'image'=>'nullable'
        ]);

        try{

            $user->fill($request->user())->update();

            // if($request->hasFile('image')){

            //     // remove old image
            //     if($service->image){
            //         $exists = Storage::disk('public')->exists("service/{$service->image}");
            //         if($exists){
            //             Storage::disk('public')->delete("service/{$service->image}");
            //         }
            //     }

            //     $imageName = Str::random().'.'.$request->image->getClientOriginalExtension();
            //     Storage::disk('public')->putFileAs('service', $request->image,$imageName);
            //     $service->image = $imageName;
            //     $service->save();
            // }

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
    public function destroy(User $user)
    {
        try {
                // if($user->image){
                //     $exists = Storage::disk('public')->exists("service/{$user->image}");
                //     if($exists){
                //         Storage::disk('public')->delete("user/{$user->image}");
                //     }
                // }

                $user->delete();

                return response()->json([
                    'message'=>'User Deleted Successfully!!'
                ]);
                
            } catch (\Exception $e) {
                Log::error($e->getMessage());
                return response()->json([
                    'message'=>'Something goes wrong while deleting a service!!'
                ]);
            }
    }
}
