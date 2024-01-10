<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allOrders = Order::orderBy('created_at', 'Desc')->get();
        return view('admin-dashboard.order-management.orders-details.all-orders', compact('allOrders'));
    }

    public function orderSearch(Request $request)
    {
        // dd($request->all());
        $dateFormat = "Y-m-d H:i:s";

        $status = $request->status;
        $orderNo = $request->order_no;
        $minAmount = $request->min_amount;
        $startDate =$request->start_date;
        $maxAmount = $request->max_amount;
        $endDate = $request->end_date;

        $query = Order::query();
        // dd(Carbon::createFromFormat('Y-m-d', $endDate)->format('Y-m-d 24:59:59'));
        if ($status) {
            // dd($status);
            $query->where('status', 'like', '%' . $status . '%');
        }
        // dd('else');
        if ($orderNo) {
            $query->where('order_no', 'like', '%' . $orderNo . '%');
        }

        if ($minAmount) {
            $query->where('total_amount', '>=', $minAmount);
        }
        if ($maxAmount) {
            $query->where('total_amount', '<=', $maxAmount);
        }
        if ($startDate) {
            $query->where('created_at', '>=', Carbon::createFromFormat('Y-m-d', $startDate)->format('Y-m-d 00:00:00'));
        }
        if ($endDate) {
            $query->where('created_at', '<=', Carbon::createFromFormat('Y-m-d', $endDate)->format('Y-m-d 23:59:59'));
        }

        $allOrders = $query->get();

        return view('admin-dashboard.order-management.orders-details.all-orders', compact('allOrders', 'status', 'orderNo', 'minAmount', 'maxAmount', 'startDate', 'endDate'));
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
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
