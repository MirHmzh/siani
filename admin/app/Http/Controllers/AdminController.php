<?php

namespace App\Http\Controllers;

use App\Agenda;
use App\Alumni;
use App\Berita;
use App\Galeri;
use App\Pengurus;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function alumni()
    {
        $data = Alumni::orderBy('id','desc')->paginate(10);
        $jabatan = Pengurus::orderBy('order','asc')->get();
        return view('admin.alumni',compact('data','jabatan'));
    }

    public function save_alumni(Request $request)
    {
        try{
            if($request->hasFile('image')){
                $file = $request->file('image');
                $nama_foto = 'foto/'.time()."_".$file->getClientOriginalName();
                $file->move('images/foto',$nama_foto);
                $request->merge(['foto'=>$nama_foto]);
            }
            Alumni::create($request->all());
            return back();
        }catch (\Exception $e){
            return response()->json($e->getMessage());
        }
    }

    public function delete_alumni(Request $request)
    {
        Alumni::find($request->id)->delete();
        return back();
    }

    public function update_alumni(Request $request)
    {
        $data = $request->all();
        $data = $request->except('_token');
        Alumni::where('id',$request->id)->update($data);
        return back();
    }

    public function pengurus()
    {
        $data = Pengurus::orderBy('order','asc')->get();
        return view('admin.pengurus', compact('data'));
    }

    public function save_pengurus(Request $request)
    {
        try{
            Pengurus::create($request->all());
            return back();
        }catch (\Exception $e){
            return response()->json(["message" => $e->getMessage(), "error"=>TRUE]);
        }
    }

    public function delete_pengurus(Request $request)
    {
        Pengurus::find($request->id)->delete();
        return back();
    }

    public function update_pengurus(Request $request)
    {
        $data = $request->all();
        $data = $request->except('_token');
        Pengurus::where('id',$request->id)->update($data);
        return back();
    }

    /* -------------------------------------- AGENDA ------------------------------------------*/
    public function agenda()
    {
        $data = Agenda::orderBy('id','desc')->get();
        return view('admin.agenda', compact('data'));
    }

    public function save_agenda(Request $request)
    {
        try{
            Agenda::create($request->all());
            return back();
        }catch (\Exception $e){
            return response()->json(["message" => $e->getMessage(), "error"=>TRUE]);
        }
    }

    public function delete_agenda(Request $request)
    {
        Agenda::find($request->id)->delete();
        return back();
    }

    public function update_agenda(Request $request)
    {
        $data = $request->all();
        $data = $request->except('_token');
        Agenda::where('id',$request->id)->update($data);
        return back();
    }

    public function berita()
    {
        $data = Berita::orderBy('id','desc')->get();
        return view('admin.berita', compact('data'));
    }

    public function save_berita(Request $request)
    {
        try{
            if($request->hasFile('gambar')){
                $file = $request->file('gambar');
                $nama_foto = 'berita/'.time()."_".$file->getClientOriginalName();
                $file->move('images/berita',$nama_foto);
                $request->merge(['image'=>$nama_foto]);
            }
            Berita::create($request->all());

            return back();
        }catch (\Exception $e){
            return response()->json($e->getMessage());
        }
    }

    public function delete_berita(Request $request)
    {
        Berita::find($request->id)->delete();
        return back();
    }

    public function update_berita(Request $request)
    {
        $data = $request->all();
        $data = $request->except('_token');
        Berita::where('id',$request->id)->update($data);
        return back();
    }

    public function galeri()
    {
        $data = Galeri::orderBy('id','desc')->get();
        return view('admin.galeri', compact('data'));
    }

    public function save_galeri(Request $request)
    {
        try{
            if($request->hasFile('attachment')){
                $file = $request->file('attachment');
                $nama_foto = 'galeri/'.time()."_".$file->getClientOriginalName();
                $file->move('images/galeri',$nama_foto);
                $request->merge(['path_attachment'=>$nama_foto]);
            }
            Galeri::create($request->all());

            return back();
        }catch (\Exception $e){
            return response()->json($e->getMessage());
        }
    }

    public function delete_galeri(Request $request)
    {
        Galeri::find($request->id)->delete();
        return back();
    }

}
