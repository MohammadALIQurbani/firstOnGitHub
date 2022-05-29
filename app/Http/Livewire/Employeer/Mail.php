<?php

namespace App\Http\Livewire\Employeer;

use App\Models\User;
use Livewire\Component;

class Mail extends Component
{

    public $search;
    public $selectAll=false;
    public $selectedRows=[];
    public function getUsersproperty()
    {
        return User::query()
            ->where('role', 'employeer')
            ->when($this->search, function ($user) {
                $user->where(function ($user) {
                    $user->where('name', 'like', "%{$this->search}%")
                        ->orWhere('lname', 'like', "%{$this->search}%")
                        ->orWhere('email', 'like', "%{$this->search}%")
                        ->orWhere('phone', 'like', "%{$this->search}%");
                });
            })
            ->latest('id')
            ->paginate(30);
    }

    public function updatedSelectAll($arg){
        // dd($arg);
        if($arg){
            $this->selectedRows=$this->users->pluck('email')->map(function($email){
                return (string) $email;
            });
        }else{
            $this->reset(['selectAll','selectedRows']);
        }
    }
    public function render()
    {
        $employeers=$this->users;
        return view('livewire.employeer.mail',compact('employeers'));
    }
}
