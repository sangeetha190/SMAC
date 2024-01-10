<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function addToWishlist($id)
    {
        $wishlist = Wishlist::where('product_id', $id)->where('user_id', Auth::user()->id)->first();
        if (empty($wishlist)) {
            $data = [
                'user_id' => Auth::user()->id,
                'product_id' => $id,
            ];
            Wishlist::create($data);
            return redirect()->back()->with('success', 'Product added to wishlist successfully!');
        } else {
            return redirect()->back()->with('success', 'This product already added to wishlist successfully!');
        }
    }
    public function remove($id)
    {
        $wishlist=Wishlist::find($id);
        $wishlist->delete();
        return redirect()->back()->with('success', 'Product remove to wishlist successfully!');

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
    public function show(Wishlist $wishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wishlist $wishlist)
    {
        //
    }
}
