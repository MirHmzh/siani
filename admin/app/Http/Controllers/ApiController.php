<?php

namespace App\Http\Controllers;

use App\Alumni;
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
}
