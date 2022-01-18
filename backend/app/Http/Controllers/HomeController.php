<?php

namespace App\Http\Controllers;

use App\Privacy;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }

    public function privacyPolicy()
    {
        $privacy_policy=Privacy::findorfail(1);
        return view('privacy_policy',['privacy_policy'=>$privacy_policy]);
    }
}
