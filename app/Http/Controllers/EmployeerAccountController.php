<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeerAccountRequest;
use App\Jobs\InfromEmployeerJob;
use App\Mail\SendMail;
use App\Models\EmployeerAccount;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmployeerAccountController extends Controller
{

    public function accountList(){
        return view('accountList.index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employeeAccount.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeerAccountRequest $request)
    {
        $data=$request->validated();
        $data['remained']=$data['money'];
        EmployeerAccount::create($data);
        return back()->with('message','money add to selected employeer account');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmployeerAccount  $employeerAccount
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

        return view('employeeAccount.show',compact('user'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmployeerAccount  $employeerAccount
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeerAccount $employeerAccount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmployeerAccount  $employeerAccount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmployeerAccount $employeerAccount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeerAccount  $employeerAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeerAccount $employeerAccount)
    {
        //
    }

    public function mail(){
        return view('employeer.mail');
    }

    public function sendMail(Request $request){
        dd($request->title,$request->body,$request->email);
        $data['title']=$request->title;
        $data['body']=$request->body;
        $emailData=array();
      foreach ($request->email as $key => $value) {
        //   dd($value);
            array_push($emailData,$value);
            // Mail::to($value)->send(new SendMail());
      }

    //   foreach ($emailData as $key => $value) {
    //       dd($value);
    //   }
        dispatch(new InfromEmployeerJob($data, $emailData));
        dd("job dispatched");
    }
}
