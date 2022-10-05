<?php

namespace App\Http\Controllers;

use App\Traits\UploadFileTraits;
use App\Models\Caraousel;
use App\Models\Photos;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid as Generate;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class CarouselListController extends Controller {

    use UploadFileTraits;

    public function pageView() {
        return view('dashboard.carousel-images');
    }

    public function listData() {
        // <img src="{{ asset('/images/mobil-1.png') }}" width="500" height="350">
        $data = Caraousel::select('carousel_images.id', 'carousel_images.created_at', 'carousel_images.updated_at', 'collection_photos.path')
                         ->join('collection_photos', 'carousel_images.collection_photos_id', 'collection_photos.id')
                         ->orderBy('carousel_images.created_at');

        // return asset('/images/mobil-1.png');
        return DataTables::eloquent($data)
                            ->addIndexColumn()
                            ->editColumn('path', function ($data) {
                                return "<img src='".asset('/storage/images/'. $data->path)."'width='300' height='200'>";
                            })
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
                                <a href="'.url("/desc/$data->slug").'" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                <a href="javascript:;" class="btn btn-sm btn-warning edit" data="'.$data->id.'"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="javascript:;" class="btn btn-sm btn-danger delete" data="'.$data->id.'"><i class="fa-solid fa-trash-can"></i></a>
                                ';
                            })
                            ->rawColumns(['path','Actions'])
                            ->toJson();
    }

    public function search(Request $req) {
        
        $results = Caraousel::select($req->type)
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
            );

            Caraousel::create($data);

            return response()->json(['success' => 'Berhasil Membuat Postingan Baru']);  
        } catch (\Throwable $th) {
            return response()->json(['errors' => ['errors' => $th->errorInfo[2]]], 500);
        }
    }

    public function update($id, Request $req) {
        date_default_timezone_set('Asia/Jakarta');

        try {
            $idPhotos       = Caraousel::select('collection_photos_id')->where('id', $id)->first();
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
            );

            Caraousel::where('id', $id)->update($data);

            return response()->json(['success' => 'Berhasil Mengedit Postingan ']);  
        } catch (\Throwable $th) {
            return response()->json(['errors' => ['errors' => $th->errorInfo[2]]], 500);
        }
    }

    public function delete($id) {
        try {
            $idPhotos       = Caraousel::select('collection_photos_id')->where('id', $id)->first();
            $statusDelFiles = $this->deleteFiles($idPhotos->collection_photos_id);

            if (!$statusDelFiles) {
                return response()->json(['errors' => ['errors' => 'Gagal Menghapus file foto']], 500);
            }

            Caraousel::where('id', $id)->delete();
            return response()->json(['success' => 'Berhasil Menghapus Konten Post']);
        } catch (\Throwable $th) {
            return response()->json(['errors' => ['errors' => $th->errorInfo[2]]], 500);
        }
    }

    // public function uploadFiles(Request $req) {
    //     $id = Generate::uuid4();
        
    //     try {

    //         if (!$req->exists('photo') && !$req->file('photo')) {
    //             return 'null';
    //         }

    //         $photos = $req->file('photo');
    //         $nameFile = $photos->hashName();
    //         $photos->storeAs('public/images', $nameFile);

    //         Photos::create([
    //             'id'   => $id,
    //             'path' => $nameFile
    //         ]);
            
    //        return $id;
    //     } catch (\Throwable $th) {
    //        return false;
    //     }
    // }

    // public function deleteFiles($idPhotos) {
    //     try {

    //         if ($idPhotos == 'null') {
    //             return true;
    //         }

    //         $filenames = Photos::select('path')->where('id', $idPhotos)->get();
 
    //         foreach ($filenames as $value) {

    //             if (Storage::disk('public')->exists('images/' . $value->path)) {
    //                 Storage::disk('public')->delete('images/' . $value->path);
    //                 Photos::where('path', $value->path)->delete();
    //             }
               
    //         }

            
    //         return true;
    //     } catch (\Throwable $th) {
    //         return false;
    //     }
    // }
}
