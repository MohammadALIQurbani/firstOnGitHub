<?php

namespace App\Http\Livewire\Employeer;

use App\Models\JobPost;
use Livewire\Component;

class EmployeerDeactivePost extends Component
{
    public $selectedJopPostToActive = null;
    protected $listeners = ['active'];
    public function active(JobPost $jobPost)
    {
        $this->selectedJopPostToActive = $jobPost;
    }
    public function getJobPostsProperty()
    {
        return JobPost::with(['user', 'functionArea'])
            ->where('user_id', auth()->user()->id)
            ->where('status', 'deactive')
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
        return view('livewire.employeer.employeer-deactive-post',compact('jobPosts'));
    }
}
