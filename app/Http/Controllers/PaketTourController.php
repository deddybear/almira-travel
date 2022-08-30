<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\Photos;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid as Generate;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;


class PaketTourController extends Controller
{
    
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
                            <a href="'.url("/desc/$data->slug").'" class="btn btn-sm btn-info"><i class="fa-solid fa-circle-info"></i></a>
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
                'collection_photos_id' => $idPhotos,
                'name'  => $req->name,
                'price' => $req->price,
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
                'price' => $req->price,
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

    public function uploadFiles(Request $req) {
        $id = Generate::uuid4();
        $photos = $req->file('photo');
        
        try {

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
