<?php

namespace App\Http\Livewire\JobPost;

use App\Models\JobPost;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class JobPostList extends Component
{
    public $search;
    public $selectedJopPostToDeactive=null;
    protected $listeners=['deactive'];
    public function deactive(JobPost $jobPost){
        $this->selectedJopPostToDeactive=$jobPost;
    }
    public function getJobPostsProperty(){
        return JobPost::with(['user', 'functionArea'])
        ->where('status','active')
        ->when($this->search,function($jobPost){
            $jobPost->where(function($jobPost){
                $jobPost->where('title','like',"%{$this->search}%");
            });
        })
        ->latest('id')
        ->get();
        // return DB::table('job_posts')
        //     ->join('users','users.id','job_posts.user_id')
        //     ->join('function_areas','function_areas.id','job_posts.function_area_id')
        //     ->select('users.name','users.lname','users.image', 
        //     'job_posts.created_at','job_posts.id', 'job_posts.expire_date','function_areas.name as functionalArea')
        // ->latest('id')
        // ->get();
    }
    public function render()
    {
        $jobPosts=$this->jobPosts;
        return view('livewire.job-post.job-post-list',compact('jobPosts'));
    }
}
