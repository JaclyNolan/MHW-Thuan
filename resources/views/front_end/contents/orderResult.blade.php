@extends('front_end.layouts.index')

@section('content')
    <div class="container">


        <div class="container mb-4" style="font-weight: 700; font-size: 25px;">
            Phonenumber: {{ $customer_phonenumber }}
        </div>

        <div class="shoping__cart__table">
            <table>
                <thead>
                    <tr>
                        <th class="shoping__product">Products</th>
                        <th style="shoping__product">Customer</th>
                        <th>Old Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order as $key => $array)
                        <tr>
                            <td class="shoping__cart__item">
                                <img style="max-width: 100px; max-height:100px; float: left;"
                                    src="{{ $array->laptop->images->first()->getImages() }}" alt="">
                                <h5 style="float: left">
                                    <ul class="mb-2" style="font-weight: 700; font-size: 18px;">{{ $array->laptop->name }}
                                    </ul>
                                    <ul style="font-weight: 400; font-size: 15px;">CPU:
                                        {{ $array->laptop->processor->name }}</ul>
                                    <ul style="font-weight: 400; font-size: 15px;">Memory: {{ $array->laptop->ram->size }}
                                    </ul>
                                    <ul style="font-weight: 400; font-size: 15px;">Storage:
                                        @php
                                            if ($array->laptop->ssd->name != 'None') {
                                                echo $array->laptop->ssd->size;
                                            } elseif ($array->laptop->hdd->name != 'None') {
                                                echo $array->laptop->hdd->size;
                                            } else {
                                                echo '0';
                                            }
                                        @endphp
                                    </ul>
                                </h5>
                            </td>
                            <td class="shoping__cart__item" style="padding-top: 18px; width: 300px">
                                <h5>
                                    <ul class="mb-2" style="font-weight: 700; font-size: 18px;">
                                        {{ $array->customer_name }}</ul>
                                    <ul style="font-weight: 400; font-size: 15px;">Address: {{ $array->customer_address }}
                                    </ul>
                                </h5>
                            </td>
                            <td class="shoping__cart__price">
                                ${{ $array->old_price }}
                            </td>
                            <td class="shoping__cart__price">
                                {{ $array->quanity }}
                            </td>
                            <td class="shoping__cart__total">
                                ${{ $array->total }}
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
