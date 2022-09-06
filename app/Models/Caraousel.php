<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caraousel extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $guarded = [];
    protected $table = 'carousel_images';
    // protected $hidden = [
    //     'collection_photos_id',
    // ];

    public function photos() { 
        return $this->hasMany(Photos::class, 'id', 'collection_photos_id');
    }

}
