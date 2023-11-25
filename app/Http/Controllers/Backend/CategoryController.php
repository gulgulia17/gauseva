<?php

namespace App\Http\Controllers\Backend;

use App\Helper\Common;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);
        return view('backend.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'category_name' => 'required|unique:categories',
            'type' => 'required',
        ]);

        $category = Category::create(request()->only('category_name', 'type'));
        $category->slug = Common::makeSlug($category->category, 'Category');
        $category->save();
        return redirect()->route('admin.category.index')->with('status', ' Category Created successfully !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Category $category)
    {
        return view('backend.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Category $category)
    {
        return view('backend.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */

    public function update(Request $request, Category $category)
    {
        request()->validate([
            'category_name' => 'required|unique:categories,category_name,' . $category->id,
            'type' => 'required',
        ]);

        $category->update(request()->all());
        $category->slug = Common::makeSlug($category->category_name, 'Category');
        $category->save();
        return redirect()->route('admin.category.index')->with('status', ' Category updated successfully !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.category.index')->with('status', ' Category deleted successfully !!');
    }
}
