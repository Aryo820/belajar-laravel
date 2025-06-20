<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BelajarController extends Controller
{
    public function index()
    {
        return view('aritmatika');
    }

    public function tambah()
    {
        $title = "Tambah - tambahan";
        $jumlah = 0;
        return view('tambah', compact('title', 'jumlah'));
        // return view('tambah', [$title, $jumlah]);
    }

    public function tambahAction(Request $request)
    {
        // $post
        $angka1 = $request->angka1;
        $angka2 = $request->input('angka2');
        $jumlah = $angka1 + $angka2;
        return view ('tambah',compact('jumlah'));
    }

    public function update($name)
    {
        return "Selamat Datang $name";
    }
}
