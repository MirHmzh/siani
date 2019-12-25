<?php

namespace App\Http\Controllers;

use App\Alumni;
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
        return view('admin.alumni',compact('data'));
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
}
