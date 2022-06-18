<?php

namespace App\Http\Controllers;

use App\Models\Apoientment;
use App\Models\User;
use Illuminate\Http\Request;
use Kreait\Firebase\Contract\Database;

use Auth;

class ApoientmentController extends Controller
{
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
        //firebase
        $ref_tablename = 'apoientments';
        $reference = $this->database->getReference( $ref_tablename)->getValue();


       $appointment = Apoientment::all();
       return view('dashboard.appointment.all',compact('appointment','reference'));
    }
    public function doctor_app()
    {
       $appointment = Apoientment::where('doctor_id',auth()->user()->id)->get();
       return view('dashboard.doctor.all_app',compact('appointment'));
    }
    public function patient_app()
    {
       $appointment = Apoientment::where('patient_id',auth()->user()->id)->get();
       return view('dashboard.patient.all_app',compact('appointment'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=User::where('type',2)->get();
        // dd($user);
        return view('dashboard.appointment.add',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = time().'.'.$request->image->getClientOriginalExtension();
        $path1 = time().'.'.$request->video->getClientOriginalExtension();

        Apoientment::create([
            
            'doctor_id'=>$request->doctor_id,
            'patient_id'=>auth()->user()->id,
            'day'=>$request->day,
            'reason'=>$request->reason,
            'image'=>$path,
            'video'=>$path1,

         
        ]);


          //firebase
          $ref_tablename = 'apoientments';
          $postData = ['doctor_id'=>$request->doctor_id,
          'patient_id'=>auth()->user()->id,
          'day'=>$request->day,
          'reason'=>$request->reason,
          'image'=>$path,
          'video'=>$path1,];
          $postRef = $this->database->getReference($ref_tablename)->push($postData);

        $request->image->move( public_path('images'), $path);
        $request->video->move( public_path('videos'), $path1);

        
        return redirect()->route('appoientment.create')->with('success' , 'سيتم الرد عليك في اقرب وقت');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apoientment  $apoientment
     * @return \Illuminate\Http\Response
     */
    public function show(Apoientment $apoientment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apoientment  $apoientment
     * @return \Illuminate\Http\Response
     */
    public function edit(Apoientment $apoientment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Apoientment  $apoientment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apoientment $apoientment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apoientment  $apoientment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apoientment $apoientment)
    {
        //
    }
}
