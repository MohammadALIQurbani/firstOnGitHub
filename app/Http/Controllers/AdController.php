<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdEditRequest;
use App\Http\Requests\AdRequest;
use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ad.index');
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
    public function store(AdRequest $request)
    {
        $data=$request->validated();
        $imageExtension=$data['image']->getClientOriginalExtension();
        $imageName=Str::random().'.'.$imageExtension;
        $path=$data['image']->move('asset/ad/image',$imageName);
        $data['image']=$path;
        Ad::create($data);
        return back()->with('message','ad information saved in database successfuly!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function show(Ad $ad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function edit(Ad $ad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function update(AdEditRequest $request, Ad $ad)
    {

        $data=$request->validated();
        // dd($data);
        if($request->hasFile('image')){
            // dd('hasimage');
            $path = public_path( $ad->image);
            // dd($path);
            if (file_exists($path)) {
                // dd("exists");
                unlink($path);
                $imageExtension=$data['image']->getClientOriginalExtension();
                $imageName=Str::random().'.'.$imageExtension;
                $path= $data['image']->move('asset/ad/image',$imageName);
                $data['image']=$path;

            }
        }
        $ad->update($data);
        return back()->with('message','ad updating done successfuly!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ad $ad)
    {

        $path = public_path($ad->image);
        if (file_exists($path)) {
            // dd("exists");
            unlink($path);
            $ad->delete();
        }
        return back()->with('dangerMessage','the selected ad delete !');
    }


    public function deactive(Ad $ad){
        $ad->status='deactive';
        $ad->save();
        return back()->with('dangerMessage', 'the selected ad deactived !');

    }

    public function activeAd(){
        return view('activeAd.index');
    }

    public function actived(Ad $ad)
    {
        $ad->status = 'active';
        $ad->save();
        return back()->with('message', 'the selected ad actived success !');
    }
}

