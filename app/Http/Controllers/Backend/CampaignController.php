<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\CampaignProduct;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->search) {
            $campaigns = Campaign::where('title', 'LIKE', '%' . request()->search . '%')
                ->paginate(10)->withQueryString();
        } else {
            $campaigns = Campaign::with('category:id,category_name')->paginate(10)->withQueryString();
        }
        return view('backend.campaign.index', compact('campaigns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('type', 'campaign')->orderBy('category_name', 'desc')->get();
        $products = Product::where('status', 1)->orderBy('id', 'desc')->get();
        // dd($categories);
        // dd($products);
        return view('backend.campaign.create', compact('categories', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'category_id' => 'required',
            'title' => 'required',
            'price' => 'required',
            'time_duration' => 'required',
            'owner_of_campaign' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg',
        ]);

        // $data = $request->all();

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('campaign/images'), $imageName);
            $data['image'] = $imageName;
        } else {
            $data['image'] = 'product.png';
        }

        $campaign = new Campaign();
        $campaign->category_id = $request->input('category_id');
        $campaign->title = $request->input('title');
        $campaign->price = $request->input('price');
        $campaign->time_duration = $request->input('time_duration');
        $campaign->owner_of_campaign = $request->input('owner_of_campaign');
        $campaign->is_featured = $request->input('is_featured');
        $campaign->description = $request->input('description');
        $campaign->image = $data['image'];
        $saved = $campaign->save();

        if (!empty($campaign)) {
            foreach ($request->product_id as $product_id) {
                $campaignProduct = new CampaignProduct();
                $campaignProduct->campaign_id = $campaign->id;
                $campaignProduct->product_id = $product_id;
                $campaignProduct->save();
            }
        }

        // Blog::create($data);
        // dd($data);
        return redirect()->route('admin.campaign.index')->with('success', 'Campaign Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Campaign $campaign)
    {
        return view('backend.campaign.show', compact('campaign'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Campaign $campaign)
    {
        $categories = Category::where('type', 'campaign')->orderBy('category_name', 'desc')->get();
        return view('backend.campaign.edit', compact('campaign', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'title' => 'required',
            'price' => 'required',
            'time_duration' => 'required',
            'owner_of_campaign' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg',
        ]);

        $campaign = Campaign::findOrFail($id);
        // $data = $request->all();

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('campaign/images'), $imageName);
            $data['image'] = $imageName;
        }
        // $blog->update($data);
        $campaign->category_id = $request->input('category_id');
        $campaign->title = $request->input('title');
        $campaign->price = $request->input('price');
        $campaign->time_duration = $request->input('time_duration');
        $campaign->owner_of_campaign = $request->input('owner_of_campaign');
        $campaign->is_featured = $request->input('is_featured');
        $campaign->description = $request->input('description');
        $saved = $campaign->save();

        return redirect()->route('admin.campaign.index')->with('success', 'Campaign Updated SuccessFully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $campaign = Campaign::findOrFail($id);
        $campaign->delete();
        return back()->with('success', 'Campaign Delete Successfully 😄!');
    }

    public function changeStatus($id)
    {
        $campaign = Campaign::findOrFail($id);
        if ($campaign->status == 1) {
            $campaign->status = 0;
        } else {
            $campaign->status = 1;
        }
        $campaign->save();
        return response()->json([
            'status' => true,
            'message' => 'Campaign status Updated Succesfully 😄!',
        ]);
    }
}
