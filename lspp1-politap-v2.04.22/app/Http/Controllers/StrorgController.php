<?php

namespace App\Http\Controllers;

use App\Models\Strorg;
use Illuminate\Http\Request;

class StrorgController extends Controller
{

    public function index()
    {
        $strorg = Strorg::all();
        return view('admin/strorg/index', compact('strorg'));
    }


    public function store(Request $request)
    {
        $image = $request->image;
        $new_image = time().$image->getClientOriginalName();
        $strorg = Strorg::create([
            'keterangan' =>$request->keterangan,
            'image' => 'public/uploads/strorg/'.$new_image,
        ]);
        $image->move('public/uploads/strorg/', $new_image);
        return redirect()->route('strorg.index')->with('success','Gambar anda berhasil di Posting');
    }


    public function update(Request $request, $id)
    {
        $strorg = Strorg::findorfail($id);
        if ($request->has('image')) {
            $image = $request->image;
            $new_image = time().$image->getClientOriginalName();
            $image->move('public/uploads/strorg/', $new_image);
            $strorg_data = [
                'keterangan' =>$request->keterangan,
                'image' => 'public/uploads/strorg/'.$new_image,
            ];
        }
        else{
            $strorg_data = [
                'keterangan' =>$request->keterangan,
            ];
        }
        Strorg::whereId($id)->update($strorg_data);
        return redirect()->route('strorg.index')->with('success','Gambar Struktur Organisasi berhasil di Update');
    }
}
