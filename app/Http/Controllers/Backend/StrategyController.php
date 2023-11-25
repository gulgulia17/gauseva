<?php

namespace App\Http\Controllers\Backend;

use App\Helper\Common;
use App\Http\Controllers\Controller;
use App\Models\Strategy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class StrategyController extends Controller
{
    public function index()
    {
        $strategies = Strategy::paginate(10);
        return view('backend.strategy.index', compact('strategies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $strategy = new Strategy();
        return view('backend.strategy.create', compact('strategy'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'title' => 'required', 
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'file' => 'required|file|max:5000|mimes:docx,doc,txt,',
            'description' => 'required', 
        ]);

        $data = request()->only('title', 'description');

        $videoUrl = $request->input('video');

        if (!empty($request->input('video'))) {
            $link = $videoUrl;
            $video_id = explode("?v=", $link); // For videos like http://www.youtube.com/watch?v=...
            if (empty($video_id[1]))
                $video_id = explode("/v/", $link); // For videos like http://www.youtube.com/watch/v/..
            $video_id = explode("&", $video_id[1]); // Deleting any other params
            $videoId = $video_id[0];
        }

        if (request()->hasFile('image')) {
            $imageName = time() . '.' . request()->image->extension();
            request()->image->move(public_path('frontend/uploads/strategy'), $imageName);
            $data['image'] = $imageName;
        }
        //Doc file upload
        $fileName = time() . '.' . $request->file("file")->getClientOriginalExtension();
        request()->file->move(public_path('frontend/uploads/strategy'), $fileName);
        $data['file'] = $fileName;


        $data['video'] = $videoId ?? '';
        $strategy = Strategy::create($data);
        return redirect()->route('admin.strategy.index')->with('status', 'Strategy Created successfully !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Strategy $strategy)
    {
        return view('backend.strategy.show', compact('strategy'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Strategy $strategy)
    {
        return view('backend.strategy.edit', compact('strategy'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */

    public function update(Request $request, Strategy $strategy)
    {
        request()->validate([
            'title' => 'required', 
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'file' => 'required|file|max:5000|mimes:docx,doc,txt,',
            'description' => 'required',
        ]);

        $data = request()->all();

        if (request()->hasFile('image')) {
            $imageName = time() . '.' . request()->image->extension();
            request()->image->move(public_path('frontend/uploads/strategy'), $imageName);
            $data['image'] = $imageName;
        }

        //Doc file update
        if (request()->hasFile('file')) {
            //old doc file remove after update
            $file_path = public_path('/frontend/uploads/strategy/'.$strategy->file);

            if(file_exists($file_path)) {
                unlink($file_path);
            }

            $fileName = time() . '.' . $request->file("file")->getClientOriginalExtension();
            request()->file->move(public_path('frontend/uploads/strategy'), $fileName);
            $data['file'] = $fileName;
        }

        $strategy->update($data);
        return redirect()->route('admin.strategy.index')->with('status', ' Strategy updated successfully !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Strategy $strategy)
    {
        $strategy->delete();
        return redirect()->route('admin.strategy.index')->with('status', ' Strategy deleted successfully !!');
    }

    public function status(Strategy $strategy)
    {
        if ($strategy->status == 0) {
            $strategy->status = Strategy::ACTIVE;
            $message = 'Status changed to active';
        } else {
            $strategy->status = Strategy::HIDDEN;
            $message = 'Status changed to inactive';
        }
        $strategy->save();
        return [
            'message' => $message,
            'status' => $strategy->status,
            'type' => 'success'
        ];
    }
}
