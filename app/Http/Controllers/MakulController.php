<?php

namespace App\Http\Controllers;

use App\Models\Makul;
use Illuminate\Http\Request;

class MakulController extends Controller
{
    // Menampilkan semua data makul
    public function index()
    {
        $makul = Makul::all();
        return response()->json(['data' => $makul]);
    }

    // Membuat makul baru
    public function store(Request $request)
    {
        $makul = Makul::create($request->all());
        return response()->json(['message' => 'Makul created successfully', 'data' => $makul]);
    }

    // Menampilkan detail makul
    public function show($id)
    {
        $makul = Makul::findOrFail($id);
        return response()->json(['data' => $makul]);
    }

    // Mengupdate data makul
    public function update(Request $request, $id)
    {
        $makul = Makul::findOrFail($id);
        $makul->update($request->all());
        return response()->json(['message' => 'Makul updated successfully', 'data' => $makul]);
    }

    // Menghapus makul
    public function destroy($id)
    {
        $makul = Makul::findOrFail($id);
        $makul->delete();
        return response()->json(['message' => 'Makul deleted successfully']);
    }
}
