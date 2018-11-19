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
            Manage Item Category
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="/admin">Dashboard</a></li>
            <li class="active">All item category</li>
        </ol> 
                            
    </div>
        <!--Main content start here-->
    <div id="page-inner">

        <div class="dashboard-cards"> 
            
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="card" style="background-color:#E0E8F5;">
                        <div class="card-action">
                            All Item Categories
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Category Name</th>
                                            <th>Category Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php $i=1; @endphp
                                    @foreach ($item_cats as $category)
                                    
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{ $category->item_category_name}}</td>
                                            <td>Active</td>
                                        <td>
            

        <form id="delete_form" action="{{ route('all_item_categorys.destroy',[$category->id]) }}" method="post">
            @csrf
            <input type="hidden" name="_method" value="delete">
            
            <input class="btn btn-danger btn-sm" type="submit" name="submit" value="Delete">
            
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
                </div> 
                <div class="col-md-6 col-sm-6">
                    <div class="row">
                        <div class="card">
                            <div class="card-action">
                                Add New Category
                            </div>
                            <div class="card-content">     
                                <form method="post" action="{{ route('all_item_categories.store') }}" class="col s12">
                                    @csrf
                                    <div class="row">
                                    <div class="input-field col s12">
                                        <input type="hidden" name="item_category_status" value="1">
                                        <input id="itemcat" name="item_category_name" type="text" class="validate" required="required">
                                        <label for="category" data-error="wrong" data-success="right">Enter new category name</label>
                                    </div>
                                    <input type="submit" class="btn btn-primary" value="Submit">
                                    </div>
                                </form>
                                <div class="clearBoth"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div><!-- /. ROW  -->    
        </div>
        
    </div><!-- /. PAGE INNER  -->
    
</div>
      
@endsection


