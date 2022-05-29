<?php

namespace App\Http\Livewire\DeactiveJobPost;

use App\Models\JobPost;
use Livewire\Component;

class DeactiveJobPostList extends Component
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
        $jobPosts = $this->jobPosts;
        return view('livewire.deactive-job-post.deactive-job-post-list',compact('jobPosts'));
    }
}
