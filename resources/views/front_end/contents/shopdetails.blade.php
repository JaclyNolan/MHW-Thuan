  <!-- Page Wrapper -->
  @extends('front_end.layouts.index')

  @section('content')
      <!-- start contents -->

      <!-- Product Details Section Begin -->
      <section class="product-details spad">
          <div class="container">
              <div class="row">
                  <div class="col-lg-6 col-md-6">
                      <div class="product__details__pic">
                          <div class="product__details__pic__item">
                              <img class="product__details__pic__item--large"
                                  src="{{ $ProductDetail->images->first()->getImages() }}" alt="">
                          </div>
                          {{-- <div class="product__details__pic__slider owl-carousel">
                            <img data-imgbigurl="images/product/details/product-details-2ages"
                               src="img/product/details/thumb-1.jpg" alt="">
                           <img data-imgbigurl="img/product/details/product-details-3.jpg"
                                src="img/product/details/thumb-2.jpg" alt="">
                            <img data-imgbigurl="img/product/details/product-details-5.jpg"
                                src="img/product/details/thumb-3.jpg" alt="">
                            <img data-imgbigurl="im/product/detail/product-details-4.jpg"
                                src="img/product/details/thumb-4.jpg" alt="">
                        </div> --}}
                      </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                      <div class="product__details__text">
                          <h3>{{ $ProductDetail->name }}</h3>
                          <div class="product__details__price">${{ $ProductDetail->price }}</div>
                          <div class="mb-2"><span style="font-weight: 700">Description:
                              </span>{{ $ProductDetail->description }}</div>
                          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <tr>
                                  <th style="width: 150px">Stock:</th>
                                  <td>{{ $ProductDetail->stock }}</td>
                              </tr>
                              <tr>
                                  <th style="width: 150px">Color:</th>
                                  <td>{{ $ProductDetail->color->name }}</td>
                              </tr>
                              <tr>
                                  <th style="width: 150px">Screen Size:</th>
                                  <td>{{ $ProductDetail->screensize->size }}</td>
                              </tr>
                              <tr>
                                  <th style="width: 150px">Processor:</th>
                                  <td>{{ $ProductDetail->processor->name }}</td>
                              </tr>
                              <tr>
                                  <th style="width: 150px">VGA:</th>
                                  <td>{{ $ProductDetail->vga->name }}</td>
                              </tr>
                              <tr>
                                  <th style="width: 150px">RAM:</th>
                                  <td>{{ $ProductDetail->ram->size }}</td>
                              </tr>
                              <tr>
                                  <th style="width: 150px">SSD:</th>
                                  <td>{{ $ProductDetail->ssd->name }}</td>
                              </tr>
                              <tr>
                                  <th style="width: 150px">HDD:</th>
                                  <td>{{ $ProductDetail->hdd->name }}</td>
                              </tr>
                              <tr>
                                  <th style="width: 150px">Provider:</th>
                                  <td>{{ $ProductDetail->provider->name }}</td>
                              </tr>
                          </table>
                          {{-- <p>Brand: {{$ProductDetailBrand->name}}</p> --}}
                          {{-- <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                   <input type="text" name="quanity" value="1">
                                </div>
                            </div>
                        </div>
                       <a href="{{asset('checkout/'.$ProductDetail->id)}}" class="primary-btn danger">CHECK OUT</a> --}}
                          {{-- <a href="#" class="primary-btn">ADD TO CARD</a> --}}
                          <form action="" method="post">
                              @csrf
                              <fieldset class="form-group">
                                  <div class="product__details__quantity">
                                      <div class="quantity">
                                          <div class="pro-qty">
                                              <input type="text" name="quantity" value="1">
                                          </div>
                                      </div>
                                  </div>
                              </fieldset>
                              <button type="submit" class="primary-btn danger">CHECKOUT</button>
                          </form>
                          {{-- }} <ul>
                            <li><b>Availability</b> <span>In Stock</span></li>
                            <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                            <li><b>Weight</b> <span>0.5 kg</span></li>
                            <li><b>Share on</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul> --}}
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!-- Product Details Section End -->

      {{-- <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/product-1.jpg">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/product-2.jpg">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/product-3.jpg">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="img/product/product-7.jpg">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Related Product Section End --> --}}
      <!-- Page Wrapper -->
  @endsection
