<?php

namespace App\Http\Controllers;

use App\Models\Count;
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
        $error = null;
        return view('tambah', compact('title', 'jumlah', 'error'));
        // return view('tambah', [$title, $jumlah]);
    }

    public function tambahAction(Request $request)
    {
        $request->validate([
            'angka1' => 'required',
            'angka2' => 'required'
        ]);
        // $_post
        $angka1 = $request->angka1;
        $angka2 = $request->input('angka2');
        $jumlah = null;
        $error = null;
        if (!is_numeric($angka1) || !is_numeric($angka2)) {
            $error = "Data harus angka";
        } else {
            $jumlah = $angka1 + $angka2;
        }
        // INSERT INTO counts (jenis, angka1, angka2, hasil) VALUES ()
        if ($error == null) {
            Count::create([
                'jenis' => $request->jenis,
                'angka1' => $angka1,
                'angka2' => $angka2,
                'hasil' => $jumlah
            ]);
        }
        return view('tambah', compact('jumlah', 'error'));
    }
    public function viewHitungan()
    {
        $counts = Count::all();

        return view('data-hitungan', compact('counts'));
    }

    public function editDataHitung(string $id)
    {
        $title = "Edit Data Hitungan";
        $error = null;
        $jumlah = null;

        $count = Count::findOrFail($id);
        $jenis = $count->jenis;

        if ($jenis == 'tambah') {
            $title = "Edit Data Penjumlahan";
            if (!is_numeric($count->angka1) || !is_numeric($count->angka2)) {
                $error = "Data harus angka";
            }
            return view('tambah.edit', compact('title', 'error', 'jumlah', 'count'));
        }
    }
public function updateTambahan(Request $request, string $id)
    {
        $angka1 = $request->angka1;
        $angka2 = $request->angka2;

        $count = $angka1 + $angka2;

        $data = Count::findOrFail($id);
        $data->jenis = $request->jenis;
        $data->angka1 = $angka1;
        $data->angka2 = $angka2;
        $data->hasil = $count;
        $data->save();

        return redirect()->route('edit.data-hitung', $id)->with(['status' => 'Data Berhasil Diubah']);
}
public function softDeleteTambahan(string $id) {
    // SELECT * FROM counts WHERE id = $id
    $sDelete = Count::findOrFail($id);
    // DELETE FROM counts WHERE id = $id
    $sDelete->delete();
    return redirect()->route('data.hitungan')->with(['status' => 'Data Berhasil Dihapus']);
}

    public function update($name)
    {
        return "Selamat Datang $name";
    }
}
