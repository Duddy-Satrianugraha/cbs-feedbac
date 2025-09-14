<?php

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ofeedback;
use App\Models\Odetail_feedback;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::middleware('auth:sanctum')->group(function () {
    Route::post('/avatars', function (Request $request) {
        $npms = $request->input('npms', []);

        $result = [];
        foreach ($npms as $npm) {
            // Misalnya avatar tersimpan di storage atau DB mahasiswa
            $mahasiswa = User::where('username', $npm)->first();

            $result[$npm] = $mahasiswa && $mahasiswa->avatar
                ? basename($mahasiswa->avatar)
                : null;
        }

        return response()->json($result);
    });

Route::post('/feedbacks', function (Request $request) {
    $validated = $request->validate([
        'feedbacks' => 'required|array',
        'feedbacks.*.ujian_name' => 'required|string',
        'feedbacks.*.jenis' => 'required|string',
        'feedbacks.*.tanggal' => 'required|date',
        'feedbacks.*.nama' => 'required|string',
        'feedbacks.*.npm' => 'required|string',
        'feedbacks.*.station' => 'nullable|string',
        'feedbacks.*.feedback' => 'nullable|string',
    ]);

    // Simpan ke DB
    foreach ($validated['feedbacks'] as $fb) {
      $feed = Ofeedback::create([
            'ujian_name' => $fb['ujian_name'],
            'jenis_feedback' => $fb['jenis'],
            'tanggal'    => $fb['tanggal'],
            'nama'       => $fb['nama'],
            'npm'        => $fb['npm'],
        ]);
        $detail = Odetail_feedback::create([
            'ofeedback_id' => $feed->id,
            'station' => $fb['station'],
            'feedback' => $fb['feedback'],
        ]);
    }

    return response()->json([
        'status' => 'ok',
        'message' => count($validated['feedbacks']).' feedback berhasil disimpan',
    ]);
    });
});
