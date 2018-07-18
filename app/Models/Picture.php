<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $fillable = ['id', 'place_id', 'location', 'width', 'height', 'created_at', 'updated_at'];

    public function scopePictureList($query, $place_id)
    {
        return $query->where('place_id', $place_id)->orderBy('created_at', 'desc');
    }

}
