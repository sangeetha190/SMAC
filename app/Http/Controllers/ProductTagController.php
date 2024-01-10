<?php

namespace App\Http\Controllers;

use App\Models\ProductTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductTagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allCategory = ProductTag::all();
        return view('admin-dashboard.product-management.product-tag.all-tag', compact('allCategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-dashboard.product-management.product-tag.create-tag');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:product_tags,name',
        ]);
        $data = [
            'name' => $request['name'],
            'status' => $request['status'],
            'created_by' => Auth::user()->first_name . ' ' . Auth::user()->last_name,
        ];
        $slug = Str::slug($request['name']);
        $data['slug'] = $slug;
        // dd($data);
        ProductTag::create($data);
        return redirect()->route('product-tag.index')
            ->with('success', 'Product type created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductTag $productTag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductTag $productTag)
    {
        // dd($productCategory);
        return view('admin-dashboard.product-management.product-tag.edit-tag', compact('productTag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductTag $productTag)
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
        $productTag->update($update_data);



        return redirect()->route('product-tag.index')
            ->with('success', 'Product tag updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductTag $productTag)
    {
        $productTag->delete();
        return redirect()->route('product-tag.index')
            ->with('danger', 'Product tag deleted successfully');
    }
}
