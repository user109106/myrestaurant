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
            Manage Orders
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="/admin">Dashboard</a></li>
            <li class="active">All Orders</li>
        </ol> 
                         
    </div>
        <!--Main content start here-->
    <div id="page-inner">
        <h4>New Orders</h4> 
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
                                <th>username</th>
                                <th>user email</th>
                                <th>Payment ID(s)</th>
                                <th>Shipping ID(s)</th>
                                <th>Order Status</th>
                                <th>Order Total</th>
                                <th>Order Date</th>
                                <th colspan="3" class="center">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $i=0; ?>
                            @foreach ($orders as $order)
                            @if ($order->order_status == '0')
                                
                            <?php $i++; ?>
                            <tr class="gradeA odd">
                                <td class="">{{ $i }}</td>
                                <td class=" ">{{ $order->users->name }}</td>
                                <td class=" ">{{ $order->users->email }}</td>
                                <td class=" ">{{ $order->payment_id }}</td>
                                <td class="center">{{ $order->shipping_id }}</td>
                                <td class="center"><p style="color:red;font-weight:bold;"><?php echo "NEW" ?></p></td>
                                <td class="center">{{ $order->order_total }}</td>
                                <td class="center">{{ $order->created_at }}</td>
                                <td class="center">
                                    <a class="btn btn-success" style="width:100%;background:green;color:white;border-radius:3px;" href="/orders/{{ $order->id }}">view</a>
                                    
                                </td>
                                <td>
                                    <form action="{{ route('orders.update',[$order->id]) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="_method" value="put">
                                    <button class="btn btn-primary" type="submit" name="submit" value="send">SEND</button>
                                    
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('orders.update',[$order->id]) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="_method" value="put">
                                    <button class="btn btn-warning" type="submit" name="submit" value="cancel">CANCEL</button>
                                    
                                    </form>
                                </td>
                                {{-- <td class="center ">C/A<sup>1</sup></td> --}}
                            </tr>
                            @endif
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



        <h4>All Orders</h4> 
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
                                        <th>username</th>
                                        <th>user email</th>
                                        <th>Payment ID(s)</th>
                                        <th>Shipping ID(s)</th>
                                        <th>Order Status</th>
                                        <th>Order Total</th>
                                        <th>Order Date</th>
                                        <th colspan="2" class="center">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $i=0; ?>
                                    @foreach ($orders as $order)
                                    @if ($order->order_status > '0')
                                    <?php $i++; ?>
                                    <tr class="gradeA odd">
                                        <td class="">{{ $i }}</td>
                                        <td class=" ">{{ $order->users->name }}</td>
                                        <td class=" ">{{ $order->users->email }}</td>
                                        <td class=" ">{{ $order->payment_id }}</td>
                                        <td class="center ">{{ $order->shipping_id }}</td>
                                        <td class="center ">
                                            @if ( $order->order_status == '0')
                                                <p style="color:red;"><?php echo "Undelivered"?></p>
                                            @elseif ( $order->order_status == '1')
                                                <p style="color:green;"><?php echo "Delivered"; ?></p>
                                            @else
                                                <p style="color:orange;"><?php echo "Canceled"; ?></p>
                                            @endif
                                        </td>
                                        <td class="center ">{{ $order->order_total }}</td>
                                        <td class="center ">{{ $order->created_at }}</td>
                                        <td class="center ">
                                            <a class="btn btn-success" style="background:green;color:white;border-radius:3px;" href="/orders/{{ $order->id }}">view</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('orders.destroy',[$order->id]) }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="delete">
                                                <button onclick="return confirm('Are you sure to delete?');" class="btn btn-danger" type="submit" name="submit" value="delete">DELETE</button>
                                                
                                            </form>
                                        </td>
                                        {{-- <td class="center ">C/A<sup>1</sup></td> --}}
                                    </tr>
                                    @endif
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
