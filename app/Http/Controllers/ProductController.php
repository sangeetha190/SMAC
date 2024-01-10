<?php

namespace App\Http\Controllers;

use App\Models\Alignment;
use App\Models\Product;
use App\Models\ProductAlignment;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use App\Models\ProductProducttag;
use App\Models\ProductTag;
use App\Models\ProductType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allProduct = Product::all();
        $allCategory = ProductCategory::all();
        $allType = ProductType::all();
        return view('admin-dashboard.product-management.product.all-product', compact('allProduct', 'allCategory', 'allType'));
    }


    public function productFilter(Request $request)
    {
        // dd($request->all());
        // $dateFormat = "Y-m-d H:i:s";

        $allCategory = ProductCategory::all();
        $allType = ProductType::all();


        $productName = $request->product_name;
        $status = $request->status;
        $minOffer = $request->min_offer;
        $maxStock = $request->max_stock;
        $category = $request->category;
        $minPrice = $request->min_price;
        $maxOffer = $request->max_offer;
        $type = $request->type;
        $maxPrice = $request->max_price;
        $minStock = $request->min_stock;


        $query = Product::query();
        // dd(Carbon::createFromFormat('Y-m-d', $endDate)->format('Y-m-d 24:59:59'));

        if ($productName) {
            $query->where('product_name', 'like', '%' . $productName . '%');
        }

        if ($category) {
            $query->where('product_category_id', $category);
        }
        if ($type) {
            $query->where('product_type_id', $type);
        }
        if ($minPrice) {
            $query->where('price', '>=', $minPrice);
        }
        if ($maxPrice) {
            $query->where('price', '<=', $maxPrice);
        }
        if ($minOffer) {
            $query->where('offer', '>=', $minOffer);
        }
        if ($maxOffer) {
            $query->where('offer', '<=', $maxOffer);
        }

        if ($minStock) {
            $query->where('stock', '>=', $minStock);
        }

        if ($maxStock) {
            $query->where('stock', '<=', $maxStock);
        }
        // if ($status) {
        //     $query->where('status',$status);
        // }
        // dd($allProduct = $query->get());
        // dd($status);

        if ($status === '1') {
            // dd('if');
            $allProduct = $query->where('status', $status)->get();
        } elseif ($status === '0') {
            // dd('else if');
            $allProduct = $query->where('status', $status)->get();
        } else {
            // dd('else');
            $allProduct = $query->get();
        }

        // $allProduct = $query->get();
        // dd($query->where('status', $status)->get());

        return view('admin-dashboard.product-management.product.all-product', compact('allProduct', 'allCategory', 'allType', 'productName', 'status', 'category', 'type', 'minPrice', 'maxPrice', 'minOffer', 'maxOffer', 'minStock', 'maxStock'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productTag = ProductTag::all();
        $productType = ProductType::all();
        $productCategory = ProductCategory::all();
        $productAlignment = Alignment::all();

        return view('admin-dashboard.product-management.product.create-product', compact('productTag', 'productType', 'productCategory', 'productAlignment'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request['multiple_image']);


        $data = [
            'product_name' => $request['product_name'],
            'product_category_id' => $request['product_category_id'],
            'product_type_id' => $request['product_type_id'],
            // 'Alignment_id' => $request['Alignment_id'],
            'price' => $request['price'],
            'offer' => $request['offer'],
            'stock' => $request['stock'],
            'status' => $request['status'],
            'short_info' => $request['short_description'],
            'description' => $request['description'],
            'created_by' => Auth::user()->first_name . ' ' . Auth::user()->last_name,
        ];

        $slug = Str::slug($request['product_name']);
        $data['slug'] = $slug;

        if (!empty($request['single_image'])) {
            $filename = $request['single_image']->store('Product Images', 'public');
            $data['image'] = $filename;
        }

        $product = Product::create($data);

        $images = [];
        if ($request['multiple_image']) {
            foreach ($request['multiple_image'] as $image) {
                $filename =  $image->store('Product Images/Multiple Images', 'public');

                $images[]= $filename;
            }

            foreach ($images as $image) {
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $image,
                ]);
            }
            
        }

        if (!empty($request['Alignment'])) {

            foreach ($request['Alignment'] as $key => $value) {
                $productAlignment['Alignment_id'] = $value;
                $productAlignment['product_id'] = $product->id;
                ProductAlignment::create($productAlignment);
            }
        }

        return redirect()->route('product.index')
            ->with('success', 'Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $productTag = ProductTag::all();
        $productType = ProductType::all();
        $productCategory = ProductCategory::all();
        $productAlignment = Alignment::all();
        // dd($product->tags->pluck('product_tag_id','product_tag_id')->all());
        return view('admin-dashboard.product-management.product.edit-product', compact('product', 'productTag', 'productType', 'productCategory', 'productAlignment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {


        $updateData = [
            'product_name' => $request['product_name'],
            'product_category_id' => $request['product_category_id'],
            'product_type_id' => $request['product_type_id'],
            // 'Alignment_id' => $request['Alignment_id'],
            'price' => $request['price'],
            'offer' => $request['offer'],
            'stock' => $request['stock'],
            'status' => $request['status'],
            'short_info' => $request['short_description'],
            'description' => $request['description'],
            'created_by' => Auth::user()->first_name . ' ' . Auth::user()->last_name,
        ];
        $slug = Str::slug($request['product_name']);
        $updateData['slug'] = $slug;

        // dd($request['tag']);
        if (!empty($request['single_image'])) {
            $filename = $request['single_image']->store('Product Images', 'public');
            $updateData['image'] = $filename;
        }
        // $update_data=ModelsPermission::find($id);
        $product->update($updateData);

        // if (!empty($request['image'])) {
        //     $filename = $request['multiple_image']->store('Product Images/Multiple Images', 'public');

        //     ProductProductImage::create([
        //         'product_id' => $product->id,
        //         'multiple_image' => $filename,
        //     ]);


        // }


        // if (!empty($request['Alignment'])) {
        $deleteData = ProductAlignment::where('product_id', $product->id)->get();
        foreach ($deleteData as $key => $productAlignment) {
            $productAlignment->delete();
        }
        if (!empty($request['Alignment'])) {
            foreach ($request['Alignment'] as $key => $value) {
                $productImage['Alignment_id'] = $value;
                $productImage['product_id'] = $product->id;
                ProductAlignment::create($productImage);
            }
        }



        return redirect()->route('product.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')
            ->with('danger', 'Product deleted successfully');
    }
}
