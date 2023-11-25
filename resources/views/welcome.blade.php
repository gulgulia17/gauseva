@extends('frontend.layout.master')
@section('content')
<section class="top-slider">
    <div id="carouselExample" class="carousel slide carousel-fade">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('frontend/images/Banner2.png')}}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-md-block">
                    <h5>Over 6000+ Cows Have Found A Forever Home At Rajaram Gaushala</h5>
                    <a href="#" class="btn btn-danger">Donate Now</a>
                </div>

            </div>

            <div class="carousel-item">
                <img src="{{asset('frontend/images/Banner.png')}}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-md-block">
                    <h5>Over 6000+ Cows Have Found A Forever Home At Rajaram Gaushala</h5>
                    <a href="#" class="btn btn-danger">Donate Now</a>
                </div>

            </div>
            <div class="carousel-item">
                <img src="{{asset('frontend/images/Banner1.png')}}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-md-block">
                    <h5>Over 6000+ Cows Have Found A Forever Home At Rajaram Gaushala</h5>
                    <a href="#" class="btn btn-danger">Donate Now</a>
                </div>

            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

<section class="feat-posts bg-lightblue">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="feat-bx">
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-5 col-sm-4">
                                <img src="{{asset('frontend/images/banner-bottom1.png')}}" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-7 col-sm-8 position-relative">
                                <p class="feat-tag">FEATURED</p>
                                <div class="card-body">
                                    <h5 class="card-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit Vestibulum nec purus eu nisl vehicula fringilla.</h5>
                                    <p class="card-text">Integer maximus tortor non ullamcorper dictum. Aenean nec metus nec tortor laoreet pellentesque vitae et arcu. Morbi varius, eros a finibus fermentum, quam sem semper erat, vitae posuere felis magna sed urna. Quisque varius tempus nunc, vitae volutpat nisi faucibus ac. Donec eu erat a leo posuere facilisis</p>
                                    <a class="text-primary" href="#">Know More <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="feat-bx">
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-5 col-sm-4">
                                <img src="{{asset('frontend/images/banner-bottom2.png')}}" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-7 col-sm-8 position-relative">
                                <p class="feat-tag">FEATURED</p>
                                <div class="card-body">
                                    <h5 class="card-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit Vestibulum nec purus eu nisl vehicula fringilla.</h5>
                                    <p class="card-text">Integer maximus tortor non ullamcorper dictum. Aenean nec metus nec tortor laoreet pellentesque vitae et arcu. Morbi varius, eros a finibus fermentum, quam sem semper erat, vitae posuere felis magna sed urna. Quisque varius tempus nunc, vitae volutpat nisi faucibus ac. Donec eu erat a leo posuere facilisis</p>
                                    <a class="text-primary" href="#">Know More <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="category-sec">
    <div class="container">
        <div class="main-heading main-view">
            <h2>Category</h2>
            <a href="#" class="text-primary">View All Category <i class="fa fa-arrow-right"></i></a>
        </div>
        <div class="row">
            @foreach($campaigns as $campaign)
            <div class="col-md-4">
                <div class="card">
                    <img src="{{url('campaign/images/'.$campaign->image)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h3>{{ucwords($campaign->title)}}</h3>
                        <p class="small-txt0"><span>BO</span> By B/O {{ucwords($campaign->owner_of_campaign)}}</p>
                        <div class="price-raise"><strong><i class="fa fa-inr"></i> 12475</strong> raised out of {{$campaign->price}}</div>
                        <div class="select-range">
                            <input type="range" class="form-range" id="customRange1" min="1000" value="12475" >
                        </div>
                        <ul class="tag-list">
                            <li class="tag"><i class="fa fa-clock-o"></i> 119 days left</li>
                            <li><i class="fa fa-user-circle"></i> 13 Backers</li>
                        </ul>
                        <div class="d-flex justify-content-between btn-panel">
                            <a href="#" class="btn btn-outline-primary"><i class="fa fa-facebook-official"></i> Share</a>
                            <a href="#" class="btn btn-danger">Donate Now</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="view-all text-center">
            <a href="#" class="btn btn-primary">View All</a>
        </div>
    </div>
</section>

<section class="how-it-work">
    <div class="container">
        <div class="main-heading main-view">
            <h2>How Works!</h2>
        </div>
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button switch1" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                aria-expanded="true" aria-controls="collapseOne">
                                Doner
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ol>
                                    <li>Browse different campaigns and select a cause.</li>
                                    <li>Select products and quantity you wish to donate.</li>
                                    <li>Checkout and pay for your contributions.</li>
                                    <li>Donatekart delivers the products and the organisation updates about product utilization.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button switch2 collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                fundrazr
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ol>
                                    <li>Browse different campaigns and select a cause.</li>
                                    <li>Select products and quantity you wish to donate.</li>
                                    <li>Checkout and pay for your contributions.</li>
                                    <li>Donatekart delivers the products and the organisation updates about product utilization.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="vid-switches">
                    <!-- <img id="show1" src="images/vid.png" />
                    <img id="show2" src="images/banner-bottom1.png" style="display: none;" /> -->

                    <video id="show1" width="320" height="240" poster="images/vid.png" controls>
                        <source src="images/herd_of_cows (1080p).mp4" type="video/mp4">
                     </video>

                     <video id="show2" width="320" height="240" poster="images/vid1.png" controls  style="display: none;">
                        <source src="images/herd_of_cows (1080p).mp4" type="video/mp4">
                     </video>

                </div>
            </div>
        </div>
    </div>
</section>

<section class="testimonial-sec">
    <div class="container">
        <div class="text-center text-white mb-4 tm-hd">
            <h2>Testimonials</h2>
            <div class="link"></div>
        </div>
        <div class="testi-slider" id="testi-slider">
        @foreach($testimonials as $testimonial)
            <div class="item">
                <div class="testi-item">
                    <img src="{{url('testimonial/images/'.$testimonial->image)}}" />
                    <div class="testi-head">
                        <h3>{{ucwords($testimonial->name)}}</h3>
                        <p>{{ucwords($testimonial->position)}}</p>
                    </div>
                    <div class="quote-icon">
                        <i class="fa fa-quote-left" aria-hidden="true"></i>
                    </div>
                    <p>{{ucwords($testimonial->feedback)}}</p>
                    <div class="quote-icon">
                        <i class="fa fa-quote-right pull-right mb-4" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</section>

<section class="donate-banner">
    <div class="container">
        <div class="dbt-left">
            <h2>Over 6000+ Cows Have Found A Forever Home At Rajaram Gaushala</h2>
            <div class="dbt-btn">
                <a href="#" class="btn btn-danger">Donate Now</a>
                <a href="#" class="btn btn-outline-danger">Donate Now</a>
            </div>
        </div>
    </div>
</section>

<section class="featured-in py-5">
    <div class="container">
        <div class="main-heading">
            <h2>Featured In</h2>
        </div>
        <div class="ft-images d-flex justify-content-around flex-wrap">
            <img src="{{asset('frontend/images/Featured/1.png')}}" />
            <img src="{{asset('frontend/images/Featured/2.png')}}" />
            <img src="{{asset('frontend/images/Featured/3.png')}}" />
            <img src="{{asset('frontend/images/Featured/4.png')}}" />
            <img src="{{asset('frontend/images/Featured/5.png')}}" />
            <img src="{{asset('frontend/images/Featured/6.png')}}" />
            <img src="{{asset('frontend/images/Featured/7.png')}}" />
        </div>
    </div>
</section>

<section class="category-sec">
    <div class="container">
        <div class="main-heading main-view">
            <h2>News</h2>
            <a href="#" class="text-primary">View All News <i class="fa fa-arrow-right"></i></a>
        </div>
        <div class="row">
        @foreach($blogs as $blog)
            <div class="col-md-4">
                <div class="card">
                    <img src="{{url('blog/images/'.$blog->image)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h3>{{ucwords($blog->name)}}</h3>
                        <p class="news-cnt">{{$blog->description}}</p>
                        <a href="#" class="btn btn-outline-danger d-block">Read More</a>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
        <div class="view-all text-center">
            <a href="#" class="btn btn-primary">View All</a>
        </div>
    </div>
</section>
@endsection
