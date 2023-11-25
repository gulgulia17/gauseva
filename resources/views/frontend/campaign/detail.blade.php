@extends('frontend.layout.master')
@section('content')
<section class="top-slider mt-100">
   <div class="container">
    <div class="row">
        <!-- right -->
        <div class="col-lg-8 col-md-12">
            <h3 class="mb-3 visible-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit Vestibulum.</h3>

            <div id="carouselExample" class="carousel slide carousel-fade mb-2">
                <div class="carousel-inner rounded-4">
                    <div class="carousel-item active">
                        <img src="{{asset('frontend/images/detail/1.png')}}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-md-block">
                            <!-- <p>Over 6000+ Cows Have Found A Forever Home At Rajaram Gaushala</p> -->
                            <!-- <a href="#" class="btn btn-danger">Donate Now</a> -->
                        </div>

                    </div>

                    <div class="carousel-item">
                        <img src="{{asset('frontend/images/detail/2.png')}}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-md-block">
                            <!-- <p>Over 6000+ Cows Have Found A Forever Home At Rajaram Gaushala</p> -->
                            <!-- <a href="#" class="btn btn-danger">Donate Now</a> -->
                        </div>

                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('frontend/images/detail/3.png')}}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-md-block">
                            <!-- <p>Over 6000+ Cows Have Found A Forever Home At Rajaram Gaushala</p> -->
                            <!-- <a href="#" class="btn btn-danger">Donate Now</a> -->
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

            <div class="visible-sm mb-5">
                <div class="price-raise pt-2"><strong><i class="fa fa-inr"></i> 12475</strong> raised out of ₹10,00,000</div>
                <div class="col-12 pb-2" >
                    <div class="slider-wrapper relative">
                        <input class="input-range" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-tooltip="always" data-slider-max="100" data-slider-step="1" data-slider-value="14"/>
                        <div class="tooltip-inner" style="display: none;"></div>
                    </div>
                </div>


                <ul class="tag-list">
                    <li class="tag"><i class="fa fa-clock-o"></i> 119 days left</li>
                    <li><i class="fa fa-user-circle"></i> 13 Backers</li>
                </ul>
                <ul class="d-flex listing mb-4">
                    <!-- <li class="tag bg-gray d-flex"><i class="btn btn-light circle1"> AB </i>
                       <span> <b>Campaign Started By</b> <br>
                        Jagrut Bahuddeshiy Sanstha (NGO)</span>
                        </li> -->
                        <li class="tag bg-gray d-flex"><i class="btn btn-light circle1"> AB </i>
                            <span> <b>Campaign Started By</b> <br>
                             Jagrut Bahuddeshiy Sanstha (NGO)</span>
                             </li>
                </ul>

                <div class="d-flex justify-content-between">
                    <a href="#" class="btn btn-outline-primary w-50"><i class="fa fa-facebook-official"></i> Share</a>
                   <a href="#" class="btn rounded-bottom btn-primary p-2 border-0"><i class="fa fa-twitter"></i></a>
                   <a href="#" class="btn rounded-bottom btn-secondary p-2 border-0"><i class="fa fa-share"></i></a>
                   <a href="#" class="btn rounded-bottom btn-success p-2 border-0"><i class="fa fa-whatsapp"></i></a>


                </div>
            </div>

            <div class="d-flex w-100 mb-4">
                <div>
                    <a href="index.html">
                     <i class="fa fa-angle-left goback btn-danger"></i>
                    </a>
                 </div>
                <ul class="w-100 nav nav-tabs nav-justified" id="myTab" role="tablist">

                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="home-tab" data-bs-toggle="tab" data-bs-target="#" type="button" role="tab" aria-controls="home" aria-selected="true">Products</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="project" data-bs-toggle="tab" data-bs-target="#" type="button" role="tab" aria-controls="profile" aria-selected="false"><a href="#Project">Project</a></button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#" type="button" role="tab" aria-controls="contact" aria-selected="false"><a href="#Documents">Documents</a></button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#" type="button" role="tab" aria-controls="contact" aria-selected="false"> <a href="#Updates"> Updates </a> </button>
                      </li>
                  </ul>
            </div>

          <section id="Products">
            <div class="row mb-2">

                <div class="col-md-6">
                    <div class="card Product p-0">
                        <div class="card-body p-0">
                            <img class="big" src="{{asset('frontend/images/detail/Rectangle 38.png')}}" >

                         <div class="p-2">
                            <div class="d-flex mb-2">
                                <div>
                                    <h5 class="card-title">Lorem ipsum dolor sit amet</h5>
                                    <p class="card-text">3 of 1000 Qty Obtained</p>
                                </div>
                                <div class="amount">
                                    <p class="text-center"><i class="fa fa-rupee"></i><b>200/unit</b></p>
                                </div>
                              </div>

                              <div class="d-flex mb-2 justify-content-end">
                                <i class="fa fa-info-circle " data-toggle="tooltip" data-placement="top" title=" Lorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit amet "></i>
                                <div>

                                    <div class="input-group w-auto justify-content-end align-items-center">
                                       <div class="incdec-btn">
                                        <input type="button" value="-" class="button-minus border rounded-circle  icon-shape icon-sm mx-1 " data-field="quantity">
                                        <input type="" step="1" max="10" value="1" name="quantity" class="quantity-field border-0 text-center w-25">
                                        <input type="button" value="+" class="button-plus border rounded-circle icon-shape icon-sm " data-field="quantity">
                                       </div>
                                     </div>
                                </div>

                              </div>

                         </div>
                        </div>
                      </div>
                </div>

                <div class="col-md-6">
                    <div class="card Product p-0">
                        <div class="card-body p-0">
                            <img class="big" src="{{asset('frontend/images/detail/Rectangle 38-1.png')}}" >

                         <div class="p-2">
                            <div class="d-flex mb-2">
                                <div>
                                    <h5 class="card-title">Lorem ipsum dolor sit amet</h5>
                                    <p class="card-text">3 of 1000 Qty Obtained</p>
                                </div>
                                <div class="amount">
                                    <p class="text-center"><i class="fa fa-rupee"></i><b>200/unit</b></p>
                                </div>
                              </div>

                              <div class="d-flex mb-2 justify-content-end">
                                <i class="fa fa-info-circle " data-toggle="tooltip" data-placement="top" title=" Lorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit amet "></i>

                                <div>

                                    <div class="input-group w-auto justify-content-end align-items-center">
                                        <div class="incdec-btn">
                                        <input type="button" value="-" class="button-minus border rounded-circle  icon-shape icon-sm mx-1 " data-field="quantity">
                                        <input type="" step="1" max="10" value="2" name="quantity" class="quantity-field border-0 text-center w-25">
                                        <input type="button" value="+" class="button-plus border rounded-circle icon-shape icon-sm " data-field="quantity">
                                     </div>
</div>
                                </div>

                              </div>

                         </div>
                        </div>
                      </div>
                </div>
            </div>

            <div class="row mb-2 single-product">

                <div class="col-md-6 col-sm-12">
                    <div class="card Product p-0">
                        <div class="card-body d-flex p-0">
                            <img class="" src="{{asset('frontend/images/detail/Rectangle 38-4.png')}}" >

                         <div class="p-2 w-100">
                            <div class="d-flex mb-2">
                                <div>
                                    <h5 class="card-title">Lorem ipsum dolor sit amet</h5>
                                    <p class="card-text">3 of 1000 Qty Obtained</p>
                                </div>

                              </div>
                              <div class="d-flex mb-2 justify-content-end">

                                <div class="amount">
                                    <p class="text-center"><i class="fa fa-rupee"></i><b>200/unit</b></p>
                                </div>
                                <div>
                                    <i class="fa fa-info-circle " data-toggle="tooltip" data-placement="top" title=" Lorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit amet "></i>

                                    <div class="input-group w-auto justify-content-end align-items-center">
                                        <div class="incdec-btn">
                                        <input type="button" value="-" class="button-minus border rounded-circle  icon-shape icon-sm mx-1 " data-field="quantity">
                                        <input type="" step="1" max="10" value="0" name="quantity" class="quantity-field border-0 text-center w-25">
                                        <input type="button" value="+" class="button-plus border rounded-circle icon-shape icon-sm " data-field="quantity">
                                        </div>
                                     </div>

                                </div>

                              </div>
                         </div>
                        </div>
                      </div>
                </div>

                <div class="col-md-6">
                    <div class="card Product p-0">
                        <div class="card-body d-flex p-0">
                            <img class="" src="{{asset('frontend/images/detail/Rectangle 38-4.png')}}" >

                         <div class="p-2 w-100">
                            <div class="d-flex mb-2">
                                <div>
                                    <h5 class="card-title">Lorem ipsum dolor sit amet</h5>
                                    <p class="card-text">3 of 1000 Qty Obtained</p>
                                </div>

                              </div>
                              <div class="d-flex mb-2 justify-content-end">

                                 <div class="amount">
                                    <p class="text-center"><i class="fa fa-rupee"></i><b>200/unit</b></p>
                                </div>
                                <div>
                                    <i class="fa fa-info-circle " data-toggle="tooltip" data-placement="top" title=" Lorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit ametLorem ipsum dolor sit amet "></i>

                                    <div class="input-group w-auto justify-content-end align-items-center">
                                        <div class="incdec-btn">
                                        <input type="button" value="-" class="button-minus border rounded-circle  icon-shape icon-sm mx-1 " data-field="quantity">
                                        <input type="" step="1" max="10" value="0" name="quantity" class="quantity-field border-0 text-center w-25">
                                        <input type="button" value="+" class="button-plus border rounded-circle icon-shape icon-sm " data-field="quantity">
                                        </div>
                                     </div>

                                </div>

                              </div>
                         </div>
                        </div>
                      </div>
                </div>
            </div>
          </section>


            <section id="Project">
                <h4 class="pt-2 pb-3"> Project </h4>
            <div class="row mb-2">
                <img src="{{asset('frontend/images/detail/2.png')}}" class="w-100" >
            </div>

            <div class="row mb-2">

                <div class="col-12">
                    <h4 class="mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit Vestibulum nec purus eu nisl vehicula fringilla. Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet, consectetur adipiscing elit Vestibulum nec purus eu nisl vehicula fringilla. Lorem ipsum dolor sit amet...</h4>

                    <p class="text-justify">
                        Integer maximus tortor non ullamcorper dictum. Aenean nec metus nec tortor laoreet pellentesque vitae et arcu. Morbi varius, eros a finibus fermentum, quam sem semper erat, vitae posuere felis magna sed urna. Quisque varius tempus nunc, vitae volutpat nisi faucibus ac. Donec eu erat a leo posuere facilisis. Integer maximus tortor non ullamcorper dictum. Aenean nec metus nec tortor laoreet pellentesque vitae et arcu. Morbi varius, eros a finibus fermentum, quam sem semper erat, vitae posuere felis magna sed urna. Quisque varius tempus nunc, vitae volutpat nisi faucibus ac. Donec eu erat a leo posuere facilisis. Integer maximus tortor non ullamcorper dictum. Aenean nec metus nec tortor laoreet pellentesque vitae et arcu. Morbi varius, eros a finibus fermentum, quam sem semper erat, vitae posuere felis magna sed urna. Quisque varius tempus nunc, vitae volutpat nisi faucibus ac. Donec eu erat a leo posuere facilisis. Integer maximus tortor non ullamcorper dictum. Aenean nec metus nec tortor laoreet pellentesque vitae et arcu. Morbi varius, eros a finibus fermentum, quam sem semper erat, vitae posuere felis magna sed urna. Quisque varius tempus nunc, vitae volutpat nisi faucibus ac. Donec eu erat a leo posuere facilisis
                    </p>

                </div>
            </div>
                <div class="row mb-2">
                    <img src="{{asset('frontend/images/detail/3.png')}}" class="w-100" >
                </div>

                <div class="row mb-2">

                    <div class="col-12">
                        <h4 class="mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit Vestibulum nec purus eu nisl vehicula fringilla. Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet, consectetur adipiscing elit Vestibulum nec purus eu nisl vehicula fringilla. Lorem ipsum dolor sit amet...</h4>

                        <p class="text-justify">
                            Integer maximus tortor non ullamcorper dictum. Aenean nec metus nec tortor laoreet pellentesque vitae et arcu. Morbi varius, eros a finibus fermentum, quam sem semper erat, vitae posuere felis magna sed urna. Quisque varius tempus nunc, vitae volutpat nisi faucibus ac. Donec eu erat a leo posuere facilisis. Integer maximus tortor non ullamcorper dictum. Aenean nec metus nec tortor laoreet pellentesque vitae et arcu. Morbi varius, eros a finibus fermentum, quam sem semper erat, vitae posuere felis magna sed urna. Quisque varius tempus nunc, vitae volutpat nisi faucibus ac. Donec eu erat a leo posuere facilisis. Integer maximus tortor non ullamcorper dictum. Aenean nec metus nec tortor laoreet pellentesque vitae et arcu. Morbi varius, eros a finibus fermentum, quam sem semper erat, vitae posuere felis magna sed urna. Quisque varius tempus nunc, vitae volutpat nisi faucibus ac. Donec eu erat a leo posuere facilisis. Integer maximus tortor non ullamcorper dictum. Aenean nec metus nec tortor laoreet pellentesque vitae et arcu. Morbi varius, eros a finibus fermentum, quam sem semper erat, vitae posuere felis magna sed urna. Quisque varius tempus nunc, vitae volutpat nisi faucibus ac. Donec eu erat a leo posuere facilisis
                        </p>

                    </div>
                </div>

            </section>

            <section id="Documents" class="mb-4">
                <div class="row">
                    <h4 class="mb-2"> Documents </h4>

                    <div class="col-3">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <img src="{{asset('frontend/images/detail/doc.png')}}" class="w-100 rounded-4" >
                      </a>
                    </div>
                    <div class="col-3">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <img src="{{asset('frontend/images/detail/doc.png')}}" class="w-100 rounded-4" >
                          </a>
                    </div>
                    <div class="col-3">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <img src="{{asset('frontend/images/detail/doc.png')}}" class="w-100 rounded-4" >
                          </a>
                    </div>
                    <div class="col-3">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <img src="{{asset('frontend/images/detail/doc.png')}}" class="w-100 rounded-4" >
                          </a>
                    </div>
                </div>
            </section>

            <section id="Updates" class="mb-4">
                <div class="card d-flex">
                    <p class="">
                        Integer maximus tortor non ullamcorper dictum. Aenean nec metus nec tortor laoreet pellentesque vitae et arcu. Morbi varius, eros a finibus fermentum, quam sem semper erat, vitae posuere felis magna sed urna. Quisque varius tempus nunc, vitae volutpat nisi faucibus ac. Donec eu erat a leo posuere facilisis.  </p>

                    <div>
                        <button class="btn btn-danger" type="submit">Ask For Updates</button>
                    </div>
                </div>
            </section>

            <section id="Documents" class="mb-4">
                <div class="row">
                    <h4 class="mb-2"> Latest Updates: <small class="h6 text-primary">10-11-2023</small> </h4>
                    <p class="text-justify">
                        Integer maximus tortor non ullamcorper dictum. Aenean nec metus nec tortor laoreet pellentesque vitae et arcu. Morbi varius, eros a finibus fermentum, quam sem semper erat, vitae posuere felis magna sed urna. Quisque varius tempus nunc, vitae volutpat nisi faucibus ac. Donec eu erat a leo posuere facilisis. Integer maximus tortor non ullamcorper dictum. Aenean nec metus nec tortor laoreet pellentesque vitae et arcu. Morbi varius, eros a finibus fermentum, quam sem semper erat, vitae posuere felis magna sed urna. Quisque varius tempus nunc, vitae volutpat nisi faucibus ac. Donec eu erat a leo posuere facilisis. Integer maximus tortor non ullamcorper dictum. Aenean nec metus nec tortor laoreet pellentesque vitae et arcu. Morbi varius, eros a finibus fermentum, quam sem semper erat, vitae posuere felis magna sed urna. Quisque varius tempus nunc, vitae volutpat nisi faucibus ac. Donec eu erat a leo posuere facilisis. Integer maximus tortor non ullamcorper dictum. Aenean nec metus nec tortor laoreet pellentesque vitae et arcu. Morbi varius, eros a finibus fermentum, quam sem semper erat, vitae posuere felis magna sed urna. Quisque varius tempus nunc, vitae volutpat nisi faucibus ac. Donec eu erat a leo posuere facilisis
                    </p>

                </div>

            </section>


        </div>

        <!-- left -->

        <div class="col-lg-4 col-md-12">
           <div class="row mb-4 hidden-sm">
                        <h3>{{ucwords($campaign->title)}}</h3>

                        <div class="price-raise pt-2"><strong><i class="fa fa-inr"></i> 12475</strong> raised out of {{$campaign->price}}</div>
                        <div class="col-12 pb-2" >
                            <div class="slider-wrapper relative">
                                <input class="input-range" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-tooltip="always" data-slider-max="100" data-slider-step="1" data-slider-value="14"/>
                                <div class="tooltip-inner" style="display: none;"></div>
                            </div>
                        </div>


                        <ul class="tag-list">
                            <li class="tag"><i class="fa fa-clock-o"></i> 119 days left</li>
                            <li><i class="fa fa-user-circle"></i> 13 Backers</li>
                        </ul>
                        <ul class="d-flex listing mb-4">
                            <!-- <li class="tag bg-gray d-flex"><i class="btn btn-light circle1"> AB </i>
                               <span> <b>Campaign Started By</b> <br>
                                Jagrut Bahuddeshiy Sanstha (NGO)</span>
                                </li> -->
                                <li class="tag bg-gray d-flex"><i class="btn btn-light circle1"> AB </i>
                                    <span> <b>Campaign Started By</b> <br>
                                     {{$campaign->owner_of_campaign}}</span>
                                     </li>
                        </ul>

                        <div class="d-flex justify-content-between">
                            <a href="#" class="btn btn-outline-primary w-50"><i class="fa fa-facebook-official"></i> Share</a>
                           <a href="#" class="btn rounded-bottom btn-primary p-2 border-0"><i class="fa fa-twitter"></i></a>
                           <a href="#" class="btn rounded-bottom btn-secondary p-2 border-0"><i class="fa fa-share"></i></a>
                           <a href="#" class="btn rounded-bottom btn-success p-2 border-0"><i class="fa fa-whatsapp"></i></a>
                       </div>

                    </div>

        <!-- UPI and Payment -->
           <div class="card mb-4 border-0 pt-0 p-0" id="myAffix">


             <div class="payment-box">
                <p class="mb-2"> <b> DONATE VIA:</b>  </p>

                <div class="mb-4">
                  <p class="mb-4"> <b>UPI</b>  </p>
                  <div class="mb-4 d-flex justify-content-between">

                      <div class="d-flex flex-icon">
                      <a href="#" class="btn rounded-bottom btn-light p-2 border-0">
                          <img src="{{asset('frontend/images/detail/phonepe.png')}}" class="upi-icon" >
                      </a>
                      <span> PhonePe</span>
                     </div>

                     <div class="d-flex flex-icon">
                      <a href="#" class="btn rounded-bottom btn-light p-2 border-0">
                          <img src="{{asset('frontend/images/detail/google.png')}}" class="upi-icon" >
                      </a>
                      <span> Google Pay</span>
                     </div>

                     <div class="d-flex flex-icon">
                      <a href="#" class="btn rounded-bottom btn-light p-2 border-0">
                          <img src="{{asset('frontend/images/detail/bhim.png')}}" class="upi-icon" >
                      </a>
                      <span> Bhim UPI</span>
                     </div>

                     <div class="d-flex flex-icon">
                      <a href="#" class="btn rounded-bottom btn-light p-2 border-0">...</a>
                      <span> Others</span>
                     </div>

                  </div>
                </div>
                <div class="mb-4">
                  <p class="mb-4"> <b>OTHER OPTIONS</b>  </p>
                  <div class="d-flex justify-content-between">

                      <div class="d-flex flex-icon">
                      <a href="#" class="btn rounded-bottom btn-light p-2 border-0">
                          <img src="{{asset('frontend/images/detail/paytm.jpg')}}" class="upi-icon" >
                      </a>
                      <span> Paytm</span>
                     </div>

                     <div class="d-flex flex-icon">
                      <a href="#" class="btn rounded-bottom btn-light p-2 border-0">
                          <i class="fa fa-credit-card"></i>
                      </a>
                      <span> Cr/Dr Cards</span>
                     </div>

                     <div class="d-flex flex-icon">
                      <a href="#" class="btn rounded-bottom btn-light p-2 border-0">
                          <i class="fa  fa-bank"></i>
                      </a>
                      <span> Net Banking</span>
                     </div>

                     <div class="d-flex flex-icon">
                      <a href="#" class="btn rounded-bottom btn-light p-2 border-0">
                          <i class="fa  fa-gift"></i>
                      </a>
                      <span> Gift Cards</span>
                     </div>

                  </div>
                </div>
                <div class="mb-2">
                  <button class="btn btn-danger w-100 shine" type="submit"><small class=""> ₹ 1,200/-</small>  Donate Now</button>
                </div>
             </div>


             <div class="mb-2 visible-sm mobile-area">
                <button class="btn btn-danger w-100 " type="submit"><small class=""> 1 item(s) ₹ 400/- </small>  Donate Now </button>
              </div>


              <!-- Ads -->
        <div class="card ads p-0 border-0 mt-2">
            <figure>
                <img src="{{asset('frontend/images/detail/ads1.png')}}" alt="" class="w-100">
                <figcaption>

                    <h3 class="text-center">Integer maximus tortor non ullamcorper dictum</h3>

                 <button class="btn btn-light w-100" type="submit"> Donate Monthly Now </button>

                </figcaption>

            </figure>
            </div>

            <div class="card ads p-0 border-0">
                <figure>
                    <img src="{{asset('frontend/images/detail/ads2.png')}}" alt="" class="w-100">
                    <figcaption>

                        <h3 class="text-white text-center">Integer maximus tortor non ullamcorper dictum</h3>

                     <button class="btn btn-light w-100" type="submit"> Donate Monthly Now </button>

                    </figcaption>

                </figure>
                </div>
           </div>


        </div>
    </div>

   </div>
</section>
@endsection
