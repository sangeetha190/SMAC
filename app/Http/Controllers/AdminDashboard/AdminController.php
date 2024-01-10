<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $today = Carbon::now()->toDateString();
        $customerCount = User::where('type', 'customer')->get();
        $orderCount = Order::all();
        $todayOrderCount = Order::where('created_at','like', $today.'%')->get();
        $totalEarnings=Order::where('status', 'delivered')->get();

        $totalContacts=Contact::all();
        // dd($totalEarnings);

        return view('admin-dashboard.dashboard', compact('customerCount', 'orderCount', 'todayOrderCount','totalEarnings','totalContacts'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
