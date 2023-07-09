<?php

namespace App\Http\Controllers;

use App\Models\GeneralSetting;
use App\Models\Kir;
use App\Models\Reminder;
use App\Models\User;
use Illuminate\Http\Request;

class KirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kir::orderBy('id', 'desc')->get();

        return view('kir.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kir.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'         => 'required',
            'no_license'  => 'required',
            'no_stuck'         => 'required',
            'phone'      => 'required',
            'exp_date'      => 'required',
        ]);

        $data = $request->all();

        $create = Kir::create($data);

        return redirect()->route('kir.index')->with('success', 'KPI berhasil di Tambahkan');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Kir::findOrFail($id);

        return view('kir.edit', ['data' => $data]);
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
        $request->validate([
            'name'         => 'required',
            'no_license'  => 'required',
            'no_stuck'         => 'required',
            'phone'      => 'required',
            'exp_date'      => 'required',
        ]);

        $data = $request->all();
        
        $reminder = Reminder::where('kir_id', $id)->get();
        foreach($reminder as $value){
            $value->delete();
        }
        
        $kpi = Kir::findOrFail($id)->update($data);

        return redirect()->route('kir.index')->with('success', 'Data Berhasil di Ubah');
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
            $data = Kir::findOrFail($id);
            $data->delete($data);

            return redirect(route('kir.index'))
                            ->with('success', 'Berhasil hapus data!');
        }catch(\Exception $e) {
            return redirect(route('kir.index'))
                            ->with('error', 'Gagal hapus data!')
                            ->with('error', $e->getMessage());

        }
    }

    public function history()
    {
        $data = Reminder::orderBy('id', 'desc')->get();
        $gen_setting = GeneralSetting::first();
        $kir = Kir::get();
        $user = User::get();

        $dataCart['sender_count'] = $data->count();
        $dataCart['price'] = $data->count() * $gen_setting->price_per_send;
        $dataCart['kir_count'] = $kir->count();
        $dataCart['user_count'] = $user->count();

        return view('dashboard', ['data' => $data, 'dataCart' => $dataCart]);
    }
}
