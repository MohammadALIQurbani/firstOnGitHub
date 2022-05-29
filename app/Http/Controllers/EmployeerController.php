<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserEditRequest;
use App\Models\User;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class EmployeerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employeer.index');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, User $user)
    {
        
        $data=$request->validated();

        if($request->hasFile('image')){
            $extension = $request->file('image')->getClientOriginalExtension();
            $imgname = Str::random().'.'.$extension;
            $imagePath=$request->file('image')->move('asset/user/image', $imgname);
            $data['image']=$imagePath;
        }
        $user->update($data);
        return redirect(route('employeer.index'))->with('message','update action done successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function employeerPost(){
        $checkAccount = auth()->user()->employeerAccounts()->where('remained', '>=', 15)->limit(1)->get();
        return view('employeer.employeerPost',compact('checkAccount'));
    }

    public function employeeProfile(){
        $user=auth()->user();
        return view('employeer.profile',compact('user'));
    }
    public function employeerDeactivePost()
    {
        return view('employeer.employeerDeactivePost');
    }
}
