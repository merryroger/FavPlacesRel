<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $fillable = ['id', 'place_id', 'location', 'width', 'height', 'created_at', 'updated_at'];

    public function place()
    {
        return $this->belongsTo(Place::class);
    }

}
