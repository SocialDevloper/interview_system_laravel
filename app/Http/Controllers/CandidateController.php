<?php

namespace App\Http\Controllers;

use App\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* collection method practice */

        /* get only even id record fetch */
        /*$collection = Candidate::all();
        $filter = $collection->filter(function($value, $key) {
            if ($value['id'] %2 == 0) {
                return true;
            }
        });

        // add 1 in totalExperience column
        $changed = $filter->map(function ($value, $key) {
            $value['totalExperience'] += 1;
            return $value;
        }); 
        dd($changed->all());*/

        /* -----*/

        /* login user Mitesh access candidate */
        /*if (Gate::denies('isMitesh')) {

            return redirect()->route('home')->with('warning', 'You are not Authorized to create new candidate');
        }*/
        $candidates = Candidate::paginate(5);
        return view('candidate.index', compact('candidates'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**
     * Display Trashed listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        $candidates = Candidate::onlyTrashed()->paginate(5);
        return view('candidate.index', compact('candidates'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // get current logged in user (use policy permission)
        $user = Auth::user();
        if ($user->can('create', Candidate::class)) {
          return view('candidate.create');
        } else {
          return redirect()->route('home')->with('warning', 'You are not Authorized to create new candidate');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:candidates,email,'.$request->id,
            'selectEducation' => 'required',
            'applyFor' => 'required',
            'totalExperience' => 'required',
            'currentCTC' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'expectedCTC' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'noticePeriod' => 'required|numeric',
            'interviewDate' => 'required|date',
            'selectStatus' => 'required',
        ]);

        $candidate = new Candidate;
        $candidate->first_name = $request->first_name;
        $candidate->middle_name = ($request->middle_name) ? $request->middle_name : '';
        $candidate->last_name = $request->last_name;
        $candidate->email = $request->email;
        $candidate->selectEducation = $request->selectEducation;
        $candidate->applyFor = $request->applyFor;
        $candidate->totalExperience = $request->totalExperience;
        $candidate->currentCTC = $request->currentCTC;
        $candidate->expectedCTC = $request->expectedCTC;
        $candidate->noticePeriod = $request->noticePeriod;
        $candidate->interviewDate = date("Y-m-d", strtotime($request->interviewDate));
        $candidate->selectStatus = $request->selectStatus;
        $candidate->reason_to_leave_job = ($request->reason_to_leave_job) ? $request->reason_to_leave_job : '';
        $save = $candidate->save();
        if($save)
        {
            $to_name = "Mitesh Kadivar";
            $to_email = "miteshk@websoptimization.com";
            $data = array('name' => "Mitesh Kadivar", "body" => "Candidate Name = ".$candidate->first_name. " ". $candidate->last_name);
              
            Mail::send('mail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
            ->subject('Laravel Candidate Create Mail - Interview System');
            $message->from('socialdevp786@gmail.com','Test Mail');
            });


            return redirect()->route('candidate.index')->with('success','Candidate created successfully.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function show(Candidate $candidate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidate $candidate)
    {
        /* use Gate for edit permission */
        if (Gate::denies('isMitesh')) {

            return redirect()->route('home')->with('warning', 'You are not Authorized to edit candidate');
        }
        $candidates = Candidate::where('id','!=', $candidate->id)->get();
         return view('candidate.create',['candidates' => $candidates, 'candidate'=>$candidate]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidate $candidate)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:candidates,email,'.$candidate->id,
            'selectEducation' => 'required',
            'applyFor' => 'required',
            'totalExperience' => 'required',
            'currentCTC' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'expectedCTC' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'noticePeriod' => 'required|numeric',
            'interviewDate' => 'required|date',
            'selectStatus' => 'required',
        ]);

        $candidate = Candidate::find($candidate->id);
        $candidate->first_name = $request->first_name;
        $candidate->middle_name = ($request->middle_name) ? $request->middle_name : '';
        $candidate->last_name = $request->last_name;
        $candidate->email = $request->email;
        $candidate->selectEducation = $request->selectEducation;
        $candidate->applyFor = $request->applyFor;
        $candidate->totalExperience = $request->totalExperience;
        $candidate->currentCTC = $request->currentCTC;
        $candidate->expectedCTC = $request->expectedCTC;
        $candidate->noticePeriod = $request->noticePeriod;
        $candidate->interviewDate = date("Y-m-d", strtotime($request->interviewDate));
        $candidate->selectStatus = $request->selectStatus;
        $candidate->reason_to_leave_job = ($request->reason_to_leave_job) ? $request->reason_to_leave_job : '';
        $save = $candidate->save();
        if($save)
        {
            return redirect()->route('candidate.index')->with('success','Candidate updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidate $candidate)
    {
        if($candidate->forceDelete()){
            return redirect()->route('candidate.index')->with('success','Candidate Successfully Deleted!');
        }else{
            return back()->with('message','Error Deleting Candidate');
        }
    }

    public function recoverCand($id)
    {
        $candidate = Candidate::onlyTrashed()->findOrFail($id);
        if($candidate->restore())
            return redirect()->route('candidate.index')->with('success','Candidate Successfully Restored!');
        else
            return back()->with('message','Error Restoring Candidate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function remove(Candidate $candidate)
    {
        if($candidate->delete()){
            return redirect()->route('candidate.index')->with('success','Candidate Successfully Trashed!');
        }else{
            return back()->with('message','Error Deleting Record');
        }
    }

    /* Fetch All candidate display in dashboard */
    public function fetchAll(Request $request)
    {
         $candidates = Candidate::select('*')
                ->where('applyFor', 'like', '%'.$request->applyFor.'%')
                ->where('selectStatus', 'like', '%'.$request->status.'%')
                /*->where([
                    ['applyFor', '=', $request->applyFor],
                    ['selectStatus', '=', $request->status]
                ])*/
                ->paginate(5);

        return view('candidate.searchtemplate',compact('candidates'));
                                   
    }
}
