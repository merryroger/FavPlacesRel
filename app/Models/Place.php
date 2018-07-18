<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $fillable = ['id', 'placetype_id', 'name'];

    public function scopePlace($query, $placename)
    {
        return $query->where('name', $placename);
    }

    public function scopePlaceById($query, $id)
    {
            return $query->whereId($id);
    }
}
