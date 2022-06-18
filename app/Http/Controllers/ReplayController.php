<?php

namespace App\Http\Controllers;

use App\Models\Replay;
use App\Models\Apoientment;
use App\Models\User;
use Kreait\Firebase\Contract\Database;

use Illuminate\Http\Request;

class ReplayController extends Controller
{
    //firebase
    public function __construct(Database $database)
    {
        $this->database = $database;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $replays = Replay::all();
        return view('dashboard.admin.all_replay',compact('replays'));
    }
    public function dctor_replays()
    {
        $replays = Replay::where('doctor_id',auth()->user()->id)->get();
        // dd($replays);
        return view('dashboard.doctor.all_replay',compact('replays'));
    }
    public function patient_replays()
    {
        $replays = Replay::where('patient_id',auth()->user()->id)->get();
        return view('dashboard.patient.all_replay',compact('replays'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.doctor.consult');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Replay::create([
            
            'doctor_id'=>auth()->user()->id,
            'patient_id'=>$request->patient_id,
            'replay'=>$request->replay,
            'app_text'=>$request->app_text,
         
        ]);

        //firebase
        $ref_tablename = 'replays';
        $postData = ['doctor_id'=>auth()->user()->id,
        'patient_id'=>$request->patient_id,
        'replay'=>$request->replay,
        'app_text'=>$request->app_text,];
        $postRef = $this->database->getReference($ref_tablename)->push($postData);


        Apoientment::where('id',$request->order_id)->delete();
        return redirect()->route('doctor.app')->with('success' , 'سيتم الرد عليك في اقرب وقت');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Replay  $replay
     * @return \Illuminate\Http\Response
     */
    public function show(Replay $replay)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Replay  $replay
     * @return \Illuminate\Http\Response
     */
    public function edit(Replay $replay)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Replay  $replay
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Replay $replay)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Replay  $replay
     * @return \Illuminate\Http\Response
     */
    public function destroy(Replay $replay)
    {
        //
    }
}
