  
@extends('front_end.layouts.index')

@section('content')
<!-- start contents -->
        
  <!-- Checkout Section Begin -->
  <section class="checkout spad">
    <div class="container">
        <?php
        if ($errors->all()) {
            echo '<div class="alert alert-danger" role="alert">';
            foreach ($errors->all() as $message) {
                echo $message . '<br>';
            }
            echo '</div>';
        }
        ?>
        <div class="checkout__form">
            <h4>Billing Details</h4>
            <form action="" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Full Name<span>*</span></p>
                                    <input type="text" name="customer_name">
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Address<span>*</span></p>
                            <input type="text" name="customer_address" placeholder="Street Address" class="checkout__input__add">
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Phone<span>*</span></p>
                                    <input type="text" name="customer_phonenumber">
                                </div>
                            </div>
                        </div>
                    </div>
  {{--oder--}}
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            
                            <h4>Your Order</h4>
                            <div class="checkout__order__products">Products <span>Total</span></div>
                            <ul>
                                <li> {{$ProductDetail->name}} <span>${{$ProductDetail->price}}</span></li>
                                <li> Quantity: <span> {{ $quantity }}</span></li>
                            </ul>
                            {{-- <div class="checkout__order__subtotal">Subtotal <span>$750.99</span></div> --}}
                            <div class="checkout__order__total">Total <span>${{$ProductDetail->price}}</span></div>
                            <button type="submit" class="site-btn">PLACE ORDER</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->
@endsection
