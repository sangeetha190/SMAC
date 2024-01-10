<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allCategory = ProductCategory::all();
        return view('admin-dashboard.product-management.product-category.all-category', compact('allCategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin-dashboard.product-management.product-category.create-category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:product_categories,name',
        ]);
        $data = [
            'name' => $request['name'],
            'status' => $request['status'],
            'created_by' => Auth::user()->first_name . ' ' . Auth::user()->last_name,
        ];
        $slug = Str::slug($request['name']);
        $data['slug'] = $slug;
        // dd($data);
        ProductCategory::create($data);
        return redirect()->route('product-category.index')
            ->with('success', 'Product category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductCategory $productCategory)
    {
        // dd($productCategory);
        return view('admin-dashboard.product-management.product-category.edit-category', compact('productCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductCategory $productCategory)
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
        $productCategory->update($update_data);



        return redirect()->route('product-category.index')
            ->with('success', 'Product category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductCategory $productCategory)
    {
        $productCategory->delete();
        return redirect()->route('product-category.index')
            ->with('danger', 'Product category deleted successfully');
    }
}
