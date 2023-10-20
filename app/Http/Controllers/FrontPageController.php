<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class FrontPageController extends Controller
{
    public function index()
    {
        $data['services']=Service::get();
        // dd($data['services']);
        return view('front_home',$data);
    }

    public function about(){
        $data['title']="About Us";
        return view('front-about',$data);
    }
    public function services(){
        $data['title']="Services";
        $data['services']=Service::get();
        return view('front-services',$data);
    }

    public function packages(){
        $data['title']="Our Packages";
        return view('front-packages',$data);
    }

    public function destination(){
        $data['title']="Our destination";
        return view('front-destination',$data);
    }

    public function booking(){
        $data['title']="Our booking";
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
        $data['title']="Our Contact";
        return view('front-contact',$data);
    }
}
