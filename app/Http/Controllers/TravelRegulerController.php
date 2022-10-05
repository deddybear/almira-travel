<?php

namespace App\Http\Controllers;

use App\Traits\UploadFileTraits;
use App\Models\Travel;
use App\Models\Photos;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid as Generate;
use Illuminate\Support\Str;

class TravelRegulerController extends Controller {

    /** 
        * TODO : Guest Function
    */

    public function index() {
        $data = Travel::select('name', 'price', 'trip', 'slug', 'collection_photos_id')->with('photos:id,path')->get();

        return view('guest/travel-reguler', compact('data'));
    }

    public function desc($slug) {
        $data =  Travel::select('name', 'price', 'trip', 'transport', 'door', 'collection_photos_id')->where('slug', $slug)->with('photos:id,path')->first();

        // return $data;
        return view('guest/desc-travel', compact('data'));
    }


    /** 
        * TODO : Dashboard Admin Function
    */

    public function pageView() {
        return view('dashboard.travel-reguler');
    }

    public function listData(){
        $data = Travel::orderBy('created_at');

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
                            <a href="'.url("/desc/$data->slug").'" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                            <a href="javascript:;" class="btn btn-sm btn-warning edit" data="'.$data->id.'"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="javascript:;" class="btn btn-sm btn-danger delete" data="'.$data->id.'"><i class="fa-solid fa-trash-can"></i></a>
                            ';
                        })
                        ->rawColumns(['Actions'])
                        ->toJson();
    }

    public function search(Request $req) {
        
        $results = Travel::select($req->type)
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
                'price' => str_replace(".","", $req->price),
                'trip'  => $req->trip,
                'transport' => $req->trans,
                'door'  => $req->door,
                'slug'  => Str::slug($req->name, '-')
            );

            Travel::create($data);
            return response()->json(['success' => 'Berhasil Membuat Postingan Baru']);  

        } catch (\Throwable $th) {
            return response()->json(['errors' => ['errors' => $th->errorInfo[2]]], 500);
        }
    }

    public function update($id, Request $req) {
        date_default_timezone_set('Asia/Jakarta');

        try {
            $idPhotos       = Travel::select('collection_photos_id')->where('id', $id)->first();
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
                'price' => str_replace(".","", $req->price),
                'trip'  => $req->trip,
                'transport' => $req->trans,
                'door'  => $req->door,
                'slug'  => Str::slug($req->name, '-')
            );

            Travel::where('id', $id)->update($data);
            
            return response()->json(['success' => 'Berhasil Mengedit Postingan ']);   
        } catch (\Throwable $th) {
            return response()->json(['errors' => ['errors' => $th->errorInfo[2]]], 500);
        }
    }

    public function delete($id) {
        try {
            $idPhotos       = Travel::select('collection_photos_id')->where('id', $id)->first();
            $statusDelFiles = $this->deleteFiles($idPhotos->collection_photos_id);

            if (!$statusDelFiles) {
                return response()->json(['errors' => ['errors' => 'Gagal Menghapus file foto']], 500);
            }

            Travel::where('id', $id)->delete();

            return response()->json(['success' => 'Berhasil Menghapus Postingan']);
        } catch (\Throwable $th) {
            return response()->json(['errors' => ['errors' => $th->errorInfo[2]]], 500);
        }
    }

    public function uploadFiles(Request $req) {
        $id = Generate::uuid4();
        
        try {

            if (!$req->exists('photo') && !$req->file('photo')) {
                return 'null';
            }

            $photos = $req->file('photo');

            for ($i = 0; $i < count($photos); $i++) { 
                $nameFile =  $photos[$i]->hashName();
                $photos[$i]->storeAs('public/images',  $nameFile);

                Photos::create([
                    'id'   => $id,
                    'path' => $nameFile
                ]);
            }
            
           return $id;
        } catch (\Throwable $th) {
           return false;
        }
    }

    public function deleteFiles($idPhotos) {
        try {

            if ($idPhotos == 'null') {
                return true;
            }
            $filenames = Photos::select('path')->where('id', $idPhotos)->get();
 
            foreach ($filenames as $value) {

                if (Storage::disk('public')->exists('images/' . $value->path)) {
                    Storage::disk('public')->delete('images/' . $value->path);
                    Photos::where('path', $value->path)->delete();
                }
               
            }
            
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
