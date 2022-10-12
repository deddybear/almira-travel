<?php 
namespace App\Traits;

use App\Models\Review;

trait ReviewTraits {

    public function deleteReviewers($id) {
        try {
            Review::where('id', $id)->delete();
            return response()->json(['success' => 'Berhasil Menghapus Review']);
        } catch (\Throwable $th) {
            return response()->json(['errors' => ['errors' => $th->errorInfo[2]]], 500);
        }
    }
}