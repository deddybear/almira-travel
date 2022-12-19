<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidationReview;
use App\Models\Contact;
use App\Traits\UploadFileTraits;
use App\Traits\ReviewTraits;
use App\Models\Mobil;
use Carbon\Carbon;
use App\Models\Photos;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid as Generate;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class SewaMobilController extends Controller {

    use UploadFileTraits, ReviewTraits;

    /** 
        * TODO : Guest Function
    */

    public function __construct() {
        $this->contact = Contact::select('wa', 'email')->where('id', 'd10a7e1e-1cb6-4a0a-ba9d-33fa89c63649')->first();;
    }

    public function index() {
        $contact = $this->contact;
        $data = Mobil::select('review_id', 'detail', 'name', 'price', 'slug', 'collection_photos_id')->with('photos:id,path', 'reviews:*')->get();


        return view('guest/sewa-mobil', compact('data', 'contact'));
    }

    public function desc($slug) {
        $contact = $this->contact;
        $data =  Mobil::select('review_id', 'detail', 'name', 'price', 'collection_photos_id')->where('slug', $slug)->with('photos:id,path', 'reviews:*')->first();
       
        // return $data;
        return view('guest/desc-mobil', compact('data', 'contact'));
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
        return $this->deleteReviewers($id);
    }

    /** 
        * TODO : Dashboard Admin Function
    */

    public function pageView() {
        return view('dashboard.sewa-mobil');
    }

    public function listData() {
        $data = Mobil::orderBy('created_at');
        
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
                                <a href="'.url("/mobil/desc/$data->slug").'" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                <a href="javascript:;" class="btn btn-sm btn-warning edit" data="'.$data->id.'"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="javascript:;" class="btn btn-sm btn-danger delete" data="'.$data->id.'"><i class="fa-solid fa-trash-can"></i></a>
                                ';
                            })
                            ->rawColumns(['Actions'])
                            ->toJson();

    }

    public function search(Request $req) {
        
        $results = Mobil::select($req->type)
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
                'id' => $id,
                'collection_photos_id' => $idPhotos,
                'review_id' => Generate::uuid4(),
                'name'  => $req->name,
                'tipe_mobil' => $req->type,
                'kursi' => str_replace(".","", $req->kursi) ,
                'cc'    => str_replace(".","", $req->cc),
                'price' => str_replace(".","", $req->price),
                'detail' => $req->content,
                'slug'  => Str::slug($req->name, '-')
            );

            Mobil::create($data);

            return response()->json(['success' => 'Berhasil Membuat Postingan Baru']);  

        } catch (\Throwable $th) {
            return response()->json(['errors' => ['errors' => $th->errorInfo[2]]], 500);
        }
    }

    public function update($id, Request $req){
        date_default_timezone_set('Asia/Jakarta');

        try {
            $idPhotos       = Mobil::select('collection_photos_id')->where('id', $id)->first();
            $statusDelFiles = $this->deleteFiles($idPhotos->collection_photos_id);
            $statusUpload   = $this->uploadFiles($req);

            if (!$statusDelFiles) {
                return response()->json(['errors' => ['errors' => 'Gagal Menghapus file foto']], 500);
            }

            if (!$statusUpload) {
                return response()->json(['errors' => ['errors' => 'Gagal Mengupload file foto']], 500);
            }

            $data = array(
                'id' => $id,
                'collection_photos_id' => $statusUpload,
                'name'  => $req->name,
                'tipe_mobil' => $req->type,
                'kursi' => str_replace(".","", $req->kursi),
                'cc'    => str_replace(".","", $req->cc) ,
                'price' => str_replace(".","", $req->price),
                'detail' => $req->content,
                'slug'  => Str::slug($req->name, '-')
            );

            Mobil::where('id', $id)->update($data);

            return response()->json(['success' => 'Berhasil Mengedit Postingan ']);             
        } catch (\Throwable $th) {
            return response()->json(['errors' => ['errors' => $th->errorInfo[2]]], 500);
        }
    }

    public function delete($id){
        try {
            $idPhotos       = Mobil::select('collection_photos_id')->where('id', $id)->first();
            $statusDelFiles = $this->deleteFiles($idPhotos->collection_photos_id);

            if (!$statusDelFiles) {
                return response()->json(['errors' => ['errors' => 'Gagal Menghapus file foto']], 500);
            }

            Mobil::where('id', $id)->delete();
            return response()->json(['success' => 'Berhasil Menghapus Konten Post']);
        } catch (\Throwable $th) {
            return response()->json(['errors' => ['errors' => $th->errorInfo[2]]], 500);
        }
    }

}
