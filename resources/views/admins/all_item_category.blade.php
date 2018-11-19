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


    <div class="header"> 
        <h1 class="page-header">
            Manage Item Category
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Dashboard</a></li>
            <li class="active">All item category</li>
        </ol> 
                            
    </div>
        <!--Main content start here-->
    <div id="page-inner">

        <div class="dashboard-cards"> 
            
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="card">
                        <div class="card-action">
                            All Item Categories
                        </div>
                        <div class="card-content"> 
                            <ul class="collapsible" data-collapsible="accordion">
                            @foreach ($item_cats as $category)
                                <li>
                                    <div class="collapsible-header">
                                        <i class="material-icons">filter_drama</i>{{ $category->item_category_name }}
                                    </div>
                                    <div class="collapsible-body">
                                        <p>{{ $category->item_category_type }}</p>
                                    </div>
                                </li>
                            @endforeach
                            </ul> 
                            
                        </div>
                    </div>
                </div> 
                
            </div><!-- /. ROW  -->    
        </div>
        
    </div><!-- /. PAGE INNER  -->
    
</div>
      
@endsection


