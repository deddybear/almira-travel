<?php 

namespace App\Traits;

use App\Http\Requests\ValidationPhoto;
use App\Models\Photos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid as Generate;
use Illuminate\Support\Facades\DB;

/**
 * Is Trait for function upload image 
 */

trait UploadFileTraits {
    
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
