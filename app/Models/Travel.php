<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    use HasFactory;

    protected $table = 'travel_reguler';
    protected $guarded = [];
    protected $hidden = [
        'collection_photos_id',
    ];

    public function photos() { 
        return $this->hasMany(Photos::class, 'id', 'collection_photos_id');
    }
}
