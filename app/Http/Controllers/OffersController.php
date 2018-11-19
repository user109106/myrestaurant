<?php

namespace App\Http\Controllers;

use App\Offer;
use App\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class OffersController extends Controller
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
            $offers = Offer::with('item')->orderBy('id', 'DESC')->get();
            //dd($offers);
            $allitems = Item::all();
            return view('offers.index', ['offers'=> $offers], ['allitems'=> $allitems]);
            
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
            if ($request->file('offer_image')) {
                $path = $request->file('offer_image')->store('offers');
            }else{
                $path = '';
            }
            

            $offer = Offer::create([
                'offer_name' => $request->input('offer_name'),
                'offer_description' => $request->input('offer_description'),
                'offer_status' => $request->input('offer_status'),
                'offer_price' => $request->input('offer_price'),
                'offer_duration' => $request->input('offer_duration'),
                'item_id' => $request->input('item_id'),
                'user_id' => Auth::user()->id,
                'offer_image' => $path
            ]);
            if ($offer) {
                return redirect()->route('offers.index')
                                ->with('success', 'Offer created successfully');
            }
        }
        return back()->withInput()->with('error', 'Error creating new Offer, please try again..');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $offer)
    {
        //
        $items = Item::all();
        $offer = Offer::find($offer->id);
        return view('offers.edit',['offer'=>$offer],['items'=>$items]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offer $offer)
    {
        //
        //dd($offer);
        if (Auth::check()) {
            if ($file = $request->file('offer_image')) {
                $findImg = Offer::find($offer->id);
                $imagefile = $findImg->offer_image;

                $path = $request->file('offer_image')->store('offers');
                $offerUpdate = Offer::where('id', $offer->id)
                                ->update([
                                    'offer_name' => $request->input('offer_name'),
                                    'offer_description' => $request->input('offer_description'),
                                    'offer_status' => $request->input('offer_status'),
                                    'offer_price' => $request->input('offer_price'),
                                    'offer_duration' => $request->input('offer_duration'),
                                    'user_id' => Auth::user()->id,
                                    'offer_image' => $path
                                ]);
                if ($offerUpdate) {
                    Storage::delete($imagefile);
                    return redirect()->route('offers.edit',['offer'=>$offer->id])->with('success', 'Offer updated successfully with image');
                }
            }else{
                $offerUpdate = Offer::where('id', $offer->id)
                                ->update([
                                    'offer_name' => $request->input('offer_name'),
                                    'offer_description' => $request->input('offer_description'),
                                    'offer_status' => $request->input('offer_status'),
                                    'offer_price' => $request->input('offer_price'),
                                    'offer_duration' => $request->input('offer_duration'),
                                    'item_id' => $request->input('item_id'),
                                    'user_id' => Auth::user()->id
                                ]);
                if($offerUpdate){
                    return redirect()->route('offers.edit',['offer'=>$offer->id])->with('success', 'Offer updated successfully');
                }
            }
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $offer)
    {
        //
        //dd($offer);
        $findOffer = Offer::find($offer->id);
        $imagefilename = $findOffer->offer_image;

        if ($findOffer->delete()) {
            // Storage::delete($imagefilename); //if it's deleted some menu photos may get deleted
            return redirect()->route('offers.index')
                             ->with('success', 'Offer deleted!');
        }else{
            return back()->withInput()->with('Error','still not deleted..');
        }
    }
}
