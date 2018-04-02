<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Customer;
use Session;
use App\Booklist;
use Mail;
use Auth;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index1()
    {
        //
        return view('client.createcus');
    }

    public function index()
    {
        //
        return redirect()->route('customer.login');
    }

    public function adminIndex()
    {
        //
        // $b = Booklist::orderBy('created_at', 'desc')->get();
        // dd($b->count());

        return view('admin.booklist.index')->with('books', Booklist::orderBy('created_at', 'desc')->paginate(10))
                                           ->with('customer', Customer::all());
                                         
    }

    public function adminIndex1()
    {
        //

        return view('admin.member.index')->with('member', Customer::orderBy('created_at', 'desc')->paginate(10));
                                           
                                         
    }

    public function rekapIndex()
    {
        //

        return view('admin.booklist.rekapbln');
                                           
                                         
    }
    public function rekapIndexx()
    {
        //

        return view('admin.booklist.rekapblnn');
                                           
                                         
    }

    public function rekapIndex1(Request $request)
    {
        //
        $result = Booklist::whereMonth('created_at','=', $request->bln)
                                ->whereYear('created_at','=',$request->bln1)
                                ->get();
                              
        $sum =0;
        foreach ($result as $key) {
            # code...
            if ($key->status == 2){

                $sum = $sum + $key->product->price;;
            }
        }
        return view('admin.booklist.rekapbln1')->with('result',$result)
        ->with('sum',$sum);
                                           
                                         
    }
    public function rekapIndex2(Request $request)
    {
        //
        $result = Booklist::whereYear('created_at','=',$request->thn)
                                ->get();
        // dd($result->count());

        $sum =0;
        foreach ($result as $key) {
            # code...
            if ($key->status == 2){

                $sum = $sum + $key->product->price;;
            }
        }
        return view('admin.booklist.rekapthn')->with('result',$result)
        ->with('sum',$sum);
                                           
                                         
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
        // if (Auth::guard('customer')->check()){
        //     $user = Auth::user();
        // }
        Auth::shouldUse('customer'); 
//         if (Auth::guard('customer')->check()){
//     $customer_id = Auth::user();
// }
        $customer_id = Auth::id();
    //dd(auth()->user()->name);
        $this->validate($request, [

            'date' => 'required|date_format:Y-m-d|unique:booklists',
            'product_id' => 'required'
            

        ]);

        $invoice = "INV".uniqid();
        // dd($invoice);

        $customer = Booklist::create([

            'date'=> $request->date,
            'product_id' => $request->product_id,
            'customer_id' => $customer_id,
            'category_id' => $request->category_id,
            'invoice' => $invoice,
            'status' => 1

        ]);
        
        $product = $customer->product->name;
        $price = $customer->product->price;
        $description = $customer->product->description;
        $email = auth()->user()->email;
        $data = array(
        
        
        'name' => auth()->user()->name,
        'tglmsn' => $customer->created_at,
        'tglbook' => $customer->date,
        'email' => auth()->user()->email,
        'invoice' => $customer->invoice,
        'product' => $product,
        'price' => $price,
        'description' => $description
        
        );
        

        Mail::send('emails.invoice', $data, function ($message) use ($email) {

            $message->from('testestestes081081081@gmail.com', 'AbsolutHaram');

            $message->to($email)->subject('Invoice from absolutharam');
            // dd($email);
        });


        Session::flash('success', 'Post created succesfully');


        return redirect()->route('index');
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
        $book = Booklist::find($id);


        $book->status = 2;

        $book->save();


        Session::flash('success','success accept guys');

        return redirect()->route('books.admin');

    

        
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $book = Booklist::find($id);

       

        $book->delete();

        Session::flash('success', 'U succesfuly delete booklist');

        return redirect()->route('books.admin');
    }

    public function destroy1($id)
    {   

       
        //
        $customer = Customer::find($id);

        foreach ($customer->books as $book) {
            $book->forceDelete();

        }

       

        $customer->delete();

        Session::flash('success', 'U succesfuly delete');

        return redirect()->route('member.admin');
    }


    public function store1(Request $request)
    {
        //
        $this->validate($request, [

            'name' => 'required|max:255',
            'email' => 'required|email|unique:customers,email',
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

    public function history($id)
    {   

       
        //
        $customer = Customer::find($id);
        $customer = $customer->books()->get();


        return view('admin.member.history')->with('member', $customer);
    }
}
