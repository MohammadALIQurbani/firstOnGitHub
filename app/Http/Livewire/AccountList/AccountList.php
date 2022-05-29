<?php

namespace App\Http\Livewire\AccountList;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AccountList extends Component
{
    public $search=null;
    public function getEmployeerAccountsProperty(){
        return DB::table('employeer_accounts')
        ->join('users','users.id','employeer_accounts.user_id')
        ->select(DB::raw('users.id,users.name,users.lname,users.email,users.image
        ,users.phone,sum(employeer_accounts.money) allmoney,sum(remained) as remainder'))
        ->when($this->search,function($user){
            $user->where('users.name','like',"%{$this->search}%");
        })
        ->groupByRaw('employeer_accounts.user_id')
        ->get()
        ;
    }
    public function render()
    {

        $employeerAccounts=$this->employeerAccounts;
        // dd($employeerAccounts);
        return view('livewire.account-list.account-list',compact('employeerAccounts'));
    }
}
