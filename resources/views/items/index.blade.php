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
            Manage All Item
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="/admin">Dashboard</a></li>
            <li class="active">All items</li>
        </ol> 
                            
    </div>
        <!--Main content start here-->
    <div id="page-inner">

        <div class="dashboard-cards"> 
            
            
            <div class="row">
                
                <div class="col-md-12 col-sm-12 col-lg-12">
                    
                </div>

                <div class="col-md-12 col-sm-12 col-lg-12">

                    <!--    Bordered Table  -->
                    <div class="card" style="background-color:#E0E8F5">
                        <div class="card-action">
                            Menu
                        </div>
                        <!-- /.panel-heading -->
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table" style="font-weight:bold">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Dish</th>
                                            <th>Item Name</th>
                                            <th>Item Price</th>
                                            <th>Item Category</th>
                                            <th>Availability</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($items as $item)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td><img src="storage/{{ $item->item_image }}" height="100px" width="200px"></td>
                                            <td>{{ $item->item_name}}</td>
                                            <td>{{ $item->item_price}}Tk</td>
                                            
                                            {{-- <td>{{ $item->item_description}}</td> --}}
                                            <td>{{ $item->itemcategories->item_category_name}}</td> {{-- here itemcategories has become a dynamic property as this is the mehtod name in which relationship has been declared in the Item model --}}
                                            <td>
                                                @if ($item->item_availability == 1)
                                                    Available
                                                @elseif($item->item_availability == 2)
                                                    Unavailable
                                                @else
                                                    Coming Soon
                                                @endif
                                            </td>
                                            <td>
            <form id="delete_form" action="{{ route('items.destroy',[$item->id]) }}" method="post">
                @csrf
                <input type="hidden" name="_method" value="delete">
                <a href="/items/{{ $item->id }}/edit" class="btn btn-primary btn-sm">Edit</a>
                
                <input class="btn btn-danger btn-sm" type="submit" name="submit" value="Delete">
                
            </form>
                                            </td>
                                        </tr>
                                    <?php $i++ ; ?>
                                    @endforeach        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                        <!--  End  Bordered Table  -->
                </div> 
                <div class="col-md-6 col-sm-6 col-lg-6">
                    <div class="card">
                        <div class="card-action">
                            Add New Item(* fields must be filled)
                        </div><hr>
                        <div class="card-content">     
                            <form class="col s12" method="post" action="{{ route('items.store') }}" enctype="multipart/form-data" >
                                @csrf
                                <div class="row">
                                    <div class="input-field col s12">
                                        {{-- <input type="hidden" name="user_id" value="1"> <!--shift to controller--> --}}
                                        <input id="item" name="item_name" type="text" class="validate" required="required">
                                        <label for="category" data-error="wrong" data-success="right">Enter new item name*</label>
                                    </div>
                                    
                                    <div class="input-field col s12">
                                        <div class="form-group">
                                                Select Category*
                                            <select class="form-control" id="item" name="item_cat_id" required="required">

                                                @foreach ($item_cats as $cat)
                                                    <option value="{{ $cat->id }}">{{ $cat->item_category_name }}</option>
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="input-field col s12">
                                        <input id="item" name="item_price" type="text" class="validate" required="required">
                                        <label for="category" data-error="wrong" data-success="right">Enter item price*</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <textarea placeholder="Enter item description"
                                                style="resize:vertical"
                                                id="item"
                                                name="item_description"
                                                rows="5"
                                                class="form-control autosize-target text-left"
                                        ></textarea>
                                    </div>
                                    <div class="input-field col s12">

                                        <div class="form-group">
                                                Select Availability*
                                            <select class="form-control" id="item" name="item_availability" required="required">

                                                <option value="1">Available</option>
                                                <option value="2">Unvailable</option>
                                                <option value="3">Coming Soon</option>
                                            </select>
                                        </div>

                                        {{-- <input id="item" name="item_availability" type="text" class="validate" required="required">
                                        <label for="category" data-error="wrong" data-success="right">Availability*</label> --}}
                                    </div>
                                    
                                    {{-- <div class="input-field col s12">
                                        <input id="item" name="item_status" type="text" class="validate" required="required">
                                        <label for="category" data-error="wrong" data-success="right">Status</label>
                                    </div> --}}
                                    
                                    <div class="input-field col s12">
                                        <label class="control-label" for="fileInput">Upload Image</label><hr>
                                        <div class="controls">
                                            <input class="input-file btn-success" name="item_image" id="fileInput" type="file">
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary pull-right" value="Submit">
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


