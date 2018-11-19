@extends('layouts.app_admin')

@section('content')
<script>
    $(document).ready(function () {
        $('#dataTables-example').dataTable();
    });
</script>
<div class="card-body">
@include('partials.error')
@include('partials.success')
    <div class="header"> 
        <h1 class="page-header">
            Manage Users
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="/admin">Dashboard</a></li>
            <li class="active">All Users</li>
        </ol> 
                         
    </div>
        <!--Main content start here-->
    <div id="page-inner">
        <h4>All Users</h4> 
        <div class="dashboard-cards"> 
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <!-- Advanced Tables -->
                    <div class="card">
                        {{-- <div class="card-action">
                             Advanced Tables
                        </div> --}}
                        <div class="card-content">
                            <div class="table-responsive">
                                
                                <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="dataTables_length" id="dataTables-example_length">
                                                <label>
                                                    <select name="dataTables-example_length" aria-controls="dataTables-example" class="form-control input-sm">
                                                        <option value="10">10</option>
                                                        <option value="25">25</option>
                                                        <option value="50">50</option>
                                                        <option value="100">100</option>
                                                    </select> records per page
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div id="dataTables-example_filter" class="dataTables_filter">
                                                <label>Search:
                                                    <input type="search" class="form-control input-sm" aria-controls="dataTables-example">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                <table class="table table-striped table-bordered table-hover dataTable no-footer" id="dataTables-example" aria-describedby="dataTables-example_info">
                                <thead>
                                    <tr role="row">
                                        <th>#ID</th>
                                        <th>user</th>
                                        <th>email</th>
                                        <th>Registration verification date</th>
                                        <th>Status</th>
                                        <th>Registration Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $i=0; ?>
                                    @foreach ($users as $user)
                                    <?php $i++; ?>
                                    <tr class="gradeA odd">
                                        <td class="">{{ $i }}</td>
                                        <td class=" ">{{ $user->name }}</td>
                                        <td class=" ">{{ $user->email }}</td>
                                        <td class="center ">{{ $user->email_verified_at }}</td>
                                        <td class="center ">{{ $user->is_activated }}</td>
                                        <td class="center ">{{ $user->created_at }}</td>
                                        <td class="center ">
                                            <a href=""><i class="material-icons">edit</i></a>
                                            <a href=""><i class="material-icons">thumb_down</i></a>
                                            <a href=""><i class="material-icons">thumb_up</i></a>
                                            <a href=""><i class="material-icons">delete</i></a>
                                        </td>
                                        {{-- <td class="center ">C/A<sup>1</sup></td> --}}
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="dataTables_info" id="dataTables-example_info" role="alert" aria-live="polite" aria-relevant="all">Showing 1 to 10 of 57 entries

                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                                            <ul class="pagination">
                                                <li class="paginate_button previous" aria-controls="dataTables-example" tabindex="0" id="dataTables-example_previous">
                                                    <a href="#">Previous</a>
                                                </li>
                                                <li class="paginate_button  active" aria-controls="dataTables-example" tabindex="0">
                                                    <a href="#">1</a>
                                                </li>

                                                <li class="paginate_button next" aria-controls="dataTables-example" tabindex="0" id="dataTables-example_next">
                                                    <a href="#">Next</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div> 
                
        </div> 
    </div>
        
    </div><!-- /. PAGE INNER  -->
    

      
@endsection
