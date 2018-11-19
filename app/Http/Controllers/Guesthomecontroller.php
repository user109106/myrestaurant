<?php

namespace App\Http\Controllers;

use App\Slider;
use App\Item;
use App\Itemcategory;
use App\Offer;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class Guesthomecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //dd($signatures);
        $offers  = Offer::all();
        
        $sliders = Slider::all();
        $cat = Itemcategory::find(1)->where('item_category_name','=','signature')->first();
        $signatures = Item::all()->where('item_cat_id','=',$cat->id);
        

        return view('welcome',['sliders'=>$sliders],['signatures'=>$signatures]);
    }
    public function service(){
        $services = Service::all()->where('service_status','!=','1');
        $activeservices = Service::all()->where('service_status','=','1');
        return view::make('service',['services'=>$services],['activeservices'=>$activeservices]);
    }
    public function event()
    {
        return view('event');
    }
    public function gallery(){
        $items = Item::all()->where('id','!=','0');
        $offers = Offer::all()->where('item_id','=','0');
        $services = Service::all();
        $sliders = Slider::all();

        // return view('gallery', compact('items'), compact('offers'), compact('services'), compact('sliders'));
        return view::make('gallery')->with(compact('items','offers','services','sliders'));
    }
    public function pricing(){
        $items = Item::with('itemcategories')->where('id','!=','0')->orderBy('item_cat_id')->get();
        $offers = Offer::all()->where('item_id','=','0');
        return view::make('pricing')->with(compact('items','offers'));
    }
    public function contact(){
        return view('contact');
    }
    public function message(Request $request){
        //return view('contact');
        return redirect()->route('contact')->with('success','Thanks for your message.');
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
        //dd($id);
        $item = Item::all()->where('id','=',$id)->first();
        $offer = Offer::all()->where('id','=',$id)->first();
        //dd($item);
        return view::make('viewitem')->with(compact('item','offer'));
        return view('viewitem', ['item'=>$item, 'offer'=>$offer]);
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
