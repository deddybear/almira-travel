<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryPhotos extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $guarded = [];

    protected $table = 'photos';

    public function photos() { 
        return $this->hasMany(Photos::class, 'id', 'collection_photos_id');
    }
}
