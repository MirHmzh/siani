<?php

namespace App\Http\Controllers;

use App\Agenda;
use App\Alumni;
use App\Berita;
use App\Pengurus;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function get_all_alumni()
    {
        try{
            return Alumni::all();
        }catch (\Exception $e){
            return response()->json(["message"=>$e->getMessage(), TRUE]);
        }
    }

    public function get_all_pengurus()
    {
        try{
            return Pengurus::all();
        }catch (\Exception $e){
            return response()->json(["message"=>$e->getMessage(), TRUE]);
        }
    }

    public function get_all_agenda()
    {
        try{
            return Agenda::all();
        }catch (\Exception $e){
            return response()->json(["message"=>$e->getMessage(), TRUE]);
        }
    }

    public function get_all_berita()
    {
        try{
            return Berita::all();
        }catch (\Exception $e){
            return response()->json(["message"=>$e->getMessage(), TRUE]);
        }
    }

    public function get_all_galeri()
    {
        try{
            return Galeri::all();
        }catch (\Exception $e){
            return response()->json(["message"=>$e->getMessage(), TRUE]);
        }
    }

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

    public function get_agenda($id)
    {
        try{
            return Agenda::find($id);
        }catch (\Exception $e){
            return response()->json(["message"=>$e->getMessage(), TRUE]);
        }
    }

    public function get_berita($id)
    {
        try{
            return Berita::find($id);
        }catch (\Exception $e){
            return response()->json(["message"=>$e->getMessage(), TRUE]);
        }
    }

    public function get_galeri($id)
    {
        try{
            return Galeri::find($id);
        }catch (\Exception $e){
            return response()->json(["message"=>$e->getMessage(), TRUE]);
        }
    }
}
