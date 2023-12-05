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
        return view('campaign.listing', compact('campaigns'));
    }

    public function campaignDetail(Campaign $campaign)
    {
        return view('campaign.detail', compact('campaign'));
    }
}
