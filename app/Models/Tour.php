<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $table = 'paket_tour';
    protected $guarded = [];

    // protected $hidden = [
    //     'collection_photos_id',
    // ];

    public function photos() { 
        return $this->hasMany(Photos::class, 'id', 'collection_photos_id');
    }

}
