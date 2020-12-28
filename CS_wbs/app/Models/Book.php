<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'price',
        'stock',
        'category_id',
        'img',
        'description',
        'isbn',
        'height',
        'page_number',
        'release'
    ];

    public function authors(){
        return $this->belongsToMany(Author::class,'author_books','book_id','author_id');
    }

    public function orders(){
        return $this->belongsToMany(Order::class,'order_details','book_id','order_id');
    }
}
