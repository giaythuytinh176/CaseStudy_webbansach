<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $fillable = [
        'email',
        'password',
        'first_name',
        'last_name',
        'address',
        'phone',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id');
    }
}
