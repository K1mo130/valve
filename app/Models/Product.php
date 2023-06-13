<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function category() {
        return $this->belongsTo('App\Models\Category');
    }

    public function reviews() {
        return $this->hasMany('App\Models\Reviews');
    }

    public function libraries() {
        return $this->hasMany('App\Models\Library');
    }

    protected $fillable = ['id', 'slug', 'name', 'added', 'image'];
}
