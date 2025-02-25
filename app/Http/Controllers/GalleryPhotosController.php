<?php

namespace App\Http\Controllers;

use App\Models\Caraousel;
use App\Models\Contact;
use App\Traits\UploadFileTraits;
use App\Models\GalleryPhotos;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use Ramsey\Uuid\Uuid as Generate;


class GalleryPhotosController extends Controller {
    
    use UploadFileTraits;
    public $contact;

    /** 
        * TODO : Guest Function
    */

    public function __construct() {
        $this->contact = Contact::select('wa', 'email')->where('id', 'd10a7e1e-1cb6-4a0a-ba9d-33fa89c63649')->first();
    }


    public function index() {
        $contact = $this->contact;

        $carousel = Caraousel::select('carousel_images.*', 'collection_photos.path')
        ->join('collection_photos', 'carousel_images.collection_photos_id', 'collection_photos.id')
        ->where('carousel_images.jenis', '=', 'gallery')
        ->first();


        $data = GalleryPhotos::select('collection_photos_id', 'name', 'desc')->with('photos:id,path')->get();

        return view('guest-v2.gallery', compact('data', 'contact', 'carousel'));
    }

    /** 
        * TODO : Dashboard Admin Function
    */

    public function pageView() {
        return view('dashboard.gallery-photos');
    }

    public function listData() {
        $data = GalleryPhotos::orderBy('created_at');

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
                            <a href="javascript:;" class="btn btn-sm btn-danger delete" data="'.$data->id.'"><i class="fa-solid fa-trash-can"></i></a>
                            ';
                        })
                        ->rawColumns(['Actions'])
                        ->toJson();
    }

    public function search(Request $req) {
        
        $results = GalleryPhotos::select($req->type)
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
                'name'  => $req->name,
                'desc'  => $req->desc,
            );

            GalleryPhotos::create($data);

            return response()->json(['success' => 'Berhasil Mengupload Gallery Foto Baru']);  
        } catch (\Throwable $th) {
            return response()->json(['errors' => ['errors' => $th->errorInfo[2]]], 500);
        }
    }

    public function delete($id) {
        try {
            date_default_timezone_set('Asia/Jakarta');

            $idPhotos = GalleryPhotos::select('collection_photos_id')->where('id', $id)->first();
            $statusDelFiles = $this->deleteFiles($idPhotos->collection_photos_id);

            if (!$statusDelFiles) {
                return response()->json(['errors' => ['errors' => 'Gagal Menghapus file foto']], 500);
            }

            GalleryPhotos::where('id', $id)->delete();
            return response()->json(['success' => 'Berhasil Menghapus Gallery Foto']);
        } catch (\Throwable $th) {
            return response()->json(['errors' => ['errors' => $th->errorInfo[2]]], 500);
        }
    }
}
