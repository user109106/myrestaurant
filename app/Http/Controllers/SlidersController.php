<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Image;

class SlidersController extends Controller
{
    
    protected static $imageFields = [
        'avatar' => [
            'width' => 300,
            'height' => 200,
            'resize_image_quality' => 90,
            'crop' => true
        ]
    ];

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
            $sliders = Slider::orderBy('id','DESC')->get();
            return view('sliders.index',['sliders' => $sliders]);
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
    // if ($request->hasFile('slider_image')) {
    //     //get filename with extension
    //     $filenamewithextension = $request->file('slider_image')->getClientOriginalName();

    //     //get filename with extension
    //     $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

    //     //get file extension
    //     $extension = $request->file('slider_image')->getClientOriginalName();

    //     //filename to store
    //     $filenametostore = $filename.'_'.time().'.'.$extension;

    //     //upload file
    //     $request->file('slider_image')->storeAs('slider_images', $filenametostore);
    //     $request->file('slider_image')->storeAs('slider_images/thumbnail', $filenametostore);

    //     //Resize image here
    //     $thumbnailpath = public_path('storage/slider_iamges/thumbnail/'.$filenametostore);
    //     // $img = Image::make($thumbnailpath)->resize(100,100, function($constraint){
    //     //     $constraint->aspectRation();
    //     // });
    //     // $img->save($thumbnailpath);

    //     $img = Image::make($thumbnailpath)->resize(100,400)->save($thumbnailpath);
    // }
    
    if (Auth::check()) {
        $path = $request->file('slider_image')->store('sliders');
        
        $slider = Slider::create([
            'slider_name' => $request->input('slider_name'),
            'slider_title' => $request->input('slider_title'),
            'publication_status' => '1',
            'slider_image' => $path
        ]);
        if ($slider) {
            return redirect()->route('sliders.index')
                            ->with('success', 'Slider created successfully');
        }
    }
    return back()->withInput()->with('error', 'Error uploading slide, please try again..');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
        
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        //
        //dd($slider);
        $findSlider = Slider::find($slider->id);
        
        $imagefilename = $findSlider->slider_image;
        

        if ($findSlider->delete()) {
            Storage::delete($imagefilename);
            return redirect()->route('sliders.index')
                             ->with('success', 'Slider deleted finally, now take rest');
        }else{
            return back()->withInput()->with('error','still not deleted..');
        }
    }
}
