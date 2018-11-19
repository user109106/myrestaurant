<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Itemcategory;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admins.dashboard');
    }

    //custom functions
    public function all_item_category(){
        $item_cats = Itemcategory::all();
        // dd($item_cats);
        return view('admins.all_item_category', ['item_cats'=> $item_cats]);
    }
}
