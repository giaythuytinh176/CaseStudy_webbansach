<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_date',
        'customer_id',
        'status',
    ];

    public function customers()
    {
        return $this->belongsTo(Customer::class, 'id');
    }
}
