<?php

namespace App\Http\Controllers;

use App\Itemcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemcategorysController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $item_cats = Itemcategory::orderBy('id','desc')->get();
        // dd($item_cats);
        return view('itemcategories.index', ['item_cats'=> $item_cats]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('itemcategories.index');
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
        if (Auth::check()) {
            $itemcategory = Itemcategory::create([
                'item_category_name' => $request->input('item_category_name'),
                'item_category_status' => $request->input('item_category_status')
            ]);

            if ($itemcategory) {
                return redirect()->route('all_item_categories.index')
                                 ->with('success', 'Category created successfully');
            }
        }else{
            return back()->withInput()->with('error','Error creating new category..');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Itemcategory  $itemcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Itemcategory $itemcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Itemcategory  $itemcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Itemcategory $itemcategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Itemcategory  $itemcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Itemcategory $itemcategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Itemcategory  $itemcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($itemcategory)
    {
        //
        //dd($itemcategory);

        //$findCat = Itemcategory::find($itemcategory);
        //dd($findCat);
        $findItem = Itemcategory::find($itemcategory);
        if ($findItem->delete()) {
            return redirect()->route('itemcategories.index')
                             ->with('success', 'Item deleted');
        }else{
            return back()->withInput()->with('error','still not deleted..');
        }
        
    }
}
