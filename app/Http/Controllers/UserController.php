<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\TemplateEmployeeUser;
use App\Exports\DownloadTemplateEmployeeUser;

class UserController extends Controller
{

    public function profile()
    {
        $data = Auth::user();
        return view('profile.index', compact('data'));
    }

    public function profile_update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.Auth::user()->id,
        ]);

        $data = User::find(Auth::user()->id);
        $data->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        if(isset($request->old_password)) {
            $request->validate([
                'new_password'     => 'required|min:6|max:20',
                'new_password_confirmation' => 'required|same:new_password'
            ]);
            if(Hash::check($request->old_password, $data->password)) {
                $data->update([
                    'password' => Hash::make($request->new_password)
                ]);
            }else {
                return back()->with('error', 'Password lama tidak sesuai')
                            ->withError('Password lama tidak sesuai')
                            ->withInput();
            }

        }

        return redirect(route('profile.index'))
                        ->with('success', 'Profile berhasil diupdate');
    }

    public function index()
    {
        $data = User::orderBy('id', 'desc')->get();

        return view('user.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $data['password']= Hash::make($data['password']);

            $create = User::create($data);
            return redirect()->route('user.index')->with('success', 'Berhasil input data!!');
        } catch (\Exception $e) {
            return redirect()->back()->with('danger', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        if(!is_numeric($id)) {
            return abort(404);
        }
        $data = User::findOrFail($id);

        return view('user.detail', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::findOrFail($id);

        return view('user.edit', ['data' => $data]);
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
        try {
            $input = $request->all();
            if ($input['password']) {
                $input['password']= Hash::make($input['password']);
            }

            $data = User::findOrFail($id);
            $update = $data->update($input);

            return redirect()->route('user.index')->with('success', 'Berhasil edit data!!');
        } catch (\Exception $e) {
            return redirect()->back()->with('danger', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        try {
            $data = $request->all();
            $dataUser['status'] = 0;
            $destroy = User::findOrFail($id);
            $update = $destroy->update($dataUser);

            return redirect()->route('user.index')->with('success', 'Berhasil hapus data!!');
        } catch (\Throwable $e) {
            return redirect()->back()->with('danger', $e->getMessage());
        }
    }
}
