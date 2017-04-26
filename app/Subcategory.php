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

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }

    public function getRouteKeyName()
    {
        return 'name';
    }
}
