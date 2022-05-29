<?php

namespace App\Http\Livewire\EmployeerAccount;

use App\Http\Livewire\customeComponent;
use App\Models\User;
use Livewire\Commands\CopyCommand;
use Livewire\Component;

class EmployeerAccountList extends customeComponent
{

    public $search=null;
    public function getUsersproperty(){
        return User::query()
        ->where('role','employeer')
        ->when($this->search,function($user){
            $user->where(function($user){
                $user->where('name','like',"%{$this->search}%")
                ->orWhere('lname','like',"%{$this->search}%")
                ->orWhere('email','like',"%{$this->search}%")
                ->orWhere('phone','like',"%{$this->search}%");
            });
        })
        ->latest('id')
        ->paginate(30);
    }
    public function render()
    {
        $users=$this->users;
        return view('livewire.employeer-account.employeer-account-list',compact('users'));
    }
}
