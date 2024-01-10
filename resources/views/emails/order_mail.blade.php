<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <style>
        /* Add your email styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            padding: 20px 0;
            background-color: #f8f8f8;
            border-radius: 5px 5px 0 0;
        }

        .content {
            padding: 20px;
        }

        .footer {
            text-align: center;
            padding: 20px 0;
            background-color: #f8f8f8;
            border-radius: 0 0 5px 5px;
        }
    </style>

    @include('layouts.links')
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Order @if($mailData->status == 'cancelled')
                cancellation
                @elseif($mailData->status == 'delivered')
                delivered
                @else
                Confirmation
                @endif</h1>
        </div>
        <div class="content">
            <p>Dear {{ Auth::user()->first_name }} {{ Auth::user()->last_name }},</p>
            <p>Your order {{ $mailData->order_no }} has been
                @if($mailData->status == 'cancelled')
                cancelled
                @elseif($mailData->status == 'delivered')
                delivered
                @else
                confirmed
                @endif
                !</p>
            <p>Order Details:</p>
            <table class="table">
                <tbody>
                    @php $total = 0 @endphp
                    @foreach ($mailData->orderItems as $key => $item)
                        @php
                            $total += $item->total_price;
                        @endphp
                        <tr>
                            <td>{{ $item->product->product_name }}
                                <strong>
                                    ₹{{ $item->unit_price }}
                                    ×
                                    {{ $item->quantity }}
                                </strong>
                            </td>
                            <td>

                                ₹{{ $item->total_price }}
                            </td>
                        </tr>
                    @endforeach


                    <tr>
                        <td>Shipping
                            and
                            Handing
                        </td>
                        <td>₹{{ $mailData->total_amount - $total }}.00
                        </td>
                    </tr>

                    <tr>
                        <td><strong>Order
                                Total</strong>
                        </td>
                        <td><strong>₹{{ $mailData->total_amount }}.00</strong>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p>Shipping Address:</p>
            <p>{{ $mailData->firstname }}
                {{ $mailData->lastname }},
                {{ $mailData->address_line1 }},
                {{ $mailData->address_line2 }},
                {{ $mailData->city }},
                {{ $mailData->state }},
                {{ $mailData->postal_code }},
                {{ $mailData->country }},
                {{ $mailData->phone }},
                {{ $mailData->email }}
            </p>
            <p>Thank you for shopping with us. If you have any questions, please contact our support.</p>
        </div>
        <div class="footer">
            <p>This email was sent by SMAC. &copy; All rights reserved.</p>
        </div>
    </div>
</body>

</html>
