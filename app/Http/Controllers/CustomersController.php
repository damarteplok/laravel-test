<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Product;
use Session;

use Auth;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:customer');
    }
    
    public function index(Request $request)
    {
        //
        // dd($request->invisible);
        return view('client.createtrans')
        ->with('date', $request->invisible)
        ->with('products', Product::all())
        ->with('customer', Customer::first());
    }

    public function index1()
    {
        // $tglGlobal = (Session::has('tglGlobal')) ? Session::get('tglGlobal') : [];
        $tglGlobal = Session::get('tglGlobal');
        
        
        return view('client.createtrans')
        ->with('tglGlobal', $tglGlobal)
        ->with('products', Product::all())
        ->with('customer', Customer::first());
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
        $this->validate($request, [

            'name' => 'required|max:255',
            'email' => 'required|email',
            'nohp' => 'required|max:18',
            'alamat' => 'required|max:255',
            'password' => 'required|confirmed|min:6'
            

        ]);


        $customer = new Customer;
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->nohp = $request->nohp;
        $customer->alamat = $request->alamat;
        $customer->password = bcrypt($request->password);
        $customer->save();

        

        Session::flash('success', 'created succesfully');

        return redirect()->route('books');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function update2(Request $request)
    {
        //
        $this->validate($request,[

            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'nohp' => 'required',
            'alamat' => 'required'

        ]);

        $member = Customer::find($request->id);

        


        $member->name = $request->name;
        $member->email = $request->email;
        $member->nohp = $request->nohp;
        $member->alamat = $request->alamat;

        
        

        if($request->has('password'))
        {

            $member->password = bcrypt($request->password);

        }

        $member->save();

        Session::flash('success','member profile updated');

        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
