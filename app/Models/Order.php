<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name',
        'address',
        'email',
        'phone',
        'money',
        'status',
        'message',
        'user_id'
    ];

    public function oder_detail()
    {
        return $this->hasMany(Order_detail::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
