<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allCategory = ProductType::all();
        return view('admin-dashboard.product-management.product-type.all-type', compact('allCategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-dashboard.product-management.product-type.create-type');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:product_types,name',
        ]);
        $data = [
            'name' => $request['name'],
            'status' => $request['status'],
            'created_by' => Auth::user()->first_name . ' ' . Auth::user()->last_name,
        ];
        $slug = Str::slug($request['name']);
        $data['slug'] = $slug;
        // dd($data);
        ProductType::create($data);
        return redirect()->route('product-type.index')
            ->with('success', 'Product type created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductType $productType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductType $productType)
    {
        // dd($productCategory);
        return view('admin-dashboard.product-management.product-type.edit-type', compact('productType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductType $productType)
    {
        $this->validate($request, [
            'name' => 'required',
            // 'permission' => 'required',
        ]);

        $update_data = [
            'name' => $request['name'],
            'status' => $request['status'],
            'created_by' => Auth::user()->first_name . ' ' . Auth::user()->last_name,
        ];
        $slug = Str::slug($request['name']);
        $update_data['slug'] = $slug;
        // $update_data=ModelsPermission::find($id);
        $productType->update($update_data);



        return redirect()->route('product-type.index')
            ->with('success', 'Product type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductType $productType)
    {
        $productType->delete();
        return redirect()->route('product-type.index')
            ->with('danger', 'Product type deleted successfully');
    }
}
