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
            Manage All Services
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="/admin">Dashboard</a></li>
            <li class="active">All Services</li>
        </ol> 
                         
    </div>
        <!--Main content start here-->
    <div id="page-inner">
        <h4>List of all services</h4> 
        <div class="dashboard-cards"> 
            
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <div class="card" style="background-color:#E0E8F5">
                        <div class="table-responsive">
                        <table class="table">
                            <thead style="text-align:center">
                                <th width="5%">#</th>
                                <th style="text-align:center" width="20%">image</th>
                                <th style="text-align:center" width="20%">Name of the service</th>
                                <th style="text-align:center" width="25%">Servie Details</th>
                                <th style="text-align:center" style="text-align:center" width="15%">Servie status</th>
                                <th colspan="2">Actions</th>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($services as $service)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td><img src="storage/{{ $service->service_image}}" height="80px" width="140px"></td>
                                    <th>{{ $service->service_title}}</th>
                                    <td style="text-align:justify;">{{ $service->service_details}}</td>
                                    <td>
                                        @if ($service->service_status == 1)
                                            <p style="color:green;text-align:center;">Available</p>
                                        @elseif ($service->service_status == 2)
                                            <p style="color:green;text-align:center;">Available</p>
                                        @else
                                            <p style="color:red;text-align:center;">Coming soon</p>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="/services/{{ $service->id }}/edit" class="btn btn-primary btn-sm">EDIT</a>
                                    </td>
                                    <td>
                                        

            <form id="delete_form" action="{{ route('services.destroy',[$service->id]) }}" method="post">
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
                            Add New Service(* marked fields must be filled)
                        </div><hr>
                        <div class="card-content">     
<form class="col s12" method="post" action="{{ route('services.store') }}" enctype="multipart/form-data" >
    @csrf
    <div class="row">
        <div class="input-field col s12">
            <input id="service" name="service_title" type="text" class="validate" required="required">
            <label for="service" data-error="wrong" data-success="right">Enter new service title*</label>
        </div>
        <div class="input-field col s12">
            <textarea placeholder="Enter service details(optional)"
                    style="resize:vertical"
                    id="service"
                    name="service_details"
                    rows="5"
                    class="form-control autosize-target text-left"
            ></textarea>
        </div>
        <div class="input-field col s12">
            <div class="form-group">
                    Select status*
                <select class="form-control" id="service" name="service_status" required="required">

                    <option value="1">Available</option>
                    <option value="2">Unvailable</option>
                    <option value="3">Coming Soon</option>
                </select>
            </div>
        </div>
        <div class="input-field col s12">
            <label class="control-label" for="fileInput">Upload Image if Available(optional)</label><hr>
            <div class="controls">
                <input class="input-file btn-success" name="service_image" id="fileInput" type="file">
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


