<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


//table collection_photos
class Photos extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = 'collection_photos';
}
