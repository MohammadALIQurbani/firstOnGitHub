<?php

namespace App\Http\Livewire\JobPost;

use App\Http\Livewire\customeComponent;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class JobPostCreate extends customeComponent
{
    public $search = null;
    public function getUsersproperty()
    {
        // return User::query()
        // ->with('employeerAccounts')
        // ->latest('id')
        // ->paginate(30);
        return DB::table('users')
        ->join('employeer_accounts', 'employeer_accounts.user_id','users.id')
        ->select('users.name','users.id','users.lname','users.image','users.phone','users.email')
        ->groupBy('employeer_accounts.user_id')
        ->latest('id')
        ->paginate(30);
    }
    public function render()
    {
        $users = $this->users;
       
        return view('livewire.job-post.job-post-create',compact('users'));
    }
}
