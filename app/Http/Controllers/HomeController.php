<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Mail\ContactReplyMail;
use App\Models\Address;
use App\Models\Alignment;
use App\Models\Contact;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductTag;
use App\Models\ProductType;
use App\Models\Review;
use App\Models\ShippingPrice;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allCategory=ProductCategory::where('status','1')->get();
        $topRatedProducts = Product::where('status',1)->orderBy('view_count', 'Desc')->take(4)->get();
        // dd($allCategory);
        return view('index',compact('allCategory','topRatedProducts'));
    }
    public function about()
    {
        return view('about');
    }
    public function shop(Request $request)
    {

        $sort = $request->input('sort');
        // dd($sort);
        $allCategory = ProductCategory::where('status', 1)->get();
        $allTag = ProductTag::where('status', 1)->get();
        $allAlignment = Alignment::where('status', 1)->get();
        $allType = ProductType::where('status', 1)->get();


        $searching = $request->input('search');
        $products = Product::where('product_name', 'like', '%' . $searching . '%')->get();
        $query = Product::query();

        if ($request->has('sort')) {
            switch ($request->input('sort')) {
                case 'price-low-to-high':
                    $query->orderBy('price');
                    break;
                case 'price-high-to-low':
                    $query->orderByDesc('price');
                    break;
                case 'newest':
                    $query->orderByDesc('created_at');
                    break;
                case 'popular':
                    $query->orderByDesc('view_count');
                    break;
            }
        }

        $allProducts = $query->where('status', 1)->orderBy('created_at', 'DESC')->paginate(3);
        // Product::where('status', 1)->orderBy('created_at', 'DESC')->get();
        $topRatedProducts = Product::where('status',1)->orderBy('view_count', 'Desc')->take(5)->get();

        // dd($topRatedProducts->sortByDesc('view_count'));
        return view('shop', compact('allProducts', 'topRatedProducts', 'allCategory', 'allTag', 'allAlignment', 'allType', 'sort', 'searching', 'products'));
    }
    public function faq()
    {
        return view('faq');
    }
    public function contact()
    {
        return view('contact');
    }
    public function login()
    {
        return view('login');
    }
    public function register()
    {
        return view('register');
    }

    public function termsCondition()
    {
        return view('term-and-condition');
    }
    public function privacyPolicy()
    {
        return view('privacy-and-policy');
    }

    public function myAccount()
    {
        // dd(Auth::user());
        return view('my-account');
    }

    public function cart()
    {
        $shippingDetails = ShippingPrice::where('status', 1)->get();
        // dd(Auth::user()->address);
        return view('cart', compact('shippingDetails'));
    }
    public function checkout()
    {
        // dd(session('shipping')[Auth::user()->id]['shipping_details']->price);
        return view('checkout');
    }
    public function wishList()
    {
        $wishlist = Wishlist::where('user_id', Auth::user()->id)->get();
        return view('wishlist', compact('wishlist'));
    }

    public function productCategory(Request $request, $slug)
    {
        $category = ProductCategory::where('slug', $slug)->first();
        $sort = $request->input('sort');
        // dd($sort);
        $allCategory = ProductCategory::where('status', 1)->get();
        $allTag = ProductTag::where('status', 1)->get();
        $allAlignment = Alignment::where('status', 1)->get();
        $allType = ProductType::where('status', 1)->get();


        $query = Product::query();

        if ($request->has('sort')) {
            switch ($request->input('sort')) {
                case 'price-low-to-high':
                    $query->orderBy('price');
                    break;
                case 'price-high-to-low':
                    $query->orderByDesc('price');
                    break;
                case 'newest':
                    $query->orderByDesc('created_at');
                    break;
                case 'popular':
                    $query->orderByDesc('view_count');
                    break;
            }
        }

        $allProducts = $products = $query->where('product_category_id', $category->id)->where('status', 1)->orderBy('created_at', 'DESC')->paginate(3);
        // Product::where('status', 1)->orderBy('created_at', 'DESC')->get();
        $topRatedProducts = Product::where('status',1)->orderBy('view_count', 'Desc')->take(5)->get();

        // dd($allProducts);
        return view('product-category', compact('allProducts', 'topRatedProducts', 'allCategory', 'allTag', 'allAlignment', 'allType', 'sort', 'category'));
    }
    public function productDetails($slug1, $slug2)
    {
        $productDetails = Product::where('slug', $slug2)->first();
        // dd($productDetails->productCategory->products);
        $addView = [
            'view_count' => $productDetails->view_count + 1,
        ];
        $productDetails->update($addView);
        $reviews = Review::where('product_id', $productDetails->id)->orderBy('created_at', 'Desc')->get();
        $topRatedProducts = Product::where('status',1)->orderBy('view_count', 'Desc')->take(5)->get();
        // dd($productDetails);
        return view('product-details', compact('productDetails', 'reviews', 'topRatedProducts'));
    }


    public function advanceSearch(Request $request)
    {
        $productName = $request->input('search');

        if (!empty($productName)) {
            $query = Product::query();

            // Apply search conditions
            if ($productName) {
                $query->where('product_name', 'LIKE', "%{$productName}%");
            }


            // Execute the query and retrieve the filtered results
            $results = $query->with('productTags', 'productCategory', 'tags', 'productImages', 'reviews')->get();
        } else {
            $results = [];
        }
        // $results = 'mugaesh';
        // Return the filtered results as a JSON response
        return response()->json($results);
    }


    public function advanceSearchPage(Request $request)
    {
        $productName = $request->input('search');

        if (!empty($productName)) {
            $query = Product::query();

            // Apply search conditions
            if ($productName) {
                $query->where('product_name', 'LIKE', "%{$productName}%");
            }


            // Execute the query and retrieve the filtered results
            $results = $query->with('productTags', 'productCategory', 'tags', 'productImages', 'reviews')->get();
        } else {
            $results = [];
        }
        // $results = 'mugaesh';
        // Return the filtered results as a JSON response
        return response()->json($results);
    }


    public function search(Request $request)
    {
        // dd($request->all());
        $searchName = $request->input('search');

        if (!empty($searchName)) {
            $query = Product::query();

            // Apply search conditions
            if ($searchName) {
                $query->where('product_name', 'LIKE', "%{$searchName}%");
            }


            // Execute the query and retrieve the filtered results
            $results = $query->get();
        } else {
            $results = [];
        }
        // dd(count($results));
        return view('search', compact('results','searchName'));
    }

    public function searchResults(Request $request)
    {
        $query = $request->input('search');
        $products = Product::where('name', 'like', '%' . $query . '%')->get();

        return view('shop', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function returnRefund()
    {
        return view('return-and-refund-policy');
    }

    public function shippingDelivery()
    {
        return view('shipping-and-delivery');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeReview(Request $request)
    {
        $data = [
            'user_id' => Auth::user()->id,
            'product_id' => $request->product_id,
            'content' => $request->content,
            'rating' => 5,

        ];
        // dd($data);
        Review::create($data);
        return redirect()->back()->with('success', 'Review added successfully!');
    }

    public function storeContact(Request $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'service' => $request->service,
            'phone' => $request->phone,
            'message' => $request->message,
        ];
        // dd($data);
        $mailData = Contact::create($data);
        Mail::to('sangeetha0apple@gmail.com')->send(new ContactMail($mailData));
        Mail::to($data['email'])->send(new ContactReplyMail($mailData));
        return redirect()->back()->with('success', 'Contact create successfully!');
    }

    public function storeAddress(Request $request)
    {
        $address = Address::where('user_id', Auth::user()->id)->first();
        // dd($request->all());
        $data = [
            'user_id' => Auth::user()->id,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
            'address_line1' => $request->address_line1,
            'address_line2' => $request->address_line2,
            'city' => $request->city,
            'state' => $request->state,
            'postal_code' => $request->postal_code,
            'country' => 'India',
            'landmark' => $request->landmark,
            'note' => $request->note,
            // 'type' => 'shipping',

        ];
        // dd($data);
        if (empty($address)) {
            $shippingAddress = Address::create($data);
        } else {
            $shippingAddress = $address->update($data);
        }

        $shippingDetail = ShippingPrice::find($request->shipping_price);

        $shipping = session()->get('shipping', []);
        // dd($cart);
        if (isset($shipping[Auth::user()->id])) {
            $shipping[Auth::user()->id]['shipping_details'] = $shippingDetail;
            $shipping[Auth::user()->id]['shipping_address'] = $data;
        } else {
            $shipping[Auth::user()->id] = [
                "shipping_details" => $shippingDetail,
                "shipping_address" => $data,
            ];
        }
        session()->put('shipping', $shipping);
        return redirect()->route('checkout');
    }


    public function createAddress(Request $request)
    {
        $address = Address::where('user_id', Auth::user()->id)->first();
        // dd($request->all());
        $data = [
            'user_id' => Auth::user()->id,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
            'address_line1' => $request->address_line1,
            'address_line2' => $request->address_line2,
            'city' => $request->city,
            'state' => $request->state,
            'postal_code' => $request->postal_code,
            'country' => $request->country,
            'landmark' => $request->landmark,
            'note' => $request->note,
        ];
        // dd($data);
        if (empty($address)) {
            Address::create($data);
        } else {
            $address->update($data);
        }
        return redirect()->back()->with('success', 'Address stored successfully!');
    }



    public function changePassword(Request $request)
    {
        // dd('changePassword');
        $credentials = [
            "email" => Auth::user()->email,
            "password" => $request['old_password'],
        ];
        // dd($credentials);
        if (Auth::attempt($credentials)) {
            $data['password'] = Hash::make($request['password']);
            $user = User::find(Auth::user()->id);
            $user->update($data);
            return redirect()->back()->with('success', 'password changed successfully');
        } else {
            return redirect()->back()->with('error', 'old password wrong');
        }
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
