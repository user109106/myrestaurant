<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Item;
use App\Itemcategory;
use App\Shipment;
use App\Payment;
use App\Order;
use App\Orderdetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $session_id = session()->getId();
        $carts = Cart::where('sid',$session_id)->get();
        return view('cart',['carts'=>$carts]);
        
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
        $session_id = session()->getId();
        //echo $session_id;
        $itemid = $request->input('id');
        $item = Item::where('id',$itemid)->first();
        // dd($item);

        $getitem = Cart::where('sid',$session_id)->where('item_id',$itemid)->get();
        //dd($getitem);

        if (!$getitem->isEmpty()) {
            $carts = Cart::where('sid',$session_id)->get();
            //dd($carts);
            return view('cart',['carts'=>$carts])->with('error', 'Item already in the list!');
        }else{

            $carts = Cart::create([
                'sid' => $session_id,
                'item_id' => $item->id,
                'item_name' => $item->item_name,
                'price' => $item->item_price,
                'quantity' => $request->input('quantity'),
                'image' => $item->item_image
            ]);
            if ($carts) {
                $carts = Cart::where('sid',$session_id)->get();
                //dd($carts);
                return view('cart',['carts'=>$carts]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
        //dd($cart);
        $session_id = session()->getId();
        if ($request->input('quantity') > 0) {
            $quantityUpdate = Cart::where('id', $cart->id)
                            ->update([
                                'quantity' => $request->input('quantity')
                            ]);
            if ($quantityUpdate) {
                $carts = Cart::where('sid',$session_id)->get();
                //dd($carts);
                return redirect()->route('cart')//make a route for it manually
                                ->with('success', 'Quantity updated');
            }
        }else{
            return back()->withInput()->with('error','Quantity can not be less than one.');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
        //dd($cart);
        $findcart = Cart::find($cart->id);

        if ($findcart->delete()) {
            return redirect()->route('cart')//make a route for it manually
                             ->with('error', 'Item deleted');
        }else{
            return back()->withInput()->with('error','still not deleted..');
        }
    }

    //custom function 
    public function paymentoption(){
        if (Auth::check()) {
            return view('paymentoption');
        }else{
            return redirect()->route('login');
        }
        
    }
    public function paymentbkash(){
        $session_id = session()->getId();
        $carts = Cart::where('sid',$session_id)->get();
        return view('paymentbkash',['carts'=>$carts]);
    }
    public function cashpayment(){
        $session_id = session()->getId();
        $carts = Cart::where('sid',$session_id)->get();
        return view('cashpayment',['carts'=>$carts]);
    }
//order through bkash
    public function order(Request $request){
        $session_id = session()->getId();
        $shipments = Shipment::create([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'country' => $request->input('country'),
            'total' => $request->input('total'),
            'user_id' => Auth::user()->id,
            'sid' => $session_id
        ]);
        if($shipments){
            $payments = Payment::create([
                'payment_method' => $request->input('payment_method'),
                'payment_status' => 0,
                'payment_total' => $request->input('total'),
                'user_id' => Auth::user()->id,
                'sid' => $session_id
            ]);
            if ($payments) {
                // $shipment = Shipment::find('id')->where('sid',$session_id)->first();
                // $payment = Payment::where('sid',$session_id)->get();

                $shipmentid = $shipments->id;
                $paymentid  = $payments->id;
                //dd($shipmentid);

                $orders = Order::create([
                    'user_id' => Auth::user()->id,
                    'payment_id' => $paymentid,
                    'shipping_id' => $shipmentid,
                    'order_status' => 0,
                    'order_total' => $request->input('total')
                ]);
                if ($orders) {

                    $orderid = $orders->id;
                    $carts = Cart::where('sid',$session_id)->get();
                    foreach($carts as $cart){
                        $orderdetails = Orderdetail::create([
                            'order_id' => $orderid,
                            'item_id' => $cart->item_id,
                            'item_name' => $cart->item_name,
                            'item_image' => $cart->image,
                            'unit_price' => $cart->price,
                            'item_qty' => $cart->quantity,
                            'subtotal' => $cart->price*$cart->quantity,
                            'ordertotal' => $request->input('total')
                        ]);
                    }
                    if($orderdetails){
                        foreach($carts as $cart){
                            $cart = Cart::find($cart->id);
                            $cart->delete();
                        }
                        
                        return view('confirmation')->with('paymentid',$paymentid);
                    }
                    
                }
            }
        }else{
            return back()->withInput()->with('error','Error Creating Order! Please try again..');
        }
    }
//order cash on delivery
    public function ordercash(Request $request){
        $session_id = session()->getId();
        $shipments = Shipment::create([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'country' => $request->input('country'),
            'total' => $request->input('total'),
            'user_id' => Auth::user()->id,
            'sid' => $session_id
        ]);
        if($shipments){
            $payments = Payment::create([
                'payment_method' => $request->input('payment_method'),
                'payment_status' => 0,
                'payment_total' => $request->input('total'),
                'user_id' => Auth::user()->id,
                'sid' => $session_id
            ]);
            if ($payments) {
                // $shipment = Shipment::find('id')->where('sid',$session_id)->first();
                // $payment = Payment::where('sid',$session_id)->get();

                $shipmentid = $shipments->id;
                $paymentid  = $payments->id;
                //dd($shipmentid);

                $orders = Order::create([
                    'user_id' => Auth::user()->id,
                    'payment_id' => $paymentid,
                    'shipping_id' => $shipmentid,
                    'order_status' => 0,
                    'order_total' => $request->input('total')
                ]);
                if ($orders) {

                    $orderid = $orders->id;
                    $carts = Cart::where('sid',$session_id)->get();
                    foreach($carts as $cart){
                        $orderdetails = Orderdetail::create([
                            'order_id' => $orderid,
                            'item_id' => $cart->item_id,
                            'item_name' => $cart->item_name,
                            'item_image' => $cart->image,
                            'unit_price' => $cart->price,
                            'item_qty' => $cart->quantity,
                            'subtotal' => $cart->price*$cart->quantity,
                            'ordertotal' => $request->input('total')
                        ]);
                    }
                    if($orderdetails){
                        foreach($carts as $cart){
                            $cart = Cart::find($cart->id);
                            $cart->delete();
                        }
                        
                        return view('cashconfirmation');
                    }
                    
                }
            }
        }else{
            return back()->withInput()->with('error','Error Creating Order! Please try again..');
        }
    }
    public function btransaction(Request $request){
        $paymentid = $request->input('payment_id');
        //dd($paymentid);
        if ($paymentid != NULL) {
            $paymentUpdate = Payment::where('id', $paymentid)
                            ->update([
                                'payment_status' => '1',
                                'tid' => $request->input('tid')
                            ]);
            if($paymentUpdate){
                return view('bkashconfirmation');
            }else{
                return back()->withInput()->with('error', 'Error, Please try again..');
            }
        }else{
            return back()->withInput()->with('error', 'Error, Please try again..');
        }
    }
}
