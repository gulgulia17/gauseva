<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use App\Models\Campaign;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\CampaignProduct;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Services\ImageUploadService;

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
    public function create(Campaign $campaign)
    {
        $categories = Category::where('type', 'campaign')->orderBy('category_name', 'desc')->get();
        $products = Product::where('status', 1)->orderBy('id', 'desc')->get();
        $campaignProducts = [];

        return view('backend.campaign.create', compact('categories', 'products', 'campaign', 'campaignProducts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ImageUploadService $imageUploadService)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'product_id.*' => 'required|exists:products,id',
            'price' => 'required|numeric',
            'created_by' => 'required|string',
            // 'created_by' => 'required|exists:users,id',
            'start_at' => 'required|date',
            'end_at' => 'required|date|after:start_at',
            'project_description' => 'required|string',
            'is_featured' => 'required|boolean',
            'images.*' => ['required','image','mimes:jpeg,png,jpg','max:2048'],
            'documents.*' => ['required','image','mimes:jpeg,png,jpg','max:2048']
        ]);

        try {
            DB::beginTransaction();

            if ($request->has('images')) {
                $imagesUploaded = [];
                foreach ($validated['images'] as $image) {
                    $imagesUploaded[] = $imageUploadService->uploadImage(
                        $image,
                        'images/campaign'
                    );
                }
                $validated['images'] = json_encode($imagesUploaded);
            } else {
                $validated['images'] = json_encode(['product.png']);
            }

            if ($request->has('documents')) {
                $imagesUploaded = [];
                foreach ($validated['documents'] as $image) {
                    $imagesUploaded[] = $imageUploadService->uploadImage(
                        $image,
                        'images/documents'
                    );
                }
                $validated['documents'] = json_encode($imagesUploaded);
            }

            $campaign = Campaign::create($validated);

            $campaign->campaignProducts()->createMany(
                collect($request->product_id)->map(function ($product_id) {
                    return ['product_id' => $product_id];
                })->toArray()
            );

            DB::commit();

            return redirect()->route('admin.campaign.index')->with('success', 'Campaign Created Successfully');
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
            return redirect()->back()->withInput()->withErrors(['error' => 'Failed to create campaign']);
        }
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
        $products = Product::where('status', 1)->orderBy('id', 'desc')->get();
        $campaignProducts = $campaign->campaignProducts->pluck('product_id')->toArray();

        return view('backend.campaign.edit', compact('campaign', 'categories', 'products', 'campaignProducts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Campaign  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ImageUploadService $imageUploadService, Campaign $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'created_by' => 'required|string',
            // 'created_by' => 'required|exists:users,id',
            'start_at' => 'required|date',
            'end_at' => 'required|date|after:start_at',
            'project_description' => 'required|string',
            'is_featured' => 'required|boolean',
            'images.*' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $campaign = $id;

        if ($request->has('images')) {
            $imagesUploaded = [];
            foreach ($validated['images'] as $image) {
                $imagesUploaded[] = $imageUploadService->uploadImage(
                    $image,
                    'images/campaign'
                );
            }
            $validated['images'] = json_encode($imagesUploaded);
        }

        $campaign->update($validated);
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
