<?php

namespace App\Http\Controllers;

use App\Item;
use App\Itemcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ItemsController extends Controller
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
        if (Auth::check()) {
            $items = Item::with('itemcategories')->where('id','!=','0')->orderBy('id', 'DESC')->get();
            $item_cats = Itemcategory::all();
            return view('items.index', ['items'=> $items], ['item_cats'=> $item_cats]);
            // dd($items);
            // dd($item_cats);
        }
        
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
        if (Auth::check()) {
            $path = $request->file('item_image')->store('item_images');

            $item = Item::create([
                'item_name' => $request->input('item_name'),
                'item_price' => $request->input('item_price'),
                'item_description' => $request->input('item_description'),
                'item_cat_id' => $request->input('item_cat_id'),
                'item_availability' => $request->input('item_availability'),
                'user_id' => Auth::user()->id,
                'item_image' => $path
            ]);
            if ($item) {
                return redirect()->route('items.index')
                                ->with('success', 'Item created successfully');
            }
        }
        return back()->withInput()->with('error', 'Error creating item, please try again..');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
        $item_cats = Itemcategory::all();
        $item = Item::find($item->id);
        return view('items.edit', ['item'=>$item], ['item_cats'=> $item_cats]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
        if (Auth::check()) {
            if ($file = $request->file('item_image')) {
                $findImg = Item::find($item->id);
                $imagefile = $findImg->item_image;

                $path = $request->file('item_image')->store('item_images');
                $itemUpdate = Item::where('id', $item->id)
                                ->update([
                                    'item_name' => $request->input('item_name'),
                                    'item_price' => $request->input('item_price'),
                                    'item_description' => $request->input('item_description'),
                                    'item_cat_id' => $request->input('item_cat_id'),
                                    'item_availability' => $request->input('item_availability'),
                                    'user_id' => Auth::user()->id,
                                    'item_image' => $path
                                ]);
                if ($itemUpdate) {
                    Storage::delete($imagefile);
                    return redirect()->route('items.edit',['item'=>$item->id])->with('success', 'Item updated successfully with image');
                }
            }else{
                $itemUpdate = Item::where('id', $item->id)
                                ->update([
                                    'item_name' => $request->input('item_name'),
                                    'item_price' => $request->input('item_price'),
                                    'item_description' => $request->input('item_description'),
                                    'item_cat_id' => $request->input('item_cat_id'),
                                    'item_availability' => $request->input('item_availability'),
                                    'user_id' => Auth::user()->id
                                ]);
                if($itemUpdate){
                    return redirect()->route('items.edit',['item'=>$item->id])->with('success', 'Item updated successfully without image');
                }
            }
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //dd($item);
        $findItem = Item::find($item->id);
        
        $imagefilename = $findItem->item_image;
        

        if ($findItem->delete()) {
            Storage::delete($imagefilename);
            return redirect()->route('items.index')
                             ->with('success', 'Item deleted finally, now take rest');
        }else{
            return back()->withInput()->with('error','still not deleted..');
        }
    }
}
