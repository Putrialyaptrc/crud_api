<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    // Menampilkan semua data dosen
    public function index()
    {
        $dosen = Dosen::all();
        return response()->json(['data' => $dosen]);
    }

    // Membuat dosen baru
    public function store(Request $request)
    {
        $dosen = Dosen::create($request->all());
        return response()->json(['message' => 'Dosen created successfully', 'data' => $dosen]);
    }

    // Menampilkan detail dosen
    public function show($id)
    {
        $dosen = Dosen::findOrFail($id);
        return response()->json(['data' => $dosen]);
    }

    // Mengupdate data dosen
    public function update(Request $request, $id)
    {
        $dosen = Dosen::findOrFail($id);
        $dosen->update($request->all());
        return response()->json(['message' => 'Dosen updated successfully', 'data' => $dosen]);
    }

    // Menghapus dosen
    public function destroy($id)
    {
        $dosen = Dosen::findOrFail($id);
        $dosen->delete();
        return response()->json(['message' => 'Dosen deleted successfully']);
    }
}
