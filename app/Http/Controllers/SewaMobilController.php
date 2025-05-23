<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidationReview;
use App\Models\Contact;
use App\Traits\UploadFileTraits;
use App\Traits\ReviewTraits;
use App\Models\Mobil;
use Carbon\Carbon;
use App\Models\Review;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid as Generate;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Caraousel;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\ValidationSearchPaketTour;
use App\Http\Requests\ValidationSewaMobil;

class SewaMobilController extends Controller {

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
        
        // $mobil = Mobil::select('detail', 'name', 'price', 'tipe_mobil', 'kursi', 'cc', 'slug', 'collection_photos_id')
        // ->with('photos:id,path')
        // ->get();

        $carousel = Caraousel::select('carousel_images.*', 'collection_photos.path')
        ->join('collection_photos', 'carousel_images.collection_photos_id', 'collection_photos.id')
        ->where('carousel_images.jenis', '=', 'sewa')
        ->first();

        return view('guest-v2/sewa-mobil', compact('contact', 'carousel'));
    }

    public function desc($slug) {
        $contact = $this->contact;

        $carousel = Caraousel::select('carousel_images.*', 'collection_photos.path')
        ->join('collection_photos', 'carousel_images.collection_photos_id', 'collection_photos.id')
        ->where('carousel_images.jenis', '=', 'sewa')
        ->first();

        $data =  Mobil::select('review_id', 'detail', 'name', 'price', 'collection_photos_id')->where('slug', $slug)->with('photos:id,path', 'reviews:*')->first();
        // return $data;
        return view('guest-v2/desc-mobil', compact('data', 'contact', 'carousel'));
    }

    /**
     * Summary of getListTour
     * untuk mendapatkan list data paket tour dengan ajax
     * @return JsonResponse|mixed
     */
    public function getListTour(ValidationSearchPaketTour $req) : JsonResponse {
        
        $mobil = Mobil::select('detail', 'name', 'price', 'tipe_mobil', 'kursi', 'cc', 'slug', 'using_price', 'price_string', 'collection_photos_id')
                ->with('photos:id,path')
                ->orderBy('created_at')
                ->limit($req->limit)
                ->offset($req->offset)
                ->get();
        
        return response()->json($mobil);
    }


    /**
     * Summary of searchGuest
     * untuk pencarian halaman guest dengan ajax
     * @param \App\Http\Requests\ValidationSearchPaketTour $req
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public function searchGuest(ValidationSearchPaketTour $req)  {

        $query = Mobil::select('detail', 'name', 'price', 'tipe_mobil', 'kursi', 'cc', 'slug', 'using_price', 'price_string', 'collection_photos_id')
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
     * Summary of get
     * @param mixed $id
     * @return JsonResponse|mixed
     */
    public function get($id) {
        
        $data = Mobil::with('photos:id,path')->find($id);
        
        return response()->json($data);
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
            return response()->json(['errors' => ['errors' => $th->getMessage()]], 500);
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
                                <a href="'.url("/sewa-mobil/desc/$data->slug").'" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                <a href="javascript:;" class="btn btn-sm btn-warning edit" data="'.$data->id.'"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="javascript:;" class="btn btn-sm btn-danger delete" data="'.$data->id.'"><i class="fa-solid fa-trash-can"></i></a>
                                ';
                            })
                            ->rawColumns(['Actions'])
                            ->toJson();

    }

    /**
     * Summary of search
     * search untuk dashboard
     * @param \Illuminate\Http\Request $req
     * @return Mobil[]|\Illuminate\Database\Eloquent\Collection
     */
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
                'tipe_mobil' => $req->tipe_mobil,
                'kursi' => str_replace(".","", $req->kursi) ,
                'cc'    => str_replace(".","", $req->cc),
                'price' => isset($req->price) ? str_replace(".","", $req->price) : 0,
                'price_string' => $req->price_string,
                'using_price' => $req->using_price,
                'detail' => $req->content,
                'slug'  => Str::slug($req->name, '-')
            );

            Mobil::create($data);

            return response()->json(['success' => 'Berhasil Membuat Postingan Baru']);  

        } catch (\Throwable $th) {
            return response()->json(['errors' => ['errors' => $th->getMessage()]], 500);
        }
    }

    public function update($id, ValidationSewaMobil $req){
        date_default_timezone_set('Asia/Jakarta');

        try {
            $idPhotos       = Mobil::select('collection_photos_id')->where('id', $id)->first();
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
                'tipe_mobil' => $req->tipe_mobil,
                'kursi' => str_replace(".","", $req->kursi),
                'cc'    => str_replace(".","", $req->cc) ,
                'price' => str_replace(".","", $req->price),
                'price_string' => $req->price_string,
                'using_price' => $req->using_price,
                'detail' => $req->content,
                'slug'  => Str::slug($req->name, '-')
            );

            Mobil::where('id', $id)->update($data);

            return response()->json(['success' => 'Berhasil Mengedit Postingan ']);             
        } catch (\Throwable $th) {
            return response()->json(['errors' => ['errors' => $th->getMessage()]], 500);
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
            return response()->json(['errors' => ['errors' => $th->getMessage()]], 500);
        }
    }

}
