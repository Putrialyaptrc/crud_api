<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    // Menampilkan semua data mahasiswa
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return response()->json(['data' => $mahasiswa]);
    }

    // Membuat mahasiswa baru
    public function store(Request $request)
    {
        $mahasiswa = Mahasiswa::create($request->all());
        return response()->json(['message' => 'Mahasiswa created successfully', 'data' => $mahasiswa]);
    }

    // Menampilkan detail mahasiswa
    public function show($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return response()->json(['data' => $mahasiswa]);
    }

    // Mengupdate data mahasiswa
    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->update($request->all());
        return response()->json(['message' => 'Mahasiswa updated successfully', 'data' => $mahasiswa]);
    }

    // Menghapus mahasiswa
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();
        return response()->json(['message' => 'Mahasiswa deleted successfully']);
    }
}
