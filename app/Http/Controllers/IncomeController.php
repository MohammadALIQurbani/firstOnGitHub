<?php

namespace App\Http\Controllers;

use App\Models\EmployeerAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IncomeController extends Controller
{
    public function income(){
        $incomes=DB::table('employeer_accounts')
        ->selectRaw('monthname(created_at) as month,id,sum(money) income')
        ->groupByRaw('month')
        ->get();
        return view('income.monthly',compact('incomes'));
    }
}
