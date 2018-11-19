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
            Edit Offer
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="/admin">Dashboard</a></li>
            <li><a href="/offers">All Offers</a></li>
            <li class="active">Edit Offer</li>
        </ol> 
                         
    </div>
        <!--Main content start here-->
    <div id="page-inner">
        <h4>Edit offer</h4> 
        <div class="dashboard-cards"> 
            
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-action">
                            Add New Item (All fields are optional)
                        </div>
                        <div class="card-content">     
                        <form class="col s12" method="post" action="{{ route('offers.update',[$offer->id]) }}" enctype="multipart/form-data" >
                            @csrf
                            <input type="hidden" name="_method" value="put">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="offer" name="offer_name" type="text" class="validate" value="{{ $offer->offer_name }}">
                                </div>
                                <div class="input-field col s12">
                                    <input id="offer" name="offer_price" type="text" class="validate" value="{{ $offer->offer_price }}">
                                </div>
                                <div class="input-field col s12">
                                    <input id="offer" name="offer_duration" type="text" class="validate" value="{{ $offer->offer_duration }}">
                                </div>
                                <div class="input-field col s12">
                                    <textarea placeholder="Write some detail information (optional - Try to keep it short but attractive)"
                                            style="resize:vertical"
                                            id="offer"
                                            name="offer_description"
                                            rows="5"
                                            class="form-control autosize-target text-left"
                                    >{{ $offer->offer_description }}</textarea>
                                </div>
                                <div class="input-field col s12">
                                    <div class="form-group">
                                            Select status*
                                        <select class="form-control" id="offer" name="offer_status" required="required">
                                            @if ($offer->offer_status == 1)
                                                <option value="1">Available</option>
                                                <option value="2">Unvailable</option>
                                                <option value="3">Coming Soon</option>
                                            @elseif($offer->offer_status == 2)
                                                <option value="2">Unvailable</option>
                                                <option value="1">Available</option>
                                                <option value="3">Coming Soon</option>
                                            @else
                                                <option value="3">Coming Soon</option>
                                                <option value="1">Available</option>
                                                <option value="2">Unvailable</option>
                                            @endif
                                            
                                        </select>
                                    </div>
                                </div>
                                {{-- <div class="input-field col s12">
                                    <div class="form-group">
                                            <p>( <b>Note*</b> - <span style="color:red">If you give offer on the the product that belongs to your Menu,it will automatically pull the photo from your menu, you don't need to Upload new image. keep it blank <strong>else</strong> keep it blank and upload new image</span> )</p>Select Item From Menu- 
                                        <select class="form-control" id="offer" name="item_id">
                                                <option value="{{ $offer->item_id }}">select one</option>
                                            @foreach ($items as $item)
                                                <option value="{{ $item->id }}">{{ $item->item_name }}</option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                </div> --}}
                                @if ($offer->item_id == 0)
                                    <div class="input-field col s12">
                                    <img src="/storage/{{ $offer->offer_image }}" height="150px" width="270px">
                                </div>
                                <div class="input-field col s12">
                                    <label class="control-label" for="fileInput">Current Image(Change - optional)</label><hr>
                                    <div class="controls">
                                        <input class="input-file btn-success" name="offer_image" id="fileInput" type="file">
                                    </div>
                                </div>
                                @endif
                                
                            </div>
                            <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
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
