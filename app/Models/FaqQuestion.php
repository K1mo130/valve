<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqQuestion extends Model
{
    use HasFactory;

    use HasFactory;

    protected $fillable = ['faq_category_id', 'question', 'answer'];

    public function category()
    {
        return $this->belongsTo('App\Models\FaqCategory', 'faq_category_id');
    }
}
