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
}
