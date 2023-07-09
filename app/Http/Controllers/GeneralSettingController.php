<?php

namespace App\Http\Controllers;

use App\Models\GeneralSetting;
use Illuminate\Http\Request;

class GeneralSettingController extends Controller
{
    public function index()
    {
        $data = GeneralSetting::first();
        
        return view('general_setting.index', ['data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        if($request->hasFile('image_sender')){
            $files = $request->file('image_sender');
            $file = $files->store('image_sender', 'public');
            $data['image_sender'] = $file;
            $data['filename'] =  $request->file('image_sender')->getClientOriginalName();
        }
        $data = GeneralSetting::find($id)->update($data);
        return redirect()->back()->with('success', 'Berhasil Update Data');
    }
}
