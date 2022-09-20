<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $table = 'sewa_mobil';
    protected $guarded = [];

    public function photos() { 
        return $this->hasMany(Photos::class, 'id', 'collection_photos_id');
    }
}
