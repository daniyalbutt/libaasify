@extends('layouts.app')
@section('title', 'Cart')
@section('content')

<main class="ps-main">
    <div class="ps-content pt-80 pb-80">
        <div class="ps-container">
            <div class="ps-cart-listing">
                <form action="{{ route('product.update.cart') }}" method="post">
                    @csrf
                    <table class="table ps-cart__table">
                        <thead>
                            <tr>
                                <th>All Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0 @endphp
                            @foreach((array) session('cart') as $id => $details)
                            <tr data-id="{{ $id }}">
                                <td>
                                    <a class="ps-product__preview" href="product-detail.html">
                                        <div class="product-cart-img">
                                            <img class="mr-15" src="{{ $details['color_variation'] != null ? asset($details['color_variation']['image']) : asset($details['image']) }}" alt="{{ $details['name'] }}" width="100"> <p>{{ $details['name'] }} <br>Size: {{ $details['size'] }} <br> {{ $details['color_variation'] != null ? 'Color: ' . $details['color_variation']['name'] : '' }} </p>
                                        </div>
                                    </a>
                                </td>
                                <td>Rs. {{ $details['price'] + ($details['color_variation'] != null ? $details['color_variation']['addon'] : '') }}</td>
                                <td>
                                    <div class="form-group--number">
                                        <button class="minus"><span>-</span></button>
                                            <input class="form-control update-cart qty-value" data-stock="50" type="number" value="{{ $details['quantity'] }}">
                                        <button class="plus"><span>+</span></button>
                                    </div>
                                </td>
                                <td>Rs. {{ ($details['price'] + ($details['color_variation'] != null ? $details['color_variation']['addon'] : '')) * $details['quantity'] }} </td>
                                @php $total += ($details['price'] + ($details['color_variation'] != null ? $details['color_variation']['addon'] : '')) * $details['quantity'] @endphp
                                <td>
                                    <div class="">
                                        <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa fa-trash-o"></i></button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="ps-cart__actions">
                        <div class="ps-cart__promotion">
                            <div class="form-group">
                                <div class="ps-form--icon"><i class="fa fa-angle-right"></i>
                                    <input class="form-control" type="text" placeholder="Promo Code">
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="ps-btn ps-btn--gray">Continue Shopping</button>
                            </div>
                        </div>
                        <div class="ps-cart__total">
                            <h3>Total Price: <span> Rs. {{ $total }}</span></h3>
                            <a class="ps-btn" href="checkout.html">Process to checkout<i class="ps-icon-next"></i></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('css')
@endpush

@push('js')
<script type="text/javascript">

    $(".remove-from-cart").click(function (e) {
        e.preventDefault();
        var ele = $(this);
        if(confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '{{ route('product.remove.from.cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });


</script>
@endpush
