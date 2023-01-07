<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Kategori;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::paginate(3);
        $kategoris = Kategori::all();
        return view('menu', ['kategoris' => $kategoris, 'menus' => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'customer' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'email' => 'required | email |unique:pelanggans',
            'password' => 'required | min:4',
        ]);
        // dd($data);
        Pelanggan::create([
            'pelanggan' => $data['customer'],
            'alamat' => $data['address'],
            'telp' => $data['phone'],
            'jeniskelamin' => $data['gender'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'aktif' => 1,
        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategoris=Kategori::all();
        $menus = Menu::where('idkategori', $id) -> paginate(3);
        return view('kategori', [
            'kategoris'=>$kategoris,
            'menus'=>$menus
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function register()
    {
        $kategoris = Kategori::all();
        return view('register', ['kategoris' => $kategoris]);
    }

    public function login()
    {
        $kategoris = Kategori::all();
        return view('login', ['kategoris' => $kategoris]);
    }

    public function postlogin(Request $request)
    {
        $data = $request->validate([
            'email' => 'required',
            'password' => 'required|min:4',
        ]);
        $pelanggan = Pelanggan::where('email', $data)->where('aktif', 1)->first();
        if ($pelanggan) {
            if (Hash::check($data['password'], $pelanggan['password'])) {
                $data = [
                    'idpelanggan' => $pelanggan['idpelanggan'],
                    'email' => $pelanggan['email'],
                ];
                $request->session()->put('idpelanggan', $data);
                return redirect('/');

            }
            else{
                return back()->with('pesan', 'Password salah!!');
            }
        }
        else{
            return back()->with('pesan', 'email belum terdaftar');
        }
    }
    public function logout()
    {
        session()->flush();
        return redirect('/');
    }
}
