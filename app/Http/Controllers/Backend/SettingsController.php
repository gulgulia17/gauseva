<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Setting;

class SettingsController extends Controller
{
    public function view()
    {
        $fields = Setting::all();
        return view('backend.setting.view', compact('fields'));
    }

    public function update()
    {
        $fields = request()->except('_token');
        foreach ($fields as $key => $field) {

            if (request()->hasFile($key)) {

                if (
                    file_exists(public_path('/pages_img/' . Setting::get($key))) &&
                    !File::isDirectory(public_path('/pages_img/' . Setting::get($key)))
                ) {
                    unlink(public_path('/pages_img/' . Setting::get($key)));
                }

                $imageName = $key . time() . '.' . request()->$key->extension();
                request()->$key->move(public_path('/pages_img'), $imageName);
                Setting::set($key, $imageName);
            } else {
                Setting::set($key, $field);
            }
        }
        Setting::save();
        return back()->with('status', 'Data Updated Successfully');
    }
}
