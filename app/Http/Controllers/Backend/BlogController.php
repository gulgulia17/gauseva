<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->search) {
            $blogs = Blog::where('name', 'LIKE', '%' . request()->search . '%')
                ->paginate(10)->withQueryString();
        } else {
            $blogs = Blog::paginate(10)->withQueryString();
        }
        return view('backend.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.blogs.create');
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
            'name' => 'required',
            'description' => 'required',
            'read_time' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg'
        ]);

        // $data = $request->all();

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('blog/images'), $imageName);
            $data['image'] = $imageName;
        } else {
            $data['image'] = 'blog.png';
        }

        $blog = new Blog();
            $blog->name = $request->input('name');
            $blog->image = $data['image'];
            $blog->read_time = $request->input('read_time');
            $blog->description = $request->input('description');
            $blog->is_featured = $request->input('is_featured');
            $saved = $blog->save();

        // Blog::create($data);
        // dd($data);
        if ($saved && $request->is_featured == 1) {
            Blog::where('is_featured', 1)->whereNotIn('id', [$blog->id])->update(array('is_featured' => 0));
        }
        return redirect()->route('admin.news.index')->with('success', 'News Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::whereSlug($id)->firstOrFail();
        return view('backend.blogs.edit', compact('blog'));
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
            'name' => 'required',
            'description' => 'required',
            'read_time' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg'
        ]);

        $blog = Blog::findOrFail($id);
        // $data = $request->all();

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('blog/images'), $imageName);
            $data['image'] = $imageName;
        }
        // $blog->update($data);
            $blog->name = $request->input('name');
            $blog->read_time = $request->input('read_time');
            $blog->description = $request->input('description');
            $blog->is_featured = $request->input('is_featured');
            $saved = $blog->save();
            if ($saved && $request->is_featured == 1) {
                Blog::where('is_featured', 1)->whereNotIn('id', [$blog->id])->update(array('is_featured' => 0));
            }
        return redirect()->route('admin.news.index')->with('success', 'News Updated SuccessFully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return back()->with('success', 'News Delete Successfully 😄!');
    }


    public function changeStatus($id){
        $blog = Blog::findOrFail($id);
        if ($blog->status == 1) {
            $blog->status = 0;
        } else {
            $blog->status = 1;
        }
        $blog->save();
        return response()->json([
            'status' => true,
            'message' => 'Blog status Updated Succesfully 😄!'
        ]);
    }
}
