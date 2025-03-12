@extends('layouts.app')
@section('title', $get_category->name)
@section('content')
<main class="ps-main">
    <div class="ps-products-wrap pt-80 pb-80">
        <div class="ps-products" data-mh="product-listing">
            <div class="ps-section--offer mb-40">
                <div class="ps-column"><a class="ps-offer" href="product-listing.php"><img src="images/banner/banner-1.jpg" alt=""></a></div>
                <div class="ps-column"><a class="ps-offer" href="product-listing.php"><img src="images/banner/banner-2.jpg" alt=""></a></div>
            </div>
            <div class="ps-product-action">
                <div class="ps-product__filter">
                    <select class="ps-select selectpicker">
                        <option value="1">Shortby</option>
                        <option value="2">Name</option>
                        <option value="3">Price (Low to High)</option>
                        <option value="3">Price (High to Low)</option>
                    </select>
                </div>
                <div class="ps-pagination">
                    <ul class="pagination">
                        <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">...</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="ps-product__columns">
                @foreach($products as $key => $value)
                <div class="ps-product__column">
                    <div class="ps-shoe mb-30">
                        <div class="ps-shoe__thumbnail">
                            @if($value->new_product == 1)
                            <div class="ps-badge ps-badge--new"><span>New</span></div>
                            @endif
                            @if($value->percentageOff() != 0)
                            <div class="ps-badge ps-badge--sale"><span>{{ $value->percentageOff() }}%</span></div>
                            @endif
                            <a class="ps-shoe__favorite" href="#">
                                <i class="ps-icon-heart"></i>
                            </a>
                            <img src="{{ asset($value->image) }}" alt="{{ $value->name }}">
                            <a class="ps-shoe__overlay" href="{{ route('product.detail', ['category' => $value->category->slug ,'slug' => $value->slug]) }}"></a>
                        </div>
                        <div class="ps-shoe__content">
                            <div class="ps-shoe__variants">
                                <div class="ps-shoe__variant normal">
                                    <img src="{{ asset($value->image) }}" alt="{{ $value->default_color }}">
                                    @foreach($value->variation_by_name('color')->get() as $var_key => $var_value)
                                    <img src="{{ asset($var_value->image) }}" alt="{{ $var_value->get_attribute->name }}">
                                    @endforeach
                                </div>
                                <select class="ps-rating ps-shoe__rating">
                                    <option value="1">1</option>
                                    <option value="1">2</option>
                                    <option value="1">3</option>
                                    <option value="1">4</option>
                                    <option value="2">5</option>
                                </select>
                            </div>
                            <div class="ps-shoe__detail">
                                <a class="ps-shoe__name" href="{{ route('product.detail', ['category' => $value->category->slug ,'slug' => $value->slug]) }}">{{ $value->name }}</a>
                                <p class="ps-shoe__categories">{!! $value->category->getParentsNames() !!}</p>
                                <span class="ps-shoe__price">
                                    Rs. {{ $value->price }}
                                    @if($value->discount != 0)
                                    <del>Rs.{{$value->discount}}</del>
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="ps-product-action">
                <div class="ps-product__filter">
                    <select class="ps-select selectpicker">
                        <option value="1">Shortby</option>
                        <option value="2">Name</option>
                        <option value="3">Price (Low to High)</option>
                        <option value="3">Price (High to Low)</option>
                    </select>
                </div>
                <div class="ps-pagination">
                    <ul class="pagination">
                        <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">...</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="ps-sidebar" data-mh="product-listing">
            <aside class="ps-widget--sidebar ps-widget--category">
                <div class="ps-widget__header">
                    <h3>Category</h3>
                </div>
                <div class="ps-widget__content">
                    <ul class="ps-list--checked">
                        <li class="current"><a href="product-listing.php">Life(521)</a></li>
                        <li><a href="product-listing.php">Running(76)</a></li>
                        <li><a href="product-listing.php">Baseball(21)</a></li>
                        <li><a href="product-listing.php">Football(105)</a></li>
                        <li><a href="product-listing.php">Soccer(108)</a></li>
                        <li><a href="product-listing.php">Trainning & game(47)</a></li>
                        <li><a href="product-listing.php">More</a></li>
                    </ul>
                </div>
            </aside>
            <aside class="ps-widget--sidebar ps-widget--filter">
                <div class="ps-widget__header">
                    <h3>Category</h3>
                </div>
                <div class="ps-widget__content">
                    <div class="ac-slider" data-default-min="300" data-default-max="2000" data-max="3450" data-step="50" data-unit="$"></div>
                    <p class="ac-slider__meta">Price:<span class="ac-slider__value ac-slider__min"></span>-<span class="ac-slider__value ac-slider__max"></span></p>
                    <a class="ac-slider__filter ps-btn" href="#">Filter</a>
                </div>
            </aside>
            <aside class="ps-widget--sidebar ps-widget--category">
                <div class="ps-widget__header">
                    <h3>Shoe Brand</h3>
                </div>
                <div class="ps-widget__content">
                    <ul class="ps-list--checked">
                        <li class="current"><a href="product-listing.php">Nike(521)</a></li>
                        <li><a href="product-listing.php">Adidas(76)</a></li>
                        <li><a href="product-listing.php">Baseball(69)</a></li>
                        <li><a href="product-listing.php">Gucci(36)</a></li>
                        <li><a href="product-listing.php">Dior(108)</a></li>
                        <li><a href="product-listing.php">B&G(108)</a></li>
                        <li><a href="product-listing.php">Louis Vuiton(47)</a></li>
                    </ul>
                </div>
            </aside>
            <aside class="ps-widget--sidebar ps-widget--category">
                <div class="ps-widget__header">
                    <h3>Width</h3>
                </div>
                <div class="ps-widget__content">
                    <ul class="ps-list--checked">
                        <li class="current"><a href="product-listing.php">Narrow</a></li>
                        <li><a href="product-listing.php">Regular</a></li>
                        <li><a href="product-listing.php">Wide</a></li>
                        <li><a href="product-listing.php">Extra Wide</a></li>
                    </ul>
                </div>
            </aside>
            <div class="ps-sticky desktop">
                <aside class="ps-widget--sidebar">
                    <div class="ps-widget__header">
                        <h3>Size</h3>
                    </div>
                    <div class="ps-widget__content">
                        <table class="table ps-table--size">
                            <tbody>
                                <tr>
                                    <td class="active">3</td>
                                    <td>5.5</td>
                                    <td>8</td>
                                    <td>10.5</td>
                                    <td>13</td>
                                </tr>
                                <tr>
                                    <td>3.5</td>
                                    <td>6</td>
                                    <td>8.5</td>
                                    <td>11</td>
                                    <td>13.5</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>6.5</td>
                                    <td>9</td>
                                    <td>11.5</td>
                                    <td>14</td>
                                </tr>
                                <tr>
                                    <td>4.5</td>
                                    <td>7</td>
                                    <td>9.5</td>
                                    <td>12</td>
                                    <td>14.5</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>7.5</td>
                                    <td>10</td>
                                    <td>12.5</td>
                                    <td>15</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </aside>
                <aside class="ps-widget--sidebar">
                    <div class="ps-widget__header">
                        <h3>Color</h3>
                    </div>
                    <div class="ps-widget__content">
                        <ul class="ps-list--color">
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div>
@endsection

@push('css')    
@endpush

@push('js')
@endpush
