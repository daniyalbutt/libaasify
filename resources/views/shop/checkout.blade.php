@extends('layouts.app')
@section('content')
<main class="ps-main">
    <div class="ps-checkout pt-80 pb-80">
        <div class="ps-container">
            @if($errors->any())
            {!! implode('', $errors->all('<div class="alert alert-danger">:message</div>')) !!}
            @endif
            <form class="ps-checkout__form form-horizontal" action="{{ route('product.payment') }}" method="post" id="order-place" role="form" action="{{ route('product.payment') }}">
                @csrf
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 ">
                        <div class="ps-checkout__billing">
                            <h3>Billing Detail</h3>
                            <div class="form-group form-group--inline">
                                <label>First Name<span>*</span>
                                </label>
                                <input class="form-control" type="text" name="first_name" required>
                            </div>
                            <div class="form-group form-group--inline">
                                <label>Last Name<span>*</span></label>
                                <input class="form-control" type="text" name="last_name" required>
                            </div>
                            <div class="form-group form-group--inline">
                                <label>Email Address<span>*</span>
                                </label>
                                <input class="form-control" type="email" name="email" required>
                            </div>
                            <div class="form-group form-group--inline">
                                <label>Company Name</label>
                                <input class="form-control" type="text" name="company">
                            </div>
                            <div class="form-group form-group--inline">
                                <label>Country / Region<span>*</span></label>
                                <input class="form-control" type="text" name="country" required>
                            </div>
                            <div class="form-group form-group--inline">
                                <label>Address<span>*</span></label>
                                <input class="form-control" type="text" name="address" required>
                            </div>
                            <div class="form-group form-group--inline">
                                <label>Town / City<span>*</span></label>
                                <input class="form-control" type="text" name="town" required>
                            </div>
                            <div class="form-group form-group--inline">
                                <label>Postcode / Zip<span>*</span></label>
                                <input class="form-control" type="text" name="zip" required>
                            </div>
                            <div class="form-group form-group--inline">
                                <label>Phone<span>*</span></label>
                                <input class="form-control" type="text" name="phone" required>
                            </div>
                            <div class="form-group">
                                <div class="ps-checkbox">
                                    <input class="form-control" type="checkbox" id="cb01" name="account">
                                    <label for="cb01">Create an account?</label>
                                </div>
                            </div>
                            <h3 class="mt-40"> Addition information</h3>
                            <div class="form-group form-group--inline textarea">
                                <label>Order Notes</label>
                                <textarea class="form-control" name="message" rows="5" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                        <div class="ps-checkout__order">
                            <header>
                                <h3>Your Order</h3>
                            </header>
                            <div class="content">
                                <table class="table ps-checkout__products">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase">Product</th>
                                            <th class="text-uppercase">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $total = 0 @endphp
                                        @foreach((array) session('cart') as $id => $details)
                                        <tr>
                                            <td>
                                                <div class="product-cart-img">
                                                    <img class="mr-15" src="{{ isset($details['color_variation']) ? asset($details['color_variation']['image']) : asset($details['image']) }}" alt="{{ $details['name'] }}" width="80"> <p style="color: white;">{{ $details['name'] }} <br>Size: {{ $details['size'] }} <br> {{ isset($details['color_variation']) ? 'Color: ' . $details['color_variation']['name'] : 'Color: ' . $details['color'] }} </p>
                                                </div>
                                            </td>
                                            <td>{{ $details['quantity'] }} x Rs. {{ ($details['price'] + (isset($details['color_variation']) ? $details['color_variation']['addon'] : 0)) * $details['quantity'] }}</td>
                                        </tr>
                                        @php $total += ($details['price'] + (isset($details['color_variation']) ? $details['color_variation']['addon'] : 0)) * $details['quantity'] @endphp
                                        @endforeach
                                        <tr>
                                            <td>Card Subtitle</td>
                                            <td>Rs. {{ $total }}</td>
                                        </tr>
                                        <tr>
                                            <td>Order Total</td>
                                            <td>Rs. {{ $total }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <footer>
                                <h3>Payment Method</h3>
                                <div class="form-group cheque">
                                    <div class="ps-radio">
                                        <input class="form-control" type="radio" id="rdo01" name="payment" value="cod" checked>
                                        <label for="rdo01">Cash On Delivery</label>
                                    </div>
                                </div>
                                <div class="form-group paypal">
                                    <div class="ps-radio ps-radio--inline">
                                        <input class="form-control" type="radio" name="payment" id="rdo02" value="other">
                                        <label for="rdo02">Other</label>
                                    </div>
                                    <ul class="ps-payment-method">
                                        <li><a href="#"><img src="images/payment/1.png" alt=""></a></li>
                                        <li><a href="#"><img src="images/payment/2.png" alt=""></a></li>
                                        <li><a href="#"><img src="images/payment/3.png" alt=""></a></li>
                                    </ul>
                                    <button class="ps-btn ps-btn--fullwidth">Place Order<i class="ps-icon-next"></i></button>
                                </div>
                            </footer>
                        </div>
                        <div class="ps-shipping">
                            <h3>FREE SHIPPING</h3>
                            <p>YOUR ORDER QUALIFIES FOR FREE SHIPPING.<br> <a href="#"> Singup </a> for free shipping on every order, every time.</p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endsection

    @push('css')
        <style>
            .StripeElement {
                box-sizing: border-box;
                height: 40px;
                padding: 10px 12px;
                border: 1px solid transparent;
                border-radius: 4px;
                background-color: white;
                box-shadow: 0 1px 3px 0 #e6ebf1;
                -webkit-transition: box-shadow 150ms ease;
                transition: box-shadow 150ms ease;
                border-width: 1px;
                border-color: rgb(150, 163, 218);
                border-style: solid;
                margin-bottom: 10px;
            }

            .StripeElement--focus {
                box-shadow: 0 1px 3px 0 #cfd7df;
            }

            .StripeElement--invalid {
                border-color: #fa755a;
            }

            .StripeElement--webkit-autofill {
                background-color: #fefde5 !important;
            }

            .custom-btn {
                padding-top: 30px;
                display: flex;
                justify-content: center;
            }

            .blue-custom {
                background: rgba(13, 110, 253, .25);
                transition: 0.6s;
            }

            .blue-custom:hover {
                background-color: transparent;
                border: 1px solid;
            }
        </style>
    @endpush


    @push('js')

    @endpush
