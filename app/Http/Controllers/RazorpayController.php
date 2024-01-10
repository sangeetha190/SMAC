<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Mail\CustomerOrderMail;
use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Session;
use Exception;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class RazorpayController extends Controller
{
    public $api;

    public function __construct($foo = null)
    {
        $this->api = new Api("rzp_test_kYWE8bFvDO9w30", "jjl14SuXPcxKU2GbrhHrSihl");
    }
  
  
    // public function store(Request $request)
    // {
    //     try {
    //     $input = $request->all();

    //     $api = new Api('rzp_test_kYWE8bFvDO9w30', 'jjl14SuXPcxKU2GbrhHrSihl
    //     ');

    //     $payment = $api->payment->fetch($input['payment_id']);

    //     if (count($input)  && !empty($input['payment_id'])) {
            

    //             // dd(session('shipping')[Auth::user()->id]['shipping_address']['firstname']);
    //             $paymentMethod = $payment->method;
    //             // $response = $api->payment->fetch($input['payment_id'])->capture(array('amount' => $payment['amount']));
    //             $orderNo = Str::upper('SDM-' . Str::random(10));
    //             // dd($payment->method);
    //             $orderData = [
    //                 "user_id" => Auth::user()->id,
    //                 "total_amount" => $input['amount'],
    //                 "status" => 'pending',
    //                 "order_no" => $orderNo,
    //                 "firstname" => session('shipping')[Auth::user()->id]['shipping_address']['firstname'],
    //                 "lastname" => session('shipping')[Auth::user()->id]['shipping_address']['lastname'],
    //                 "email" => session('shipping')[Auth::user()->id]['shipping_address']['email'],
    //                 "phone" => session('shipping')[Auth::user()->id]['shipping_address']['phone'],
    //                 "address_line1" => session('shipping')[Auth::user()->id]['shipping_address']['address_line1'],
    //                 "address_line2" => session('shipping')[Auth::user()->id]['shipping_address']['address_line2'],
    //                 "country" => session('shipping')[Auth::user()->id]['shipping_address']['country'],
    //                 "city" => session('shipping')[Auth::user()->id]['shipping_address']['city'],
    //                 "state" => session('shipping')[Auth::user()->id]['shipping_address']['state'],
    //                 "postal_code" => session('shipping')[Auth::user()->id]['shipping_address']['postal_code'],
    //                 "landmark" => session('shipping')[Auth::user()->id]['shipping_address']['landmark'],
    //                 "note" => session('shipping')[Auth::user()->id]['shipping_address']['note'],
    //                 "payment_type" => 'razorpay',

    //             ];

    //             $order = Order::create($orderData);

    //             foreach (session('cart') as $key => $details) {

    //                 if ($details['product']->offer != null) {
    //                     $totalPrice = round($details['product']->price - $details['product']->price * ($details['product']->offer / 100)) * $details['quantity'];
    //                     $unitPrice = round($details['product']->price - $details['product']->price * ($details['product']->offer / 100));
    //                 } else {
    //                     $unitPrice = round($details['product']->price);
    //                     $totalPrice = round($details['product']->price * $details['quantity']);
    //                 }

    //                 $product = Product::find($details['product']->id);

    //                 $productData = [
    //                     "order_id" => $order->id,
    //                     "product_id" => $details['product']->id,
    //                     "quantity" => $details['quantity'],
    //                     "unit_price" => intval($unitPrice),
    //                     "total_price" => intval($totalPrice),
    //                 ];

    //                 OrderItem::create($productData);

    //                 $updateProduct = [
    //                     "stock" => $product->stock - $details['quantity'],
    //                 ];
    //                 $product->update($updateProduct);
    //             }

    //             $paymentData = [
    //                 "order_id" => $order->id,
    //                 "payment_method" => $payment->method,
    //                 "transaction_id" => $payment->id,
    //                 "amount" => $input['amount'],
    //                 "status" => 'completed',
    //             ];
    //             // dd($paymentData);
    //             Payment::create($paymentData);
    //             // Session::put('success', 'Payment successful');
    //             $mailData = Order::find($order->id);
    //             Mail::to(Auth::user()->email)->send(new CustomerOrderMail($mailData));
    //             return redirect()->route('my.account')->with('success', 'Order placed successfully!');
    //         } 
    //         catch (\Razorpay\Api\Errors\Error $e) {
    //             // Log the detailed error message
    //             Log::error('Razorpay API Error: ' . $e->getMessage());
        
    //             // Display a user-friendly error message
    //             return redirect()->back()->with('error', 'An error occurred while processing the payment. Please try again later.');
    //         }
    //     }
    // }

    public function store(Request $request): RedirectResponse
    {
        try {
            $input = $request->all();
            $api = new Api('rzp_test_kYWE8bFvDO9w30', 'jjl14SuXPcxKU2GbrhHrSihl');
    
            // Attempt to fetch payment
            $payment = $api->payment->fetch($input['payment_id']);
    
            if (count($input) && !empty($input['payment_id'])) {
                // Generate order number
                $orderNo = Str::upper('SDM-' . Str::random(10));
    
                // Prepare order data
                $orderData = [
                    "user_id" => Auth::user()->id,
                    "total_amount" => $input['amount'],
                    "status" => 'pending',
                    "order_no" => $orderNo,
                    // ... other shipping address data
                    "payment_type" => 'razorpay',
                ];
    
                // Create order
                $order = Order::create($orderData);
    
                // Process order items
                foreach (session('cart') as $key => $details) {
                    // Calculate unit price and total price
                    $unitPrice = $details['product']->offer ? round($details['product']->price - $details['product']->price * ($details['product']->offer / 100)) : round($details['product']->price);
                    $totalPrice = $unitPrice * $details['quantity'];
    
                    // Create order item
                    OrderItem::create([
                        "order_id" => $order->id,
                        "product_id" => $details['product']->id,
                        "quantity" => $details['quantity'],
                        "unit_price" => intval($unitPrice),
                        "total_price" => intval($totalPrice),
                    ]);
    
                    // Update product stock
                    $product = Product::find($details['product']->id);
                    $product->update([
                        "stock" => $product->stock - $details['quantity'],
                    ]);
                }
    
                // Create payment record
                $paymentData = [
                    "order_id" => $order->id,
                    "payment_method" => $payment->method,
                    "transaction_id" => $payment->id,
                    "amount" => $input['amount'],
                    "status" => 'completed',
                ];
                Payment::create($paymentData);
    
                // Send order confirmation email
                $mailData = Order::find($order->id);
                Mail::to(Auth::user()->email)->send(new CustomerOrderMail($mailData));
    
                return redirect()->route('my.account')->with('success', 'Order placed successfully!');
            }
        } catch (\Razorpay\Api\Errors\Error $e) {
            // Log the detailed error message
            Log::error('Razorpay API Error: ' . $e->getMessage());
    
            // Display a user-friendly error message
            return redirect()->back()->with('error', 'An error occurred while processing the payment. Please try again later.');
        }
    }


    public function cod(Request $request): RedirectResponse
    {
        $input = $request->all();
        // dd($input['amount']);
        // $api = new Api('rzp_test_tSRUDH848K9SZK', 'fl4uM318o0RR1YhIRIit7pUC');

        // $payment = $api->payment->fetch($input['payment_id']);

        // if (count($input)  && !empty($input['payment_id'])) {
        try {

            // dd(session('shipping')[Auth::user()->id]['shipping_address']['firstname']);
            $paymentMethod = 'cash';
            // $response = $api->payment->fetch($input['payment_id'])->capture(array('amount' => $payment['amount']));
            $orderNo = Str::upper('SMACK-' . Str::random(10));
            // dd($payment->method);
            $orderData = [
                "user_id" => Auth::user()->id,
                "total_amount" => $input['amount'],
                "status" => 'pending',
                "order_no" => $orderNo,
                "firstname" => session('shipping')[Auth::user()->id]['shipping_address']['firstname'],
                "lastname" => session('shipping')[Auth::user()->id]['shipping_address']['lastname'],
                "email" => session('shipping')[Auth::user()->id]['shipping_address']['email'],
                "phone" => session('shipping')[Auth::user()->id]['shipping_address']['phone'],
                "address_line1" => session('shipping')[Auth::user()->id]['shipping_address']['address_line1'],
                "address_line2" => session('shipping')[Auth::user()->id]['shipping_address']['address_line2'],
                "country" => session('shipping')[Auth::user()->id]['shipping_address']['country'],
                "city" => session('shipping')[Auth::user()->id]['shipping_address']['city'],
                "state" => session('shipping')[Auth::user()->id]['shipping_address']['state'],
                "postal_code" => session('shipping')[Auth::user()->id]['shipping_address']['postal_code'],
                "landmark" => session('shipping')[Auth::user()->id]['shipping_address']['landmark'],
                "note" => session('shipping')[Auth::user()->id]['shipping_address']['note'],
                "payment_type" => 'cod',

            ];

            $order = Order::create($orderData);

            foreach (session('cart') as $key => $details) {

                if ($details['product']->offer != null) {
                    $totalPrice = round($details['product']->price - $details['product']->price * ($details['product']->offer / 100)) * $details['quantity'];
                    $unitPrice = round($details['product']->price - $details['product']->price * ($details['product']->offer / 100));
                } else {
                    $unitPrice = round($details['product']->price);
                    $totalPrice = round($details['product']->price * $details['quantity']);
                }

                $product = Product::find($details['product']->id);

                $productData = [
                    "order_id" => $order->id,
                    "product_id" => $details['product']->id,
                    "quantity" => $details['quantity'],
                    "unit_price" => intval($unitPrice),
                    "total_price" => intval($totalPrice),
                ];

                OrderItem::create($productData);

                $updateProduct = [
                    "stock" => $product->stock - $details['quantity'],
                ];
                $product->update($updateProduct);
            }

            $paymentData = [
                "order_id" => $order->id,
                "payment_method" => $paymentMethod,
                "transaction_id" => 'cash on delivery',
                "amount" => $input['amount'],
                "status" => 'pending',
            ];
            // dd($paymentData);
            Payment::create($paymentData);
            // Session::put('success', 'Payment successful');
            $mailData = Order::find($order->id);
            Mail::to(Auth::user()->email)->send(new CustomerOrderMail($mailData));
            return redirect()->route('my.account')->with('success', 'Order placed successfully!');
        } catch (Exception $e) {
            // dd('catch');
            return  $e->getMessage();
            Session::put('error', $e->getMessage());
            return redirect()->back();
        }
        // }
    }


    public function orderSuccess()
    {
        return view('order-success');
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
