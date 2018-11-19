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
            Manage All Offers
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="/admin">Dashboard</a></li>
            <li class="active">All Offers</li>
        </ol> 
                         
    </div>
        <!--Main content start here-->
    <div id="page-inner">
        <h4>List of all offers</h4> 
        <div class="dashboard-cards"> 
            
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <div class="card" style="background-color:#F44336;color:#fff;">
                        <div class="table-responsive">
                        <table class="table">
                            <thead style="text-align:center;background:#1F2837;font-weight:normal;">
                                <th >#</th>
                                <th style="color:white;" >image</th>
                                <th style="color:white;" >Title</th>
                                <th width="20%" style="color:white;" >Offer Price</th>
                                <th width="20%" style="color:white;" >Regular Price</th>
                                <th style="color:white;" >Offer Duration</th>
                                <th style="color:white;" style="" >Status</th>
                                <th width="20%">Item</th>
                                <th colspan="2">Actions</th>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($offers as $offer)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>
                                        @if ($offer->item->id != 0)
                                            <img src="storage/{{ $offer->item->item_image}}" height="80px" width="140px">
                                        @else
                                            <img src="storage/{{ $offer->offer_image}}" height="80px" width="140px">
                                        @endif
                                        
                                    </td>
                                    <th>{{ $offer->offer_name}}</th>
                                    <th>{{ $offer->offer_price}}Tk</th>
                                    <td>
                                        @if ($offer->item->item_price == 0)
                                             N/A 
                                        @else
                                            {{ $offer->item->item_price}}Tk
                                        @endif
                                        
                                    </td>
                                    <td>{{ $offer->offer_duration}}</td>
                                    
                                    <td>
                                        @if ($offer->offer_status == 1)
                                            <p style="color:yellow;text-align:center;font-weight:bold;">Available</p>
                                        @elseif($offer->offer_status == 3)
                                            <p style="color:Orange;text-align:center;">Coming Soon</p>
                                        @else
                                        <p style="color:red;text-align:center;">Unavailable</p>
                                        @endif
                                    </td>
                                    <td>{{ $offer->item->item_name }}</td>
                                    <td>
                                        <a href="/offers/{{ $offer->id }}/edit" class="btn btn-primary btn-sm">EDIT</a>
                                    </td>
                                    <td>
                                        

            <form id="delete_form" action="{{ route('offers.destroy',[$offer->id]) }}" method="post">
                @csrf
                <input type="hidden" name="_method" value="delete">
                
                <input class="btn btn-danger btn-sm" type="submit" name="submit" value="DELETE">
                
            </form>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                                @endforeach
                                
                            </tbody>
                        </table>
                        </div>
					</div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-action">
                            Add New Offer(* marked fields must be filled)
                        </div>
                        <div class="card-content">     
                        <form class="col s12" method="post" action="{{ route('offers.store') }}" enctype="multipart/form-data" >
                            @csrf
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="offer" name="offer_name" type="text" class="validate" required="required">
                                    <label for="offer" data-error="wrong" data-success="right">Enter new offer title*</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="offer" name="offer_price" type="text" class="validate" required="required">
                                    <label for="offer" data-error="wrong" data-success="right">Enter new offer price*</label>
                                </div>
                                <div class="input-field col s12">
                                    <input id="offer" name="offer_duration" type="text" class="validate" required="required">
                                    <label for="offer" data-error="wrong" data-success="right">Enter new offer duration*</label>
                                </div>
                                <div class="input-field col s12">
                                    <textarea placeholder="Write some detail information (optional - Try to keep it short but attractive)"
                                            style="resize:vertical"
                                            id="offer"
                                            name="offer_description"
                                            rows="5"
                                            class="form-control autosize-target text-left"
                                    ></textarea>
                                </div>
                                <div class="input-field col s12">
                                    <div class="form-group">
                                            Select status*
                                        <select class="form-control" id="offer" name="offer_status" required="required">
                                            <option value="1">Available</option>
                                            <option value="2">Unvailable</option>
                                            <option value="3">Coming Soon</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="input-field col s12">
                                    <div class="form-group">
                                            Select Item From Menu-Optional <p style="color:#F44336">(Don't select this if the offer doesn't belong to regular items)</p>
                                        <select class="form-control" id="offer" name="item_id">
                                                <option value="0">select one</option>
                                            @foreach ($allitems as $item)
                                                <option value="{{ $item->id }}">{{ $item->item_name }}</option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="input-field col s12">
                                    <label class="control-label" for="fileInput">Upload Image if Available(optional)</label><hr>
                                    <div class="controls">
                                        <input class="input-file btn-success" name="offer_image" id="fileInput" type="file">
                                    </div>
                                </div>
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
