<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use Illuminate\Http\Request;

class PublicJobListController extends Controller
{
    public function details(JobPost $jobPost)
    {
        return view('jobPostDetail.details' ,compact('jobPost'));
    }
}
