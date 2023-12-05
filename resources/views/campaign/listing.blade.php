@extends('layouts.master')
@section('content')

<section class="">
    <div class="container-fluid p-0">
        <img src="{{asset('frontend/images/banner-sm.png')}}" class="d-block w-100" alt="...">
    </div>
</section>
<section class="category-sec">
    <div class="container">
        <div class="main-heading main-view">
            <h2>Category Listing</h2>
        </div>
        <div class="row">
        @forelse ($campaigns as $campaign)
            <div class="col-md-4">
                <div class="card">
                <a href="{{ route('campaign.detail', $campaign->id) }}">
                    <img src="{{asset('campaign/images/'.$campaign->image)}}" class="card-img-top" alt="..."></a>
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
                            <a href="detailpage.html" class="btn btn-danger">Donate Now</a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
        <h3> No Data Found </h3>
        @endforelse
        </div>
        <div class="view-all text-center">
        {{$campaigns->links('pagination::bootstrap-4')}}
            <!-- <a href="#" class="btn btn-primary"> Load More </a> -->
        </div>
    </div>
</section>
@endsection
