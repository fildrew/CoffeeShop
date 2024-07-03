@extends('layouts.app')

@section('content')
<section class="home-slider owl-carousel">
    <div class="slider-item" style="background-image:url({{ asset('assets/images/bg_1.jpg') }});">
        <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

          <div class="col-md-8 col-sm-12 text-center ftco-animate">
              <span class="subheading">Welcome</span>
            <h1 class="mb-4">The Best Coffee Testing Experience</h1>
            <p class="mb-4 mb-md-5">A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
            <p><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a> <a href="#" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
          </div>

        </div>
      </div>
    </div>

    <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_2.jpg') }});">
        <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

          <div class="col-md-8 col-sm-12 text-center ftco-animate">
              <span class="subheading">Welcome</span>
            <h1 class="mb-4">Amazing Taste &amp; Beautiful Place</h1>
            <p class="mb-4 mb-md-5">A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
            <p><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a> <a href="#" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
          </div>

        </div>
      </div>
    </div>

    <div class="slider-item" style="background-image: url({{ asset('assets/images/bg_3.jpg') }});">
        <div class="overlay"></div>
      <div class="container">
        <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

          <div class="col-md-8 col-sm-12 text-center ftco-animate">
              <span class="subheading">Welcome</span>
            <h1 class="mb-4">Creamy Hot and Ready to Serve</h1>
            <p class="mb-4 mb-md-5">A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
            <p><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a> <a href="#" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p>
          </div>

        </div>
      </div>
    </div>
</section>
<div class="container">
    @if(Session::has('date'))
        <p class="alert {{ Session::get('alert-class','alert-info') }}">{{ Session::get('date') }}</p>
    @endif
</div>
<div class="container">
    @if(Session::has('booking'))
        <p class="alert {{ Session::get('alert-class','alert-info') }}">{{ Session::get('booking') }}</p>
    @endif
</div>
<section class="ftco-intro">
    <div class="container-wrap">
        <div class="wrap d-md-flex align-items-xl-end">
            <div class="info">
                <div class="row no-gutters">
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="icon"><span class="icon-phone"></span></div>
                        <div class="text-white">
                            <h3>+39 327 289 2114</h3>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="icon"><span class="icon-my_location"></span></div>
                        <div class="text-white">
                            <h3>Via Saragozza, 37</h3>
                            <p>40053, Valsamoggia(BO)</p>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="icon"><span class="icon-clock-o"></span></div>
                        <div class="text-white">
                            <h3>Apertura Lunedì-Venerdì</h3>
                            <p>8:00 - 21:00</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="book p-4">
                <h3>PRENOTA UN TAVOLO</h3>
                <form action="{{ route('booking.tables') }}" method="POST" class="appointment-form">
                    @csrf
                    <div class="d-md-flex">
                        <div class="form-group">
                            <input type="text" name="first_name" class="form-control" placeholder="Nome">
                        </div>
                        @if($errors->has('first_name'))
                            <p class="alert alert-success">{{ $errors->first('first_name') }}</p>
                        @endif
                        <div class="form-group ml-md-4">
                            <input type="text"  name="last_name"  class="form-control" placeholder="Cognome">
                        </div>
                        @if($errors->has('last_name'))
                            <p class="alert alert-success">{{ $errors->first('last_name') }}</p>
                        @endif
                    </div>
                    <div class="d-md-flex">
                        <div class="form-group">
                                <div class="input-wrap">
                                    <div class="icon"><span class="ion-md-calendar"></span></div>
                                    <input type="text"  name="date"  class="form-control appointment_date" placeholder="Data">
                                </div>
                                @if($errors->has('date'))
                                    <p class="alert alert-success">{{ $errors->first('date') }}</p>
                                @endif
                        </div>
                    </div>
                    <div class="form-group ml-md-4">
                        <div class="input-wrap">
                            <div class="icon"><span class="ion-ios-clock"></span></div>
                            <input type="text"  name="time"  class="form-control appointment_time" placeholder="Orario">
                        </div>
                    </div>
                    @if($errors->has('time'))
                            <p class="alert alert-success">{{ $errors->first('time') }}</p>
                    @endif
                        <input type="text" value="{{ Auth::user()->id }}" name="user_id"  class="form-control appointment_time">
                            </div>
                            <div class="form-group ml-md-4">
                            <input type="text"  name="phone"  class="form-control" placeholder="Telefono">
                        </div>
                        @if($errors->has('phone'))
                            <p class="alert alert-success">{{ $errors->first('phone') }}</p>
                        @endif
                    </div>
                    <div class="d-md-flex">
                        <div class="form-group">
                        <textarea name="message" id="" cols="30" rows="2" class="form-control" placeholder="Messaggio"></textarea>
                    </div>
                    @if($errors->has('message'))
                            <p class="alert alert-success">{{ $errors->first('message') }}</p>
                    @endif
                <div class="form-group ml-md-4">
                    <input type="submit"  name="submit"  value="Book" class="btn btn-white py-3 px-4">
                </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="ftco-about d-md-flex">
    <div class="one-half img" style="background-image: url({{ asset('assets/images/about.jpg') }});"></div>
    <div class="one-half ftco-animate">
        <div class="overlap">
        <div class="heading-section ftco-animate ">
            <span class="subheading"></span>
          <h2 class="mb-4" style="color: #c49b63">La Nostra Storia</h2>
        </div>
            <div>
                <p>Storico bar del centro storico di Valsamoggia, rinomato per la specialità invernale: la cioccolata in tazza con panna. Un locale intimo, con una saletta interna a due piani, tipica dei locali di una volta, che invoglia a fermarsi. Dotato di una saletta superiore con aria condizionata e di tavolini sotto al portico su via
                Saragozza . Colazioni, pranzi ed aperitivi e tanto altro!</p>
            </div>
          </div>
    </div>
</section>

<section class="ftco-section ftco-services">
    <div class="container">
        <div class="row">
      <div class="col-md-4 ftco-animate">
        <div class="media d-block text-center block-6 services">
          <div class="icon d-flex justify-content-center align-items-center mb-5">
              <span class="flaticon-choices"></span>
          </div>
          <div class="media-body">
            <h3 class="heading">Easy to Order</h3>
            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 ftco-animate">
        <div class="media d-block text-center block-6 services">
          <div class="icon d-flex justify-content-center align-items-center mb-5">
              <span class="flaticon-delivery-truck"></span>
          </div>
          <div class="media-body">
            <h3 class="heading">Fastest Delivery</h3>
            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 ftco-animate">
        <div class="media d-block text-center block-6 services">
          <div class="icon d-flex justify-content-center align-items-center mb-5">
              <span class="flaticon-coffee-bean"></span></div>
          <div class="media-body">
            <h3 class="heading">Quality Coffee</h3>
            <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
          </div>
        </div>
      </div>
    </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 pr-md-5">
                <div class="heading-section text-md-right ftco-animate">
              <span class="subheading" ></span>
            <h2 class="mb-4" style="color: #c49b63">Menù</h2>
            <p class="mb-4">Il Viaggio nei Sapori
                Ogni dolce raccontava una storia diversa, un viaggio nei sapori e nelle tradizioni dell’Emilia.

                Le crostate di frutta fresca, le ciambelle profumate e i dolci al cioccolato erano solo alcune delle delizie che arricchivano la tavola.

                E mentre il sole sorgeva lentamente sulle colline, il dolce risveglio dell’Emilia regalava a tutti un momento di piacere e serenità, celebrando l’amore per la buona cucina e la convivialità.</p>
            <p><a href="#" class="btn btn-primary btn-outline-primary px-4 py-3">Sfoglia il Menù</a></p>
          </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <div class="menu-entry">
                            <a href="#" class="img" style="background-image: url({{ asset('assets/images/menu-1.jpg') }});"></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="menu-entry mt-lg-4">
                            <a href="#" class="img" style="background-image: url({{ asset('assets/images/menu-2.jpg') }});"></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="menu-entry">
                            <a href="#" class="img" style="background-image: url({{ asset('assets/images/menu-3.jpg') }});"></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="menu-entry mt-lg-4">
                            <a href="#" class="img" style="background-image: url({{ asset('assets/images/menu-4.jpg') }});"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-counter ftco-bg-dark img" id="section-counter" style="background-image: url({{ asset('assets/images/bg_2.jpg') }});" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row">
              <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                  <div class="text">
                      <div class="icon"><span class="flaticon-coffee-cup"></span></div>
                      <strong class="number" data-number="3">0</strong>
                      <span>Coffee Branches</span>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                  <div class="text">
                      <div class="icon"><span class="flaticon-coffee-cup"></span></div>
                      <strong class="number" data-number="5">0</strong>
                      <span>Number of Awards</span>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                  <div class="text">
                      <div class="icon"><span class="flaticon-coffee-cup"></span></div>
                      <strong class="number" data-number="10567">0</strong>
                      <span>Happy Customer</span>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                  <div class="text">
                      <div class="icon"><span class="flaticon-coffee-cup"></span></div>
                      <strong class="number" data-number="20">0</strong>
                      <span>Staff</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
  </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
      <div class="col-md-7 heading-section ftco-animate text-center">
            <span class="subheading"></span>
        <h2 class="mb-4" style="color: #c49b63">Best Sellers</h2>
        <p></p>
      </div>
    </div>
    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-3">
                <div class="menu-entry">
                        <a href="#" class="img" style="background-image: url({{ asset('assets/images/'.$product->image.'') }});"></a>
                        <div class="text text-center pt-4">
                            <h3><a href="{{ route('product.single',$product->id) }}">{{ $product->name }}</a></h3>
                            <p>{{ $product->descrription }}</p>
                            <p class="price"><span>{{ $product->price }}</span></p>
                            <p><a href="{{ route('product.single',$product->id) }}" class="btn btn-primary btn-outline-primary">Add to Cart</a></p>
                        </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

<section class="ftco-gallery">
    <div class="container-wrap">
        <div class="row no-gutters">
                <div class="col-md-3 ftco-animate">
                    <a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url({{ asset('assets/images/gallery-1.jpg') }});">
                        <div class="icon mb-4 d-flex align-items-center justify-content-center">
                        <span class="icon-search"></span>
                    </div>
                    </a>
                </div>
                <div class="col-md-3 ftco-animate">
                    <a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image:url({{ asset('assets/images/gallery-3.jpg') }});">
                        <div class="icon mb-4 d-flex align-items-center justify-content-center">
                        <span class="icon-search"></span>
                    </div>
                    </a>
                </div>
                <div class="col-md-3 ftco-animate">
                    <a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url({{ asset('assets/images/gallery-3.jpg') }});">
                        <div class="icon mb-4 d-flex align-items-center justify-content-center">
                        <span class="icon-search"></span>
                    </div>
                    </a>
                </div>
                <div class="col-md-3 ftco-animate">
                    <a href="gallery.html" class="gallery img d-flex align-items-center" style="background-image: url({{ asset('assets/images/gallery-4.jpg') }});">
                        <div class="icon mb-4 d-flex align-items-center justify-content-center">
                        <span class="icon-search"></span>
                    </div>
                    </a>
                </div>
    </div>
    </div>
</section>



<section class="ftco-section img" id="ftco-testimony" style="background-image: url({{ asset('assets/images/bg_1.jpg') }});"  data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-7 heading-section text-center ftco-animate">
            <span class="subheading">Testimony</span>
          <h2 class="mb-4" style="color: #c49b63">Customers Says</h2>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
        </div>
      </div>
    </div>
    <div class="container-wrap">
        <div class="row d-flex no-gutters">
            @foreach ($reviews as $review)
            <div class="col-md align-self-sm-end ftco-animate">
                <div class="testimony">
                    <blockquote>
                        <p>&ldquo;{{ $review->review }}.&rdquo;</p>
                    </blockquote>
                    <div class="author d-flex mt-4">
                        {{-- <div class="image mr-3 align-self-center">
                        <img src="images/person_1.jpg" alt="">
                        </div> --}}
                        <div class="name align-self-center">{{ $review->name }}</div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
