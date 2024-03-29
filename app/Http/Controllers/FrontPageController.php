<?php

namespace App\Http\Controllers;


use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\Guide;
use App\Models\Package;

class FrontPageController extends Controller
{
    public function index()
    {
        $data['services']=Service::get();
        $data['guides']=Guide::where('status','=',true)->get();
        $data['packages']=Package::join('provinces', 'provinces.id', '=', 'packages.province_id')
        // ->join('city', 'city.state_id', '=', 'state.state_id')
        ->get(['provinces.khmer_name','provinces.name as name','packages.*']);
        // dd($data['services']);
        return view('front_home',$data);
    }

    public function about(){
        $data['title']="About Us";
        $data['guides']=Guide::where('status','=',true)->get();
        return view('front-about',$data);
    }
    public function services(){
        $data['title']="Services";
        $data['services']=Service::get();
        $data['guides']=Guide::where('status','=',true)->get();
        return view('front-services',$data);
    }

    public function packages(){
        $data['title']="Our Packages";
        // $data['packages']=Package::where('status','=',true)->get();
        $data['packages']=Package::join('provinces', 'provinces.id', '=', 'packages.province_id')
        // ->join('city', 'city.state_id', '=', 'state.state_id')
        ->get(['provinces.khmer_name','provinces.name as name','packages.*']);

        return view('front-packages',$data);
    }
    public function packages_detail($slug){
        $data['title']="Our Packages";
        $data['package']=Package::where('slug','=',$slug)->first();

        return view('front-package-detail',$data);
    }

    public function destination(){
        $data['title']="Our destination";
        $data['services']=Service::get();
        return view('front-destination',$data);
    }

    public function booking(){
        $data['title']="Our booking";
        $data['services']=Service::get();
        $data['guides']=Guide::where('status','=',true)->get();
        return view('front-booking',$data);
    }

    public function guides(){
        $data['title']="Our guides";
        return view('front-guides',$data);
    }

    public function testimonial(){
        $data['title']="Our testimonial";
        return view('front-testimonial',$data);
    }

    public function Contact(){
        $data['title']="Our Contact";$data['services']=Service::get();
        $data['guides']=Guide::where('status','=',true)->get();
        return view('front-contact',$data);
    }
}
