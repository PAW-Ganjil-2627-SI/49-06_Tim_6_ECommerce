<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ekspedisi;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class EkspedisiApiController extends Controller
{
// 1. GET: Menampilkan semua data
public function index(): JsonResponse
{
$data = Ekspedisi::orderBy('id', 'desc')->get();

return response()->json([
'success' => true,
'message' => 'Data ekspedisi berhasil diambil',
'data' => $data
], 200);
}

// 2. GET BY ID: Menampilkan detail
public function show(int $id): JsonResponse
{
$data = Ekspedisi::find($id);

if (!$data) {
return response()->json([
'success' => false,
'message' => 'Data ekspedisi tidak ditemukan',
'data' => null
], 404);
}

return response()->json([
'success' => true,
'message' => 'Detail ekspedisi berhasil diambil',
'data' => $data
], 200);
}

// 3. POST: Menambahkan data
public function store(Request $request): JsonResponse
{
$validated = $request->validate([
'nama_kurir' => 'required|string|max:255',
'layanan' => 'required|string|max:255',
'zonasi' => 'required|string|max:255',
'estimasi' => 'sometimes|nullable|string|max:255',
'tarif' => 'sometimes|nullable|string|max:255',
'status' => 'sometimes|string|max:255',
'keterangan' => 'sometimes|nullable|string',
]);

$data = Ekspedisi::create($validated);

return response()->json([
'success' => true,
'message' => 'Data ekspedisi berhasil ditambahkan',
'data' => $data
], 201);
}

// 4. PUT: Mengubah data
public function update(Request $request, int $id): JsonResponse
{
$data = Ekspedisi::find($id);

if (!$data) {
return response()->json([
'success' => false,
'message' => 'Data ekspedisi tidak ditemukan'
], 404);
}

$validated = $request->validate([
'nama_kurir' => 'required|string|max:255',
'layanan' => 'required|string|max:255',
'zonasi' => 'required|string|max:255',
'estimasi' => 'sometimes|nullable|string|max:255',
'tarif' => 'sometimes|nullable|string|max:255',
'status' => 'required|string|max:255',
'keterangan' => 'sometimes|nullable|string',
]);

$data->update($validated);

return response()->json([
'success' => true,
'message' => 'Data ekspedisi berhasil diperbarui',
'data' => $data
], 200);
}

// 5. DELETE: Menghapus data
public function destroy(int $id): JsonResponse
{
$data = Ekspedisi::find($id);

if (!$data) {
return response()->json([
'success' => false,
'message' => 'Data ekspedisi tidak ditemukan'
], 404);
}

$data->delete();

return response()->json([
'success' => true,
'message' => 'Data ekspedisi berhasil dihapus'
], 200);
}
}