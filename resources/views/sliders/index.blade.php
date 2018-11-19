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
            Manage All Sliders
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="/admin">Dashboard</a></li>
            <li class="active">All Sliders</li>
        </ol> 
                            
    </div>
        <!--Main content start here-->
    <div id="page-inner">

        <div class="dashboard-cards"> 
            
            
            <div class="row">
                <div class="col-md-8 col-sm-8 col-lg-8">
                    <div class="card">
                        
                        <div class="card" style="background-color:#E0E8F5">
                        <div class="card-action">
                         All Slides
                        </div>        
                        <div class="card-content table-responsive"> 
                            <table class="table" style="text-align:center">
                                <tbody>
                                @foreach($sliders as $slider)
                                    <tr style="background:black;color:white;">
                                        <td><img src="storage/{{ $slider->slider_image }}" height="120px" width="250px"></td>
                                        <td>
                                            <h2 style="color:white">{{ $slider->slider_name}}</h2><br>
                                            <p>{{ $slider->slider_title}}</p>

        <form id="delete_form" action="{{ route('sliders.destroy',[$slider->id]) }}" method="post">
            @csrf
            <input type="hidden" name="_method" value="delete">
            <input class="btn btn-danger btn-sm" type="submit" name="submit" value="DELETE SLIDER">
            
        </form>
                                        </td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
						 
                        <div class="clearBoth"><br/></div>   
						</div>
						</div>
                         
					</div>
                </div>

                <div class="col-md-4 col-sm-4 col-lg-4" style="background:white;padding:10px;">
                    <h2>Add New Slider</h2><hr>
                    
                    <form action="{{route('sliders.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div>
                        <input type="text" name="slider_name" placeholder="Enter slider name" required="required">
                        <input type="text" name="slider_title" placeholder="Enter slider title" required="required">
                        <input class="btn btn-primary" type="file" name="slider_image">
                        </div><hr>
                        <input class="btn btn-success" type="submit" name="submit" value="ADD">
                    </form>
                    
                </div>
            </div> 
                
                
            </div><!-- /. ROW  -->    
        </div>
        
    </div><!-- /. PAGE INNER  -->
    

      
@endsection


