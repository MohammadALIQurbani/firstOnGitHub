<?php

namespace App\Http\Livewire\Employeer;

use App\Models\JobPost;
use Livewire\Component;

class EmployeerPost extends Component
{
    public $checkAccount;
    public $selectedJopPostToDeactive = null;
    protected $listeners = ['deactive'];
    public function deactive(JobPost $jobPost)
    {
        $this->selectedJopPostToDeactive = $jobPost;
    }
    public function getJobPostsProperty()
    {
        return JobPost::with(['user', 'functionArea'])
            ->where('user_id',auth()->user()->id)
            ->where('status','active')
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
        $jobPosts = $this->jobPosts;
        return view('livewire.employeer.employeer-post',compact('jobPosts'));
    }
}
