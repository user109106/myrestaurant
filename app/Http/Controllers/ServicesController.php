<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ServicesController extends Controller
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
        $services = Service::orderBy('id','DESC')->get();
        return view('services.index',['services'=>$services]);
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
            if($request->file('service_image')){
            $path = $request->file('service_image')->store('services');
            
            $service = Service::create([
                'service_title' => $request->input('service_title'),
                'service_details' => $request->input('service_details'),
                'service_status' => $request->input('service_status'),
                'service_image' => $path
            ]);
            }else{
                $service = Service::create([
                    'service_title' => $request->input('service_title'),
                    'service_details' => $request->input('service_details'),
                    'service_status' => $request->input('service_status')
            ]);
            }

            if ($service) {
                return redirect()->route('services.index')
                                ->with('success', 'Service created successfully');
            }
        }
        return back()->withInput()->with('error', 'Error creating service, please try again..');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
        $service = Service::find($service->id);
        return view('services.edit', ['service'=>$service]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
        if (Auth::check()) {
            if ($file = $request->file('service_image')) {
                $findImg = Service::find($service->id);
                $imagefile = $findImg->service_image;

                $path = $request->file('service_image')->store('services');
                $serviceUpdate = Service::where('id', $service->id)
                                ->update([
                                    'service_title' => $request->input('service_title'),
                                    'service_details' => $request->input('service_details'),
                                    'service_status' => $request->input('service_status'),
                                    'service_image' => $path
                                ]);
                if ($serviceUpdate) {
                    Storage::delete($imagefile);
                    return redirect()->route('services.edit',['service'=>$service->id])->with('success', 'service updated successfully with image');
                }
            }else{
                $serviceUpdate = Service::where('id', $service->id)
                                ->update([
                                    'service_title' => $request->input('service_title'),
                                    'service_details' => $request->input('service_details'),
                                    'service_status' => $request->input('service_status')
                                ]);
                if($serviceUpdate){
                    return redirect()->route('services.edit',['service'=>$service->id])->with('success', 'service updated successfully without image');
                }
            }
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
        $findService = Service::find($service->id);
        
        $imagefilename = $findService->service_image;
        

        if ($findService->delete()) {
            Storage::delete($imagefilename);
            return redirect()->route('services.index')
                             ->with('success', 'Service deleted finally, now take rest');
        }else{
            return back()->withInput()->with('error','service still not deleted..');
        }
    }
}
