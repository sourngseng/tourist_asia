<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontPageController extends Controller
{
    public function index()
    {
        return view('front_home');
    }

    public function about(){
        $data['title']="About Us";
        return view('front-about',$data);
    }
    public function services(){
        $data['title']="Services";
        return view('front-services',$data);
    }
}
