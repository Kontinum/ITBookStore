<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'isbn', 'name', 'year', 'description', 'picture', 'price', 'pages'
    ];
    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function subcategories()
    {
        return $this->belongsToMany(Subcategory::class);
    }
}
