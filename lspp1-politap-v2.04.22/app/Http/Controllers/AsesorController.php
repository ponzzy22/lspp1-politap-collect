<?php

namespace App\Http\Controllers;

use App\Models\Asesor;
use App\Models\Skema;
use App\Models\Tuk;
use Illuminate\Http\Request;

class AsesorController extends Controller
{
    public function index(){
        $asesor = Asesor::where('id', '>', 1)->get();
        $skema = Skema::all();
        return view('admin/asesor/index', compact('skema','asesor'));
    }


    public function store(Request $request) {
        // dd($request->all());
        $request->validate([
            // 'nik' => ['required', 'unique:asesor,nik'],
            'nama' => ['required'],
            // 'alamat' => ['required'],
            // 'sex' => ['required'],
            // 'no_hp' => ['required'],
            // 'email' => ['required', 'unique:asesor,email'],
            // 'status' => ['required'],
            // 'image' => ['required', 'image']
        ]);
        if ($request->has('image')) {
            $image = $request->image;
            $new_image = time().$image->getClientOriginalName();
            $image->move('public/uploads/asesor/', $new_image);
            $asesor_data = [
                'nik' => $request->nik,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'sex' => $request->sex,
                'email' => $request->email,
                'status' => $request->status,
                'skema' => $request->skema,
                'image' => 'public/uploads/asesor/'.$new_image,
            ];
        }
        else{
            $asesor_data = Asesor::create( [
                'nik' => $request->nik,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'sex' => $request->sex,
                'email' => $request->email,
                'status' => $request->status,
                'skema' => $request->skema,
            ]);
        }
        // $image->move('public/uploads/asesor/', $new_image);
        return redirect()->route('asesor.index')->with('success','Asesor Berhasil Ditambah');
    }


    public function edit($id) {
        $asesor = Asesor::findorfail($id);
        $skema = Skema::all();
        return view('admin/asesor/edit', compact('asesor', 'skema'));
    }


    public function update(Request $request, $id) {
        $request->validate([
            'nik' => ['required'],
            'nama' => ['required'],
            'alamat' => ['required'],
            'sex' => ['required'],
            'no_hp' => ['required'],
            'status' => ['required'],
        ]);
        $asesor = Asesor::findorfail($id);
        if ($request->has('image')) {
            $image = $request->image;
            $new_image = time().$image->getClientOriginalName();
            $image->move('public/uploads/asesor/', $new_image);
            $asesor_data = [
                'nik' => $request->nik,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'sex' => $request->sex,
                'email' => $request->email,
                'status' => $request->status,
                'skema' => $request->skema,
                'image' => 'public/uploads/asesor/'.$new_image,
            ];
        }
        else{
            $asesor_data = [
                'nik' => $request->nik,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'sex' => $request->sex,
                'email' => $request->email,
                'status' => $request->status,
                'skema' => $request->skema,
            ];
        }
        $asesor->update($asesor_data);
        return back()->with('success','Data Asesor anda berhasil di Update');
    }


    public function destroy($id){
        $asesor = Asesor::findorfail($id);
        $asesor->delete();
        return redirect()->back()->with('success','Asesor Berhasil Dihapus');
    }
}
