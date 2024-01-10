<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function addToCart($id)
    {

        $product = Product::findOrFail($id);
        // dd($product);

        if ($product->stock >= 1) {
            $cart = session()->get('cart', []);
            // dd($cart);

            if (isset($cart[$id])) {

                if ($product->stock > $cart[$id]['quantity']) {
                    $cart[$id]['quantity']++;
                } else {
                    return redirect()->back()->with('error', 'Product OUT of STOCK!, Now this product only have' . ' ' . $product->stock);
                }
            } else {

                // dd($product->stock);
                $cart[$id] = [
                    "name" => $product->product_name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "image" => $product->image,
                    "product" => $product,

                ];
            }

            session()->put('cart', $cart);
            return redirect()->back()->with('add_to_cart', 'Product added to cart successfully!');
        } else {
            return redirect()->back()->with('error', 'Product OUT of STOCK!');
        }
    }


    public function addCart(Request $request)
    {

        $product = Product::find($request->product_id);

        // dd($product);
        if ($product->stock >= 1) {
            $cart = session()->get('cart', []);

            if (isset($cart[$request->product_id])) {
                if ($product->stock >= $cart[$request->product_id]['quantity'] + $request->qty) {
                    $cart[$request->product_id]['quantity'] = $cart[$request->product_id]['quantity'] + $request->qty;
                } else {
                    return redirect()->back()->with('error', 'Product OUT of STOCK!, Now this product only have' . ' ' . $product->stock);
                }
            } else {

                if ($product->stock >= $request->qty) {
                    $cart[$request->product_id] = [
                        "name" => $product->product_name,
                        "quantity" => $request->qty,
                        "price" => $product->price,
                        "image" => $product->image,
                        "product" => $product,

                    ];
                } else {
                    return redirect()->back()->with('error', 'Product OUT of STOCK!, Now this product only have' . ' ' . $product->stock);
                }
            }

            session()->put('cart', $cart);
            return redirect()->back()->with('add_to_cart', 'Product added to cart successfully!');
        } else {
            return redirect()->back()->with('error', 'Product OUT of STOCK!');
        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */


    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function update(Request $request)
    {
        // dd('test');
        $product = Product::findOrFail($request->id);
        if ($product->stock >= 1) {
            if ($request->id && $request->quantity) {
                $cart = session()->get('cart');
                if ($product->stock >= $request->quantity) {
                    $cart[$request->id]["quantity"] = $request->quantity;
                    session()->put('cart', $cart);
                    session()->flash('success', 'Cart updated successfully');
                } else {
                    session()->flash('error', 'Product OUT of STOCK!, Now this product only have' . ' ' . $product->stock);
                }
            }
        } else {
            session()->flash('error', 'Product OUT of STOCK!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        dd($id);
        if ($id) {
            $cart = session()->get('cart');
            if (isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
    public function deleteCart(string $id)
    {
        // dd($id);
        if ($id) {
            $cart = session()->get('cart');
            if (isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
        return redirect()->back()->with('error', 'Product removed from cart successfully!');
    }
}
