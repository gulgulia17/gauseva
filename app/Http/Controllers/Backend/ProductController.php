<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->search) {
            $products = Product::where('title', 'LIKE', '%' . request()->search . '%')
                ->paginate(10)->withQueryString();
        } else {
            $products = Product::with('category:id,category_name')->paginate(10)->withQueryString();
            // dd($products);
        }
        return view('backend.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('type', 'product')->orderBy('category_name', 'desc')->get();
        // dd($categories);
        return view('backend.products.create', compact('categories'));
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
            'title' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg',
        ]);

        // $data = $request->all();

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('product/images'), $imageName);
            $data['image'] = $imageName;
        } else {
            $data['image'] = 'product.png';
        }

        $product = new Product();
        $product->title = $request->input('title');
        $product->category_id = $request->input('category_id');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->image = $data['image'];
        $saved = $product->save();

        // Blog::create($data);
        // dd($data);
        return redirect()->route('admin.product.index')->with('success', 'Product Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('backend.products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::where('type', 'product')->orderBy('category_name', 'desc')->get();
        return view('backend.products.edit', compact('product', 'categories'));
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
            'title' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg',
        ]);

        $product = Product::findOrFail($id);
        // $data = $request->all();

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('product/images'), $imageName);
            $data['image'] = $imageName;
        }
        // $blog->update($data);
        $product->title = $request->input('title');
        $product->category_id = $request->input('category_id');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $saved = $product->save();

        return redirect()->route('admin.product.index')->with('success', 'Product Updated SuccessFully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return back()->with('success', 'Product Delete Successfully 😄!');
    }

    public function changeStatus($id)
    {
        $product = Product::findOrFail($id);
        if ($product->status == 1) {
            $product->status = 0;
        } else {
            $product->status = 1;
        }
        $product->save();
        return response()->json([
            'status' => true,
            'message' => 'Product status Updated Succesfully 😄!',
        ]);
    }
}
