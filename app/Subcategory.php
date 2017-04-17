<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable = [
        'category_id','name'
    ];
    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
}
