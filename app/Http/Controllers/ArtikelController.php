<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artikel;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
    public function index(){
        $artikel = Artikel::get();
        // dd($artikel);
        return view('tabelartikel', compact('artikel'));
    }

    public function create(){
        return view('formartikel');
    }

    public function store(Request $request){
        // dd($request->all());
        $artikel = new Artikel;

        $data = $request->all();
        $str = Str::lower($request->judul);
        $slug = Str::slug($str);
        // unset($data["_token"]);
        // $artikel = M_artikel::save($data);
        // dd($artikel);
        $artikel->judul = $data['judul'];
        $artikel->isi = $data['isi'];
        $artikel->tag = $data['tag'];
        $artikel->slug = $slug;
        // dd($artikel);
        $artikel->save();
        return redirect('/artikel');

    }

    public function show($id=null){

        $getArtikel = Artikel::find($id);
        $getArtikel =json_decode(json_encode($getArtikel),true);
        // dd($getPertanyaan);
        return view('showartikel',compact('getArtikel'));
    }

    public function edit($id){
        $getArtikel = Artikel::find($id);
        $getArtikel =json_decode(json_encode($getArtikel),true);
        return view('editartikel',compact('getArtikel'));
    }

    public function update($id,Request $request){


        $str = Str::lower($request->judul);
        $slug = Str::slug($str);
        $request['slug'] = $slug;
        // unset($data["_token"]);
        // $artikel = M_artikel::save($data);
        // dd($artikel);
        $getArtikel = Artikel::where('id', $id)->update($request->except('_token','_method'));

        return redirect('/artikel');
    }

    public function destroy($id){
        Artikel::where('id',$id)->delete();

        return redirect()->back();
    }
}
