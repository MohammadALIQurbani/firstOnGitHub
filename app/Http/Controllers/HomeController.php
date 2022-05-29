<?php

namespace App\Http\Controllers;

use App\Models\EmployeerAccount;
use App\Models\JobPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalPost = JobPost::where('user_id',auth()->user()->id)
            ->count('id');
        $totalMoney= EmployeerAccount::where('user_id',auth()->user()->id)->sum('remained');

        $totalActivePosts=JobPost::where('user_id',auth()->user()->id)->where('status','active')
        ->count('id');

        $totalIncActivePosts = JobPost::where('user_id', auth()->user()->id)->where('status', 'deactive')
        ->count('id');
        // ->get();
        return view('home',compact('totalPost', 'totalMoney', 'totalActivePosts', 'totalIncActivePosts'));
    }
}
