<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidationSearchTravelRegular;
use App\Http\Requests\ValidationTravelReguler;
use App\Models\Caraousel;
use App\Traits\UploadFileTraits;
use Illuminate\Http\JsonResponse;
use App\Traits\ReviewTraits;
use App\Models\Contact;
use App\Models\Travel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use Ramsey\Uuid\Uuid as Generate;
use Illuminate\Support\Str;

class TravelRegulerController extends Controller {

    use UploadFileTraits, ReviewTraits;
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
        ->where('carousel_images.jenis', '=', 'travel')
        ->first();

        // $data = Travel::select('name', 'price', 'trip', 'slug', 'collection_photos_id')->with('photos:id,path')->get();

        return view('guest-v2/travel-reguler', compact('carousel', 'contact'));
    }

    public function desc($slug) {
        $data =  Travel::select('name', 'price', 'lokasi', 'category', 'trip', 'transport', 'door', 'collection_photos_id')->where('slug', $slug)->with('photos:id,path')->first();

        $carousel = Caraousel::select('carousel_images.*', 'collection_photos.path')
        ->join('collection_photos', 'carousel_images.collection_photos_id', 'collection_photos.id')
        ->where('carousel_images.jenis', '=', 'travel')
        ->first();
        // return $data;
        return view('guest-v2/desc-travel', compact('data', 'carousel'));
    }

    /**
     * Summary of getListTravel
     * untuk mendapatkan list data paket Travel Reguler dengan ajax
     * @param \App\Http\Requests\ValidationSearchTravelRegular $req
     * @return JsonResponse|mixed
     */
    public function getListTravel(ValidationSearchTravelRegular $req) : JsonResponse {
        
        $tour = Travel::select('name', 'price', 'lokasi', 'category', 'trip', 'slug', 'using_price', 'price_string', 'collection_photos_id')
                ->with('photos:id,path')
                ->orderBy('created_at')
                ->limit($req->limit)
                ->offset($req->offset)
                ->get();
        
        return response()->json($tour);
    }

    /**
     * Summary of searchGuest
     * untuk pencarian halaman guest dengan ajax
     * @param \App\Http\Requests\ValidationSearchTravelRegular $req
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public function searchGuest(ValidationSearchTravelRegular $req)  {

        $query = Travel::select('name', 'price', 'lokasi', 'category', 'trip', 'slug', 'using_price', 'price_string', 'collection_photos_id')
                 ->with('photos:id,path')
                 ->orderBy('created_at');

        foreach ($req->all() as $column => $value) {
            if ($req->$column) {
                $query->whereRaw("LOWER($column) like '%". strtolower($value) ."%'",);
            }
        }

        return response()->json($query->get());
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
                            <a href="'.url("/paket-tour/desc/$data->slug").'" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
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

        /**
     * Summary of get
     * @param mixed $id
     * @return JsonResponse|mixed
     */
    public function get($id) {
        
        $data = Travel::with('photos:id,path')->find($id);
        
        return response()->json($data);
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
                'lokasi' => $req->lokasi, 
                'category' => $req->category,
                'transport' => $req->trans,
                'door'  => $req->door,
                'slug'  => Str::slug($req->name, '-')
            );

            Travel::create($data);
            return response()->json(['success' => 'Berhasil Membuat Postingan Baru']);  

        } catch (\Throwable $th) {
            return response()->json(['errors' => ['errors' => $th->getMessage()]], 500);
        }
    }

    public function update($id, ValidationTravelReguler $req) {
        date_default_timezone_set('Asia/Jakarta');

        try {
            $idPhotos       = Travel::select('collection_photos_id')->where('id', $id)->first();
            $statusUpload   = $idPhotos->collection_photos_id;

            /** jika ada inputan file pada saat melakukan update */
            if ($req->hasFile('photo')) {
                $statusDelFiles = $this->deleteFiles($idPhotos->collection_photos_id);

                if (!$statusDelFiles) {
                    return response()->json(['errors' => ['errors' => 'Gagal Menghapus file foto']], 500);
                }

                $statusUpload   = $this->uploadFiles($req);

                if (!$statusUpload) {
                    return response()->json(['errors' => ['errors' => 'Gagal Mengupload file foto']], 500);
                }
            }

            $data = array(
                'id' => $id,
                'collection_photos_id' => $statusUpload,
                'name'  => $req->name,
                'lokasi' => $req->lokasi, 
                'category' => $req->category,
                'price' => str_replace(".","", $req->price),
                'trip'  => $req->trip,
                'transport' => $req->trans,
                'door'  => $req->door,
                'slug'  => Str::slug($req->name, '-')
            );

            Travel::where('id', $id)->update($data);
            
            return response()->json(['success' => 'Berhasil Mengedit Postingan ']);   
        } catch (\Throwable $th) {
            return response()->json(['errors' => ['errors' => $th->getMessage()]], 500);
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
            return response()->json(['errors' => ['errors' => $th->getMessage()]], 500);
        }
    }

}
