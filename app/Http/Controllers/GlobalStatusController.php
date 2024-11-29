<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GlobalStatusController extends Controller
{
    public function updateStatus(Request $request)
    {
        try {
            $modelClass = $request->input('model'); // Nama model dikirim dari frontend
            $id = $request->input('id');
    
            if (!class_exists($modelClass)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Model tidak ditemukan.',
                ], 400);
            }
    
            $model = app($modelClass);
            $item = $model->findorfail($id);
            $item->status = $item->status == 1 ? 0 : 1; // Toggle status
            $item->save();
    
            return response()->json([
                'success' => true,
                'message' => 'Status berhasil diperbarui.',
                'newStatus' => $item->status,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ]);
        }
    }
}
