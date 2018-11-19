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
            Edit Item
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Dashboard</a></li>
            <li class="active">Edit item</li>
        </ol> 
                            
    </div>
        <!--Main content start here-->
    <div id="page-inner">

        <div class="dashboard-cards"> 
            
            
            <div class="row">
                 
                <div class="col-md-12 col-sm-12 col-lg-12">
                    
                    <div class="card">
                        <div class="card-action">
                            Edit Item - (All fields are optional)
                        </div><hr>
                        <div class="card-content">     
                            <form class="col s12" method="post" action="{{ route('items.update',[$item->id]) }}" enctype="multipart/form-data" >
                                @csrf
                                <input type="hidden" name="_method" value="put">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="item" name="item_name" type="text" class="validate" value="{{ $item->item_name }}">
                                        
                                    </div>
                                    
                                    <div class="input-field col s12">
                                        <div class="form-group">
                                                Select Category*
                                            <select class="form-control" id="item" name="item_cat_id">
                                                    <option value="{{ $item->item_cat_id }}">{{ $item->itemcategories->item_category_name}}</option>
                                                @foreach ($item_cats as $cat)
                                                    <option value="{{ $cat->id }}">{{ $cat->item_category_name }}</option>
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="input-field col s12">
                                        <input id="item" name="item_price" type="text" class="validate" value="{{ $item->item_price }}">
                                        
                                    </div>
                                    <div class="input-field col s12">
                                        <textarea style="resize:vertical"
                                            id="item"
                                            name="item_description"
                                            rows="5"
                                            class="form-control autosize-target text-left">{{ ($item->item_description) }}
                                        </textarea>
                                    </div>
                                    <div class="input-field col s12">
                                        <div class="form-group">
                                                Select Availability*
                                            <select class="form-control" id="item" name="item_availability" required="required">
                                                @if($item->item_availability == 1)
                                                    <option value="1">Available</option>
                                                    <option value="2">Unvailable</option>
                                                    <option value="3">Coming Soon</option>
                                                @elseif($item->item_availability == 2)
                                                    <option value="2">Unvailable</option>
                                                    <option value="1">Available</option>
                                                    <option value="3">Coming Soon</option>
                                                @elseif($item->item_availability == 3)
                                                    <option value="3">Coming Soon</option>
                                                    <option value="1">Available</option>
                                                    <option value="2">Unvailable</option>
                                                @endif
                                            </select>
                                        </div>
                                        
                                    </div>
                                    
                                    <img src="/storage/{{ $item->item_image }}" height="150px" width="270px">
                                    <div class="input-field col s12">
                                        <label class="control-label" for="fileInput">Current Image</label><hr>
                                        <div class="controls">
                                            <input class="input-file btn-success" name="item_image" id="fileInput" type="file">
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
                            </form>
                            <div class="clearBoth"></div>
                        </div>
                    </div>
                    
                </div>
                
            </div><!-- /. ROW  -->    
        </div>
        
    </div><!-- /. PAGE INNER  -->
    
</div>
      
@endsection


