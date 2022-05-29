<?php

namespace App\Http\Livewire\PublicJobList;

use App\Http\Livewire\customeComponent;
use App\Models\JobPost;
use Livewire\Component;

class PublicJobList extends customeComponent
{
    public $search=null;
    public $title=null;
    public $location=null;
    public $isSearch=null;
    public function search(){
        $this->title=$this->title;
    }
    public function getJobPostsProperty(){
        return JobPost::query()
        ->with('user')
        ->where('status','active')
        ->when($this->title,function($jobPost){
            $jobPost->where(function($jobPost){
                $jobPost->where('title', 'like', "%{$this->title}%")
                ->orWhere('job_description','like',"%{$this->title}%");
                // ->orWhere('location','like',"%{$this->location}%");    
            });
        })
        ->latest('id')
        ->get();
        // ->paginate(20);
    }
    public function render()
    {
        $jobPosts=$this->jobPosts;
        // dd($jobPosts);
        return view('livewire.public-job-list.public-job-list',compact('jobPosts'));
    }
}
