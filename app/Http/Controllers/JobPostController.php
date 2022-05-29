<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobPostEditRequest;
use App\Http\Requests\JobPostRequest;
use App\Models\EmployeerAccount;
use App\Models\FunctionArea;
use App\Models\JobPost;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('jobPost.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('jobPost.create');
    }

    public function createPost(User $user){
        $functionAreas=FunctionArea::latest('id')->get();
        // dd($functionAreas);
        return view('jobPost.createPost',compact('user','functionAreas'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobPostRequest $request,User $user)
    {
        DB::beginTransaction();
        $data=$request->validated();
        // dd($data);
        $id=null;
        $checkAccount=$user->employeerAccounts()->where('remained','>=',15)->limit(1)->get();
        // dd($checkAccount);
        foreach ($checkAccount as $key => $value) {
            $id=$value->id;
            $employeerAccount=EmployeerAccount::findOr($value->id,function(){
                abort(403);
            });
            $employeerAccount->remained = $employeerAccount->remained-15;
            $update= $employeerAccount->save();
            $user->jobPosts()->create($data);

            if(!$update){
                DB::rollBack();
            }
        }
        if($id==null){
            dd("djfksdjfsdd");
        }
        DB::commit();
        if (auth()->user()->role == 'supperAdmin') {
            return redirect(route('jobPost.index'))->with('message', 'the selecte user\'s job post submited successfuly');
        } elseif (auth()->user()->role == 'employeer') {
            return redirect(route('employeerPost.index'))->with('message', 'update action done successfully');
        }
        

        // dd($id);
    //    some operation must run vai transaction
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobPost  $jobPost
     * @return \Illuminate\Http\Response
     */
    public function show(JobPost $jobPost)
    {
       $jobPost= $jobPost->load(['user', 'functionArea']);
        return view('jobPost.show',compact('jobPost'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobPost  $jobPost
     * @return \Illuminate\Http\Response
     */
    public function edit(JobPost $jobPost)
    {
        $functionAreas=FunctionArea::latest('id')->get();
        return view('jobPost.edit',compact('jobPost', 'functionAreas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobPost  $jobPost
     * @return \Illuminate\Http\Response
     */
    public function update(JobPostEditRequest $request, JobPost $jobPost)
    {
        $data= $request->validated();
        $jobPost->update($data);
        return redirect(route('jobPost.index'))->with('message','the selected jobPost update successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobPost  $jobPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobPost $jobPost)
    {
        $jobPost->delete();
        if (auth()->user()->role == 'supperAdmin') {
            return redirect(route('jobPost.index'))->with('dangerMessage', 'the selected job post  deleted !');
        } elseif (auth()->user()->role == 'employeer') {
            return redirect(route('employeerPost.index'))->with('dangerMessage', 'the selected job post  deleted !');
        }
    }

    public function deactive(JobPost $jobPost){
        // dd($jobPost);
        $jobPost->status='deactive';
        $jobPost->save();
        
        if (auth()->user()->role == 'supperAdmin') {
            return redirect(route('jobPost.index'))->with('dangerMessage', 'the selected job pos deactived !');
        } elseif (auth()->user()->role == 'employeer') {
            return redirect(route('employeerPost.index'))->with('dangerMessage', 'the selected job pos deactived !');
        }
    }

    public function active(JobPost $jobPost){
        $jobPost->status='active';
        $jobPost->save();
        $jobPost->save();
        if (auth()->user()->role == 'supperAdmin') {
            return back()->with('message', 'the selected job pos actived !');
        } elseif (auth()->user()->role == 'employeer') {
            return back()->with('message', 'the selected job pos actived !');
        }
    }
    public function deactivePost(){
        return view('deactivePost.index');
    }
}
