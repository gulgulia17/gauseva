<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Campaign;

class CampaignController extends Controller
{
    public function campaignListing()
    {
        $campaigns = Campaign::where('status', 1)->latest()->paginate(6)->withQueryString();
        return view('frontend.campaign.listing', compact('campaigns'));
    }

    public function campaignDetail(Request $request)
    {
        // dd('in');
        $campaign = Campaign::where('id', $request->id)->first();
        // dd($campaign);
        return view('frontend.campaign.detail', compact('campaign'));
    }
}
