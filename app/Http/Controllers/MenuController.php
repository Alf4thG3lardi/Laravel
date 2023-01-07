<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoris = Kategori::all();
        $menus = Menu::join('kategoris', 'menus.idkategori', '=', 'kategoris.idkategori')->select(['menus.*', 'kategoris.*'])->paginate(3);
        return view('Backends.Menu.select', ['menus' => $menus, 'kategoris' => $kategoris]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoris = Kategori::all();
        return view('Backends.Menu.insert', ['kategoris' => $kategoris]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMenuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'gambar' => 'required|max:2048',
            'menu' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
        ]);
        $id = $request->idkategori;
        $namaGambar = $request->file('gambar')->getClientOriginalName();
        // echo $namaGambar;
        $request->gambar->move(public_path('img'), $namaGambar);

        Menu::create([
            'idkategori' => $id,
            'menu' => $data['menu'],
            'harga' => $data['harga'],
            'deskripsi' => $data['deskripsi'],
            'gambar' => $namaGambar,
        ]);

        return redirect('admin/menu');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show($idmenu)
    {
        Menu::where('idmenu', '=', $idmenu)->delete();
        return redirect('admin/menu');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit($idmenu)
    {
        $kategoris = Kategori::all();
        $menu = Menu::where('idmenu', $idmenu)->first();
        return view('Backends.Menu.update', ['menu'=> $menu, 'kategoris' => $kategoris]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMenuRequest  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idmenu)
    {
        if($request->gambar) {
            $data = $request->validate([
                'menu' => 'required',
                'deskripsi' => 'required',
                'gambar' => 'max:2048',
                'harga' => 'required',
            ]);

            $idkategori = $request->idkategori;
            $namaGambar = $request->file('gambar')->getClientOriginalName();

            if (file_exists( asset('img/'.$namaGambar) ) == false) {
                $request->gambar->move(public_path('img'), $namaGambar);
            };
            Menu::where('idmenu', $idmenu)->update([
                'idkategori' => $idkategori,
                'menu' => $data['menu'],
                'deskripsi' => $data['deskripsi'],
                'gambar' => $namaGambar,
                'harga' => $data['harga'],
            ]);
        }else {
            $data = $request->validate([
                'menu' => 'required',
                'deskripsi' => 'required',
                'harga' => 'required',
            ]);

            $idkategori = $request->idkategori;

            Menu::where('idmenu', $idmenu)->update([
                'idkategori' => $idkategori,
                'menu' => $data['menu'],
                'deskripsi' => $data['deskripsi'],
                'harga' => $data['harga'],
            ]);
        }


        return redirect('admin/menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
    }

    public function select(Request $request)
    {
        $id = $request->idkategori;
        $kategoris = Kategori::all();
        $menus = Menu::join('kategoris', 'menus.idkategori', '=', 'kategoris.idkategori')
        ->select(['menus.*', 'kategoris.*'])
        ->where('menus.idkategori', $id)
        ->paginate(3);
        return view('Backends.Menu.select', ['menus' => $menus, 'kategoris' => $kategoris]);
        return $id;
    }
}
