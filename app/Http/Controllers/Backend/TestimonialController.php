<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\PostDec;


class TestimonialController extends Controller {

    /**
     * 
     * @param Request $request
     * @return type
     */
    public function index()
    {
        if (request()->search) {
            $testimonials = Testimonial::where('name', 'LIKE', '%' . request()->search . '%')
                ->paginate(10)->withQueryString();
        } else {
            $testimonials = Testimonial::paginate(10)->withQueryString();
        }
        return view('backend.testimonial.index', compact('testimonials'));
    }

    /**
     * create
     * @return type
     */
    public function create() {
        $testimonial = new Testimonial();
        return view('backend.testimonial.create', compact("testimonial"));
    }

    /**
     * store
     * @param Request $request
     * @return type
     */
    public function store(Request $request) {

        $this->validate($request, [
            'name' => 'required|max:255|regex:/^[A-Za-z\pL\s\-]+$/u|unique:testimonials',
            'position' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:1024',
            'feedback' => 'required',
        ]);

        try {
            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('testimonial/images'), $imageName);
                $data['image'] = $imageName;
            } else {
                $data['image'] = 'blog.png';
            }
            $testimonials = new Testimonial();
            $testimonials->name = $request->input('name');
            $testimonials->image = $data['image'];
            $testimonials->feedback = $request->input('feedback');
            $testimonials->position = $request->input('position');
            $saved = $testimonials->save();
        } catch (Exception $e) {
            $saved = false;
        }
        if ($saved) {
            return redirect()->route('admin.testimonial.index')
                            ->with('success', 'Testimonial Added successfully 😄!');
        } else {
            return back();
        }
    }

    /**
     * 
     * @param type $id
     * @return type
     */

    public function destroy($id){
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->delete();
        return back()->with('success', 'Testimonials Deleted Successfully 😄!');
    }

    /**
     * 
     * @param type $id
     * @return type
     */
    public function edit($id) {
        $testimonial = Testimonial::findOrFail($id);
        return view('backend.testimonial.edit', compact('testimonial'));
    }

    /**
     * update
     * @param Request $request
     * @param type $id
     * @return type
     */
    public function update(Request $request, $id) {

        $this->validate($request, [
            'name' => 'required|max:255|regex:/^[A-Za-z\pL\s\-]+$/u|' . Rule::unique('testimonials')->ignore($id),
            'image' => 'image|mimes:jpeg,png,jpg',
            'position' => 'required',
            'feedback' => 'required',
            
        ]);

        try {
            $testimonials = Testimonial::where('id', $id)->first();

            if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('testimonial/images'), $imageName);
            $data['image'] = $imageName;
        }
            $testimonials->name = $request->input('name');
            $testimonials->position = $request->input('position');
            $testimonials->feedback = $request->input('feedback');
            $saved = $testimonials->save();
        } catch (Exception $e) {
            $saved = false;
        }
        if ($saved) {
            return redirect()->route('admin.testimonial.index')
                            ->with('success', 'Testimonial update successfully 😄!');
        } else {
            return back();
        }
    }

    /**
     * 
     * @param Request $request
     * @return type
     */
    public function changeStatus($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        if ($testimonial->status == 1) {
            $testimonial->status = 0;
        } else {
            $testimonial->status = 1;
        }
        $testimonial->save();
        return response()->json([
            'status' => true,
            'message' => 'Testimonial status Updated Succesfully 😄!'
        ]);
    }

}
