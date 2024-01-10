<?php

namespace App\Http\Controllers;

use App\Mail\CustomerOrderMail;
use App\Models\CancelOrder;
use App\Models\CancelOrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CancelOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function allCancelRequest()
    {
        $cancelRequestOrders = CancelOrderRequest::orderBy('created_at', 'Desc')->get();
        return view('admin-dashboard.order-management.cancel-request-orders.all-cancel-request-orders', compact('cancelRequestOrders'));
    }

    public function cancelledOrders()
    {
        $cancelledOrders = CancelOrder::orderBy('created_at', 'Desc')->get();
        return view('admin-dashboard.order-management.cancelled-orders.all-cancelled-orders', compact('cancelledOrders'));
    }

    public function updateOrderStatus(Request $request)
    {
        $order = Order::find($request->order_id);
        $data = [
            'status' => $request->status,
        ];
        // dd($data);
        $order->update($data);

        $mailData = Order::find($order->id);
        if ($mailData->status === 'cancelled' || $mailData->status === 'delivered') {
            Mail::to($mailData->user->email)->send(new CustomerOrderMail($mailData));
        }
        return redirect()->back()->with('success', 'order status update successfully');
    }

    public function cancelRequest(Request $request)
    {
        $data = [
            'user_id' => Auth::user()->id,
            'order_id' => $request->order_id,
            'reason' => $request->reason,
        ];
        // dd($data);
        CancelOrderRequest::create($data);
        return redirect()->back()->with('success', 'Your request send to SDM Admin successfully');
    }

    public function orderCancel(Request $request)
    {
        $order = Order::find($request->order_id);


        $data = [
            'cancelled_by' => Auth::user()->first_name . ' ' . Auth::user()->last_name,
            'order_id' => $request->order_id,
            'reason' => $request->reason,
        ];
        $updateData = [
            'status' => 'cancelled',
        ];
        // dd($data);
        CancelOrder::create($data);
        $order->update($updateData);
        foreach ($order->orderItems as $key => $value) {
            // dd($value->product);
            $stock = $value->product->stock;
            $updateProduct = [
                'stock' => $stock + $value->quantity,
            ];
            $value->product->update($updateProduct);
        }
        $mailData = Order::find($order->id);
        if ($mailData->status === 'cancelled' || $mailData->status === 'delivered') {
            Mail::to($mailData->user->email)->send(new CustomerOrderMail($mailData));
        }
        return redirect()->back()->with('success', 'order cancelled successfully');
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CancelOrder $cancelOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CancelOrder $cancelOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CancelOrder $cancelOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CancelOrder $cancelOrder)
    {
        //
    }
}
