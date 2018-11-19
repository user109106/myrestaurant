@extends('layouts.app_admin')

@section('content')
<div class="card-body">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    {{-- @component('components.who')
    @endcomponent --}}

@include('partials.error')
@include('partials.success')
    <div class="header"> 
        <h1 class="page-header">
            Edit Service
        </h1>
        
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="/admin">Dashboard</a></li>
            <li><a href="/services">All Services</a></li>
            <li class="active">Edit Service</li>
        </ol> 
                            
    </div>
        <!--Main content start here-->
    <div id="page-inner">
        <div class="dashboard-cards"> 
            <div class="row">
                
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-action">
                            Note: Edit any option or All
                        </div>
                        <div class="card-content">     
                            <form class="col s12" method="post" action="{{ route('services.update',[$service->id]) }}" enctype="multipart/form-data" >
                                @csrf
                                <input type="hidden" name="_method" value="put">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="service" name="service_title" type="text" class="validate" value="{{ $service->service_title }}">
                                        
                                    </div>
                                    
                                    <div class="input-field col s12">
                                        <textarea placeholder="Enter service details(optional)"
                                                style="resize:vertical"
                                                id="service"
                                                name="service_details"
                                                rows="5"
                                                class="form-control autosize-target text-left"
                                        >{{ $service->service_details }}</textarea>
                                    </div>
                                    <div class="input-field col s12">
                                        <div class="form-group">
                                                Select status*
                                            <select class="form-control" id="service" name="service_status" required="required">
                                                @if($service->service_status == 1)
                                                    <option value="1">Available</option>
                                                    <option value="2">Unvailable</option>
                                                    <option value="3">Coming Soon</option>
                                                @elseif($service->service_status == 2)
                                                    <option value="2">Unvailable</option>
                                                    <option value="1">Available</option>
                                                    <option value="3">Coming Soon</option>
                                                @elseif($service->service_status == 3)
                                                    <option value="3">Coming Soon</option>
                                                    <option value="1">Available</option>
                                                    <option value="2">Unvailable</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    @if ($service->service_image)
                                        <img src="/storage/{{ $service->service_image }}" height="150px" width="270px">
                                    @else
                                        No image Available
                                    @endif
                                    
                                    <div class="input-field col s12">
                                        <label class="control-label" for="fileInput">Current Image </label><hr>
                                        <div class="controls">
                                            <input class="input-file btn-success" name="service_image" id="fileInput" type="file">
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary pull-right" value="Submit">
                            </form>
                            <div class="clearBoth"></div>
                        </div>
                    </div>
                </div>
            </div> 
            </div><!-- /. ROW  -->    
        </div>
    </div><!-- /. PAGE INNER  --> 
@endsection


