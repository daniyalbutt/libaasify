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
                                    <a class="ps-product__preview" href="#">
                                        <div class="product-cart-img">
                                            <img class="mr-15" src="{{ isset($details['color_variation']) ? asset($details['color_variation']['image']) : asset($details['image']) }}" alt="{{ $details['name'] }}" width="100"> <p>{{ $details['name'] }} <br>Size: {{ $details['size'] }} <br> {{ isset($details['color_variation']) ? 'Color: ' . $details['color_variation']['name'] : 'Color: ' . $details['color'] }} </p>
                                        </div>
                                    </a>
                                </td>
                                <td>Rs. {{ $details['price'] + (isset($details['color_variation']) ? $details['color_variation']['addon'] : 0) }}</td>
                                <td>
                                    <div class="form-group--number">
                                        <button class="minus" type="button"><span>-</span></button>
                                            <input name="qty[{{$id}}]" class="form-control update-cart qty-value" data-stock="50" type="number" value="{{ $details['quantity'] }}">
                                        <button class="plus" type="button"><span>+</span></button>
                                    </div>
                                </td>
                                <td>Rs. {{ ($details['price'] + (isset($details['color_variation']) ? $details['color_variation']['addon'] : 0)) * $details['quantity'] }} </td>
                                @php $total += ($details['price'] + (isset($details['color_variation']) ? $details['color_variation']['addon'] : 0)) * $details['quantity'] @endphp
                                <td>
                                    <div class="">
                                        <button class="btn btn-danger btn-sm remove-from-cart" type="button"><i class="fa fa-trash-o"></i></button>
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
                                <a class="ps-btn ps-btn--gray" href="{{ route('home') }}">Continue Shopping</a>
                            </div>
                        </div>
                        <div class="ps-cart__total">
                            <h3>Total Price: <span> Rs. {{ $total }}</span></h3>
                            <button class="ps-btn" type="submut">Process to checkout<i class="ps-icon-next"></i></button>
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
