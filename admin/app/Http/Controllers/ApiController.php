<?php

namespace App\Http\Controllers;

use App\Alumni;
use App\Pengurus;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function get_alumni($id)
    {
        try{
            return Alumni::find($id);
        }catch (\Exception $e){
            return response()->json(["message"=>$e->getMessage(), TRUE]);
        }
    }

    public function get_pengurus($id)
    {
        try{
            return Pengurus::find($id);
        }catch (\Exception $e){
            return response()->json(["message"=>$e->getMessage(), TRUE]);
        }
    }
}
