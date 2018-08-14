<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\User;
use App\Category;
use App\Product;
use App\Booklist;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }s

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book = Booklist::all();
        $paid=0;
        foreach ($book as $key) {
            # code...
            if ($key->status == 2) {
                
                $paid++;
            }
            
        }
        $sum =0;
        foreach ($book as $key) {
            # code...
            if ($key->status == 2){

                $sum = $sum + $key->product->price;;
            }
        }

        $bookdoang = 0;
        foreach ($book as $key) {
            # code...
            if ($key->status == 1) {
                
                $bookdoang++;
            }
            
        }
        $now = Carbon::now();

        $bookmonth = Booklist::whereMonth('date', '=', $now->month)->get();
        $sum1 =0;
        foreach ($bookmonth as $key) {
            # code...
            if ($key->status == 2){

                $sum1 = $sum1 + $key->product->price;;
            }
        }

        return view('home')->with('post_count', Post::all()->count())
       ->with('trashed_count', Post::onlyTrashed()->get()->count()) 
       ->with('users_count', User::all()->count())
       ->with('categories_count', Category::all()->count())
       ->with('product_count', Product::all()->count())
       ->with('paid_count', $paid)
       ->with('book_count', $bookdoang)
       ->with('sum_paid', $sum)
       ->with('sum1_paid', $sum1);
    }

}
