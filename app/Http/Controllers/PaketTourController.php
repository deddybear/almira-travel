<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidationReview;
use App\Http\Requests\ValidationSearchPaketTour;
use App\Traits\UploadFileTraits;
use App\Models\Tour;
use App\Models\Review;
use App\Traits\ReviewTraits;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid as Generate;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\ValidationTour;
use App\Models\Contact;
use App\Models\Caraousel;

class PaketTourController extends Controller {

    use UploadFileTraits, ReviewTraits;
    public $contact;
    
    /** 
        * TODO : Guest Function
    */

    public function __construct() {
        $this->contact = Contact::select('wa', 'email')->where('id', 'd10a7e1e-1cb6-4a0a-ba9d-33fa89c63649')->first();;
    }

    public function index() {
        $contact = $this->contact;

        $carousel = Caraousel::select('carousel_images.*', 'collection_photos.path')
        ->join('collection_photos', 'carousel_images.collection_photos_id', 'collection_photos.id')
        ->where('carousel_images.jenis', '=', 'tour')
        ->first();
        
        // $tour = Tour::select('detail', 'name', 'price', 'slug', 'lokasi', 'category', 'collection_photos_id')->with('photos:id,path')->get();

        return view('guest-v2/paket-tour', compact('contact', 'carousel'));
    }

    
    public function desc($slug) {
        $contact = $this->contact;

        $carousel = Caraousel::select('carousel_images.*', 'collection_photos.path')
        ->join('collection_photos', 'carousel_images.collection_photos_id', 'collection_photos.id')
        ->where('carousel_images.jenis', '=', 'tour')
        ->first();

        $data =  Tour::select('review_id', 'detail', 'name', 'trip_plan', 'best_offer', 'prepare', 'price', 'collection_photos_id')->where('slug', $slug)->with('photos:id,path', 'reviews:*')->first();
        return view('guest-v2/desc-tour', compact('data', 'contact', 'carousel'));
    }

    /**
     * Summary of getListTour
     * untuk mendapatkan list data paket tour dengan ajax
     * @return JsonResponse|mixed
     */
    public function getListTour(ValidationSearchPaketTour $req) : JsonResponse {
        
        $tour = Tour::select('detail', 'name', 'price', 'slug', 'lokasi', 'category', 'collection_photos_id')
                ->with('photos:id,path')
                ->where('type_tour', '=', 'paket')
                ->orderBy('created_at')
                ->limit($req->limit)
                ->offset($req->offset)
                ->get();
        
        return response()->json($tour);
    }


    /**
     * Summary of searchGuest
     * untuk pencarian halaman guest dengan ajax
     * @param \App\Http\Requests\ValidationSearchPaketTour $req
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public function searchGuest(ValidationSearchPaketTour $req)  {

        $query = Tour::select('detail', 'name', 'price', 'slug', 'lokasi', 'category', 'collection_photos_id')
                 ->with('photos:id,path')
                 ->where('type_tour', '=', 'paket')
                 ->orderBy('created_at');

        foreach ($req->all() as $column => $value) {
            if ($req->$column) {
                $query->whereRaw("LOWER($column) like '%". strtolower($value) ."%'",);
            }
        }

        return response()->json($query->get());
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
        $data = Tour::where('type_tour', '=', 'paket')->orderBy('created_at');

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
                         ->where('type_tour', '=', 'paket')
                         ->whereRaw("LOWER($req->type) LIKE ?", ["%".strtolower($req->keyword)."%"])
                         ->distinct()
                         ->get();
        
        return $results;
    }

    public function get($id) {
        
        $data = Tour::with('photos:id,path')->find($id);
        
        return response()->json($data);
    }

    public function create(ValidationTour $req) {
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
                'category' => $req->category,
                'lokasi' => $req->lokasi,
                'price' => str_replace(".","", $req->price),
                'detail' => $req->detail,
                'trip_plan' => $req->plan,
                'best_offer' => $req->offer,
                'prepare' => $req->prepare,
                'type_tour' => 'paket',
                'slug'  => Str::slug($req->name, '-')
            );
            Tour::create($data);

            return response()->json(['success' => 'Berhasil Membuat Postingan Baru']);       

        } catch (\Throwable $th) {
            return response()->json(['errors' => ['errors' => $th->errorInfo[2]]], 500);
        }
    }

    public function update($id, ValidationTour $req) {
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
                'category' => $req->category,
                'lokasi' => $req->lokasi,
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
