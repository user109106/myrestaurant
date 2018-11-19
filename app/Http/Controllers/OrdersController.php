<?php

namespace App\Http\Controllers;

use App\Order;
use App\Orderdetail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $orders = Order::with('users')->orderBy('id','DESC')->get();
        //dd($orders);
        return view('orders.index',['orders'=>$orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
        $orderdetails = Orderdetail::all()->where('order_id','=',$order->id);
        //dd($orderdetails);
        return view('orders.show',['orderdetails'=>$orderdetails]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
        if (Auth::check()) {
            $order = Order::find($order->id);
            //dd($order);

            if ($request->submit == 'send') {
                $statusUpdate = Order::where('id', $order->id)
                                ->update([
                                    'order_status' => 1
                                ]);
                if ($statusUpdate) {
                    return redirect()->route('orders.index');
                }
            }else{
                $statusUpdate = Order::where('id', $order->id)
                                ->update([
                                    'order_status' => 2
                                ]);
                if ($statusUpdate) {
                    return redirect()->route('orders.index');
                }
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
        $orders = Order::with('orderdetails')->get();
        //dd($orders);
        $order->orderdetails()->delete(); //to delete the relational database
        
        if ($order->delete()) {
            return redirect()->route('orders.index')->with('error', 'Order deleted..');
        }
    }
}
