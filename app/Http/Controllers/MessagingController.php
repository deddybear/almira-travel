<?php

namespace App\Http\Controllers;

use App\Models\Messaging;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use App\Http\Requests\ValidatorSendQuestion;
use Ramsey\Uuid\Uuid as Generate;

class MessagingController extends Controller {
    
    /** 
        * TODO : Guest Function
    */
    
    public function sendMsg(ValidatorSendQuestion $req) {
        date_default_timezone_set('Asia/Jakarta');
        $id = Generate::uuid4();

        try {
            
            $data = array(
                'id'    => $id,
                'name'  => $req->name,
                'email' => $req->email,
                'wa'    => preg_replace("/^0/", "+62", $req->wa),
                'msg'   => $req->msg
            );

            Messaging::create($data);

            return response()->json(['success' => 'Berhasil Mengirim Pesan nanti akan kami balas secepatnya']);
        } catch (\Throwable $th) {
            return response()->json(['errors' => ['errors' => $th->getMessage()]], 500);
        }
        
    }

    /** 
        * TODO : Dashboard Admin Function
    */

    public function pageView() {
        return view('dashboard.messaging');
    }

    public function data() {
        $data = Messaging::select('id', 'name', 'email', 'wa', 'created_at')->orderBy('created_at');

        return DataTables::eloquent($data)
                            ->addIndexColumn()
                            ->editColumn('created_at', function ($data) {
                                return Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at, 'Asia/Jakarta')
                                             ->format('Y-m-d H:i:s');
                            })
                            ->addColumn('Actions', function ($data) {
                                return '
                                <a href="javascript:;" class="btn btn-sm btn-info show" data="'.$data->id.'"><i class="fas fa-eye"></i></a>
                                <a href="javascript:;" class="btn btn-sm btn-success sendWa" data="'.$data->wa.'"><i class="fab fa-whatsapp"></i></a>
                                <a href="javascript:;" class="btn btn-sm btn-danger delete" data="'.$data->id.'"><i class="fa-solid fa-trash-can"></i></a>
                                ';
                            })
                            ->rawColumns(['Actions'])
                            ->toJson();
    }

    public function search(Request $req) {
        
        $results = Messaging::select($req->type)
                          ->whereRaw("LOWER($req->type) LIKE ?", ["%".strtolower($req->keyword)."%"])
                          ->distinct()
                          ->get();

        return $results;
    }

    public function show($id) {
        
        try {
            $msg = Messaging::select('name', 'email', 'wa', 'msg')->where('id', $id)->first();

            if ($msg) {
                return response()->json(['success' => $msg]);
            }

            return response()->json(['Nfound' => 'Pesan Tidak ada']);
        } catch (\Throwable $th) {
            return response()->json(['errors' => ['errors' => $th->getMessage()]], 500);
        }

    }

    public function delete($id) {
        try {
            Messaging::where('id', $id)->delete();
            return response()->json(['success' => 'Berhasil Menghapus Pesan']);

        } catch (\Throwable $th) {
            return response()->json(['errors' => ['errors' => $th->getMessage()]], 500);
        }
    }
}
