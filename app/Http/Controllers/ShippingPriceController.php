<?php

namespace App\Http\Controllers;

use App\Models\ShippingPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ShippingPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allShipping = ShippingPrice::all();
        return view('admin-dashboard.order-management.shipping-price-details.all-shipping-price-details', compact('allShipping'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-dashboard.order-management.shipping-price-details.create-shipping-price-details');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:shipping_prices,name',
        ]);
        $data = [
            'name' => $request['name'],
            'price' => $request['price'],
            'status' => $request['status'],
        ];
        ShippingPrice::create($data);
        return redirect()->route('shipping-price-details.index')
            ->with('success', 'Shipping price created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(ShippingPrice $shippingPrice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $shippingPrice=ShippingPrice::find($id);
        // dd($shippingPrice);
        return view('admin-dashboard.order-management.shipping-price-details.edit-shipping-price-details', compact('shippingPrice'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $shippingPrice=ShippingPrice::find($id);

        // $this->validate($request, [
        //     'name' => 'required|unique:shipping_prices,name',
        // ]);
        $update_data = [
            'name' => $request['name'],
            'price' => $request['price'],
            'status' => $request['status'],
        ];

        $shippingPrice->update($update_data);

        return redirect()->route('shipping-price-details.index')
            ->with('success', 'Shipping price updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $shippingPrice=ShippingPrice::find($id);
        $shippingPrice->delete();
        return redirect()->route('shipping-price-details.index')
            ->with('danger', 'Shipping price deleted successfully');
    }
}
