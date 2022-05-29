<?php

namespace App\Http\Controllers;

use App\Http\Requests\FunctionalAreaRequest;
use App\Models\FunctionArea;
use Illuminate\Http\Request;

class FunctionAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('functionArea.index');
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
    public function store(FunctionalAreaRequest $request)
    {
        $data=$request->validated();
        FunctionArea::create($data);
        return back()->with('message','name of functional area added to database successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FunctionArea  $functionArea
     * @return \Illuminate\Http\Response
     */
    public function show(FunctionArea $functionArea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FunctionArea  $functionArea
     * @return \Illuminate\Http\Response
     */
    public function edit(FunctionArea $functionArea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FunctionArea  $functionArea
     * @return \Illuminate\Http\Response
     */
    public function update(FunctionalAreaRequest $request, FunctionArea $functionArea)
    {
        $data=$request->validated();
        $functionArea->update($data);
        return back()->with('message','selected functional area updated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FunctionArea  $functionArea
     * @return \Illuminate\Http\Response
     */
    public function destroy(FunctionArea $functionArea)
    {
        $functionArea->delete();
        return back()->with('dangerMessage','the selected functional area deleted !');
    }
}
