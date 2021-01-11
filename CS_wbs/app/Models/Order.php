<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'order_date',
        'customer_id',
        'status',
    ];

    public function customers()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function books()
    {
        return $this->belongsToMany(Book::class, 'order_details', 'order_id', 'book_id')
            ->wherePivot('deleted_at', Carbon::now());//xoa mem softdelete
    }
}
