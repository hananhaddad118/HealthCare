<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Models\Acceptable;

use Illuminate\Support\Facades\Hash;
use Kreait\Firebase\Contract\Database;
use Illuminate\Http\Request;

class OrderController extends Controller
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
        $users = User::where('type',2)->get();
        $orders = Order::all();
        return view ('dashboard.order.all',compact('orders','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.order.add');
    }
    public function users(){
        $users = User::all();
        return view('dashboard.order.user',compact('users'));
    }
    public function accept_order( ){

        $users = Acceptable::all();
        return view('dashboard.order.accepted',compact('users'));
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
            
            'name'=>'required',
        
            
        ]);
        $path = time().'.'.$request->attached->getClientOriginalExtension();
        $path_image = time().'.'.$request->image->getClientOriginalExtension();
        
        Order::create([
            
            'name'=>$request->name,
            'password'=>$request->password,
            'order_reason'=>$request->order_reason,
            'dob'=>$request->dob,
            'major'=>$request->major,
            'attached'=>$path,
            'image'=>$path_image,
        ]);
        //firebase
        $ref_tablename = 'orders';
        $postData = ['name'=>$request->name,
        'password'=>$request->password,
        'order_reason'=>$request->order_reason,
        'dob'=>$request->dob,
        'major'=>$request->major,
        'attached'=>$path,
        'image'=>$path_image,];
        $postRef = $this->database->getReference($ref_tablename)->push($postData);
        
        $request->attached->move( public_path('images'), $path);
        $request->image->move( public_path('images'), $path_image);
        return redirect()->route('order.create')->with('success' , 'سيتم الرد عليك في اقرب وقت');
    }
    public function accept_user(Request $request ){

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'type' => $request->type,
            'major'=>$request->major,
            'doctor_id'=>$request->doctor_id,
            'image'=>$request->image,

            'password' => Hash::make($request->password),
        ]);
        //firebase
        $ref_tablename = 'users';
        $postData = ['name' => $request->name,
        'email' => $request->email,
        'type' => $request->type,
        'major'=>$request->major,
        'doctor_id'=>$request->doctor_id,
        'image'=>$request->image,

        'password' => Hash::make($request->password),];
        $postRef = $this->database->getReference($ref_tablename)->push($postData);


        Acceptable::create([
            'name' => $request->name,
            'email' => $request->email,
            'type' => $request->type,
            'password' => Hash::make($request->password),
        ]);
        //firebase
        $ref_tablename = 'acceptables';
        $ref_tablename1 = 'orders';
        $postData = [   'name' => $request->name,
        'email' => $request->email,
        'type' => $request->type,
        'password' => Hash::make($request->password),

        'password' => Hash::make($request->password),];
        $this->database->getReference($ref_tablename)->push($postData);

        $this->database->getReference($ref_tablename1.'/'."N4HrQn0R6gG0k-8ujLy")->remove();

        Order::where('id',$request->order_id)->delete();
        return redirect()->route('order.index');
    }
 
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order=Order::where('id' , $id)->first();
        
        return view('armeks', compact('order'))  ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::where('id' , $id)->first();
        
        return view('dashboard.order.edit_user', compact('user'))  ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([

        
        ]);

        // $path = time().'.'.$request->image->getClientOriginalExtension();
        User::where('id',$id)->update([
            // 'image'=>$path,
            'name' => $request->name,
            'email' => $request->email,
            'type' => $request->type,
            'password' => Hash::make($request->password),
           
        ]);
        // $request->image->move( public_path('images'), $path);
        return redirect()->route('order.index')->with('success' , 'message');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
