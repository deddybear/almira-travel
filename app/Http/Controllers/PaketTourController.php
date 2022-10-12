<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidationReview;
use App\Traits\UploadFileTraits;
use App\Models\Tour;
use App\Models\Photos;
use App\Models\Review;
use App\Traits\ReviewTraits;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid as Generate;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;


class PaketTourController extends Controller {

    use UploadFileTraits, ReviewTraits;
    
    /** 
        * TODO : Guest Function
    */

    public function index() {
        $data = Tour::select('detail', 'name', 'price', 'slug', 'collection_photos_id')->with('photos:id,path')->get();

        return view('guest/paket-tour', compact('data'));
    }

    
    public function desc($slug) {
        $data =  Tour::select('review_id', 'detail', 'name', 'trip_plan', 'best_offer', 'prepare', 'price', 'collection_photos_id')->where('slug', $slug)->with('photos:id,path', 'reviews:*')->first();
        return view('guest/desc-tour', compact('data'));
    }

    public function createReview(ValidationReview $req) {
        try {
            date_default_timezone_set('Asia/Jakarta');
            
            $data = array(
                'id' => Generate::uuid4(),
                'data_id' => $req->id,
                'name' => $req->name,
                'msg'   => $req->msg,
                'email' => $req->email,
                'star' => $req->rating
            );

            Review::create($data);

            return response()->json(['success' =>  'Berhasil Menambahkan Review']);
        } catch (\Throwable $th) {
            return response()->json(['errors' => ['errors' => $th->errorInfo[2]]], 500);
        }

       
    }

    public function deleteReview($id) {
        $this->deleteReviewers($id);
    }

    /** 
        * TODO : Dashboard Admin Function
    */

    public function pageView() {
        return view('dashboard.paket-tour');
    }

    public function listData() {
        $data = Tour::orderBy('created_at');

        return DataTables::eloquent($data)
                        ->addIndexColumn()
                        ->editColumn('created_at', function ($data) {
                            return Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at, 'Asia/Jakarta')
                                         ->format('Y-m-d H:i:s');
                        })
                        ->editColumn('updated_at', function ($data) {
                            return Carbon::createFromFormat('Y-m-d H:i:s', $data->updated_at, 'Asia/Jakarta')
                                         ->format('Y-m-d H:i:s');
                        })
                        ->addColumn('Actions', function ($data) {
                            return '
                            <a href="'.url("/tour/desc/$data->slug").'" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                            <a href="javascript:;" class="btn btn-sm btn-warning edit" data="'.$data->id.'"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="javascript:;" class="btn btn-sm btn-danger delete" data="'.$data->id.'"><i class="fa-solid fa-trash-can"></i></a>
                            ';
                        })
                        ->rawColumns(['Actions'])
                        ->toJson();
    }

    public function search(Request $req) {
        
        $results = Tour::select($req->type)
                         ->whereRaw("LOWER($req->type) LIKE ?", ["%".strtolower($req->keyword)."%"])
                         ->distinct()
                         ->get();
        
        return $results;
    }

    public function create(Request $req) {
        date_default_timezone_set('Asia/Jakarta');
        $id = Generate::uuid4();

        try {
            $idPhotos = $this->uploadFiles($req);

            if (!$idPhotos) {
                return response()->json(['errors' => ['errors' => 'Gagal upload file foto']], 500);
            }

            $data = array(
                'id'    => $id,
                'review_id' => Generate::uuid4(),
                'collection_photos_id' => $idPhotos,
                'name'  => $req->name,
                'price' => str_replace(".","", $req->price),
                'detail' => $req->detail,
                'trip_plan' => $req->plan,
                'best_offer' => $req->offer,
                'prepare' => $req->prepare,
                'slug'  => Str::slug($req->name, '-')
            );
            Tour::create($data);

            return response()->json(['success' => 'Berhasil Membuat Postingan Baru']);       

        } catch (\Throwable $th) {
            return response()->json(['errors' => ['errors' => $th->errorInfo[2]]], 500);
        }
    }

    public function update($id, Request $req) {
        date_default_timezone_set('Asia/Jakarta');

        try {
            $idPhotos       = Tour::select('collection_photos_id')->where('id', $id)->first();
            $statusDelFiles = $this->deleteFiles($idPhotos->collection_photos_id);
            $statusUpload   = $this->uploadFiles($req);

            if (!$statusDelFiles) {
                return response()->json(['errors' => ['errors' => 'Gagal Menghapus file foto']], 500);
            }

            if (!$statusUpload) {
                return response()->json(['errors' => ['errors' => 'Gagal Mengupload file foto']], 500);
            }

            $data = array(
                'id'    => $id,
                'collection_photos_id' => $statusUpload,
                'name'  => $req->name,
                'price' => str_replace(".","", $req->price),
                'detail' => $req->detail,
                'trip_plan' => $req->plan,
                'best_offer' => $req->offer,
                'prepare' => $req->prepare,
                'slug'  => Str::slug($req->name, '-')
            );

            Tour::where('id', $id)->update($data);

            return response()->json(['success' => 'Berhasil Mengedit Postingan ']);       
        } catch (\Throwable $th) {
            return response()->json(['errors' => ['errors' => $th->errorInfo[2]]], 500);
        }
    }

    public function delete($id) {
        try {
            $idPhotos       = Tour::select('collection_photos_id')->where('id', $id)->first();
            $statusDelFiles = $this->deleteFiles($idPhotos->collection_photos_id);

            if (!$statusDelFiles) {
                return response()->json(['errors' => ['errors' => 'Gagal Menghapus file foto']], 500);
            }
            
            Tour::where('id', $id)->delete();
            return response()->json(['success' => 'Berhasil Menghapus Konten Post']);
        } catch (\Throwable $th) {
            return response()->json(['errors' => ['errors' => $th->errorInfo[2]]], 500);
        }
    }

}
